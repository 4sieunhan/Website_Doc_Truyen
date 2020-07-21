<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Đăng Ký</title>
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}"/>
</head>
<body>
    <div class="loginbox">
        <img src="{{asset('image-login/avatar.png')}}" class="avatar" alt="">
            <h1>Đăng Ký Tài Khoản</h1>
            <form method="POST" action="">
                @csrf
                <p>Nhập Email</p>
                <input type="email" name="email" value="{{ old('email')}}" placeholder="Nhập Địa Chỉ Email">
                <p>Nhập Mật Khẩu</p>
                <input type="password" name="password" placeholder="Nhập Mật Khẩu">
                <p>Nhập Lại Mật Khẩu</p>
                <input type="password" name="password_confirm" placeholder="Nhập Mật Khẩu">
                <input type="submit" value="Đăng Ký">
                <a href="{{route('login.dangnhap')}}">Trở Lại Trang Đăng Nhập.</a>
            </form>
    </div>
</body>
</html>