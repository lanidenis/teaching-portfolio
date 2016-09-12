<?php session_start();
$username = $_SESSION['name'];
//$attend = $_SESSION['attend'];
 //$idx = $_SESSION['idx'];
  $username = $_SESSION['uname'];
$institution = $_SESSION['institution'];
$name = $_SESSION['name'];

include ('workbook2.php');

$_SESSION['table'] = $_POST['tables'];
$_SESSION['action'] = $_POST['select_action'];
$t_name = $_SESSION['table'];
$a_name = $_SESSION['action'];
 if(isset($_POST['select'])) {
if($a_name == null) { $msg .= "Please select delete or update<br>";  }
if($t_name == 'none') { $msg .= "Please select one of the tables<br>"; }
if( $a_name != null && $t_name != 'none') { $msg .= "$a_name   $t_name"; }
  if($a_name == 'update' || $a_name == 'delete') {
if($t_name == 'bibliography') { $list = s_publications($username); }
if($t_name == 'prof') { $list = s_appointment($username); }
if($t_name == 'awards') { $list = showAwards($username); }
if($t_name == 'tools') { $list = showTolls($username); }
if($t_name == 'presentations') { $list = showPresentation($username); }
if($t_name == 'moca') { $list = s_moca($username); }
if($t_name == 'cme') { $list = s_cme($username); }
if($t_name == 'mentorship') { $list = Mentorship($username); }
 }

if($a_name == 'enter') { 


if($t_name == 'bibliography') { include('./mobile_enter/number_authors.html'); }
if($t_name == 'prof') { include('./mobile_enter/prof_activ.html'); }
if($t_name == 'moca') {  include('./mobile_enter/moca.html'); }
if($t_name == 'awards') { include('./mobile_enter/awards.html'); }
if($t_name == 'tools') { include('./mobile_enter/tools.html'); }
if($t_name == 'presentations') { include('./mobile_enter/scholar.php'); }
if($t_name == 'cme') {  include('./mobile_enter/cme.html'); }
if($t_name == 'mentorship') { include('./mobile_enter/mentorship.html'); }

} 
}
  if($a_name == 'update' || $a_name == 'delete') {
?>
<script type="text/javascript">
	confirm("Rotate your device to landscape mode for best viewing.");
</script>

<div style="display: block; background-color: #d3d3d3; width:100%; height: 100px;"></div>
<div style="display: block; background-color: #d3d3d3; width:100%;">

<form style="
  	    background-color: #fdedf2;   
            border: 2px solid maroon;	
	    width: 90%;               
	    display: block;
            margin: 0 auto;" action="process_edit2.php" method="post">
            

<!-- <form  id="f_show" action="process_edit2.php" method="post" style="border: 0.2em solid navy; width: 75%; position: static; background-color: #fdedf2; margin-bottom: 50px;"> -->

<?php  
# echo $msg;
print $list;
if($a_name == 'delete') { echo '<p style="display: block; margin: 50px auto 80px auto; width: 200px; height: 60px;"><input style="height: 60px; width: 200px; font-size: 40px;" name="delete" type="submit" value="Delete"></p>'; }
if($a_name == 'update') { echo '<p style="display: block; margin: 50px auto 80px auto; width: 200px; height: 60px;"><input style="height: 60px; width: 200px; font-size: 40px;" name="update" type="submit" value="Update"></p>'; }

 ?>
</form>
</div>
<div style="display: block; background-color: #d3d3d3; width:100%; height: 100px;"></div>

<?php
}
function showAwards($idp) {
include ('connect.php');
$sql = "SELECT * FROM awards WHERE (uname = '$idp') ORDER BY award_id ";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
	 $list = "<h5>Awards</h5>";
  $list .= "<table width=\"90%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 28px;\" cellpadding=\"12\">";
  
   	//column headers
   $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  $list .= "<td style=\"text-align: center;\">Award</td>";
  $list .= "<td style=\"text-align: center;\">Description</td>";
  $list .= "<td style=\"text-align: center;\">Date</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</tr>";
  
while($row = mysqli_fetch_row( $rs) )
{  
$id = '<input name="rid" type="radio" value='.$row[0].'>'; 
$list .= "<tr>";
        $list.= "<td>".$row[0]."</td>"; 	
	$list.= "<td>".$row[1]."</td>";
	$list.= "<td>".$row[2]."</td>";
	$list.= "<td>".$row[3]."</td>";
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";

 }
 $list .= "</table>";
mysqli_close($mysql); 
return $list;
}
function s_publications($id) {
include ('connect.php');
$sql = "SELECT * FROM bibliography WHERE (username = '$id') ORDER BY PubID, BibliographyType";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
 $list = "<h5>Publications</h5>";
  $list .=  "<table width=\"90%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 24px;\" cellpadding=\"12\">";
  
    //column headers
  $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  $list .= "<td style=\"text-align: center;\">Authors</td>";
  //$list .= "<td style=\"text-align: center;\">Title</td>";
  $list .= "<td style=\"text-align: center;\">Book Title</td>";
  $list .= "<td style=\"text-align: center;\">Publisher</td>";
  $list .= "<td style=\"text-align: center;\">Status</td>";
  //$list .= "<td style=\"text-align: center;\">Bibliography Type</td>";
  //$list .= "<td style=\"text-align: center;\">Peer Reviewed</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</tr>";
  
while($row = mysqli_fetch_row( $rs) ) {  
             $authors = getAuthors($row[0]);
             $id = '<input name="rid" type="radio" value='.$row[0].'>'; 
             $list.= "<td>".$row[0]."</td>"; 
	      $list.= "<td>".$authors."</td>"; 
	//$list.= "<td>".$row[1]."</td>";
	$list.= "<td>".$row[2]."</td>";
#	$list.= "<td>".$row[3]."</td>";
	$list.= "<td>".$row[4]."</td>";
#	$list.= "<td>".$row[5]."</td>";
#	$list.= "<td>".$row[6]."</td>";
#	$list.= "<td>".$row[7]."</td>";
#	$list.= "<td>".$row[8]."</td>";
#	$list.= "<td>".$row[9]."</td>";
#	$list.= "<td>".$row[10]."</td>";
#	$list.= "<td>".$row[11]."</td>";
#	$list.= "<td>".$row[12]."</td>";
#	$list.= "<td>".$row[13]."</td>";
	$list.= "<td>".$row[14]."</td>";
	//$list.= "<td>".$row[15]."</td>";
	//$list.= "<td>".$row[16]."</td>";
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";

}
 $list .= "</table>";
mysqli_close($mysql); 
return $list;

}
function s_appointment($ind) {
include ('connect.php');
$sql = "SELECT * FROM ProfAppointments WHERE (username = '$ind') ORDER BY PA_ID";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
  $list = "<h5>Professional Appointments</h5>";
 $list .= "<table width=\"90%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 28px;\" cellpadding=\"12\">";
 
 	//column headers
   $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  $list .= "<td style=\"text-align: center;\">Profesional Appointments</td>";
  $list .= "<td style=\"text-align: center;\">Instituion</td>";
#  $list .= "<td style=\"text-align: center;\">From</td>";
#  $list .= "<td style=\"text-align: center;\">To</td>";
  $list .= "<td style=\"text-align: center;\">Activities</td>";
  $list .= "<td style=\"text-align: center;\">Description</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</tr>";
  
while($row = mysqli_fetch_row( $rs) )
{    
$id = '<input name="rid" type="radio" value='.$row[0].'>'; 
$list .= "<tr>";
        $list.= "<td>".$row[0]."</td>"; 	
	$list.= "<td>".$row[1]."</td>";
	$list.= "<td>".$row[2]."</td>";
#	$list.= "<td>".$row[3]."</td>";
#	$list.= "<td>".$row[4]."</td>";
	$list.= "<td>".$row[5]."</td>";
	$list.= "<td>".$row[6]."</td>";
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";            
 }
 $list .= "</table>";
mysqli_close($mysql); 
return $list;

}
function showTolls($ind) {
include ('connect.php');
$sql = "SELECT * FROM tools WHERE (username = '$ind') ORDER BY TID";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
   $list = "<h5>Tools</h5>";
 $list .= "<table width=\"90%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 28px;\" cellpadding=\"12\">";
 
  	//column headers
   $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  $list .= "<td style=\"text-align: center;\">Tool</td>";
  $list .= "<td style=\"text-align: center;\">Description</td>";
  $list .= "<td style=\"text-align: center;\">Users</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</tr>";
 
while($row = mysqli_fetch_row( $rs) ) {  
$id = '<input name="rid" type="radio" value='.$row[0].'>'; 
$list .= "<tr>";
        $list.= "<td>".$row[0]."</td>"; 	
	$list.= "<td>".$row[1]."</td>";
	$list.= "<td>".$row[2]."</td>";
	$list.= "<td>".$row[3]."</td>";
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";
 }
 $list .= "</table>";
mysqli_close($mysql); 
return $list;
}
function showPresentation($ind) {
include ('connect.php');
$sql = "SELECT * FROM presentations WHERE (username = '$ind') ORDER BY PID, year ";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
   $list = "<h5>Presentations</h5>";
  $list .= "<table width=\"100%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 24px;\" cellpadding=\"12\">";
  
  //column headers
  $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  //$list .= "<td style=\"text-align: center;\">Presentor</td>";
  $list .= "<td width=\"20\" style=\"text-align: center;\">Title</td>";
  $list .= "<td style=\"text-align: center;\">Feedback</td>";
  $list .= "<td style=\"text-align: center;\">Location</td>";
  $list .= "<td style=\"text-align: center;\">Year</td>";
  $list .= "<td style=\"text-align: center;\">Month</td>";
  //$list .= "<td style=\"text-align: center;\">Hyperlink</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</tr>";
  
while($row = mysqli_fetch_row( $rs) ) {  
 $id = '<input name="rid" type="radio" value='.$row[0].'>'; 
$list .= "<tr>";
            $list.= "<td>".$row[0]."</td>"; 	
#	$list.= "<td>".$row[1]."</td>";
#	$list.= "<td>".$row[2]."</td>";

#	display title as link if available
	if(!is_null($row[14])) { $list .= "<td width=\"20\"><a href='http://myteachingportfolio.net/uploads/".$row[14]."' target='_blank'>".$row[3]."</a></td>"; }
	else { $list.= "<td width=\"20\">".$row[3]."</td>";} 
#	$list.= "<td>".$row[4]."</td>";
#	$list.= "<td>".$row[5]."</td>";
#	$list.= "<td>".$row[6]."</td>";
#	$list.= "<td>".$row[7]."</td>";
	$list.= "<td><a href=\"feedback/".$row[8]."\" target=\"_blank\">Show Feedback Form</a></td>";
#	$list.= "<td>".$row[9]."</td>";
#	$list.= "<td>".$row[10]."</td>";
	$list.= "<td>".$row[11]."</td>";
	$list.= "<td>".$row[12]."</td>";
	$list.= "<td>".$row[13]."</td>";
#	if(!is_null($row[14])) 
#	{ $list.= "<td>"."<a href='http://myteachingportfolio.net/uploads/".$row[14]."' target='_blank'>".$row[14]."</a>"."</td>"; }
#	else { $list.=  "<td>".""."</td>"; } 
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";
 }
 $list .= "</table>";
             
mysqli_close($mysql); 
return $list;
}
function Mentorship($ind) {
    include ('connect.php');
$sql = "SELECT * FROM mentorship WHERE (username = '$ind') ORDER BY MID";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
  $list = "<h5>Mentorship</h5>";
 $list .= "<table width=\"90%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 28px;\" cellpadding=\"12\">";
 
    	//column headers
   $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  $list .= "<td style=\"text-align: center;\">Last Name</td>";
#  $list .= "<td style=\"text-align: center;\">First Name</td>";
  $list .= "<td style=\"text-align: center;\">Category</td>";
  $list .= "<td style=\"text-align: center;\">Date</td>";
#  $list .= "<td style=\"text-align: center;\">Evaluation</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</tr>";
  
while($row = mysqli_fetch_row( $rs) ) {  
$id = '<input name="rid" type="radio" value='.$row[0].'>'; 
$list .= "<tr>";
        $list.= "<td>".$row[0]."</td>"; 	
	$list.= "<td>".$row[1]."</td>";
#	$list.= "<td>".$row[2]."</td>";
	$list.= "<td>".$row[3]."</td>";
        $list.= "<td>".$row[4]."</td>";
#        $list.= "<td>".$row[5]."</td>";
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";
}
 $list .= "</table>";
mysqli_close($mysql); 
return $list;

}
function s_moca($ind)  {
          include ('connect.php');
$sql = "SELECT * FROM MOCA WHERE (username = '$ind') ORDER BY M_ID";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
	$list = "<h5>MOCA</h5>";
  $list .= "<table width=\"90%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 28px;\" cellpadding=\"12\">";
  
    //column headers
  $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  $list .= "<td style=\"text-align: center;\">Status</td>";
  $list .= "<td style=\"text-align: center;\">Activity</td>";
# $list .= "<td style=\"text-align: center;\">Title</td>";
  $list .= "<td style=\"text-align: center;\">Date</td>";
  $list .= "<td style=\"text-align: center;\">Credits</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</tr>";
  
while($row = mysqli_fetch_row( $rs) )  {    
$id = '<input name="rid" type="radio" value='.$row[0].'>'; 
$list .= "<tr>";
        $list.= "<td>".$row[0]."</td>"; 	
	$list.= "<td>".$row[2]."</td>";
	$list.= "<td>".$row[3]."</td>";
#       $list.= "<td>".$row[4]."</td>";
        $list.= "<td>".$row[5]."</td>";
        $list.= "<td>".$row[6]."</td>";
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";
            
 }
 
 $list .= "</table>";
mysqli_close($mysql); 
return $list;

}
function s_cme($ind)  {
          include ('connect.php');
$sql = "SELECT * FROM cme WHERE (username = '$ind') ORDER BY CME_ID";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query");
	$list = "<h5>CME</h5>";
  $list .= "<table width=\"90%\" border=\"1px solid black\" style=\"display: block; margin: 0 auto; font-size: 28px;\" cellpadding=\"12\">";
  
      //column headers
  $list .= "<tr>";
  $list .= "<td style=\"text-align: center;\">ID</td>";
  $list .= "<td style=\"text-align: center;\">Date</td>";
  $list .= "<td style=\"text-align: center;\">Title</td>";
#  $list .= "<td style=\"text-align: center;\">Type</td>";
  $list .= "<td style=\"text-align: center;\">Credit Hours</td>";
  $list .= "<td style=\"text-align: center;\">Select</td>";
  $list .= "</span></tr>";
  
while($row = mysqli_fetch_row( $rs) )  {    
$id = '<input name="rid" type="radio" value='.$row[0].'>'; 
$list .= "<tr>";
        $list.= "<td>".$row[0]."</td>"; 	
	$list.= "<td>".$row[1]."</td>";
	$list.= "<td>".$row[2]."</td>";
#	$list.= "<td>".$row[3]."</td>";
        $list.= "<td>".$row[4]."</td>";
	$list.= "<td>".$id."</td>";
	$list.= "</tr>";
            
 }
 
 $list .= "</table>";
mysqli_close($mysql); 
return $list;

}
function getAuthors($id) {
include ('connect.php');
$sql = "SELECT * FROM authors WHERE PubID = '$id' ";
$rs=mysqli_query( $mysql, $sql) or die("Cannot execute query 'authors' ");
while($row = mysqli_fetch_row( $rs) )
{  
	$auth .= $row[1].",";
if($row[3] == '1') { $auth .="(resident)"; }

}
return $auth;
 mysqli_close($mysql); 
}

?>