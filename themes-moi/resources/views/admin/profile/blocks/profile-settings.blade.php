<form class="form-horizontal" action="{{route('admin.profile.profile-settings')}}" method="POST">
    @csrf
	<div class="form-group">
		<label for="NameSurname" class="col-sm-2 control-label">NickName</label>
		<div class="col-sm-10">
			<div class="form-line">
				<input type="text" class="form-control" id="NameSurname" name="name" placeholder="Tên Của Bạn" value="{{auth()->user()->name}}">
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
