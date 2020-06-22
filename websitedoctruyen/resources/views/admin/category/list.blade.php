@extends('admin.master')
@section('content')
@section('h1','Quản lý chuyên mục')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('h1')</h1>
          </div>
          <div class="col-sm-6">
            <button type="button" onclick="location.href='{{route('admin.category.create')}}' " class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> 
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
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Chuyên mục cha</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($categories as $ctg)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$ctg->name}}</td>
                    <td>{{$ctg->parent_id}}</td>
                    <td>
                      <a class="btn btn-info btn-sm" href="{{route('admin.category.edit',['id' => $ctg->id])}}" >
                          <i class="fas fa-pencil-alt"></i>Edit</a>
                      <a class="btn btn-danger btn-sm" href="{{route('admin.category.destroy',['id' => $ctg->id])}}" onclick="return acceptDelete('ARE U SURE?')">
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