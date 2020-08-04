@extends('admin.admin-master')
@section('content')
@section('form-title','Danh Sách Tác Giả')
@section('form-name','Tác Giả')
@section('button-add','Thêm Mới Tác Giả')
<div class="block-header">
	<h2>
		@yield('form-name')
		<button type="button" onclick="location.href='{{route('admin.author.create')}}'" style="float:right;" class="btn bg-red waves-effect">
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
								<th>STT</th>
								<th>Tên Tác Giả</th>
								<th>Thao Tác</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>STT</th>
								<th>Tên Tác Giả</th>
								<th>Thao Tác</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($authors as $ats)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$ats->name}}</td>
								<td>
                                    <button type="button" onclick="location.href='{{route('admin.author.edit',['id' => $ats->id])}}'" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
                                        <i class="material-icons">edit</i>
                                    </button>
                                    <button type="button" onclick="location.href='{{route('admin.author.destroy',['id' => $ats->id])}}'" class="btn bg-pink btn-circle waves-effect waves-circle waves-float">
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
