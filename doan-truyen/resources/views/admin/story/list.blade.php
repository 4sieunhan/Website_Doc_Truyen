@extends('admin.admin-master')
@section('content')
@section('form-title','Danh Sách Truyện')
@section('form-name','Truyện')
@section('button-add','Thêm Mới Truyện')
<div class="block-header">
   <h2>
      @yield('form-name')
      <button type="button" onclick="location.href='{{route('admin.story.create')}}'" style="float:right;" class="btn bg-red waves-effect">
      <i class="material-icons">add_circle_outline</i>
      <span>@yield('button-add')</span>
      </button>
      <small>Team's Github <a href="https://github.com/4sieunhan/Website_Doc_Truyen" target="_blank">Click</a></small>
   </h2>
</div>
<!-- Basic Examples -->
<div class="row clearfix">
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
         <div class="header">
            <h2>
               @yield('form-title')
            </h2>
         </div>
         <div class="body">
            <div class="table-responsive">
               <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                  <thead>
                     <tr>
                        <th>Tên Truyện</th>
                        <th>Ảnh</th>
                        <th>Chuyên Mục</th>
                        <th>Tác Giả</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                     </tr>
                  </thead>
                  <tfoot>
                     <tr>
                        <th>Tên Truyện</th>
                        <th>Ảnh</th>
                        <th>Chuyên Mục</th>
                        <th>Tác Giả</th>
                        <th>Trạng Thái</th>
                        <th>Thao Tác</th>
                     </tr>
                  </tfoot>
                  <tbody>
                     @foreach($stories as $str)
                     <tr>
                        <td>{{$str->name}}</td>
                        <td><img src="{{URL::to('/upload/image-story/' . $str->image)}}"alt="" style="width:100px;height:100px;"/></td>
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
                            <button type="button" onclick="location.href='{{route('admin.story.chapter.list',['id' => $str->id])}}'" class="btn bg-green btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">input</i>
                            </button>
                            <button type="button" onclick="location.href='{{route('admin.story.edit',['id' => $str->id])}}'" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">edit</i>
                            </button>
                            <button type="button" onclick="location.href='{{route('admin.story.destroy',['id' => $str->id])}}'" class="btn bg-pink btn-circle waves-effect waves-circle waves-float">
                                <i class="material-icons">delete</i>
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
</div>
@endsection
