@extends('admin.master')
@section('content')
@section('h1','Quản lý truyện')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('h1')</h1>
          </div>
          <div class="col-sm-6">
            <button type="button" onclick="location.href='{{route('admin.story.create')}}' " class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> 
              Thêm Mới</a>
            </button>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->

          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>
                    Tên truyện
                  </th>
                  <th>
                    Ảnh
                  </th>
                  <th>
                    Chuyên mục
                  </th>
                  <th>
                    Tác giả
                  </th>
                  <th>
                    Trạng thái
                  </th>
                  <th>
                    Action
                  </th>
                </tr>
                </thead>
                <tbody>
                  @foreach($stories as $str)
                  <tr>
                    <th>{{$str->name}}</th>
                  <td><img src="{{URL::to('/upload/' . $str->image)}}" alt="" style="width:60px;height:60px;"/>
                  </td>
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
                    <a class="btn btn-primary btn-sm" href="{{route('admin.story.chapter.list',['id' => $str->id])}}">
                        <i class="fas fa-folder"></i>View</a>
                      <a class="btn btn-info btn-sm" href="{{route('admin.story.edit',['id' => $str->id])}}" >
                        <i class="fas fa-pencil-alt"></i>Edit</a>
                      <a class="btn btn-danger btn-sm" href="{{route('admin.story.destroy',['id' => $str->id])}}" onclick="return acceptDelete('ARE U SURE?')">
                          <i class="fas fa-trash"></i>Delete
                      </a>
                    </td>
                  </tr>
                  @endforeach
                </tfoot>
              </table>
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
@endsection