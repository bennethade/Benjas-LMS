
<!doctype html>
<html lang="en">

<head>
	@include('backend.section.link')
	<title>LMS - Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		@include('backend.section.sidebar')

		<!--end sidebar wrapper -->
		<!--start header -->
		@include('backend.section.header')
		<!--end header -->
		<!--start page wrapper -->
        @yield('content')
		
		<!--end page wrapper -->
        
		@include('backend.section.footer')
	</div>
	<!--end wrapper-->


	
    @include('backend.section.script')
    
</body>

</html>