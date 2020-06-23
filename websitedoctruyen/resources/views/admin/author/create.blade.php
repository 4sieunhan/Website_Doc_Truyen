@extends('admin.master')
@section('content')
@section('h3','Thêm mới tác giả')
@section('button','Tạo Mới')
  <!-- Main content -->
<form method="POST" action="{{route('admin.author.store')}}">
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
                    <label for="exampleInputEmail1">Tên Tác Giả</label>
                    <input type="text" name="name" class="form-control" id="exampleText" placeholder="Nhập tên của tác giả">
                </div>
                <div class="form-group">
                    <label >Chuyên mục cha</label>
                    <select name="keyword" class="form-control">
                        <option value="0">Please choose your author</option>
                    </select>
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Giới Thiệu Tác Giả</label>
                    <textarea name="description" class="form-control" rows="5" cols="5" id="exampleText"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô Tả Tác Giả</label>
                    <textarea name="description" class="form-control" rows="5" cols="5" id="exampleText"></textarea>
                </div>
                <div class="form-group col-12">
                  <button type="submit" class="btn btn-primary float-left col-5"></i> 
                      @yield('button')
                  </button>
                  <button type="button" onclick="location.href='{{route('admin.author.list')}}'" class="btn btn-primary float-right col-5"></i> 
                    Trở về
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