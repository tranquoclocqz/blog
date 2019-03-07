@extends('admin.app')
@section('css')
@endsection
@section('content')
@php 
	$seo_item = json_decode($item->seo,true);
@endphp
<h1>Chỉnh sửa danh mục</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('category.update',['category'=>$item->id,'type'=>$_GET['type']]) }}" method="POST">
	<div class="form-group">
		<label>Tên danh mục:</label>
		<input type="text" class="form-control" id="title" name="txt_name" value="{{ $item->ten }}">
	</div>
	<div class="form-group">
		<label>Slug:</label>
		<input type="text" name="txt_slug" class="form-control" id="slug" value="{{ $item->slug }}" readonly>
		<label><input type="checkbox" id="customSlug" name="chk_customSlug"> Tùy chỉnh</label>
	</div>

	<div class="form-group">
		<label>Title:</label>
		<input type="text" name="txt_title" class="form-control" value="{{ $seo_item['title'] }}">
	</div>

	<div class="form-group">
		<label>Keywords:</label>
		<input type="text" name="txt_keywords" class="form-control" value="{{ $seo_item['keywords'] }}">
	</div>

	<div class="form-group">
		<label>Description:</label>
		<textarea name="txt_description" class="form-control" cols="30" rows="5">{{ $seo_item['description'] }}</textarea>
	</div>
	<button type="submit" class="btn btn-primary">Cập nhật</button>
	{{ csrf_field() }}
	{{ method_field('PATCH') }}
</form>
@endsection
@section('script')
@endsection