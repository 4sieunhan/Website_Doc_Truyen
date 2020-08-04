<div class="login">
    <form action="{{route('admin.login')}}" method="POST">
        @csrf
        <label for="chk" aria-hidden="true">Đăng Nhập Admin</label>
        <p>Email</p>
        <input type="text" name="email"  value="{{old('email')}}" placeholder="Email">
        @if ($errors->has('email'))
		<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('email') }}</p>
		@endif
        <p>Mật Khẩu</p>
        <input type="password" name="password" placeholder="Password">
        @if ($errors->has('password'))
		<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('password') }}</p>
		@endif
        <button type="submit">Login</button>
        <i>Bạn Chưa Có Tài Khoản?<a href="{{route('admin.register')}}">Đăng Ký</a></i>
        @if ( Session::has('error-admin-log') )
            <strong>{{ Session::get('error-admin-log') }}</strong>
        @endif
    </form>

</div>
