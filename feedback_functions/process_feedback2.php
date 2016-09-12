<?php session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$username = $_POST['username'];
$pid = $_POST['pid'];
$title = $_POST['title'];
$yes = $_POST['yes'];
$mult = $_POST['mult'];
$short = $_POST['short'];
$long = $_POST['long'];
$drop = $_POST['drop'];
$scroll = $_POST['scroll'];

//put the name of the soon-to-be feedback table in the database column
include ('connect.php');
$sql = "UPDATE presentations SET feedback = '".$username."_".$pid.".php' WHERE (username = '".$username."' AND pid = '".$pid."') ";
$rs = mysqli_query( $mysql, $sql) or die($sql);
include('closedb.php');

//create new form feedback file
$newform = fopen($username."_".$pid.".php", "w") or die("Unable to create new file!");

//move file to feedback folder
rename($username."_".$pid.".php", "feedback/".$username."_".$pid.".php");

//write proper questions to file
//beginning of form
$txt = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Create Feedback Form</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="../css/screen.css" />
	<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" media="screen" href="../css/ie.css" />
	<![endif]-->

	<!-- JS -->
	<script type="text/javascript" src="../js/jquery-1.3.2.min.js"></script> 
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../validation/jquery.validate.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="../js/init.js"></script>

</head>

<body id="sign-up" >
	<!-- Container -->	
	<div id="container"><div id="container-inner">

		<h1>'.$title.'</h1>
		<p class="log-in"><a href="view.php">Go back to homepage</a>.</p>
		<form id="portfolio" action="process_'.$username.'_'.$pid.'.php" method="post" multipart/form-data>
			<fieldset>
				<p class="introduction">Below, please respond to the questions provided by '.$username.'.</p>
	<fieldset>';
fwrite($newform, $txt);

	//Audience ID
	$txt = '<div>
<label for="audience_id">Audience ID<abbr title="Required field">*</abbr></label>
<input type="text" name="audience_id" id="name_first" class="required" title="Please enter your audience ID" />
		</div>';
	fwrite($newform, $txt);

	//YES/NO
for ($i = 0; $i < (int) $yes; $i++) {
	$txt = '<!-- Yes/No '.$i.' -->
<div id="field-gender">
<label class="heading">'.$_POST['yes'.$i].'<abbr title="Required field">*</abbr></label>
	<ul class="required">
		<li><input type="radio" name="yes'.$i.'" id="gender" value="yes"/><label for="gender">Yes</label></li>
		<li><input type="radio" name="yes'.$i.'" id="gender" value="no" /><label for="gender">No</label></li>
	</ul>
</div>';
	
	
	fwrite($newform, $txt);
}

	//MULT
for ($i = 0; $i < (int) $mult; $i++) {
	$txt = "";
	$txt .= '<!-- Mult '.$i.' -->
<div>
<label class="heading">'.$_POST['mult'.$i].'<abbr title="Required field">*</abbr></label>';

$options = explode(",", $_POST['mult_choices'.$i]);
$length = count($options);

$txt .= '<ul class="required">';

for($j = 0; $j < $length; $j++) {
$txt .= '<li><input type="radio" name="mult_choices'.$i.'" id="gender" value="'.$options[$j].'"/><label for="gender">'.$options[$j].'</label></li>';
}

$txt .= '</ul></div>';
fwrite($newform, $txt);
}

	//SHORT
for ($i = 0; $i < (int) $short; $i++) {
	$txt = "";
	$txt .= '<!-- Short '.$i.' -->';
	$txt .= '<div><label for="short'.$i.'">'.$_POST['short'.$i].'<abbr title="Required field">*</abbr></label>
			<textarea id = "short'.$i.'" name = "short'.$i.'" rows="2" cols="20" class="required"></textarea></div>';
	fwrite($newform, $txt);
}

	//LONG
for ($i = 0; $i < (int) $long; $i++) {
	$txt = "";
	$txt .= '<!-- Long '.$i.' -->';
	$txt .= '<div><label for="long'.$i.'">'.$_POST['long'.$i].'<abbr title="Required field">*</abbr></label>
			<textarea id = "long'.$i.'" name = "long'.$i.'" rows="4" cols="20" class="required"></textarea></div>';
	fwrite($newform, $txt);
}

	//DROP
for ($i = 0; $i < (int) $drop; $i++) {
	$txt = "";
	$txt .= '<!-- DROP '.$i.' -->
<div>
<label for="drop'.$i.'">'.$_POST['drop'.$i].'<abbr title="Required field">*</abbr></label>
<select name="drop'.$i.'" id="drop'.$i.'" class="required"><option value=""></option>';

$options = explode(",", $_POST['drop_choices'.$i]);
$length = count($options);

for($j = 0; $j < $length; $j++) {
$txt .= '<option value="'.$options[$j].'">'.$options[$j].'</option>';
}

	$txt .= '</select></div>';
	fwrite($newform, $txt);
}

	//SCROLL
