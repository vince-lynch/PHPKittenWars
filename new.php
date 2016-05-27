<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<h1>Add your cat</h1>


<form action="/includes/S3/page.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
Cat's name: <input type="text" name="catsname"><br>
Cat's Photo URL: <input type="text" name="catsphoto"><br>
     <input name="theFile" type="file" />
     <input name="Submit" type="submit" value="Upload">
</form>


</body>
</html>