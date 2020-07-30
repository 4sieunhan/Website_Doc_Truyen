<div class="login">
    <form action="{{route('dangnhapvao')}}" method="POST">
        @csrf
        <label for="chk" aria-hidden="true">Đăng Nhập</label>
        <p>Email</p>
        <input type="email" name="email" placeholder="Email">
        @if ($errors->has('email'))
		<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('email') }}</p>
		@endif
        <p>Mật Khẩu</p>
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
    </form>
    <i>Bạn Chưa Có Tài Khoản?<a href="{{route('dangky')}}">Đăng Ký</a></i>
    @if ( Session::has('error') )
		<strong>{{ Session::get('error') }}</strong>
	</div>
	@endif
</div>
