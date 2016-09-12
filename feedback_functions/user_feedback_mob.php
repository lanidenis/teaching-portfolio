<?php session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$username = $_POST['user'];
$pid = $_POST['pid'];

header("Location: feedback/".$username."_".$pid.".php");
die("Location: feedback/".$username."_".$pid.".php");
}
?>

	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<title>Fancy Form Design: Feedback</title>
	
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/screen_mob.css" />
	<!--[if lte IE 8]>
	<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css" />
	<![endif]-->

	<!-- JS -->
	<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.validate.pack.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
	
</head>
<body id="feedback">
	<!-- Container -->	
	<div id="container"><div id="container-inner">
		<h1>Lets Get Started!</h1>
		<p class="log-in" style="background: #eaeaea; margin: 0; line-height: 1; padding: 10px 12px; position: absolute; right: 20px; top: 30px;"><a href="index.html" style="font-weight: bold;">Go back to homepage</a>.</p>
		<form action="user_feedback_mob.php" method="post" multipart/form-data>
			<fieldset>
				<p class="introduction">Please enter the username and ID provided by your presentor to access the correct form.</p>
				<!-- Your Name -->
				<div>
					<label for="name">Presentor Username <abbr title="Required field">*</abbr></label>
					<input type="text" name="user" id="name" />
				</div>
				
				<!-- Email -->
				<div>
					<label for="email">Presentation ID (pid) <abbr title="Required field">*</abbr></label>
					<input type="text" name="pid" id="email" />
				</div>
				
				<!-- Controls -->
				<div class="controls">
					<input name="submit" type="submit" value="Submit" />
				</div>
			</fieldset>
		</form>
			
	</div></div>	<!-- /Container -->
	
</body>
</html>

