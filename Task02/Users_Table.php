<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";

$conn=new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
	die("connection failed:".$conn-> connect_error);
}

$sql= "CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    address VARCHAR(255),
    email VARCHAR(100),
    bill_number VARCHAR(50),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'users' created successfully";
} else {
    echo "Error creating table: " . $conn->error ;
}



$conn->close();
?>
