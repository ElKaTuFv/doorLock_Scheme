<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/1ac5100e06.js" crossorigin="anonymous"></script>

	<title>Login || DoorLock</title>

	<style>
		.gradient-custom {
			/* fallback for old browsers */
			background: #ff914d;

			/* Chrome 10-25, Safari 5.1-6 */
			background: -webkit-linear-gradient(45deg, rgba(255, 145, 77, 1) 0%, rgba(255, 202, 121, 1) 100%, rgba(255, 189, 89, 1) 100%);

			/* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
			background: linear-gradient(45deg, rgba(255, 145, 77, 1) 0%, rgba(255, 202, 121, 1) 100%, rgba(255, 189, 89, 1) 100%);
		}

		.shadowed-box {
			box-shadow: 4px 4px 23px 3px rgba(126, 126, 126, 0.75);
			-webkit-box-shadow: 4px 4px 23px 3px rgba(126, 126, 126, 0.75);
			-moz-box-shadow: 4px 4px 23px 3px rgba(126, 126, 126, 0.75);
		}
	</style>
</head>

<body>
	<section class="vh-100 gradient-custom">
		<div class="container py-5 h-100">
			<div class="row d-flex justify-content-center align-items-center h-100">
				<div class="col-12 col-md-8 col-lg-6 col-xl-5">
					<div class="card bg-dark text-white shadowed-box" style="border-radius: 1rem; border-width: 2px; border-color: #6a757f; ">
						<div class="card-body p-3 text-center">

							<form action="<?php echo base_url('auth/loginProcess') ?>" method="post" class="mb-md-5 mt-md-4">


								<h2 class="fw-bold mb-1 text-uppercase">Login</h2>
								<?php
								if (validation_errors()) {
									echo validation_errors();
								}
								if ($this->session->flashdata('peringatan')) {
									echo $this->session->flashdata('peringatan');
								} else {
									echo "Masukan Email dan Password";
								}
								?>

								<div data-mdb-input-init class="form-outline form-white mb-4">
									<label class="form-label" for="username">Username</label>
									<input type="username" name="username" class="form-control form-control-lg" />
								</div>

								<div data-mdb-input-init class="form-outline form-white mb-4">
									<label class="form-label" for="password">Password</label>
									<input type="password" name="password" class="form-control form-control-lg" />
								</div>

								<button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

							</form>

							<div>
								<p class="mb-0">Don't have an account? <a href="<?php echo base_url("/regis") ?>" class="text-white-50 fw-bold">Sign Up</a>
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>