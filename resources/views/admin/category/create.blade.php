@extends('admin.app')
@section('css')
@endsection
@section('content')
<h1>Thêm danh mục</h1>
<form action="{{ route('category.store',['type'=>$_GET['type']]) }}" method="POST">
	<div class="form-group">
		<label>Tên danh mục:</label>
		<input type="text" class="form-control" name="txt_name" id="title">
	</div>
	<div class="form-group">
		<label>Slug:</label>
		<input type="text" class="form-control"  id="slug" name="txt_slug" readonly>
		<label><input type="checkbox" id="customSlug" name="chk_customSlug"> Tùy chỉnh</label>
	</div>

	<div class="form-group">
		<label>Title:</label>
		<input type="text" name="txt_title" class="form-control">
	</div>

	<div class="form-group">
		<label>Keywords:</label>
		<input type="text" name="txt_keywords" class="form-control">
	</div>

	<div class="form-group">
		<label>Description:</label>
		<textarea name="txt_description" class="form-control" cols="30" rows="5"></textarea>
	</div>
	<button type="submit" class="btn btn-primary">Thêm</button>
	{{ csrf_field() }}
</form>
@endsection
@section('script')
@endsection