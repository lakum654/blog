<!DOCTYPE html>
<html>
<head>
	<title>Ajax Crud</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<script src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>

	<div class="container">
		<h3>Lakum CRUD With Ajax</h3>
	<table class="table table-bordered table-striped table-sm">
		<thead class="bg-info">
		<tr>
			<th>Id</th>
			<th>City</th>
			<th>Name</th>
			<th class="text-center text-danger">Action</th>
		</tr>
		</thead>
		<tbody class="table-data" id="#databody">
			@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->city }}</td>
				<td class="text-center"><a href="delete/{{ $user->id }}" class="btn-link float-left">Delete</a>
				<a href="{{ url('lakum/'.$user->id.'/edit') }}" class="btn-link">Edit</a></td>	
			</tr>
			@endforeach
		</tbody>
	</table>
	{{ $users->links() }}
	</div>

<script type="text/javascript">

</script>

</body>
</html>