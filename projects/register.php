<?php

$servername = "localhost";

$username = "root";

$password = "";

$dbname="LIBRARY";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
} catch (Exception $e) {
    die('Error: Could not connect: '. $e->getMessage());
}

if ($conn->connect_error) {
    die('Error: Connection failed: '. $conn->connect_error);
}

echo 'Connected successfully<br/>';

$stmt = $conn->prepare("INSERT INTO user (NAME, PASSWORD) VALUES(?,?)");

if ($stmt === false) {
    die('Error: Could not prepare statement: '. $conn->error);
}

$stmt->bind_param("ss", $u, $p);  

$u=$_POST["user"];

$p=$_POST["pass"];

if ($stmt->execute() === false) {
    die('Error: Could not execute statement: '. $stmt->error);
}

echo "Record inserted successfully";

$stmt->close();

$conn->close();

header("refresh: 3; url=home.html");
?>