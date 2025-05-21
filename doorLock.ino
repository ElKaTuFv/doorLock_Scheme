#include <ArduinoJson.h>
#include <LiquidCrystal_I2C.h>
#include <SPI.h>
#include <MFRC522.h>
#include <WiFi.h>
#include <HTTPClient.h>
#include <time.h>

// Konfigurasi WiFi
const char* ssid = "BANTUAN DIGITAL";
const char* password = "09876543";

// LCD
LiquidCrystal_I2C lcd(0x27, 16, 2);

// Waktu
const char* ntpServer = "pool.ntp.org";
const long gmtOffset_sec = 7 * 3600;
const int daylightOffset_sec = 0;
String tanggal, jam;

// LED, Buzzer, Relay
int ledG = 32, ledR = 27, buzz = 33, relay = 15;

// RFID Reader 1 (Masuk)
#define RST_PIN1 4
#define SS_PIN1 5
MFRC522 rfidMasuk(SS_PIN1, RST_PIN1);

// RFID Reader 2 (Keluar)
#define RST_PIN2 26
#define SS_PIN2 2
MFRC522 rfidKeluar(SS_PIN2, RST_PIN2);

void setup() {
  Serial.begin(9600);
  SPI.begin();
  lcd.begin();
  lcd.backlight();

  pinMode(ledR, OUTPUT);
  pinMode(ledG, OUTPUT);
  pinMode(buzz, OUTPUT);
  pinMode(relay, OUTPUT);

  WiFi.begin(ssid, password);
  lcd.setCursor(0, 0);
  lcd.print("Menghubungkan");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("WiFi Terhubung");

  configTime(gmtOffset_sec, daylightOffset_sec, ntpServer);

  rfidMasuk.PCD_Init();
  rfidKeluar.PCD_Init();
}

void loop() {
  printCurrentTimeLCD();

  if (rfidMasuk.PICC_IsNewCardPresent() && rfidMasuk.PICC_ReadCardSerial()) {
    handleCard(rfidMasuk, "masuk");
  }

  if (rfidKeluar.PICC_IsNewCardPresent() && rfidKeluar.PICC_ReadCardSerial()) {
    handleCard(rfidKeluar, "keluar");
  }

  delay(500);
}

void handleCard(MFRC522 &rfid, String jenis) {
  String uid = "";
  for (byte i = 0; i < 4; i++) {
    if (i > 0) uid += ":";
    uid += String(rfid.uid.uidByte[i], DEC);
  }

  Serial.println("UID: " + uid);

  // Validasi ke server
  HTTPClient http;
  http.begin("http://192.168.213.136/doorLock_5B/Api/checkUserAkses?rfid_id=" + uid);
  int code = http.GET();
  if (code > 0) {
    String res = http.getString();
    if (res.length()) {
      DynamicJsonDocument doc(256);
      deserializeJson(doc, res);
      const char* nama = doc["nama"];

      lcd.clear();
      lcd.setCursor(0, 0);
      if (jenis == "masuk"){
        lcd.print("Selamat Datang");
      }else{
        lcd.print("Selamat Jalan");
      }
      lcd.setCursor(0, 1);
      lcd.print(nama);
      accessGranted();
    } else {
      accessDenied();
    }

    // Kirim log dengan parameter jenis
    HTTPClient logger;
    String url = "http://192.168.213.136/doorLock_5B/Api/insertId?rfid_id=" + uid + 
                 "&tanggal=" + tanggal + 
                 "&waktu=" + jam +
                 "&jenis=" + jenis;
    logger.begin(url);
    int logRes = logger.GET();
    logger.end();
  } else {
    Serial.println("Gagal konek server");
  }

  rfid.PICC_HaltA();
  rfid.PCD_StopCrypto1();
  http.end();
}


void accessGranted() {
  digitalWrite(ledG, HIGH);
  digitalWrite(buzz, HIGH);
  delay(150);
  digitalWrite(ledG, LOW);
  digitalWrite(buzz, LOW);
  delay(150);
  digitalWrite(ledG, HIGH);
  digitalWrite(buzz, HIGH);
  delay(150);
  digitalWrite(ledG, LOW);
  digitalWrite(buzz, LOW);
  digitalWrite(relay, HIGH);   // Aktifkan relay → NC akan terbuka
  delay(5000);                // Tunggu 3 detik
  digitalWrite(relay, LOW);  // Matikan relay → NC tersambung lagi
}

void accessDenied() {
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Akses Ditolak");
  digitalWrite(ledR, HIGH);
  digitalWrite(buzz, HIGH);
  delay(1000);
  digitalWrite(ledR, LOW);
  digitalWrite(buzz, LOW);
}

void printCurrentTimeLCD() {
  struct tm timeinfo;
  if (!getLocalTime(&timeinfo)) return;

  char bufTanggal[11], bufJam[9];
  strftime(bufTanggal, sizeof(bufTanggal), "%d-%m-%Y", &timeinfo);
  strftime(bufJam, sizeof(bufJam), "%H:%M:%S", &timeinfo);
  tanggal = String(bufTanggal);
  jam = String(bufJam);

  lcd.setCursor(0, 0);
  lcd.print("Tgl: " + tanggal);
  lcd.setCursor(0, 1);
  lcd.print("Jam: " + jam);
}
