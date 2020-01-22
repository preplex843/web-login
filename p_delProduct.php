<?php
include("connect.php");
$id = $_POST["id"];

$sql = "DELETE FROM stock WHERE id='".$id."'";

if ($conn->query($sql) === TRUE) {
    echo "successfully <br>";
	$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<a href='cart.php'>back</a>"; 
} else {
    echo "Error : " . $conn->error;
}
$conn->close();
?>
