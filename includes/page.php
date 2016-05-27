<html>
<body>
<?php
$basedir = realpath(__DIR__);
echo $basedir;
//include the S3 class              
if (!class_exists('S3'))require_once('S3.php');
 
//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAIJ5NUVL5MA3QQMZQ');
if (!defined('awsSecretKey')) define('awsSecretKey', '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');
 
//instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);
 


//check whether a form was submitted
if(isset($_POST['Submit'])){
 
    //retreive post variables
    $fileName = $_FILES['theFile']['name'];
    $fileTempName = $_FILES['theFile']['tmp_name'];
     


}

$s3->putBucket("jurgens-nettuts-tutorial", S3::ACL_PUBLIC_READ);<br /><br />
 
//move the file
if ($s3->putObjectFile($fileTempName, "jurgens-nettuts-tutorial", $fileName, S3::ACL_PUBLIC_READ)) {
    echo "We successfully uploaded your file.";
}else{
    echo "Something went wrong while uploading your file... sorry.";
}
?>

<form action="" method="post" enctype="multipart/form-data">
  <input name="theFile" type="file" />
  <input name="Submit" type="submit" value="Upload">
</form>
</body>
</html>