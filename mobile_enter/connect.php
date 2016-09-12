<?php
$mysql = mysqli_connect( 'localhost', 'airwayed_tp', 'openatonce' );
if(!$mysql) { echo 'Cannot connect to database.'; exit; }
$selected = mysqli_select_db($mysql, 'airwayed_TP');
if(!$selected) { echo 'Cannot select database.'; exit; }
?>