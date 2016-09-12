<?php session_start();

 $username = $_SESSION['uname'];
 $institution = $_SESSION['institution'];
 $name = $_SESSION['name'];
//$idx = $_SESSION['idx'];
$table = $_SESSION['table'];

// $attend = $_SESSION['attend'];
$msg = "Dr. ";
$msg .= $_SESSION['name'];
$msg .= "<br>";
$id = $_POST['rid'];
$_SESSION['record'] = $_POST['rid'];

if(isset($_POST['delete'] )) {
$action = $_POST['delete'];
$msg .=  " $action<br>";
$msg .=  'from ';
$msg .=  $table; 
$msg .= "<br>Record id:  $id <br>";
// $sql = delSQL($idx, $id, $table);
 $sql = delSQL($username, $id, $table);
include ('connect.php');
$rs = mysqli_query($mysql, $sql) or die("Cannot saveExecute Delete query"); 
if($rs !=0) { $msg .= "<br> Record  $id from $table is deleted <br>"; }
if($rs == 0) { $msg .= "<br> Cannot delete  $id from $table<br> "; }
if($table ==  'bibliography') { 
 $asql = delAutors($id); 
 $rs = mysqli_query($mysql, $asql) or die("Cannot Execute query Delete Authors"); 
if($rs !=0) { 
$msg .= "\n Authors with Pub_ID $id are deleted "; 

}
}
include('closedb.php');
$msg .=  "\n";
include ('workbook.php');
}

if(isset($_POST['update'] )) {
$action = $_POST['update'];
$msg .=  $action;
$msg .=  "<br>";
$msg .=  $table;
$msg .=  '<br>Record id: ';
$id = $_POST['rid'];
$msg .= $_POST['rid'];
$msg .= "<br />";
	$frm = edit_record($username, $id, $table);
?>
<html>
<head><title> Select Table Action </title>
<LINK REL=StyleSheet HREF="flyout_h.css" style type="text/css"> 
</style>

<!-- correction for headers -->
<style>
h4 {
	text-align: center;
	font-size: 24px;
	font-style:  normal; 
	color: navy;
	background-color: #fdedf2;
}

textarea, input {
	width: 100%;
}

h3 {
	text-indent: 0px;
}
</style>

</head>
<body>
<div style="width: 81.25%; position: relative; margin-left: 120px; height: 50px; background: maroon; z-index: -1;"></div>
<div style="width: 80%; position: absolute; margin-left: 120px; height: 150%; background: maroon; z-index: -1;"></div>

<?php if($table == 'mentorship') 
{ echo '<h3  style="width: 50%; display: block; margin: 0 auto; margin-top: 0px; text-align: center;"> Delete / Edit </h3>'; }
else if($table == 'tools') 
{ echo '<h3 style="width: 40%; display: block; margin: 0 auto; margin-top: 0px; text-align: center;"> Delete / Edit </h3>';}
else 
{ echo '<h3 style="width: 40%; display: block; margin: 0 auto; margin-top: 0px; text-align: center;"> Delete / Edit </h3>';}


if($table == 'mentorship') { 
echo '<form style="background-color: #fdedf2; position: static; display:block; width: 50%; margin: 0 auto; margin-top: 2em;" id="bibliography" action="process_edit.php" method="post" enctype="multipart/form-data" >'; }
else if($table == 'tools') { echo '<form style="background-color: #fdedf2; position: static; display:block; width: 40%; margin: 0 auto; margin-top: 2em;" id="bibliography" action="process_edit.php" method="post" enctype="multipart/form-data" >';}
else { echo '<form style="background-color: #fdedf2; position: static; display:block; width: 40%; margin: 0 auto; margin-top: 2em;" id="bibliography" action="process_edit.php" method="post" enctype="multipart/form-data" >';}

 print $frm; 
 echo '<p><input type="hidden" name="record" value="'.$_SESSION['record'].'"</p>';
 echo '<input style="display: block; margin: 0 auto; width: 80px; height: 25px; background: white; margin-top: 30px; margin-bottom: 30px; font-size: 18px; border-radius: 25px;" name="save" type="submit" value="Save">';
 
 ?>
 </form>
<?php
}

if(isset($_POST['save'])) {

if(isset($_POST['feedback'])) {	
header("Location: create_feedback.php?hid=".$_POST['record']);
} 

$sql = updSQL($username, $table);
 include ('connect.php');
 $rs = mysqli_query($mysql, $sql) or die("Cannot Execute Update query"); 
 include('closedb.php');
if($rs != 0) { $msg .= "Record Updated";



include ('workbook.php');
 }
}