for ($i = 0; $i < (int) $scroll; $i++) {
	$txt = "";
	$txt .= '<!-- SCROLL '.$i.' -->
<div>
<label for="scroll'.$i.'">'.$_POST['scroll'.$i].'<abbr title="Required field">*</abbr></label>
<select multiple size = 4 name="scroll'.$i.'" id="scroll'.$i.'" class="required"><option value=""></option>';

$options = explode(",", $_POST['scroll_choices'.$i]);
$length = count($options);

for($j = 0; $j < $length; $j++) {
$txt .= '<option value="'.$options[$j].'">'.$options[$j].'</option>';
}

	$txt .= '</select></div>';
	fwrite($newform, $txt);
}


//ending of form 
$txt = '	</fieldset>
		
				<!-- Controls -->
				<div class="controls">
<input id="submit2" name="submit" type="submit" value="Submit Feedback" />
				</div>
			</fieldset>
	</form>
			
	</div></div>	<!-- /Container -->
	
</body>
</html>';
fwrite($newform, $txt);

fclose($newform);

					//table_username_pid
					
//create file that will display feedback in table format 
$display = fopen("table_".$username."_".$pid.".php", "w") or die("Unable to create new file!");

//move file to feedback folder
rename("table_".$username."_".$pid.".php", "feedback/table_".$username."_".$pid.".php");

//retrieve title of presentation 
include('connect.php');
$sql = "SELECT title FROM presentations WHERE (username = '".$username."' AND PID = '".$pid."') ";
$rs= mysqli_query( $mysql, $sql) or die("Cannot execute query");
while($row = mysqli_fetch_row($rs)) {$title2 = $row[0];}
include('closedb.php');
$txt = '';

//print file skeleton 
$txt .= '<html>
<head><title>Feedback Table</title>
<LINK REL=StyleSheet HREF="../Display/flyout_h.css" style type="text/css"> 

</style>
</head>
<body>

<h5>Feedback for "'.$title2.'"</h5>
<table width="100%" border="1" cellpadding="1">
<tr><td><Strong>Audience ID</td>';

for ($i = 0; $i < (int) $yes; $i++) {
	$txt .= '<td><Strong>'.$_POST['yes'.$i].'</td>';
}
for ($i = 0; $i < (int) $mult; $i++) {
	$txt .= '<td><Strong>'.$_POST['mult'.$i].'</td>';
}
for ($i = 0; $i < (int) $short; $i++) {
	$txt .= '<td><Strong>'.$_POST['short'.$i].'</td>';
}
for ($i = 0; $i < (int) $long; $i++) {
	$txt .= '<td><Strong>'.$_POST['long'.$i].'</td>';
}
for ($i = 0; $i < (int) $drop; $i++) {
	$txt .= '<td><Strong>'.$_POST['drop'.$i].'</td>';
}
for ($i = 0; $i < (int) $scroll; $i++) {
	$txt .= '<td><Strong>'.$_POST['scroll'.$i].'</td>';
}
$txt .= '</tr>';

$txt .= '</table></body></html>';

fwrite($display, $txt);
fclose($display);

					//process_username_pid
					
//create file that will record and save user feedback by writing to table_username_pid.php 
$process = fopen("process_".$username."_".$pid.".php", "w") or die("Unable to create new file!");

//move file to feedback folder
rename("process_".$username."_".$pid.".php", "feedback/process_".$username."_".$pid.".php");


//initialize
$txt = '<?php if($_SERVER["REQUEST_METHOD"] == "POST") {';

//open table file without truncating to 0 bytes
$txt .= '$table = fopen("table_'.$username.'_'.$pid.'.php"'.', "r+") or die("Unable to create new file!");';

//change file position to right before </table> tag
$txt .= 'fseek($table, -22, SEEK_END);';

//write out user responses to table
$txt .= '$txt2 = "";';
$txt .= '$txt2 .= "<tr><td width=>".$_POST[\'audience_id\']."</td>";'; 

for ($i = 0; $i < (int) $yes; $i++) {
	$txt .= '$txt2 .= "<td width=>".$_POST[\'yes'.$i.'\']."</td>";';
}
for ($i = 0; $i < (int) $mult; $i++) {
	$txt .= '$txt2 .= "<td width=>".$_POST[\'mult_choices'.$i.'\']."</td>";';
}
for ($i = 0; $i < (int) $short; $i++) {
	$txt .= '$txt2 .= "<td width=>".$_POST[\'short'.$i.'\']."</td>";';
}
for ($i = 0; $i < (int) $long; $i++) {
	$txt .= '$txt2 .= "<td width=>".$_POST[\'long'.$i.'\']."</td>";';
}
for ($i = 0; $i < (int) $drop; $i++) {
	$txt .= '$txt2 .= "<td width=>".$_POST[\'drop'.$i.'\']."</td>";';
}
for ($i = 0; $i < (int) $scroll; $i++) {
	$txt .= '$txt2 .= "<td width=>".$_POST[\'scroll'.$i.'\']."</td>";';
}


$txt .= '$txt2 .= "</tr></table></body></html>";';

$txt .= 'fwrite($table, $txt2); fclose($table); header("Location:../view.php"); } ?>';

//add newlines after each semicolon
$txt = str_replace(";",";\r\n",$txt);

fwrite($process, $txt);
fclose($process);
}

include('workbook2.php');
?>

