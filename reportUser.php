<?php session_start();
if (!$_SESSION["uname"]){
	header("location:login.php"); 
}else { 

include("connect.php");
$sql = "SELECT * FROM login";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>USER</title>
</head>

<body>
	<h2 style="text-align: center">USER</h2>
	<table align="center">
		<tr>
			<th>ชื่อสมาชิก</th>
			<th>รหัสผ่าน</th>
			<th>ลบสมาชิก</th>
		</tr>
		<?php 
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		?>
		<tr>
    		<td><?php echo $row["uname"]; ?></td>
			<td><?php echo $row["pass"]; ?></td>
			<td>
				<form action="p_delUser.php" method="post">
					<button type="submit" value="<?php echo $row["uname"]; ?>" name="user">DELETE</button>
				</form>
			</td>
  		</tr>
		<?php }
			} else {
    			echo "0 results";
		} ?>
	</table>
</body>
</html>
<?php $conn->close(); } ?>
