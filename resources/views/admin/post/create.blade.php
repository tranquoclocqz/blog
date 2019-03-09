@extends('admin.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('public/admin/select2-develop/dist/css/select2.min.css') }}">
@endsection
@section('content')
<h1>Thêm bài viết</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('post.store',['type'=>$_GET['type']]) }}" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-sm-8">
			<div class="form-group">
				<label>Tên bài viết:</label>
				<input type="text" class="form-control" name="txt_name" id="title">
			</div>
			<div class="form-group">
				<label>Slug:</label>
				<input type="text" class="form-control"  id="slug" name="txt_slug" readonly>
				<label><input type="checkbox" id="customSlug" name="chk_customSlug"> Tùy chỉnh</label>
			</div>

			<div class="form-group">
				<label>Mô tả:</label>
				<textarea name="txt_mota" class="form-control" cols="30" rows="5"></textarea>
			</div>

			<div class="form-group">
				<label>Nội dung:</label>
				<textarea name="txt_content" id="editor" class="form-control ckeditor" cols="30" rows="55"></textarea>
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
		</div>
		<div class="col-sm-4">
			<div id="accordion">

				<div class="card">
					<div class="card-header">
						<a class="card-link" data-toggle="collapse" href="#collapseOne">
							Tags link
						</a>
					</div>
					<div id="collapseOne" class="collapse show">
						<div class="card-body">
							<select name="cbo_tag[]" class="select2 form-control" id="select2_tag" multiple="">
							</select>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-header">
						<a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
							Photo
						</a>
					</div>
					<div id="collapseTwo" class="collapse show">
						<div class="card-body">
							<div class="form-group">
								<label>Alt</label>
								<input type="text" name="txt_alt" class="form-control">
							</div>
							<input type="file" name="file">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Thêm</button>
	{{ csrf_field() }}
</form>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('public/admin/ckeditor5-build-classic/ckeditor.js') }}"></script>
<script type="text/javascript">
	ClassicEditor
	.create( document.querySelector( '#editor' ) )
	.catch( error => {
		console.error( error );
	} );
</script>
<script type="text/javascript" src="{{ asset('public/admin/select2-develop/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
	$(function(){
		$("select.select2").each(function(index, el) {
			$(this).select2();
		});
		$("select.select2[multiple]").select2({
			tags: true,
			tokenSeparators: [",", " "],
			createSearchChoice: function(term, data) {
				if ($(data).filter(function() {
					return this.text.localeCompare(term) === 0;
				}).length === 0) {
					return {
						id: term,
						text: term
					};
				}
			},
			multiple: true,
			/*ajax: {
				url: '{{ route('createTag') }}',
				dataType: "json",
				data: function(term, page) {
					return {
						q: term
					};
				},
				results: function(data, page) {
					return {
						results: data
					};
				}
			}*/
		});
	})
</script>
@endsection