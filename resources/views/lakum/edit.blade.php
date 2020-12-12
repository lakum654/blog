<!DOCTYPE html>
<html>
<head>
	<title>Ajax Crud</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
	<script src="{{ asset('js/jquery.js') }}"></script>
</head>
<body>

	<div class="container w-25">
		<h3>Lakum CRUD With Ajax</h3>
		<form action="{{ route('lakum.update',[$user->id]) }}" method="post">
		@csrf
		<input type="hidden" name='_method' value="PATCH">
		<input type="text" name="name" value="{{ $user->name }}" placeholder="Name" class="form-control"><br>
		<input type="text" name="city" value="{{ $user->city }}" placeholder="City" class="form-control"><br>
		<input type="submit" value="Update" class="btn btn-success">		
		</form>
	</div>

<script type="text/javascript">

</script>

</body>
</html>