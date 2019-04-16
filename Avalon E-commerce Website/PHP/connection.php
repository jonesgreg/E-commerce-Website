<?php
DEFINE('DB_USER','teamB');
DEFINE('DB_PASSWORD','Bxxdrb');
DEFINE('DB_HOST','ameenabdelhai.net');
DEFINE('DB_NAME','team_b_db');

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .mysqli_connect_error());



?>
