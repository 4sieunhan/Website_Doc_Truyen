<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Đăng Nhập</title>
    <link rel="stylesheet" type="text/css" href="{{asset('style.css')}}"/>
</head>
<body>
    <div class="loginbox">
            <img src="{{asset('image-login/avatar.png')}}" class="avatar" alt="">
            <h1>Đăng Nhập</h1>
            <form action="" method="POST">
                @csrf
                <p>Email</p>
                <input type="email" name="email"  value="{{old('email')}}" placeholder="Nhập Địa Chỉ Email">
                <p>Mật Khẩu</p>
                <input type="password" name="password" placeholder="Nhập Mật Khẩu">
                <input type="submit" value="Đăng Nhập">
                <a href="{{route('login.dangky')}}">Bạn Không Có Tài Khoản?</a>
            </form>
    </div>
</body>
</html>