
<!doctype html>
<html lang="en">

<head>
	@include('backend.section.link')
	<title>LMS - Instructor Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="page-wrapper">
			<!--sidebar wrapper -->
			@include('backend.instructor.sidebar')

			<!--end sidebar wrapper -->
			<!--start header -->
			@include('backend.instructor.header')
			<!--end header -->
			<!--start page wrapper -->
			@yield('content')
			
			<!--end page wrapper -->
			
			@include('backend.section.footer')
		</div>
	</div>
	<!--end wrapper-->


	
    @include('backend.section.script')
    
</body>

</html>