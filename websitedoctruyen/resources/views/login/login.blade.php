<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Trang Đăng Nhập</title>
		<link rel="stylesheet" type="text/css" href="{{asset('style.css')}}"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	</head>
	<body>
		<div class="loginbox">
			<img src="{{asset('image-login/avatar.png')}}" class="avatar" alt="">
			<h1>Đăng Nhập</h1>
			<form action="{{route('login.makedangnhap')}}" method="POST">
				@csrf
				<p>Email</p>
				<input type="text" name="email" value="{{old('email')}}" placeholder="Nhập Địa Chỉ Email">
				@if ($errors->has('email'))
				<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('email') }}</p>
				@endif
				<p>Mật Khẩu</p>
				<input type="password" name="password" placeholder="Nhập Mật Khẩu">
				@if ($errors->has('password'))
				<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('password') }}</p>
				@endif
				<input type="submit" value="Đăng Nhập">
				<a href="{{route('login.dangky')}}">Bạn Không Có Tài Khoản?</a>
			</form>
			@if ( Session::has('error') )
			<div class="alert alert-danger alert-dismissible" role="alert">
				<strong>{{ Session::get('error') }}</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				<span class="sr-only">Close</span>
				</button>
			</div>
			@endif
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	</body>
</html>