@extends('admin.master')
@section('content')
@section('name-title','Thêm Truyện')
<form method="POST" action="{{route('admin.story.store')}}" class="col-12 grid-margin stretch-card">
@csrf
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">@yield('name-title')</h4>
      <form class="forms-sample">
        <div class="form-group">
          <label for="#">Tên Truyện</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="#">Chuyên Mục</label>
          <select class="js-example-basic-multiple w-100" name="categories_id[]" multiple="multiple">
            @foreach(App\Models\Categories::get() as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tác Giả</label>
          <select class="js-example-basic-multiple w-100" name="authors_id[]" multiple="multiple">
            @foreach(App\Models\Authors::get() as $author)
              <option value="{{$author->id}}">{{$author->name}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label for="#">Mô Tả Ngắn</label>
            <input type="text" name="description" class="form-control" id="exampleInputEmail3" placeholder="Description">
        </div>
        <div class="form-group">
            <label for="#">Mô Tả Nội Dung</label>
            <input type="text" name="content" class="form-control" id="exampleInputEmail3" placeholder="Content">
        </div>
        <div class="form-group">
          <label for="#">Từ Khóa Tìm Kiếm</label>
          <input type="text" name="keyword" class="form-control" id="exampleInputEmail3" placeholder="Keyword">
        </div>
        <div class="form-group">
          <label>Ảnh Đại Diện</label>
          <input type="file" name="image" class="file-upload-default">
          <div class="input-group col-xs-12">
            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
            <span class="input-group-append">
              <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
            </span>
          </div>
        </div>
        <div class="form-group">
          <label for="#">Nguồn Truyện</label>
          <input type="text" name="source" class="form-control" id="exampleInputEmail3" placeholder="Keyword">
        </div>
        <div class="form-group">
          <label for="#">Tình Trạng</label>
            <select name="status" class="form-control">
              <option value="1">Hoàn Thành</option>
              <option value="0">Đang Cập Nhật</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mr-2">Tạo Mới</button>
        <button type="button" onclick="location.href='{{route('admin.story.list')}}'" class="btn btn-light">Quay Lại</button>
      </form>
    </div>
  </div>
</form>
@stop
