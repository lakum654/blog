<!DOCTYPE html>
<html>
<head>
	<title>File Upload</title>
</head>
<body>
<form action="{{ url('upload') }}" method="POST" enctype="multipart/form-data">
	@csrf
	<input type="file" name="image">
	<input type="submit" value="Upload">
</form>
</body>
</html>