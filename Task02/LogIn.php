<?php
$uname = $_POST['username'];
    $psw = $_POST['password'];
	
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
    
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "User_Authentication";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();



    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $uname);
    $stmt->execute();
    $stmt->bind_result($id, $hashed_password);
    $stmt->fetch();
    
    if (password_verify($psw, $hashed_password)) {
        $_SESSION['user_id'] = $id;
         echo "Login Successfully";
    } else {
        echo "Invalid username or password";
    }
    $conn->close();
}