?>
<!-- <div id="r_comment">
<?php 
# print $msg; ?>
</div> -->
</body>
</html>
<?php

function edit_record($username, $rid, $tbl) {
	include ('connect.php');
if($tbl == 'bibliography') {
	include ('connect.php');
$sql = "SELECT * FROM bibliography WHERE (username = '$username' AND PubID ='$rid') ";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute Select Bibliography query");
	 $list = "<h4>Publications</h4>";
  $list .= "<table border=\"1\" style=\"display: block; margin: 0 auto;\" cellpadding=\"1\">";
   
while($row = mysqli_fetch_row( $rs) ) {  
$list.= "<td><input type =\"text\"  value=\"$row[0]\" size=\"2\" name=\"id\" readonly=\"readonly\"  /></td>";

#$list.= "<tr><td>ID</td><td>".$row[0]."</td></tr>"; 	
	#     $list.= "<td>".$authors."</td>";
$list.= "<tr><td>Title</td><td><textarea rows=\"3\" cols=\"60\" name=\"title\" >".$row[1]."</textarea></td></tr>";
$list.= "<tr><td>Book Title</td><td><textarea rows=\"3\" cols=\"50\" name=\"booktitle\" >".$row[2]."</textarea></td></tr>";
$list.= "<tr><td>Periodical</td><td><textarea rows=\"2\" name=\"periodical\" >".$row[3]."</textarea></td></tr>";
$list.= "<tr><td>Publisher</td><td><textarea  rows=\"3\" cols=\"50\" name=\"publisher\" >".$row[4]."</textarea></td></tr>";
$list.= "<tr><td>Publ. Place</td><td><textarea rows=\"3\" cols=\"50\" name=\"place\" >".$row[5]."</textarea></td></tr>";
$list.= "<tr><td>Editor</td><td><textarea  rows=\"3\" cols=\"50\" name=\"editor\" >".$row[6]."</textarea></td></tr>";
$list.= "<tr><td>Year</td><td><input type =\"text\"  value=\"$row[7]\" size=\"4\" name=\"year\" /></td></tr>";
$list.= "<tr><td>Month</td><td><input type =\"text\"  value=\"$row[8]\" size=\"10\" name=\"month\" /></td></tr>";
$list.= "<tr><td>Day</td><td><input type =\"text\"  value=\"$row[9]\" size=\"2\" name=\"day\" /></td></tr>";
$list.= "<tr><td>Volume</td><td><input type =\"text\"  value=\"$row[10]\" size=\"3\" name=\"volume\" /></td></tr>";
$list.= "<tr><td>Issue</td><td><input type =\"text\"  value=\"$row[11]\" size=\"3\" name=\"issue\" /></td></tr>";
$list.= "<tr><td>Edition</td><td><input type =\"text\"  value=\"$row[12]\" size=\"3\" name=\"edition\" /></td></tr>";
$list.= "<tr><td>Pages</td><td><input type =\"text\"  value=\"$row[13]\" size=\"5\" name=\"pages\" /></td></tr>";
$list.= "<tr><td>Status</td><td><input type =\"text\"  value=\"$row[14]\" size=\"10\" name=\"status\" /></td></tr>";
$list.= "<tr><td>Bibliography Type</td><td><input type =\"text\"  value=\"$row[15]\" size=\"10\" name=\"type\" /></td></tr>";
$list.= "<tr><td>Peer Review</td><td><input type =\"text\"  value=\"$row[16]\" size=\"3\" name=\"pr\" /></td></tr>";
	
	$list.= "</tr>";
}
 $list .= "</table>";	
 }
if($tbl == 'presentations') {
$sql = "SELECT * FROM presentations WHERE (username = '$username' AND PID = '$rid') ";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute select from presentations query");
   $list = "<h4>Presentation</h4>";
  $list .= "<table style=\"display: block; width: 98%; margin: 0 auto;\" border=\"1\" cellpadding=\"1\">";
 
          $list.= "</tr>";
while($row = mysqli_fetch_row( $rs) ) {  
#	   $list.= "<tr><td>ID</td><td>".$row[0]."</td></tr>"; 	
$list.= "<td><input type =\"text\"  value=\"$row[0]\" size=\"2\" name=\"id\" readonly = \"readonly\"  /></td>";

$list.= "<tr><td>Presentor</td><td><textarea  rows=\"3\" cols=\"63\" name=\"presentor\" > ".$row[2]." </textarea></td></tr>";
$list.= "<tr><td>Title</td><td><textarea  rows=\"3\" cols=\"61\" name=\"title\">".$row[3]."</textarea></td></tr>";	
$list.= "<tr><td>Method</td><td><textarea rows=\"2\" cols=\"61\" name=\"method\" >".$row[4]." </textarea></td></tr>";	
$list.= "<tr><td>Session(hr)</td><td><input type =\"text\"  value=\"$row[5]\" size=\"3\" name=\"session\" /></td></tr>";
$list.= "<tr><td>Authors</td><td><textarea rows=\"2\" cols=\"61\"  name=\"authors\" > ".$row[6]." </textarea></td></tr>";	
$list.= "<tr><td>Audience</td><td><input type =\"text\"  value=\"$row[7]\" size=\"12\" name=\"audience\" /></td></tr>";

if(!is_null($row[8]) && $row[8] != "") {
$list.= "<tr><td>Feedback</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href=\"feedback/".$row[8]."\" target=\"_blank\">Show Feedback Form</a></td></tr>";
$list.= "<tr><td>New Form?</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"feedback\" value=\"Create New Form\"></td></tr>";
}
else {
$list.= "<tr><td>New Form?</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"radio\" name=\"feedback\" value=\"Create New Form\"></td></tr>";
}
#$list.= "<tr><td>Feedback</td><td><textarea rows=\"3\" cols=\"50\" name=\"feedback\">".$row[8]." </textarea></td></tr>";

$list.= "<tr><td>Meeting</td><td><textarea rows=\"3\" cols=\"61\"  name=\"meeting\"> ".$row[9]."</textarea></td>";
$list.= "<tr><td>Type</td><td><input type =\"text\"  value=\"$row[10]\" size=\"13\" name=\"mtype\" /></td></tr>";
$list.= "<tr><td>Location</td><td><input type =\"text\"  value=\"$row[11]\" size=\"13\" name=\"location\" /></td></tr>";
$list.= "<tr><td>Year</td><td><input type =\"text\"  value=\"$row[12]\" size=\"4\" name=\"year\" /></td></tr>";
$list.= "<tr><td>Month</td><td><input type =\"text\"  value=\"$row[13]\" size=\"8\" name=\"month\" /></td></tr>";
$list.= "<tr><td>Link</td><td><input name=\"newfile\" type=\"file\"/></td></tr>";
	
	 }
 $list .= "</table>";
  }
if($tbl == 'cme') { 
        $sql = "SELECT * FROM cme WHERE (username = '$username' AND CME_ID = '$rid') ";
	$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
	$list = "<h4>CME</h4>";
	$list .= "<table style=\"display: block; width: 60%; margin: 0 auto;\" border=\"1\" cellpadding=\"1\">";  
while($row = mysqli_fetch_row( $rs) )  {    
$list.= "<tr><td><input type =\"text\"  value=\"$row[0]\" size=\"2\" name=\"id\" readonly = \"readonly\"  /></td></tr>";

$list.= "<tr><td>Date</td><td><input type =\"text\"  value=\" $row[1] \" size=\"40\" name=\"date\" /></td></tr>";
$list.= "<tr><td>Title</td><td><textarea rows=\"3\" cols=\"35\" name=\"title\" >".$row[2]."</textarea></td></tr>";
$list.= "<tr><td>Type</td><td><input type=\"text\" value=\"$row[3]\" size=\"37\" name=\"type\"  /></td></tr>";
$list.= "<tr><td>Credit</td><td><input type=\"text\" value=\"$row[4]\" size=\"37\" name=\"credit\"  /></td></tr>";               
 }
 $list .= "</table>";
 }
 if($tbl == 'moca') { 
        $sql = "SELECT * FROM MOCA WHERE (username = '$username' AND M_ID = '$rid') ";
	$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
	$list = "<h4>MOCA</h4>";
	$list .= "<table style=\"display: block; width: 60%; margin: 0 auto;\" border=\"1\" cellpadding=\"1\">";  
while($row = mysqli_fetch_row( $rs) )  {    
$list.= "<tr><td><input type =\"text\"  value=\"$row[0]\" size=\"2\" name=\"id\" readonly = \"readonly\"  /></td></tr>";
$list.= "<tr><td>Date</td><td><input type =\"text\"  value=\" $row[5] \" size=\"37\" name=\"date\" /></td></tr>";
$list.= "<tr><td>Title</td><td><textarea rows=\"3\" cols=\"35\" name=\"title\" >".$row[4]."</textarea></td></tr>";
$list.= "<tr><td>Activity</td><td><textarea rows=\"3\" cols=\"35\" name=\"activity\" >".$row[3]."</textarea></td></tr>";
$list.= "<tr><td>Status</td><td><textarea rows=\"3\" cols=\"35\" name=\"status\" >".$row[2]."</textarea></td></tr>";
$list.= "<tr><td>Credit</td><td><input type=\"text\" value=\"$row[6]\" size=\"37\" name=\"credit\"  /></td></tr>";               
 }
 $list .= "</table>";
 }
if($tbl == 'prof') {
	$sql = "SELECT * FROM ProfAppointments WHERE (username = '$username' AND PA_ID = '$rid') ";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query"); 
  $list = "<h4>Professional Appointments</h4>";
 $list .= "<table style=\"display: block; width: 80%; margin: 0 auto;\" border=\"1\" cellpadding=\"1\">";
  
while($row = mysqli_fetch_row( $rs) ){    
$list.= "<tr><td><input type =\"text\"  value=\"$row[0]\" size=\"2\" name=\"id\" readonly=\"readonly\" /></td></tr>"; 
 #       $list.= "<tr><td>ID</td><td>".$row[0]."</td> </tr>"; 	
	$list.= "<tr><td>Professional<br>Appointment</td><td><textarea rows=\"3\" cols=\"45\" name=\"appointment\" >".$row[1]."</textarea></td></tr>";	
	$list.= "<tr><td>Institution</td><td><textarea rows=\"3\" name=\"institution\" >".$row[2]."</textarea></td></tr>";
$list.= "<tr><td>From</td><td><input type =\"text\"  value=\"$row[3]\" size=\"10\" name =\"from\" /></td></tr>";
$list.= "<tr><td>To</td><td><input type =\"text\"  value=\"$row[4]\" size=\"10\" name=\"to\" /></td></tr>";
$list.= "<tr><td>Activities</td><td><input type =\"text\"  value=\"$row[5]\" size=\"15\" name=\"activities\" /></td></tr>";
$list.= "<tr><td>Description</td><td><textarea rows=\"3\" name=\"description\" >".$row[6]."</textarea></td></tr>";	
	           
 }
 $list .= "</table>";

}
if($tbl == 'awards') { 
	$sql = "SELECT * FROM awards WHERE (uname = '$username' AND award_id = '$rid' )";
	$rs = mysqli_query($mysql, $sql) or die("Cannot Execute Select Awards query"); 
	
	$list = "<h4>Awards</h4>";
  $list .= "<table style=\"display: block; width: 80%; margin: 0 auto;\" border=\"1\" cellpadding=\"2\">";
 $list .= "<th>ID</th><th>Awards</th><th width=\"35\" > Description</th><th>&nbsp;&nbsp;Date</th>";
while($row = mysqli_fetch_row( $rs) )
{  

$list .= "<tr>";
 #       $list.= "<td>".$row[0]."</td>"; 
  $list.= "<td><input type =\"text\"  value=\"$row[0]\" size=\"2\" name=\"id\" readonly = \"readonly\" /></td>";	
$list.= "<td><textarea rows=\"2\"   name=\"award\">".$row[1]."</textarea></td>";
$list.= "<td><textarea rows=\"3\" name=\"description\" >".$row[2]."</textarea></td>";
	$list.= "<td><input type =\"text\"  value=\"$row[3]\" size=\"10\" name=\"date\" /></td>";
	#$list.= "<td>".$id."</td>";
	$list.= "</tr>";

 }
 $list .= "</table>";

	
 }
if($tbl == 'mentorship') {
$sql = "SELECT * FROM mentorship WHERE (username = '$username' AND MID ='$rid') ";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
 $list = "<h4>Mentorship</h4>";
 $list .= "<table style=\"display: block; width: 90%; margin: 0 auto;\" border=\"1\" cellpadding=\"1\">";
    $list .= "<tr>";
   $list .= "<th>ID</th><th>Last Name</th><th>First Name</th><th>Category</th><th>Date</th><th>Evaluation</th>";
       $list.= "</tr>";
while($row = mysqli_fetch_row( $rs) ) {  

$list .= "<tr>";
   #     $list.= "<td>".$row[0]."</td>"; 
  $list.= "<td><input type =\"text\"  value=\"$row[0]\" size=\"2\" readonly = \"readonly\" name=\"id\" /></td>";

$list.= "<td> <input type =\"text\"  value=\"$row[1]\" size=\"15\" name=\"lname\" /> </td>";
$list.= "<td><input type =\"text\"  value=\"$row[2]\" size=\"15\" name=\"fname\" /></td>";
$list.= "<td><input type =\"text\"  value=\"$row[3]\" size=\"15\" name=\"category\" /></td>";	
$list.= "<td> <input type =\"text\"  value=\"$row[4]\" size=\"10\" name=\"date\" /></td>";	
$list.= "<td><textarea rows=\"1\" name=\"evaluation\" >".$row[5]."</textarea></td>";
	#$list.= "<td>".$id."</td>";
	$list.= "</tr>";
}
 $list .= "</table>";	
 }
if($tbl == 'tools') {
$sql = "SELECT * FROM tools WHERE (username = '$username' AND TID = '$rid')";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
    $list = "<h4>TOOLS</h4>";
 $list .= "<table style=\"display: block; width: 90%; margin: 0 auto;\" border=\"1\" cellpadding=\"1\">";
 $list .= "<tr>";
   $list .= "<th>ID</th><th>Tool</th><th>Description</th><th>Tool Users</th>";
       $list.= "</tr>";
while($row = mysqli_fetch_row( $rs) ) {  

$list .= "<tr>";
 
  #      $list.= "<td>".$row[0]."</td>"; 
$list.= "<td><input type =\"text\"  value=\"$row[0]\" size=\"2\" name=\"id\" readonly = \"readonly\"  / ></td>";
$list.= "<td><textarea rows=\"3\" name=\"tool\" >".$row[1]."</textarea></td>";	
$list.= "<td><textarea rows= \"3\" name= \"description\" >".$row[2]." </textarea></td>";	
$list.= "<td><textarea rows=\"3\" name=\"users\" >".$row[3]."</textarea></td>";	
	#$list.= "<td>".$id."</td>";
	$list.= "</tr>";
 }
 $list .= "</table>";
	
 }
return $list;
#	include('closedb.php');
}

