@extends('admin.master')
@section('content')
@section('title-table','Tác Giả')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row mb-2">
            <h4 class="card-title col-sm-8">@yield('title-table')</h4>
            <button type="button" onclick="location.href='{{route('admin.author.create')}}'" class="btn btn-primary btn-rounded btn-fw col-sm-2">
                <i class="mdi mdi-plus-circle"></i> Thêm Mới</a>
            </button>
          </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên </th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($authors as $at) 
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$at->name}}</td>
                    <td>
                        <button type="button" onclick="location.href='{{route('admin.author.edit',['id' => $at->id])}}'" class="btn btn-primary btn-rounded btn-icon">
                            <i class="mdi mdi-pencil-outline"></i>
                        </button>
                        <button type="button" onclick="location.href='{{route('admin.author.destroy',['id' => $at->id])}}'" class="btn btn-primary btn-rounded btn-icon">
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