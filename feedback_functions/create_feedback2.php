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

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Create Feedback Form</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
	<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
	<![endif]-->

	<!-- JS -->
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script> 
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="validation/jquery.validate.js"></script>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
	<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="js/init.js"></script>

</head>

<body id="sign-up" >
	<!-- Container -->	
	<div id="container"><div id="container-inner">

		<h1>Create <br> Feedback Form</h1>
		<p class="log-in"><a href="view.php">Back to Homepage</a>.</p>
		<form id="portfolio" action="process_feedback.php" method="post" multipart/form-data> 
			<fieldset>
				<p class="introduction">Below, please enter the content for the questions you specified.</p>
	<fieldset>
	

<?php 
	for ($i = 0; $i < (int) $yes; $i++) {
			echo "<div><label for=\"yes".$i."\">What do you want your Yes/No question to say?</label>
			<textarea name = \"yes".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
	}
	
	for ($i = 0; $i < (int) $mult; $i++) {
			echo "<div><label for=\"mult".$i."\">What do you want your Multiple Choice question to say?</label>
			<textarea name = \"mult".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
			
			echo "<div><label for=\"mult_choices".$i."\">Please type your multiple choice options seperated by commas, as such: Option1,Option2...</label><textarea name = \"mult_choices".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
	}
	
	for ($i = 0; $i < (int) $short; $i++) {
			echo "<div><label for=\"short".$i."\">What do you want your Short Response question to say?</label>
			<textarea name = \"short".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
	}
	
	for ($i = 0; $i < (int) $long; $i++) {
			echo "<div><label for=\"long".$i."\">What do you want your Long Response question to say?</label>
			<textarea name = \"long".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
	}
	
	for ($i = 0; $i < (int) $drop; $i++) {
			echo "<div><label for=\"drop".$i."\">What do you want your Drop-Down question to say?</label>
			<textarea name = \"drop".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
			
			echo "<div><label for=\"drop_choices".$i."\">Please type your drop-down selection options seperated by commas, as such: Option1,Option2...</label><textarea name = \"drop_choices".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
	}
	
	for ($i = 0; $i < (int) $scroll; $i++) {
			echo "<div><label for=\"scroll".$i."\">What do you want your Scroll-Through question to say?</label>
			<textarea name = \"scroll".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
			
			echo "<div><label for=\"scroll_choices".$i."\">Please type your scroll-through options seperated by commas, as such: Option1,Option2...</label><textarea name = \"scroll_choices".$i."\" rows=\"2\" cols=\"20\"></textarea></div>";
	}
	
	echo "<input type=hidden name=\"yes\" value=".$yes." />";
	echo "<input type=hidden name=\"mult\" value=".$mult." />";
	echo "<input type=hidden name=\"short\" value=".$short." />";
	echo "<input type=hidden name=\"long\" value=".$long." />";
	echo "<input type=hidden name=\"drop\" value=".$drop." />";
	echo "<input type=hidden name=\"scroll\" value=".$scroll." />";
	echo "<input type=hidden name=\"title\" value=".$title." />";
	echo "<input type=hidden name=\"username\" value=".$username." />";
	echo "<input type=hidden name=\"pid\" value=".$pid." />";

 ?>

	</fieldset>
		
				<!-- Controls -->
				<!-- <div class="controls"> -->
<input style="border-radius: 25px; width: 90px; height: 30px; display: block; margin: 0 auto; background: white;" name="submit" type="submit" value="Submit" />
				<!-- </div> -->
			</fieldset>
	</form>
			
	</div></div>	<!-- /Container -->
	
</body>
</html>






