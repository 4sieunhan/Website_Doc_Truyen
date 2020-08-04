<div class="signup">
	<form action="{{route('admin.register')}}" method="POST">
		@csrf
		<label for="chk" aria-hidden="true">Đăng Ký Admin</label>
		<p>Nhập Email</p>
		<input type="text" name="email" value="{{ old('email')}}" placeholder="Nhập Email">
		@if ($errors->has('email'))
		<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('email') }}</p>
		@endif
		<i id="hide" class="fa fa-eye-slash" onclick="myFunction()"></i>
		<i id="show" class="fa fa-eye" onclick="myFunction()"></i>
		<p>Nhập Mật Khẩu</p>
		<input type="password" name="password" placeholder="Nhập Password" id="myInput">
		@if ($errors->has('password'))
		<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('password') }}</p>
		@endif
		<p>Nhập Lại Mật Khẩu</p>
		<input type="password" name="password_confirmation" id="myInput2" placeholder="Nhập Lại Password">
		@if ($errors->has('password_confirmation'))
		<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('password_confirmation') }}</p>
		@endif
		<button type="submit">Đăng Ký</button>
    </form>
    <b>Bạn Đã Có Tài Khoản?<a href="{{route('admin.login')}}">Đăng Nhập</a></b>
	@if ( Session::has('success-admin') )
	<strong>{{ Session::get('success-admin') }}</strong>
	@endif
	<?php //Hiển thị thông báo lỗi?>
	@if ( Session::has('error-admin') )
	<div class="alert alert-danger alert-dismissible" role="alert">
		<strong>{{ Session::get('error-admin') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		<span class="sr-only">Close</span>
		</button>
	</div>
	@endif
</div>
