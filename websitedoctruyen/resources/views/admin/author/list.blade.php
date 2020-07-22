@extends('admin.master')
@section('content')
@section('h1','Tác Giả')
<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>@yield('h1')</h1>
         </div>
         <div class="col-sm-6">
            <button type="button" onclick="location.href='{{route('admin.author.create')}}' " class="btn btn-success float-right"><i class="fa fa-plus-circle"></i> 
            Thêm Mới</a>
            </button>
         </div>
      </div>
   </div>
   <!-- /.container-fluid -->
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
                           <th>Tên Tác Giả</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach($authors as $ats)
                        <tr>
                           <td>{{$loop->iteration}}</td>
                           <td>{{$ats->name}}</td>
                           <td>
                              <a class="btn btn-info btn-sm" href="{{route('admin.author.edit',['id' => $ats->id])}}" >
                              <i class="fas fa-pencil-alt"></i>Edit</a>
                              <a class="btn btn-danger btn-sm" href="{{route('admin.author.destroy',['id' => $ats->id])}}" onclick="return acceptDelete('ARE U SURE?')">
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