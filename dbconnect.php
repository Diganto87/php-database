<?php
function connect(){
	$conn = new mysqli("localhost","mmk","123","wtk");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
return $conn;
}


?>
