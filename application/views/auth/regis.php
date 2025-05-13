<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<title>Register || DoorLock</title>

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

							<form action="<?php echo base_url('auth/signUp') ?>" method="post" class="mb-md-3 mt-md-4">

								<h2 class="fw-bold mb-1 text-uppercase">Regist your account</h2>
								<?php echo $this->session->flashdata('peringatan') ?></p>

								<div class="form-group mb-3">
									<label class="form-label" for="nama">Nama</label>
									<input type="text" name="name" class="form-control form-control-lg" />
								</div>

								<div class="form-group mb-3">
									<label class="form-label" for="nama">Username</label>
									<input type="text" name="username" class="form-control form-control-lg" />
								</div>

								<div class="form-group mb-3">
									<label class="form-label" for="email">Email</label>
									<input type="email" name="email" class="form-control form-control-lg" />
								</div>

								<div class="form-group mb-3">
									<label class="form-label" for="password">Password</label>
									<input type="password" name="password" class="form-control form-control-lg" />
								</div>

								<button class="btn btn-outline-light btn-lg px-3" type="submit">Sign Up</button>

							</form>

							<div>
								<p class="mb-0">Already have an account? <a href="<?php echo base_url("/login") ?>" class="text-white-50 fw-bold">Sign in</a>
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