@extends('admin.master')
@section('content')
@section('h1','Tổng Hợp Chương')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>
              @yield('h1')
            </h1>
          </div>
          <div class="col-sm-6">
          <button type="button" onclick="location.href='{{route('admin.story.list')}}' " class="btn btn-success float-right"><i class="fa fa-list"></i> 
              Quản Lý Truyện</a>
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
                  <th>Tên mục</th>
                  <th>Tên Chương</th>
                  <th>Thuộc</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($chapters as $ct)
                  <tr>
                    <th>{{$ct->subname}}</th>
                    <th>{{$ct->name}}</th>
                    <td>{{$ct->story->name}}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{route('admin.story.chapter.edit',['id' => $ct->id])}}" >
                        <i class="fas fa-pencil-alt"></i>Edit</a>
                      <a class="btn btn-danger btn-sm" href="{{route('admin.story.chapter.destroy',['id' => $ct->id])}}" onclick="return acceptDelete('ARE U SURE?')">
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