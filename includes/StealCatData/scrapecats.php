<?php
require('../../Admin/access.php');
?>
<?php
require_once('S3.php');
Include('../resources/cats-controller.php');
$basedir = realpath(__DIR__);
global $basedir;

$AWSKey = getenv('awsAccessKey');
$AWSPass = getenv('awsSecretKey');
//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', $AWSKey);
if (!defined('awsSecretKey')) define('awsSecretKey', $AWSPass);

//instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);
global $s3;


// Original Filename Generator
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function UploadtoS3($nameoffile){
  global $s3;
  //retreive post variables
  $fileName = $nameoffile;
  $fileTempName = $nameoffile;
  echo '<br>' . $fileName . '</br>';
  //create a new bucket
     //$s3->putBucket("kittenwars", S3::ACL_PUBLIC_READ);
  
  //move the file
  if ($s3->putObjectFile($fileTempName, "kittenwars", $fileName, S3::ACL_PUBLIC_READ)) {
    echo "<strong>We successfully uploaded your file.</strong>";
  }else{
    echo "<strong>Something went wrong while uploading your file... sorry.</strong>";
  }
}  


///////////// HOW MANY TIMES TO RUN STEAL KITTY SCRIPT ////
for ($x = 0; $x <= 1; $x++) {
  global $basedir;
    echo "Number of times Script Ran: $x <br>";
 


   $data = file_get_contents('http://www.kittenwar.com/');
   $regex = '/c_images(.+?)"/';
   preg_match_all($regex,$data,$match);
   $regex2 = '/versus">(.+?)</';
   preg_match_all($regex2,$data,$match2);
  $firstKittenImage = 'http://www.kittenwar.com/c_images/' . $match[1][0];
  $secondKittenImage = 'http://www.kittenwar.com/c_images/' . $match[1][1];
  //var_dump($match); 
  $firstKittenName = $match2[1][0];
  $secondKittenName = $match2[1][1];

  echo '<h1>' . $firstKittenName . '</h1>';
  echo '<img src="' .$firstKittenImage . '" />';

  echo '<h2>VS</h2>';

  echo '<h1>' . $secondKittenName . '</h1>';
  echo '<img src="' .$secondKittenImage . '" />';

  $randomname1 = generateRandomString() . ".jpg";
  /// Save Images Locally
  $ch = curl_init($firstKittenImage);
  $fp = fopen($randomname1, 'wb');
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);

  $randomname2 = generateRandomString() . ".jpg";
  /// Save Images Locally
  $ch = curl_init($secondKittenImage);
  $fp = fopen($randomname2, 'wb');
  curl_setopt($ch, CURLOPT_FILE, $fp);
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_exec($ch);
  curl_close($ch);
  fclose($fp);

  ////////////// STORE THE STOLEN KITTIES //////////////
  // Mwhamahahahahahahah

  
  // Insert Cats into the Database
  UploadtoS3($randomname1);
  InsertCat($firstKittenName,$randomname1);
  // now steal Second Kitten
  UploadtoS3($randomname2);
  InsertCat($secondKittenName,$randomname2);

// delete the files
  $file = $randomname1;
  if (!unlink($file)){
    echo ("Error deleting $file");
    }
  else{
    echo ("Deleted $file");
    }
    $file = $randomname2;
    if (!unlink($file)){
      echo ("Error deleting $file");
      }
    else{
      echo ("Deleted $file");
      }

}  // end of loop
?>