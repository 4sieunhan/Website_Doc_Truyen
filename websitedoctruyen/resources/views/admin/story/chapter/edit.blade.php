@extends('admin.master')
@section('content')
@section('h1','Sửa mới chương')
@section('button','Tạo Mới')
  <!-- Main content -->
<form enctype="multipart/form-data" method="POST" action="{{route('admin.story.chapter.update',['id' => $chapters->id])}}">
@csrf
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
            <h1 class="card-title">@yield('h1')({{$chapters->story->name}})</h1>
            </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                  <input type="text" name="subname" class="form-control" id="exampleText" placeholder="Nhập tên mục">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên chương</label>
                    <input type="text" name="name" class="form-control" id="exampleText" placeholder="Nhập tên chương">
                </div>  
                <div class="form-group">
                    <label for="">Nội dung</label>
                    <div class="card-body pad">
                      <div class="mb-3">
                        <textarea  class="ckeditor" name="content" cols="50" rows="10" name="content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                        </textarea>
                      </div>
                    </div>
                </div>
                <div class="form-group col-12">
                  <button type="submit" class="btn btn-primary float-left col-5"></i> 
                      @yield('button')
                  </button>
                  <button type="button" onclick="location.href='{{route('admin.story.chapter.list',['id'=>$chapters->story->id])}}'" class="btn btn-primary float-right col-5"></i> 
                      Quay lại
                  </button>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
</form>
<script>
 
  // Replace the <textarea id="editor1"> with an CKEditor
  // instance, using default configurations.
  CKEDITOR.replace( 'content', {
      uiColor: '#A9E3EC',
  });

</script>
@endsection