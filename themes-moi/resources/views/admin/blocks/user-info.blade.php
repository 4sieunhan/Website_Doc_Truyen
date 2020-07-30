<div class="user-info">
    <div class="image">
        <img src="{{asset('images/user.png')}}" width="48" height="48" alt="User" />
    </div>
    <div class="info-container">
        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}</div>
        <div class="email">{{auth()->user()->email}}</div>
        <div class="btn-group user-helper-dropdown">
            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
            <ul class="dropdown-menu pull-right">
                <li><a href="{{route('admin.profile.index')}}"><i class="material-icons">person</i>Hồ Sơ</a></li>
                <li role="separator" class="divider"></li>
                <li role="separator" class="divider"></li>
                <li><a href="{{route('dangxuat')}}"><i class="material-icons">input</i>Đăng Xuất</a></li>
            </ul>
        </div>
    </div>
</div>
