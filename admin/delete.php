<?php
session_start();
$db = mysqli_connect("localhost", "u409085386_dash", "D@sh1234", "u409085386_dash");





$id = isset($_GET['id']) ? $_GET['id'] : '';
//query and execution
$query1 = "SELECT * from picz WHERE ImagesID = '$id'";
$result1 = mysqli_query($db,$query1) or die ( mysqli_error($db));
$row = mysqli_fetch_array($result1);
//get image and path
$image = $row['ImageName'];
$path = "PICS/".$image;
//delete from database and path
unlink($path);
$query = "DELETE from picz WHERE ImagesID= '$id'"; 
$result = mysqli_query($db,$query) or die ( mysqli_error($db));
if($result){
    header('Location: edit.php');
    exit();
}


?>