<?php
$db_host = 'localhost'; //hostname
$db_user = 'root'; // username
$db_password = ""; // password
$db_name = 'techangel'; //database name
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
$date = date('Y-m-d', strtotime($_POST['date']));
$name = $_POST['name'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$created_at = date("Y-m-d H:i:s");
//Insert query
$sqlinsert = "INSERT INTO contacts(date,name,email,mobile,created_at) VALUES('$date','$name','$email','$phonenumber',NOW())";
if (mysqli_query($conn, $sqlinsert)) {
	//Success block
	echo json_encode(array('status' => 1, 'message' => 'Thank you for contacting us. We will get back to you very soon'));
	die;
} else {
	//Failure block
	echo json_encode(array('status' => 0, 'message' => "Error creating table: " . mysqli_error($conn)));
	die;
}
