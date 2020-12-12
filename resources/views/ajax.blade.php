<!DOCTYPE html>
<html>
<head>
	<title>Ajax Crud</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<script src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>
	<div class="container w-50">
		
<form id="insert-form">
	<h3>Ajax Insert</h3>
	@csrf
	<input type="text" name="name" id="name" class="form-control"><br>
	<input type="text" name="city" id="city" class="form-control"><br>
	<input type="button" value="Insert" id="insert-btn" class="btn btn-success">
</form>
<form id="update-form">
	<h3>Ajax Update</h3>
	@csrf
	<input type="text" name="name" id="id" class="form-control"><br>
	<input type="text" name="name" id="text1" class="form-control"><br>
	<input type="text" name="city" id="text2" class="form-control"><br>
	<input type="button" value="Update" id="update-btn" class="btn btn-success">
	<input type="reset" value="Reset" id="reset-btn" class="btn btn-success">
</form>
<table class="table table-sm table-hover"><br>
	<tr>
		<th>ID</th>
		<th>NAME</th>
		<th>CITY</th>
		<th>DELETION</th>
		<th>UPDATION</th>

	</tr>
	<tbody id="databody">
	
	</tbody>
</table>
</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('#update-form').hide();
	function loadData(){
		$.ajax({
			url:"{{ url('loadData') }}",
			type:'GET',
			dataType:'json',
			success:function(response){
				var resultData = response.data;
				var i=1;
				var dataBody = '';
				$.each(resultData, function(index, row) {
					 var delUrl = 'delete/'+row.id;
					 dataBody +="<tr>";
					 dataBody +="<td>"+row.id+"</td>";
					 dataBody +="<td>"+row.name+"</td>";
					 dataBody +="<td>"+row.city+"</td>";
dataBody +="<td><button class='btn btn-success btn-sm btn-link delete-btn' data-id='"+row.id+"'>Delete</button></td>";
dataBody +="<td><button class='btn btn-danger btn-sm btn-link edit-btn' data-id='"+row.id+"'>Edit</button></td>";
dataBody +="</tr>";
});
			$('#databody').append(dataBody);				
			}
		});
	 	
	}

	$(document).on('click','.edit-btn',function(){
			$('#insert-form').hide();
			$('#update-form').show();
			var id = $(this).data('id');
			var editUrl = 'edit/'+id;
			$.ajax({
				url:editUrl,
				type:'GET',
				dataType:'json',
				data:{id:id},
				success:function(response){
				 var result = response.data;
				 $.each(result,function(index,row){
				 	$('#id').val(row.id);
				 	$('#text1').val(row.name);
				 	$('#text2').val(row.city);
				 });	
				}
			});
	});

	$(document).on('click','.delete-btn',function(){
			var id = $(this).data('id');
			var delUrl = 'delete/'+id;
			$.ajax({
				url:delUrl,
				type:'GET',
				dataType:'json',
				data:{id:id},
				success:function(response){
					loadData();
					alert(response.msg);
				}
			});
	});
	loadData();
	$('#insert-btn').click(function(e){		
		var name = $('#name').val();
		var city = $('#city').val();
		var _token = $("input[type=hidden]").val();
		$.ajax({
			url: "{{ url('insert') }}",
			type: 'POST',
			dataType: 'json',
			data: {name:name,city:city,_token:_token},
			success:function(response){
				loadData();
				alert(response.msg);
			}
		});		
	});
});
</script>


</div>
</body>
</html>