@extends('admin.admin-master')
@section('content')
<div class="row clearfix">
	<div class="col-xs-12 col-sm-3">
		@include('admin.profile.blocks.profile-card')
	</div>
	<div class="col-xs-12 col-sm-9">
		<div class="card">
			<div class="body">
				<div>
                    @include('admin.profile.blocks.profile-navbar')
					<div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                            <div class="panel panel-default panel-post">
                                @include('admin.profile.blocks.profile-settings')
                            </div>
                        </div>
						<div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                @include('admin.profile.blocks.profile-change-password')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
