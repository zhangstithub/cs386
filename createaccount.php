<?php

$id = $_GET["id"]; 
echo $id;

$password = $_GET["password"];
echo $password;
echo "<br>";
// generate a random salt to use for this account
$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
echo $salt."<br>";
$saltedPW =  $password . $salt;
$hashedPW = hash('sha256', $saltedPW);
echo $hashedPW;
$query = "insert into account(id, password, salt) values ('$id', '$hashedPW', '$salt'); ";
$servername = "localhost";
$username = "sz";
$password = "700511";
$dbname = "sz";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn->query($query) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