function delSQL($username, $rid, $tbl) {
if($tbl == 'bibliography') { $stm = "DELETE FROM bibliography WHERE (PubID = '$rid' AND username = '$username') "; }
if($tbl == 'presentations') { $stm = "DELETE FROM presentations WHERE (PID = '$rid' AND username = '$username') ";  }
if($tbl == 'cme') { $stm = "DELETE FROM cme WHERE (CME_ID = '$rid' AND username = '$username' ) ";  }
if($tbl == 'prof') { $stm = "DELETE FROM ProfAppointments WHERE (PA_ID = '$rid' AND username = '$username') ";  }
if($tbl == 'awards') { $stm = "DELETE FROM awards WHERE (award_id = '$rid' AND uname = '$username') ";  }
if($tbl == 'mentorship') { $stm = "DELETE FROM mentorship WHERE (MID = '$rid' AND username = '$username') ";  }
if($tbl == 'tools') { $stm = "DELETE FROM tools WHERE (TID = '$rid' AND username = '$username') ";  }
return $stm;
}
function delAutors($rid) {
 $stm = "DELETE FROM authors WHERE (PubID = '$rid' ) ";
return $stm;
}



function updSQL($username,  $tbl) {
if($tbl == 'bibliography') {
                 $rid = $_POST['id'];
	$title = $_POST['title'];
	$booktitle = $_POST['booktitle'];
	$periodical = $_POST['periodical'];
	$publisher = $_POST['publisher'];
	$place = $_POST['place'];
	$editor = $_POST['editor'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	$day = $_POST['day'];
	$volume = $_POST['volume'];
	$issue = $_POST['issue'];
	$edition = $_POST['edition'];
	$pages = $_POST['pages'];
	$status = $_POST['status'];
	$btype = $_POST['type'];
	$pr = $_POST['pr'];
$stm = "UPDATE bibliography SET Title = '$title', BookTitle = '$booktitle', Periodical = '$periodical', Publisher = '$publisher', PublicationPlace = '$place', Editor = '$editor', Year = '$year', Month = '$month', Day = '$day', Volume = '$volume', Issue = '$issue', Edition = '$edition', Pages = '$pages', Status = '$status', BibliographyType = '$btype', PeerReviewed = '$pr' WHERE (PubID = '$rid' AND username = '$username') ";
 }
 
if($tbl == 'presentations') {

$rid = $_POST['id']; //get row id

//get current link string
include('connect.php');
$sql = "select link from presentations WHERE (PID = '$rid' AND username = '$username') ";
$rst = mysqli_query($mysql, $sql) or die($rid."and".$username); 
while($row = mysqli_fetch_row( $rst) ) {
$link = $row[0];
}
include('closedb.php');

//only update link column if new file was uploaded
if($_FILES['newfile']['size'] > 0) { 

//delete old file if need be
if (!is_null($link)) { 
unlink ("uploads/".$link );
}

$fileName = $_FILES['newfile']['name'];
$tmpName  = $_FILES['newfile']['tmp_name'];
$fileSize = $_FILES['newfile']['size'];
$fileType = $_FILES['newfile']['type'];
$folder = "uploads/";
$link = $fileName;

move_uploaded_file($tmpName, $folder.$fileName);
}

	$presentor = $_POST['presentor'];
	$title = $_POST['title'];
	$method = $_POST['method'];
	$session = $_POST['session'];
	$authors = $_POST['authors'];
	$audience = $_POST['audience'];
	##$feedback = $_POST['feedback'];
	$meeting = $_POST['meeting'];
	$mtype = $_POST['mtype'];
	$location = $_POST['location'];
	$year = $_POST['year'];
	$month = $_POST['month'];
	
	##deleted feedback = 'feedback;
$stm = "UPDATE presentations SET presentor = '$presentor', title = '$title', method = '$method', hours_session = '$session',  authors = '$authors', audience = '$audience', meeting = '$meeting', meeting_type = '$mtype', location = '$location', year = '$year', month = '$month', link = '$link'  WHERE (PID = '$rid' AND username = '$username') ";
  }
if($tbl == 'cme') { 
	   $rid = $_POST['id'];
                   $title = $_POST['title'];
                   $date = $_POST['date'];
                  $type = $_POST['type'];
                  $credit = $_POST['credit'];
                 $total = $_POST['total'];

$stm = "UPDATE cme SET cme_date = '$date', title = '$title', type = '$type', CreditHours = '$credit' WHERE (CME_ID = '$rid' AND username = '$username' ) "; 
 }
if($tbl == 'moca') { 
	   $rid = $_POST['id'];
	   	   $date = $_POST['date'];
              	   $title = $_POST['title'];
		   $activity = $_POST['activity'];
                  $status = $_POST['status'];
                  $credit = $_POST['credit'];

$stm = "UPDATE MOCA SET MDate = '$date', Title = '$title', Activity = '$activity', Status = '$status', MocaCredit = '$credit' WHERE (M_ID = '$rid' AND username = '$username' ) "; 
 }
if($tbl == 'prof') {
                 $id = $_POST['id'];
	$appointment = $_POST['appointment'];
	$institution = $_POST['institution'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$activities = $_POST['activities'];
	$description = $_POST['description'];
$stm = "UPDATE ProfAppointments SET ProfessionalAppointments =  '$appointment', Institution = '$institution', tfrom = '$from', tto = '$to', activities = '$activities', description = '$description'  WHERE PA_ID = '$id' AND username = '$username' ";
# echo $stm;
}
if($tbl == 'awards') { 
             $rid = $_POST['id'];
	$awards = $_POST['award'];
	$descr = $_POST['description'];
	$date = $_POST['date'];
$stm = "UPDATE awards SET awards = '$awards', description = '$descr', awdate = '$date' WHERE (award_id = '$rid' AND uname = '$username') "; 
 }
if($tbl == 'mentorship') {
               $rid = $_POST['id'];
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$cat = $_POST['category'];
	$date = $_POST['date'];
	$eval = $_POST['evaluation'];
 $stm = "UPDATE mentorship SET lastname = '$lname', firstname = '$fname', category = '$cat', mdate = '$date', evaluation = '$eval' WHERE (MID = '$rid' AND username = '$username') "; 
 }
if($tbl == 'tools') {
          $rid = $_POST['id'];
	$tool = $_POST['tool'];
	$descr = $_POST['description'];
	$users = $_POST['users'];
$msg .= "$tool, $descr, $users, $rid<br>";
# echo $rid;
 $stm = "UPDATE tools  SET tool = '$tool', description = '$descr', tusers = '$users'  WHERE (TID = '$rid' AND username = '$username') "; 
 }

return $stm;
}
?>