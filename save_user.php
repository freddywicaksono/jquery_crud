<?php

$firstname = htmlspecialchars($_REQUEST['firstname']);
$lastname = htmlspecialchars($_REQUEST['lastname']);
$phone = htmlspecialchars($_REQUEST['phone']);
$email = htmlspecialchars($_REQUEST['email']);

include 'conn.php';

$sql = "insert into karyawan(firstname,lastname,phone,email) values('$firstname','$lastname','$phone','$email')";
$result = @mysqli_query($conn,$sql);
if ($result){
	echo json_encode(array(
		'id' => mysqli_insert_id($conn),
		'firstname' => $firstname,
		'lastname' => $lastname,
		'phone' => $phone,
		'email' => $email
	));
} else {
	echo json_encode(array('errorMsg'=>'Some errors occured.'));
}
?>