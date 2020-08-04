<div class="card profile-card">
    <div class="profile-header">&nbsp;</div>
    <div class="profile-body">
       <form action="{{route('admin.profile.update-avatar')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="image-area">
             <img src="{{URL::to('/upload/avatar-user/' . auth('admin')->user()->avatar)}}" id="upfile1" alt="Avatar-User"/>
             <input type="file" id="file1"  name="avatar" style="display:none" />
          </div>
          <div class="content-area">
             <h3>{{auth('admin')->user()->name}}</h3>
             <p>{{auth('admin')->user()->email}}</p>
             <p>Administrator</p>
          </div>
          <div class="profile-footer">
            <button class="btn btn-primary btn-lg waves-effect btn-block">
                @if ($errors->has('avatar'))
                <p class="help is-danger" STYLE="COLOR:white;">{{ $errors->first('avatar') }}</p>
                @else
                Thay Đổi Ảnh
                @endif
            </button>

          </div>
       </form>
    </div>
 </div>
