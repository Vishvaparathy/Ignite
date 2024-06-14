<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
    $name = $_POST['name'];
    $uname = $_POST['username'];
    $psw = password_hash($_POST['password'], PASSWORD_BCRYPT);
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "User_Authentication";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



    $sql="INSERT INTO users (name, username, password) VALUES ('$name', '$uname', '$psw')";
    
    if($conn-> query ($sql)===TRUE){
		echo "New record created successfully";
	} else{
		echo "error:".$conn->error;
	}
	$conn->close();
}

?>