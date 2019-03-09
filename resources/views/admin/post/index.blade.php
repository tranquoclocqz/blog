@extends('admin.app')
@section('css')
@endsection
@section('content')
<h1>
	Post
</h1>
@if(session()->has('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}
</div>
@endif
<div class="t-button">
	<a href="{{ route('post.create',['type'=>$_GET['type']]) }}" title="Thêm mới" class="btn btn-primary">Thêm mới</a>
	<a href="javascript:void(0);" id="btn_delete_all" title="Xóa chọn" class="btn btn-danger">Xóa chọn</a>
</div>
<div class="table-responsive">
	<table class="table table-striped table-hover data-table">
		<thead>
			<tr>
				<th><input type="checkbox" class="checkall"></th>
				<th>STT</th>
				<th></th>
				<th>Tên</th>
				<th>Ngày tạo</th>
				<th>Ngày sữa</th>
				<th>Hiển thị</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posts as $key => $value)
			<tr>
				<td><input type="checkbox" class="icheck" value="{{ $value->id }}"></td>
				<td>{{ $key + 1 }}</td>
				<td><img src="{{asset('public/upload').'/'.$value->photo}}" alt="" class="img-fluid imgt"></td>
				<td> {{ $value->name }} </td>
				<td>
					{{ $value->created_at }}
				</td>
				<td>
					{{ $value->updated_at }}
				</td>
				<td></td>
				<td>
					<a href="{{ route('post.edit',['post'=>$value->id,'type'=>$_GET['type']]) }}" class="btn btn-outline-primary"><i class="fa fa-pencil-alt"></i></a>
					<a href="{{ route('post.delete',['id'=>$value->id,'type'=>$_GET['type']]) }}" class="btn btn-outline-danger"><i class="fas fa-times"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
<input type="hidden" value="" id="idChecked" value="">
@endsection
@section('script')
<script type="text/javascript">		
	$(function(){
		$("#btn_delete_all").click(function(event) {
			if ($("#idChecked").val().length) {
				var r = confirm('Bạn có muốn xóa các mục đã chọn');
				if (r) {
					$("#idChecked").val();
					window.location.href = "{{ route('post.deleteall') }}/"+$("#idChecked").val()+"?type={{ $_GET['type'] }}";
				}
			} else {
				alert('Bạn chưa chọn mục cần xóa');
			}
		});
	})
</script>
@endsection