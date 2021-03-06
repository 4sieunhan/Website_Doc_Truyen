@extends('admin.admin-master')
@section('content')
@section('form-title','Sửa Tác Giả')
@section('button-submit','Sửa Mới')
@section('form-name','Tác Giả')
<!-- Advanced Validation -->
<div class="block-header">
	<h2>
		@yield('form-name')
		<small>Team's Github <a href="https://github.com/4sieunhan/Website_Doc_Truyen" target="_blank">Click</a></small>
	</h2>
</div>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>@yield('form-title')</h2>
			</div>
			<div class="body">
				<form id="form_advanced_validation" action="{{route('admin.author.update',['id' => $authors->id])}}" method="POST">
					@csrf
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="name" value="{{$authors->name}}">
							<label class="form-label">Tên Chuyên mục</label>
						</div>
						<div class="help-info">
							@if ($errors->has('name'))
							<p class="help is-danger "STYLE="COLOR:RED;">{{ $errors->first('name') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="keyword" value="{{$authors->keyword}}">
							<label class="form-label">Từ Khóa Tìm Kiếm</label>
						</div>
						<div class="help-info">
							@if ($errors->has('keyword'))
							<p class="help is-danger" STYLE="COLOR:RED;"> {{ $errors->first('keyword') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<p>
								<b>Mô Tả Tác Giả</b>
							</p>
							<textarea name="description" id="ckeditor" cols="30" rows="5" value="{{$authors->description}}" class="form-control no-resize"></textarea>
						</div>
						<div class="help-info">
							@if ($errors->has('description'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('description') }}</p>
							@endif
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">@yield('button-submit')</button>
					<button class="btn btn-primary waves-effect" onclick="location.href='{{route('admin.author.list')}}'" type="button">
					Quay Lại</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
