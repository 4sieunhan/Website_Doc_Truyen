@extends('admin.admin-master')
@section('content')
@section('form-title','Tổng Hợp Chương')
@section('form-name','Truyện')
<div class="block-header">
	<h2>
		@yield('form-name') 
		<button type="button" onclick="location.href='{{route('admin.story.list')}}' " style="float:right;" class="btn bg-red waves-effect">
		<i class="material-icons">add_circle_outline</i>
		<span>Quản Lý Truyện</span>
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
								<th>Tên mục</th>
								<th>Tên Chương</th>
								<th>Thuộc</th>
								<th>Thao Tác</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Tên mục</th>
								<th>Tên Chương</th>
								<th>Thuộc</th>
								<th>Thao Tác</th>
							</tr>
						</tfoot>
						<tbody>
							@foreach($chapters as $ct)
							<tr>
								<th>{{$ct->subname}}</th>
								<th>{{$ct->name}}</th>
								<td>{{$ct->story->name}}</td>
								<td>
									<button type="button" onclick="location.href='{{route('admin.story.chapter.edit',['id' => $ct->id])}}'" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
									<i class="material-icons">edit</i>
									</button>
									<button type="button" onclick="location.href='{{route('admin.story.chapter.destroy',['id' => $ct->id])}}'" class="btn bg-pink btn-circle waves-effect waves-circle waves-float">
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
