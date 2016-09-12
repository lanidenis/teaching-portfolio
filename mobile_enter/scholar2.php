<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if($_FILES['userfile']['size'] > 0) { 

$fileName = $_FILES['userfile']['name'];
$tmpName  = $_FILES['userfile']['tmp_name'];
$fileSize = $_FILES['userfile']['size'];
$fileType = $_FILES['userfile']['type'];
$folder = "uploads/";
$link = $fileName;
move_uploaded_file($tmpName, $folder.$fileName);

}

$method = $_POST['method'];
$session = $_POST['session'];
$presentor = $_POST['presentor'];
$pres = $array_attend[$presentor];
$presentation = $_POST['presentation'];
$audience  = $_POST['audience'];
$evaluation = $_POST['evaluation'];
$title = $_POST['title'];
$meeting = $_POST['meeting'];
$authors = $_POST['authors'];
$location = $_POST['location'];
$year  = $_POST['year'];
$month = $_POST['month'];
$msg = null;
$link = "";



include ('connect.php');
$sql = "INSERT INTO presentations VALUES ('', '$username', '$pres', '$title', '$method', '$session', '$authors', '$audience', '$evaluation', '$meeting', '$presentation', '$location', '$year', '$month', '$link') ";
$rs=mysqli_query($mysql, $sql) or die ("Cannot insert data into Presentation table");
if($rs != 0) {
include ('closedb.php');
 $msg .="Record entered into Presentation table"; 
header("Location: ../workbook2.php");
}

}
 
?>