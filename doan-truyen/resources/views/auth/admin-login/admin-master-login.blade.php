<!DOCTYPE html>
<html lang="en">
	<head>
		@include('auth.blocks.head-login')
	</head>
	<body>
		@include('auth.blocks.image-bg')
		<div class="main">
			@include('auth.admin-login.login-blocks.admin-login')
		</div>
		@include('auth.blocks.foot-login')
	</body>
</html>
