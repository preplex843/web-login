<?php
include("connect.php");
$user = $_POST["user"];
$sql = "DELETE FROM login WHERE uname='".$user."'";

if ($conn->query($sql) === TRUE) {
    echo "successfully <br>";
			$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<a href='cart.php'>back</a>";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>
