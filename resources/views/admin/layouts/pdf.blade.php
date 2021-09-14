<!doctype html>
<html lang="en">

@include('admin/partials/head-pdf')

<body class="bg-white">
	<!--wrapper-->
	<div class="wrapper">
		<!--start page wrapper -->
                @yield('content')
				
		<!--end page wrapper -->
	</div>
	<!--end wrapper-->
	<!-- Bootstrap JS -->
    @include('admin/partials/foot')
	
</body>

</html>