<?php session_start();

 $username = $_SESSION['uname'];
 $institution = $_SESSION['institution'];
 $name = $_SESSION['name'];
 
include ('connect.php');

$sql = "SELECT * from profile WHERE (username = '$username') ";
	$rs =mysqli_query($mysql, $sql) or die("Cannot execute query");
while($row = mysqli_fetch_row($rs)) {

$lname = $row[2];
$fname = $row[1];
$dg = $row[10];
$rank = $row[12];
$idx = $row[5];
# $_SESSION['idx'] = $idx;
$_SESSION['name'] = $lname.', '.$fname;

}
include ('closedb.php');
if(!$_SESSION['name']) {
 include ('rejecttp.html');
 $msg ="Access denied ";
 }

else if($_SESSION['name'] != null ) {
$msg =  ("Dr. $fname $lname.   $dg.   $rank");
include ('workbook.html');
}
?>
 
<div id="greeting">

<?php print $msg.'<br />'; ?>
</div>