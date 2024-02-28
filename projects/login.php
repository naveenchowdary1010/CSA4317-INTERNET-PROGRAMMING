<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "LIBRARY";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die('Could not connect: ' . $conn->connect_error);
}

echo 'Connected successfully<br/>';

$u = $_POST["user"];
$p = $_POST["pass"];

$sql = "SELECT NAME, PASSWORD FROM user WHERE NAME = '$u'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row["NAME"] == $u && $row["PASSWORD"] == $p) {
      echo "You have been successfully validated";
    } else {
      echo "Credentials Wrong, Try again";
    }
  }
} else {
  echo "User name given was not exist";
}

$conn->close();

header("refresh:15; url=home.html;");
