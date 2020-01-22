<?php session_start();
if (!$_SESSION["uname"]){
	header("location:login.php"); 
}else { 

include("connect.php");
$id = $_POST["id"];
	
$sql = "SELECT * FROM stock WHERE id='".$id."'";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>EDIT PRODUCT</title>
</head>
<body>
	<h1 style="text-align: center">EDIT PRODUCT</h1>
	<?php 
	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
	?>
	<form action="p_editProduct.php" method="post">
		ID : <input type="text" name="id" value="<?php echo $row["id"]; ?>" readonly> <br>
		NAME : <input type="text" name="name" value="<?php echo $row["name"]; ?>"> <br>
		AMOUNT : <input type="text" name="amount" value="<?php echo $row["amount"]; ?>"> <br>
		<input type="submit" value="SAVE">
	</form>
	<?php }
	} else {
    	echo "0 results";
	} ?>
</body>
</html>
<?php $conn->close(); } ?>