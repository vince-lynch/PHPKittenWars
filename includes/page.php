<?php
$basedir = realpath(__DIR__);
echo $basedir;
//include the S3 class              
if (!class_exists('S3'))require_once($basedir . '/S3/' . 'S3.php');
 
//AWS access info
if (!defined('awsAccessKey')) define('awsAccessKey', 'CHANGETHIS');
if (!defined('awsSecretKey')) define('awsSecretKey', 'CHANGETHISTOO');
 
//instantiate the class
$s3 = new S3(awsAccessKey, awsSecretKey);
 
//we'll continue our script from here in step 4!
 
?>