
<form class="form-horizontal" action="{{route('admin.profile.profile-change-password')}}" method="POST">
    @csrf
	<div class="form-group">
		<label for="OldPassword" class="col-sm-3 control-label">Mật Khẩu Cũ</label>
		<div class="col-sm-9">
			<div class="form-line">
				<input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Nhập mật khẩu cũ">
                <div class="help-info">
                    @if ($errors->has('OldPassword'))
                    <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('OldPassword') }}</p>
                    @endif
                </div>
            </div>
		</div>
	</div>
	<div class="form-group">
		<label for="NewPassword" class="col-sm-3 control-label">Mật Khẩu Mới</label>
		<div class="col-sm-9">
			<div class="form-line">
				<input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="Nhập mật khẩu mới">
                <div class="help-info">
                    @if ($errors->has('NewPassword'))
                    <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('NewPassword') }}</p>
                    @endif
                </div>
            </div>
		</div>
	</div>
	<div class="form-group">
		<label for="NewPasswordConfirm" class="col-sm-3 control-label">Nhập Lại Mật Khẩu Mới</label>
		<div class="col-sm-9">
			<div class="form-line">
				<input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="Nhập lại mật khẩu mới">
                <div class="help-info">
                    @if ($errors->has('NewPasswordConfirm'))
                    <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('NewPasswordConfirm') }}</p>
                    @endif
                </div>
            </div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<button type="submit" class="btn btn-danger">SUBMIT</button>
		</div>
	</div>
</form>
