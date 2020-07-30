<div class="card profile-card">
	<div class="profile-header">&nbsp;</div>
	<div class="profile-body">
		<div class="image-area">
			<img src="{{URL::to('/upload/avatar-user/default/' . auth()->user()->avatar)}}" alt="Avatar-User" />
		</div>
		<div class="content-area">
			<h3>{{auth()->user()->name}}</h3>
            <p>{{auth()->user()->email}}</p>
			<p>Administrator</p>
        </div>
        <div class="profile-footer">
            <button class="btn btn-primary btn-lg waves-effect btn-block">Thay Đổi Ảnh</button>
        </div>
	</div>
</div>
