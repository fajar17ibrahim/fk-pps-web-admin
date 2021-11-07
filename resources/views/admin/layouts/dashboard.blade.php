<!doctype html>
<html lang="en">

@include('admin/partials/head')

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('admin/partials/sidebar')
		<!--end sidebar wrapper -->
		<!--start header -->
		@include('admin/partials/header')
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				@yield('content')
				<!--end breadcrumb-->
			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top bg-success"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		@include('admin/partials/footer')
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
	@include('admin/partials/foot')

	@yield('custom_js')
</body>

</html>