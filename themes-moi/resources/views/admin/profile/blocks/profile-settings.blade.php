<form class="form-horizontal" action="{{route('admin.profile.profile-settings')}}" method="POST">
	@csrf
	<div class="form-group">
		<label for="NameSurname" class="col-sm-2 control-label">NickName</label>
		<div class="col-sm-10">
			<div class="form-line">
				<input type="text" class="form-control" id="NameSurname" name="name" placeholder="Tên Của Bạn" value="{{auth()->user()->name}}" maxlength="20">
				<div class="help-info">
					@if ($errors->has('name'))
					<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('name') }}</p>
					@endif
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<label for="Email" class="col-sm-2 control-label">Email</label>
		<div class="col-sm-10">
			<div class="form-line">
				<input type="email" class="form-control" id="Email" name="email" placeholder="Email" value="{{auth()->user()->email}}" disabled>
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-danger">SUBMIT</button>
		</div>
	</div>
</form>
@if ( Session::has('success-profile') )
<div class="alert bg-green alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{ Session::get('success-profile') }}
</div>
@endif
@if ( Session::has('success-password') )
<div class="alert bg-green alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{ Session::get('success-password') }}
</div>
@endif
@if ( Session::has('success-avatar') )
<div class="alert bg-green alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	{{ Session::get('success-avatar') }}
</div>
@endif
