<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<h1>Add your cat</h1>

<form action="addcat.php" method="post" enctype="multipart/form-data">
Cat's name: <input type="text" name="catsname"><br>
Cat's Photo URL: <input type="text" name="catsphoto"><br>
<input type="file" name="file1" id="fileToUpload">
<input type="submit" name="submit" value="Submit" />
</form>


</body>
</html>