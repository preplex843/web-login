<?php
include("connect.php");
$name = $_POST["name"];
$amount = $_POST["amount"];

$sql = "INSERT INTO stock (name, amount)
VALUES ('".$name."', '".$amount."')";

if ($conn->query($sql) === TRUE) {
    echo "successfully <br>";
	$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<a href='cart.php'>back</a>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>