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
                  @if ($errors->has('name'))
                  <p class="help is-danger "STYLE="COLOR:RED;">{{ $errors->first('name') }}</p>
              @endif
                <div class="form-group">
                  <label for="exampleInputEmail1">Từ khóa tìm kiếm</label>
                  <input type="text" name="keyword" class="form-control" id="exampleText" placeholder="Từ khóa 1,từ khóa 2,từ khóa 3">
                </div>  @if ($errors->has('keyword'))
                <p class="help is-danger" STYLE="COLOR:RED;"> {{ $errors->first('keyword') }}</p>
            @endif
                <div class="form-group">
                    <label for="exampleInputEmail1">Mô Tả Tác Giả</label>
                    <textarea name="description" class="form-control" rows="5" cols="5" id="exampleText"></textarea>
                </div>  @if ($errors->has('description'))
                <p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('description') }}</p>
            @endif
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