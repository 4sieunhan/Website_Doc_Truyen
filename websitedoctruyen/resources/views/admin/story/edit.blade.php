@extends('admin.master')
@section('content')
@section('h1','Sửa truyện')
@section('button','Tạo Mới')
  <!-- Main content -->
<form method="POST" action="{{route('admin.story.update',['id' => $stories->id])}}">
@csrf
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h1 class="card-title">@yield('h1')</h1>
            </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên truyện</label>
                    <input type="text" name="name" value="{{$stories->name}}" class="form-control" id="exampleText" placeholder="Nhập tên truyện">
                </div>@if ($errors->has('name'))
                <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('name') }}</p>
            @endif
                <div class="form-group">
                  <label >Chuyên mục</label>
                  <select id="done" class="selectpicker" name="categories_id[]"  multiple data-done-button="true">
                    @foreach(App\Models\Categories::get() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>@if ($errors->has('categories_id'))
                <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('categories_id') }}</p>
            @endif
                <div class="form-group">
                  <label >Tác giả</label>
                  <select id="done" class="selectpicker" name="authors_id[]"  multiple data-done-button="true">
                    @foreach(App\Models\Authors::get() as $author)
                      <option value="{{$author->id}}">{{$author->name}}</option>
                    @endforeach
                  </select> 
                </div>@if ($errors->has('authors_id'))
                <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('authors_id') }}</p>
            @endif
                <div class="form-group">
                  <label for="">Mô tả ngắn</label>
                  <div class="card-body pad">
                    <div class="mb-3">
                      <textarea  class="ckeditor" name="description" cols="50" rows="10" name="decription" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                      </textarea>
                    </div>
                  </div>
              </div>@if ($errors->has('description'))
              <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('description') }}</p>
          @endif
              <div class="form-group">
                <label for="">Mô tả nội dung</label>
                <div class="card-body pad">
                  <div class="mb-3">
                    <textarea class="ckeditor" name="content" cols="50" rows="10" name="content" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                    </textarea>
                  </div>
                </div>
              </div>@if ($errors->has('content'))
              <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('content') }}</p>
          @endif
              <div class="form-group">
                <label for="">Ảnh đại diện</label>
                <input name="image" type="file" class="form-control" />
              </div>
              <div class="form-group">
                <label for="">Từ khóa</label>
                <input type="text" name="keyword" class="form-control" id="exampleText" placeholder="Nhập từ khóa">
              </div>@if ($errors->has('keyword'))
              <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('keyword') }}</p>
          @endif
              <div class="form-group">
                <label for="">Nguồn truyện</label>
                <input type="text" name="source" class="form-control" id="exampleText" placeholder="Nhập nguồn truyện">
              </div>@if ($errors->has('source'))
              <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('source') }}</p>
          @endif
              <div class="form-group">
                <label >Tình trạng</label>
                <select name="status" class="form-control">
                    <option value="1">Hoàn thành</option>
                    <option value="0">Đang cập nhật</option>
                </select>
              </div>
                <div class="form-group col-12">
                  <button type="submit" class="btn btn-primary float-left col-5"></i> 
                      @yield('button')
                  </button>
                  <button type="button" onclick="location.href='{{route('admin.story.list')}}'" class="btn btn-primary float-right col-5"></i> 
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
  CKEDITOR.replace( 'description', {
      uiColor: '#A9E3EC',
  });
  CKEDITOR.replace( 'content', {
      uiColor: '#A9E3EC',
  });

</script>
@endsection