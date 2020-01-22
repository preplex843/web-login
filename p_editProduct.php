<?php
include("connect.php");
$id = $_POST["id"];
$name = $_POST["name"];
$amount = $_POST["amount"];

$sql = "UPDATE stock SET name='".$name."', amount='".$amount."' WHERE id='".$id."' ";

if ($conn->query($sql) === TRUE) {
    echo "successfully <br>";
		$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<a href='cart.php'>back</a>";
} else {
    echo "Error updating record: " . $conn->error;
}
$conn->close();
?>
</body>
</html>