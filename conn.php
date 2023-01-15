<?php

$conn = @mysqli_connect('localhost','root','','jqueryui');
if (!$conn) {
	die('Could not connect: ' . mysqli_error($conn));
}


?>