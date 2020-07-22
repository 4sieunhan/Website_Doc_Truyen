@extends('admin.master')
@section('content')
<div class="card card-primary card-outline">
   <div class="card-body">
      <h5 class="card-title">Thông Tin Cá Nhân</h5>
      <h2 class="card-text">
         {{auth()->user()->email}}
      </h2>
      <h2 class="card-text">
        Ngày Tạo: {{auth()->user()->created_at}}
      </h2>
      <a href="{{route('login.logout')}}" class="card-link">Đăng Xuất</a>
   </div>
</div>
@endsection