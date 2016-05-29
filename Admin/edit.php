<?php
require('access.php');
?>
<?php
$basedir = realpath(__DIR__);
print "loaded edit page";
print $_GET["id"];
include('../includes/resources/cats-controller.php');
$catArray = ShowCat($_GET["id"]);
?>
<!DOCTYPE html>
<html>
<head>
  <title>
  </title>
</head>
<body>
<span>You are currently logged in, to logout <a href="/Admin/logout.php"> click here </a></span>
<h1>Edit cat: <?php print $catArray[1]; ?> </h1>

<?php
{ 
    //$name = $_POST['name'];
    echo "User Has submitted the form and entered this name : <b> $name </b>";
    echo "<br>You can use the following form again to enter a new name."; 

    echo $_POST[ID];
    echo $_POST[name];
    echo $_POST[image];


    UpdateCat($_POST[ID],$_POST[name],$_POST[image]);
}
?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
       <label>ID: </label>
       <input type="text" name="ID" value="<?php print $catArray[0]; ?>"/>
       <label>Name: </label>
       <input type="text" name="name" value="<?php print $catArray[1]; ?>"/>
       <label>Image: </label>
       <input type="text" name="image" value="<?php print $catArray[2]; ?>"/>
       <input type="submit">
    </form>
    <a href="/delete.php?id=<?php print $catArray[0]; ?>">Delete this cat</a>
</body>
</html>