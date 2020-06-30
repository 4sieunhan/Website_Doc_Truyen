@extends('admin.master')
@section('content')
@section('title-table','Truyện')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
          <div class="row mb-2">
            <h4 class="card-title col-sm-8">@yield('title-table')</h4>
            <button type="button" onclick="location.href='{{route('admin.story.create')}}'" class="btn btn-primary btn-rounded btn-fw col-sm-2">
                <i class="mdi mdi-plus-circle"></i> Thêm Mới</a>
            </button>
          </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th>Tên Truyện</th>
                <th>Chuyên Mục</th>
                <th>Tác Giả</th>
                <th>Trạng Thái</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach($stories as $str)
                  <tr>
                      <th>{{$str->name}}</th>
                      <td>
                      @foreach($str->category as $rl)
                        {{$loop->first ? '' : ', '}}
                        {{$rl->name}}
                      @endforeach
                      </td>
                      <td>
                      @foreach($str->author as $rl)
                        {{$loop->first ? '' : ', '}}
                        {{$rl->name}}
                      @endforeach
                      </td>
                      <td> 
                          @if($str->status == 1 )
                              Hoàn Thành
                          @else
                              Đang cập nhật
                          @endif
                      </td>
                      <td>
                        <button type="button" onclick="location.href=''" class="btn btn-info btn-rounded btn-icon">
                          <i class="mdi mdi-view-column"></i>
                        </button>
                        <button type="button" onclick="location.href='{{route('admin.story.edit',['id' => $str->id])}}'" class="btn btn-primary btn-rounded btn-icon">
                            <i class="mdi mdi-pencil-outline"></i>
                        </button>
                        <button type="button" onclick="location.href='{{route('admin.story.destroy',['id' => $str->id])}}'" class="btn btn-primary btn-rounded btn-icon">
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