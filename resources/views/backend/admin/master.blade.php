
<!doctype html>
<html lang="en">

<head>
	@include('backend.section.link')
	<title>LMS - Admin Dashboard</title>

	<style>
		/* Hide Default theme */
		html{
			visibility: hidden
			opacity: 0;
			transition: opacity 0.3s ease-in-out;
		}
	</style>


<script>
	(function() {
		if(localStorage.getItem('theme') === 'dark') {
			document.documentElement.classList.add('dark-theme');
		} else{
			document.documentElement.classList.add('light-theme');
		}

		document.documentElement.style.visibility = 'visible';
		document.documentElement.style.opacity = '1';
	})()
</script>



</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<div class="page-wrapper">
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
	</div>
	<!--end wrapper-->


	
    @include('backend.section.script')
    
</body>

</html>