@extends('admin.app')
@section('css')
@endsection
@section('content')
<h1>Cấu hình</h1>

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
@if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif
<form action="{{ route('updateSetting') }}" method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Tên website</label>
		<input type="text" class="form-control" name="data['web_title']" value="{{ $data['web_title'] }}">
	</div>
	<div class="form-group">
		<label>Mô tả website</label>
		<input type="text" class="form-control" name="data['web_description']" value="{{ $data['web_description'] }}">
	</div>
	<div class="form-group">
		<label>Seo title</label>
		<input type="text" class="form-control" name="data['seo_title']" value="{{ $data['seo_title'] }}">
	</div>
	<div class="form-group">
		<label>Seo keywords</label>
		<input type="text" class="form-control" name="data['seo_keyword']" value="{{ $data['seo_keyword'] }}">
	</div>
	<div class="form-group">
		<label>Seo description</label>
		<input type="text" class="form-control" name="data['seo_description']" value="{{ $data['seo_description'] }}">
	</div>	

	<div class="form-group">
		<label>Tên website</label>
		<input type="text" class="form-control" name="data['web_title']" value="{{ $data['web_title'] }}">
	</div>
	<div class="form-group">
		<label>Hotline</label>
		<input type="text" class="form-control" name="data['hotline']" value="{{ $data['hotline'] }}">
	</div>
	<div class="form-group">
		<label>Điện thoại</label>
		<input type="text" class="form-control" name="data['phone']" value="{{ $data['phone'] }}">
	</div>
	<div class="form-group">
		<label>Zalo</label>
		<input type="text" class="form-control" name="data['zalo']" value="{{ $data['zalo'] }}">
	</div>
	<div class="form-group">
		<label>Fanpage Facebook</label>
		<input type="text" class="form-control" name="data['fanpage_facebook']" value="{{ $data['fanpage_facebook'] }}">
	</div>
	<div class="form-group">
		<label>Bản quyền</label>
		<input type="text" class="form-control" name="data['copyright']" value="{{ $data['copyright'] }}">
	</div>
	<div class="form-group">
		<label>Tác giả</label>
		<input type="text" class="form-control" name="data['author']" value="{{ $data['author'] }}">
	</div>
	<div class="form-group">
		<label>Địa chỉ</label>
		<input type="text" class="form-control" name="data['address']" value="{{ $data['address'] }}">
	</div>
	<div class="form-group">
		<label>SMTP</label>
		<input type="text" class="form-control" name="data['smtp']" value="{{ $data['smtp'] }}">
	</div>
	<div class="form-group">
		<label>Địa chỉ mail</label>
		<input type="text" class="form-control" name="data['mail']" value="{{ $data['mail'] }}">
	</div>
	<div class="form-group">
		<label>Mật khẩu mail</label>
		<input type="password" class="form-control" name="data['mail_password']" value="{{ $data['mail_password'] }}">
	</div>
	<div class="form-group">
		<label>Mã hóa</label>
		<label for="TLS">
			<input type="radio" name="data['mail_encryption']" {{ $checked = $data['mail_encryption'] == 'TLS' ? 'checked' : '' }} value="TLS">TLS
		</label>
		<label for="TLS">
			<input type="radio" name="data['mail_encryption']" {{ $checked = $data['mail_encryption'] == 'SSL' ? 'checked' : '' }} value="SLL">SLL
		</label>
	</div>

	<div class="form-group">
		<label>Code head</label>
		<textarea class="form-control" name="data['code_head']" id="" cols="30" rows="5">{{ $data['code_head'] }}</textarea>
	</div>

	<div class="form-group">
		<label>Code body</label>
		<textarea class="form-control" name="data['code_body']" id="" cols="30" rows="5">{{ $data['code_body'] }}</textarea>
	</div>

	<div class="form-group">
		<label>Code footer</label>
		<textarea class="form-control" name="data['code_footer']" id="" cols="30" rows="5">{{ $data['code_footer'] }}</textarea>
	</div>

	<button type="submit" class="btn btn-primary">Cập nhật</button>
	{{ csrf_field() }}
</form>
@endsection
@section('script')
@endsection