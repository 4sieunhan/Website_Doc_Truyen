@extends('admin.admin-master')
@section('content')
@section('form-title','Thêm Chương Mới')
@section('button-submit','Tạo Mới')
@section('form-name','Truyện')
<!-- Advanced Validation -->
<div class="block-header">
	<h2>
		@yield('form-name') {{$data->name}}
		<small>Team's Github <a href="https://github.com/4sieunhan/Website_Doc_Truyen" target="_blank">Click</a></small>
	</h2>
</div>
<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="card">
			<div class="header">
				<h2>@yield('form-title') ({{$data->name}})</h2>
			</div>
			<div class="body">
				<form enctype="multipart/form-data" id="form_advanced_validation" action="{{route('admin.story.chapter.store',['id' => $data->id])}}" method="POST">
					@csrf
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="subname">
							<label class="form-label">Tên Mục</label>
						</div>
						<div class="help-info">
							@if ($errors->has('subname'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('subname') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="name">
							<label class="form-label">Tên Chương</label>
						</div>
						<div class="help-info">
							@if ($errors->has('name'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('name') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<p>
								<b>Nội Dung</b>
							</p>
							<textarea name="content" id="ckeditor" cols="30" rows="5" class="form-control no-resize"></textarea>
						</div>
						<div class="help-info">
							@if ($errors->has('content'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('content') }}</p>
							@endif
						</div>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">@yield('button-submit')</button>
					<button class="btn btn-primary waves-effect" onclick="location.href='{{route('admin.story.chapter.list',['id'=>$data->id])}}'"  type="button">
					Quay Lại</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
