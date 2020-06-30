@extends('admin.master')
@section('content')
@section('name-title','Thêm Chuyên Mục')
<form method="POST" action="{{route('admin.category.store')}}" class="col-12 grid-margin stretch-card">
@csrf
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">@yield('name-title')</h4>
      <form class="forms-sample">
        <div class="form-group">
          <label for="#">Tên Chuyên Mục</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
          <label for="#">Từ Khóa Tìm Kiếm</label>
          <input type="text" name="keyword" class="form-control" id="exampleInputEmail3" placeholder="Keyword">
        </div>
        <div class="form-group">
          <label for="#">Chuyên Mục Cha</label>
          <select name="parent_id" class="form-control" id="exampleSelectGender">
            <option value="0">Please choose your category</option>
          </select>
        </div>
        <div class="form-group">
          <label for="#">Mô Tả</label>
          <textarea name="description" class="form-control" rows="5" cols="5" id="exampleText"></textarea>
          </div>
        <button type="submit" class="btn btn-primary mr-2">Tạo Mới</button>
        <button type="button" onclick="location.href='{{route('admin.category.list')}}'" class="btn btn-light">Quay Lại</button>
      </form>
    </div>
  </div>
</form>
@stop
