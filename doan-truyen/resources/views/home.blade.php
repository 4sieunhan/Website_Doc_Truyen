Trang Chủ của mọi nhà
Login success {{ auth()->user()->email }}
@if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
<a class="dropdown-item" href="{{ route('admin.logout') }}">Log out admin</a>
@else
<div>
<a class="dropdown-item" href="{{ route('user.logout') }}">Logout web</a>
@endif
