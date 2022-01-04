<?php
$servername = "localhost";
$username = "zinnfeut_pocket";
$password = "-Wtjv-9{UoSF";

// Create connection
$conn = new mysqli($servername, $username, $password,'zinnfeut_pockettutor');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>