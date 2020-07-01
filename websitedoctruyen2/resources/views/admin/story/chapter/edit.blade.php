@extends('admin.master')
@section('content')
@section('name-title','Sửa')
<form method="POST" action="{{route('admin.story.chapter.update',['id' => $chapters->id])}}" class="col-12 grid-margin stretch-card">
@csrf
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">@yield('name-title') {{$chapters->subname}} {{$chapters->name}} của {{$chapters->story->name}}</h4>
      <form class="forms-sample">
        <div class="form-group">
          <label for="#">Tên Mục</label>
          <input type="text" name="subname" class="form-control" id="exampleInputName1" placeholder="SubName">
        </div>
        <div class="form-group">
          <label for="#">Tên Truyện</label>
          <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="#">Nội Dung</label>
            <input type="text" name="content" class="form-control" id="exampleInputEmail3" placeholder="Content">
        </div>
        <button type="submit" class="btn btn-primary mr-2">Tạo Mới</button>
        <button type="button" onclick="location.href='{{route('admin.story.chapter.list',['id' => $chapters->story->id])}}'" class="btn btn-light">Quay Lại</button>
      </form>
    </div>
  </div>
</form>
@stop
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
