<?php session_start();
//$idx = $_SESSION['idx'];
//$attend = $_SESSION['attend'];

 $username = $_SESSION['uname'];
$institution = $_SESSION['institution'];
$name = $_SESSION['name'];

$msg = "Dr. $name<br>";
$toolname = $_POST['toolname'];
$description = $_POST['description'];
$users = $_POST['tusers'];
$problem = false;
if($toolname == null) {
$msg .="Please enter toolname<br>";
$problem = true;
}
if($_POST && !$problem) {
include ('connect.php');
$query = "INSERT INTO tools VALUES ('', '$toolname', '$description', '$users', '$username' ) ";
$rs = mysqli_query($mysql, $query) or die("Cannot insert into tools");
include ('closedb.php');
if($rs > 0) { 
header("Location: ../workbook2.php");
$msg .="Record entered into tools<br>$toolname<br>$users";
}
}
?>

