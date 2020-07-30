@extends('admin.admin-master')
@section('content')
@section('form-title','Tạo Truyện')
@section('button-submit','Tạo Mới')
@section('form-name','Truyện')
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
				<form enctype="multipart/form-data" id="form_advanced_validation" action="{{route('admin.story.store')}}" method="POST">
					@csrf
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="name">
							<label class="form-label">Tên Truyện</label>
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
								<b>Chuyên Mục</b>
							</p>
							<select class="form-control show-tick" name="categories_id[]" multiple>
								@foreach(App\Models\Categories::get() as $category)
								<option value="{{$category->id}}"  >{{$category->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="help-info">
							@if ($errors->has('categories_id'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('categories_id') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<p>
								<b>Tác Giả</b>
							</p>
							<select class="form-control show-tick" name="authors_id[]" multiple>
								@foreach(App\Models\Authors::get() as $author)
								<option value="{{$author->id}}">{{$author->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="help-info">
							@if ($errors->has('authors_id'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('authors_id') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<p>
								<b>Mô Tả Ngắn</b>
							</p>
							<textarea name="description" id="ckeditor" cols="30" rows="5" class="form-control no-resize"></textarea>
						</div>
						<div class="help-info">
							@if ($errors->has('description'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('description') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<p>
								<b>Mô Tả Nội Dung</b>
							</p>
							<textarea class="ckeditor" name="content" cols="30" rows="5" class="form-control no-resize"></textarea>
						</div>
						<div class="help-info">
							@if ($errors->has('content'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('content') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<p>
								<b>Ảnh</b>
							</p>
							<input type="file" class="form-control" name="image">
						</div>
						<div class="help-info">
							@if ($errors->has('image'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('image') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="keyword">
							<label class="form-label">Từ Khóa Tìm Kiếm</label>
						</div>
						<div class="help-info">
							@if ($errors->has('keyword'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('keyword') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group form-float">
						<div class="form-line">
							<input type="text" class="form-control" name="source">
							<label class="form-label">Nguồn Truyện</label>
						</div>
						<div class="help-info">
							@if ($errors->has('source'))
							<p class="help is-danger" STYLE="COLOR:RED;">{{ $errors->first('source') }}</p>
							@endif
						</div>
					</div>
					<div class="form-group">
						<p>
							<b>Trạng Thái</b>
						</p>
						<select class="form-control show-tick" name="status" >
							<option value="1">Hoàn thành</option>
							<option value="0">Đang cập nhật</option>
						</select>
					</div>
					<button class="btn btn-primary waves-effect" type="submit">@yield('button-submit')</button>
					<button class="btn btn-primary waves-effect" onclick="location.href='{{route('admin.story.list')}}'"  type="button">
					Quay Lại</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
