<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Student</title>
	<!-- Latest compiled and minified CSS & JS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<meta name="_token" content="{{csrf_token()}}">
</head>
<body style="margin-top : 60px;">
	<script>
		$(document).ready(function(){
			$("button#delete").click(function(){
				var option = confirm("Bạn có chắc muốn xóa!");
				if(option){
					return true;
				}
				else{
					return false;
				}
			});
		});
	</script>

	<div class="container">
		@csrf
		{{method_field('post')}}
		<div class="form-group">
			<legend style="text-align: center; border-bottom: 1px solid #fff;"><h1>Zent Group</h1></legend>
		</div>

		@if (count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		@if (session('message'))
		<div class="alert alert-success">
			{{ session('message') }}
		</div>
		@endif

		<div class="form-group">
			<div class="">
				<a data-toggle="modal" class="btn btn-success btn-add">Thêm</a>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th class="col-sm-1">#</th>
						<th class="col-sm-2">Họ tên</th>
						<th class="col-sm-1">Giới tính</th>
						<th class="col-sm-2">Ngày sinh</th>
						<th class="col-sm-2">Số điện thoại</th>
						<th class="col-sm-2">Địa chỉ</th>
						<th class="col-sm-2">Hành động</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($studentList as $student)
					<tr>
						<td class="col-sm-1">{{$student->id}}</td>
						<td class="col-sm-2">{{$student->hoten}}</td>
						<td class="col-sm-1">{{$student->gioitinh}}</td>
						<td class="col-sm-2">{{$student->ngaysinh}}</td>
						<td class="col-sm-2">{{$student->sdt}}</td>
						<td class="col-sm-2">{{$student->diachi}}</td>
						<td class="col-sm-2">
							<button data-id="{{$student->id}}" type="button" class="btn btn-primary btn-show" data-toggle="modal" data-target="#detail">
								Xem
							</button>

							<a data-id="{{$student->id}}" data-toggle="modal" href='#editStudent' class="btn btn-warning btn-edit">
								Sửa
							</a>

							<button data-id="{{$student->id}}" type="submit" class="btn btn-danger btn-delete">
								Xóa
							</button>
						</td>
					</tr>
					<!-- Modal -->
					@endforeach
				</tbody>
			</table>

			{{$studentList->links()}}
		</div>
	</div>	

	<!-- modal add -->
	<div class="container">
		<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="formStudent" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Thêm</h4>
					</div>
					<form action="" id="">
						@csrf
						<div class="modal-body">
							<label class="control-label" for="student">Student:</label>
							<input name="hoten" type="text" class="form-control" id="addhoten" placeholder="Họ tên"><br>

							<input name="ngaysinh" type="text" class="form-control" id="addngaysinh" placeholder="Ngày sinh"><br>

							<input name="gioitinh" type="text" class="form-control" id="addgioitinh" placeholder="Giới tính"><br>

							<input name="sdt" type="text" class="form-control" id="addsdt" placeholder="Số điện thoại"><br>

							<input name="diachi" type="text" class="form-control" id="adddiachi" placeholder="Địa chỉ"><br>
						</div>

						<div class="modal-footer">
							<button type="submit" class="btn btn-success btn-save" data-dismiss="modal">Thêm mới</button>

							<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- modal view -->
	<div class="container">
		<div class="modal fade" id="showStudent" tabindex="-1" role="dialog" aria-labelledby="formStudent" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Thông tin : </h4>
					</div>
					<form action="" id="">
						@csrf
						<div class="modal-body">
							<input name="hoten" type="text" class="form-control" id="showhoten" placeholder="Họ tên"><br>

							<input name="ngaysinh" type="text" class="form-control" id="showngaysinh" placeholder="Ngày sinh"><br>

							<input name="gioitinh" type="text" class="form-control" id="showgioitinh" placeholder="Giới tính"><br>

							<input name="sdt" type="text" class="form-control" id="showsdt" placeholder="Số điện thoại"><br>

							<input name="diachi" type="text" class="form-control" id="showdiachi" placeholder="Địa chỉ"><br>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- modal edit -->
	<div class="container">
		<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="formStudent" aria-hidden="true">
			<form action="" id="formEditStudent">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Student</h4>
						</div>

						<input name="id" type="text" class="form-control" id="editid" placeholder="Id"><br>

						<input name="hoten" type="text" class="form-control" id="edithoten" placeholder="Họ tên"><br>

						<input name="ngaysinh" type="text" class="form-control" id="editngaysinh" placeholder="Ngày sinh"><br>

						<input name="gioitinh" type="text" class="form-control" id="editgioitinh" placeholder="Giới tính"><br>

						<input name="sdt" type="text" class="form-control" id="editsdt" placeholder="Số điện thoại"><br>

						<input name="diachi" type="text" class="form-control" id="editdiachi" placeholder="Địa chỉ"><br>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success" >Cập nhật</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
						</div>
					</div>
				</div>
			</form>
		</div>	
	</div>

</body>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script type="text/javascript">

	$('.btn-add').click(function(e){
		e.preventDefault();
		$('#addStudent').modal('show');
	});

	$('.btn-save').click(function(){
		$.ajax({
			type : 'post',
			url : '/studentajax',
			data : {
				_token : $('meta[name="_token"]').attr('content'),
				hoten : $('#addhoten').val(),
				gioitinh : $('#addgioitinh').val(),
				ngaysinh : $('#addngaysinh').val(),
				sdt : $('#addsdt').val(),
				diachi : $('#adddiachi').val()
			},
			success : function(response){
				tosatr.success("Thêm thành công");
			}
		});

		setTimeout(function () {
			window.location.href="/studentajax";
		},100);
	});
	
	$('.btn-show').click(function(){
		var _this = this;
		var id = $(this).attr('data-id');

		$.ajax({
			type : "get",
			url : "/studentajax/" + id,
			data : {
				_token : $('input[name="_token"]').val(),
			},
			success : function(response){
				$('#showhoten').val(response.hoten),
				$('#showgioitinh').val(response.gioitinh),
				$('#showngaysinh').val(response.ngaysinh),
				$('#showsdt').val(response.sdt),
				$('#showdiachi').val(response.diachi)
			}
		});

		$('#showStudent').modal('show');

	});
	
	$('.btn-edit').click(function(){
		var _this = $(this);
		var id = $(this).attr('data-id');
		$.ajax({
			type: 'get',
			url: '/studentajax/' +id,
			data:{
				_token : $('input[name="_token"]').val(),
			},
			success: function(response){
				$('#editid').val(response.id);
				$('#edithoten').val(response.hoten);
				$('#editgioitinh').val(response.gioitinh);
				$('#editngaysinh').val(response.ngaysinh);
				$('#editsdt').val(response.sdt);
				$('#editdiachi').val(response.diachi);
				$('#student-edit').attr('data-id', response.id);
			}
		});
	});

	$('#formEditStudent').submit(function(e){
		e.preventDefault();

		var id = $(this).attr('data-id');
		$.ajax({
			type: 'put',
			url: '/studentajax/' + id,
			data:{
				_token :  $('meta[name="_token"]').attr('content'),
				id : $('#editid').val(),
				hoten : $('#edithoten').val(),
				gioitinh : $('#editgioitinh').val(),
				ngaysinh : $('#editngaysinh').val(),
				sdt : $('#editsdt').val(),
				diachi : $('#editdiachi').val(),
			},
			success: function(response){
				toastr.success('Sửa thành công');
			}
		});

		$('#editStudent').modal('hide');

		setTimeout(function () {
			window.location.href="/studentajax";
		},100);
	});

	$('.btn-delete').click(function(){
		if(confirm('Bạn có muốn xóa không?')){
			var _this = $(this);
			var id = $(this).attr('data-id');
			$.ajax({
				type: 'delete',
				url: '/studentajax/' + id,
				data:{
					_token : $('meta[name="_token"]').attr('content')
				},
				success: function(response){
					// $('.alert-success').css('display ', 'block').append('<strong>Xóa thành công!</strong>');
					toastr.success(response.message);
					_this.parent().parent().remove();
				}
			})
		}
	});
</script>
</html>