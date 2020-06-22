@extends('admin.master')
@section('content')
@section('h3','Thêm mới chuyên mục')
@section('button','Tạo Mới')
  <!-- Main content -->
<form method="POST" action="{{route('admin.category.store')}}">
@csrf
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">@yield('h3')</h3>
            </div>
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên chuyên mục</label>
                    <input type="text" name="name" class="form-control" id="exampleText" placeholder="Nhập tên của chuyên mục">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Từ khóa tìm kiếm</label>
                    <input type="text" name="keyword" class="form-control" id="exampleText" placeholder="Từ khóa 1,từ khóa 2,từ khóa 3">
                </div>
                <div class="form-group">
                  <label >Chuyên mục cha</label>
                  <select name="parent_id" class="form-control">
                      <option value="0">Please choose your category</option>
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô Tả</label>
                    <textarea name="description" class="form-control" rows="5" cols="5" id="exampleText"></textarea>
                </div>
                <div class="form-group col-12">
                  <button type="submit" class="btn btn-primary float-left col-5"></i> 
                      @yield('button')
                  </button>
                  <button type="button" onclick="location.href='{{route('admin.category.list')}}'" class="btn btn-primary float-right col-5"></i> 
                    Quay lại
                  </button>
                </div>
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
</form>
@endsection