<div class="user-info">
	<div class="image">
		<img src="{{URL::to('/upload/avatar-user/' . auth('admin')->user()->avatar)}}" width="68" height="58" alt="User" />
	</div>
	<div class="info-container">
		<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{auth('admin')->user()->name}}</div>
		<div class="email">{{auth('admin')->user()->email}}</div>
		<div class="btn-group user-helper-dropdown">
			<i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
			<ul class="dropdown-menu pull-right">
				<li><a href="{{route('admin.profile.index')}}"><i class="material-icons">person</i>Hồ Sơ</a></li>
				<li role="separator" class="divider"></li>
				<li role="separator" class="divider"></li>
				<li>
                    @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                    <li><a href="{{route('admin.logout')}}"><i class="material-icons">input</i>Đăng Xuất</a></li>
                    @else
                    <li><a href="{{route('logout')}}"><i class="material-icons">input</i>Đăng Xuất</a></li>
                    @endif
                </li>
			</ul>
		</div>
	</div>
</div>
