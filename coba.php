<!DOCTYPE html>
<html>
<head>
	<title>Membuat Upload File Dengan PHP Dan MySQL | www.malasngoding.com</title>
</head>
<body>
	<h1>Membuat Upload File Dengan PHP Dan MySQL <br/> www.malasngoding.com</h1>
	<form action="aksi.php" method="post" enctype="multipart/form-data">
		<label> Logo Perusahaan</label>
         <input type="file" name="logo" required/>
		<input type="submit" name="save" value="Upload">
	</form>
</body>
</html>