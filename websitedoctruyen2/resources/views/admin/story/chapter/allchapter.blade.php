@extends('admin.master')
@section('content')
@section('title-name','Tổng Hợp Tất Cả Chương')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row mb-2">
            <h4 class="card-title col-sm-8">@yield('title-name')</h4>
            <button type="button" onclick="location.href='{{route('admin.story.list')}}'" class="btn btn-primary btn-rounded btn-fw col-sm-2">
                <i class="mdi mdi-plus-circle"></i>Quản Lý Truyện</a>
            </button>
          </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Tên Mục</th>
                <th>Tên Chương</th>
                <th>Thuộc Truyện</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($chapters as $ct)
                  <tr>
                    <td><label class="badge badge-success">{{$ct->subname}}</label></td>
                    <td>{{$ct->name}}</td>
                    <td>{{$ct->story->name}}</td>
                    <td> 
                    <button type="button" onclick="location.href='{{route('admin.story.chapter.edit',['id' => $ct->id])}}'" class="btn btn-primary btn-rounded btn-icon">
                        <i class="mdi mdi-pencil-outline"></i>
                    </button>
                    <button type="button" onclick="location.href='{{route('admin.story.chapter.destroy',['id' => $ct->id])}}'" class="btn btn-primary btn-rounded btn-icon">
                        <i class="mdi mdi-delete-outline"></i>
                    </button>
                    </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop