<div class="card profile-card">
	<div class="profile-header">&nbsp;</div>
	<div class="profile-body">
		<div class="image-area">
			<img src="../../images/user-lg.jpg" alt="AdminBSB - Profile Image" />
		</div>
		<div class="content-area">
			<h3>{{auth()->user()->name}}</h3>
            <p>{{auth()->user()->email}}</p>
			<p>Administrator</p>
		</div>
	</div>
</div>
