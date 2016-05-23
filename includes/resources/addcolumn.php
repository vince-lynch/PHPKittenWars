
<?php
include('connectDB.php');

$conn = new mysqli($hostname, $username, $password, $database);
$query = 'ALTER TABLE assesment ADD ' . 'imageurl' . ' TINYINT NOT NULL DEFAULT \'0\'';
if($conn ->query($query)) {
    echo "It worked";
}

?>