<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{ asset('assets/images/logo_fk_pkpps.jpg') }}" type="image/png" />
	<!--plugins-->
	<link href="{{ asset('assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{ asset('assets/css/pace.min.css') }}" rel="stylesheet" />
	<script src="{{ asset('assets/js/pace.min.js') }}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/bootstrap-extended.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet">
	<title>Website FK-PKPPS</title>
</head>

<body class="bg-login">
	<!--wrapper-->
	<div class="wrapper">
		<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container-fluid">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
					<div class="col mx-auto">
						<div class="mb-4 text-center">
							<h3><b class="text-success"><i>E-Raport</i></b> Sipontren</h3>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3 class="">Sign in</h3>
										<p>Belum punya akun ? <a href="https://forms.gle/nvvL32SdUY9KPQNs9">Daftar disini</a>
										</p>
									</div>
									<div class="form-body">
										@if(session('success'))
											@include('admin/auth/login-list')
										@endif
										<form class="row g-3 needs-validation" action="login-request" method="post" novalidate>
											@csrf
											@if(session('error'))
											<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
												<div class="d-flex align-items-center">
													<div class="font-35 text-white"><i class='bx bxs-message-square-x'></i>
													</div>
													<div class="ms-3">
														<h6 class="mb-0 text-white">Login Gagal</h6>
														<div class="text-white">{{ Session::get('error') }}</div>
													</div>
												</div>
												<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
											</div>
											@endif
											<div class="col-12 position-relative">
												<label for="inputEmail" class="form-label">Email</label>
												<div class="input-group">
													<input type="email" name="email" class="form-control" id="inputEmail" placeholder="contoh@gmail.com" required>
													<div class="invalid-tooltip">Email tidak boleh kosong</div>
												</div>
											</div>
											<div class="col-12 position-relative">
												<label for="inputChoosePassword" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
													<div class="invalid-tooltip">Password boleh kosong</div>
												</div>
											</div>
											<div class="col-md-12 text-end"><a href="authentication-forgot-password.html">Lupa Password ?</a>
											</div>
                                            
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-success"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                </div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
	<!--plugins-->
	<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
	<script src="{{ asset('assets/js/form-validations.js') }}"></script>
	<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
	<!--Password show & hide js -->
	<script>
		$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});

			$("#lognListModal").modal('show');
		});
	</script>
	
	<!--app JS-->
	<script src="{{ asset('assets/js/app.js') }}"></script>
</body>

</html>