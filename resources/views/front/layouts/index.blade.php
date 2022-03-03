<!DOCTYPE html>
<html lang="en">
<head>
	@include('front.home.head')
	<style>
		.manin-content.page{
			margin-top: 100px;
		}
		.wrap-menu-desktop{
            background-color: #1a202c !important;
        }
	</style>
</head>
<body class="animsition">
	
	<!-- Header -->
	@include ('parts.navbar')
	<!-- Cart -->
	@include('parts.cartsbar')
	<!-- Product -->
	<div class="main-content-pae">
		@yield('content')
	</div>
	<!-- Footer -->
	@include('parts.footer')
	<!-- Modal1 -->
	

<!--===============================================================================================-->	
@include('front.home.scripts')


</body>
</html>