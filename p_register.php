<?php
include("connect.php");
$user = $_POST["user"];
$pass = $_POST["pass"];

$sql = "INSERT INTO login (uname, pass)
VALUES ('".$user."', '".$pass."')";

if ($conn->query($sql) === TRUE) {
    echo "successfully <br>";
  	$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<a href='login.php'>back</a>"; 

} else {
    echo "มี user นี้แล้ว :" . $user . "<br>" ;
	echo "หรือ"	. $conn->error;
}
$conn->close();
?>