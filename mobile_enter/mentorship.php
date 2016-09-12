<?php session_start();
// $idx = $_SESSION['idx'];
// $attend = $_SESSION['attend'];
 $firstname = $_POST['fname'];
 $lastname = $_POST['lname'];
 $username = $_SESSION['uname'];
$institution = $_SESSION['institution'];
$name = $_SESSION['name'];

$cat = $_POST['category'];
$date = $_POST['mdate'];
$m_end = $_POST['m_end'];
$eval = $_POST['evaluation'];
$problem = false;
$msg = "Dr. $attend<br>";
if(!$_POST['fname'] && !$_POST['lname']) {
$msg .= "You forgot to enter name<br>"; $problem = true; }
if(!$_POST['mdate']) { $msg .= "Please enter start date<br> "; $problem = true; }
if(!$_POST['m_end']) { $msg .= "Please enter end date<br> "; $problem = true; }
if(!$_POST['category']) { $msg .= "Please select category<br>"; $problem = true; }
if($_POST && !$problem) {
include ('connect.php');
$query = "INSERT INTO mentorship VALUES ('', '$lastname', '$firstname', '$cat', '$date', '$m_end', '$eval', '$username'  ) ";
$rs = mysqli_query($mysql, $query) or die("Cannot Execute query"); 
include('closedb.php');
if($rs !=0) { $msg .= "Record entered: "; 
header("Location: ../workbook2.php");
}
}

 $msg .= " $firstname, $lastname<br>$date<br>$cat<br> $eval<br>";
?>

