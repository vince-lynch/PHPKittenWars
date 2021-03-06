  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
 <html xmlns="http://www.w3.org/1999/xhtml">
     <head>
         <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
         <title>S3 tutorial</title>
         <link href="style.css" rel="stylesheet" type="text/css">
     </head>

 <body>
 <a href="/new.php">Upload Another?</a>
      <?php
      $basedir = realpath(__DIR__);
      //include the S3 class
      if (!class_exists('S3'))require_once('S3.php');
      
      $AWSKey = getenv('awsAccessKey');
      $AWSPass = getenv('awsSecretKey');
      //AWS access info
      if (!defined('awsAccessKey')) define('awsAccessKey', $AWSKey);
      if (!defined('awsSecretKey')) define('awsSecretKey', $AWSPass);
      
      //instantiate the class
      $s3 = new S3(awsAccessKey, awsSecretKey);
      
      //check whether a form was submitted
      if(isset($_POST['Submit'])){
      
        //retreive post variables
        $fileName = $_FILES['theFile']['name'];
        $fileTempName = $_FILES['theFile']['tmp_name'];
        echo '<br>' . $fileName . '</br>';
        //create a new bucket
        $s3->putBucket("kittenwars", S3::ACL_PUBLIC_READ);
        
        //move the file
        if ($s3->putObjectFile($fileTempName, "kittenwars", $fileName, S3::ACL_PUBLIC_READ)) {
          echo "<strong>We successfully uploaded your file.</strong>";
        }else{
          echo "<strong>Something went wrong while uploading your file... sorry.</strong>";
        }
      }

      // Insert Cat into the Database
      $test = Include('../resources/cats-controller.php');
      InsertCat($_POST["catsname"],$fileName);
    ?>
 
 <h1>All uploaded files</h1>
 <?php
  // Get the contents of our bucket
  //$contents = $s3->getBucket("kittenwars");
  //foreach ($contents as $file){
  
    //$fname = $file['name'];
    //$furl = "http://kittenwars.s3.amazonaws.com/".$fname;
    
    //output a link to the file
    //echo "<a href=\"$furl\">$fname</a><br />";
  }
 ?>
 </body>
 </html>