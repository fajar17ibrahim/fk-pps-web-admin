<!doctype html>
<html lang="en">

@include('admin/partials/head-pdf')

<body class="bg-white">
	<!--wrapper-->

		<!--start page wrapper -->
                @yield('content')
		<!--end page wrapper -->
	
	<!--end wrapper-->
	<!-- Bootstrap JS -->
    @include('admin/partials/foot')
	
	@yield('custom_js')
</body>

</html>