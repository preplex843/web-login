<?php session_start();
if (!$_SESSION["uname"]){
	header("location:login.php"); 
}else { 

include("connect.php");
$sql = "SELECT * FROM stock";
$result = $conn->query($sql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PRODUCT</title>
</head>
	<style>
		body, input{
			text-align: center;
		}
		table, td, th{
			border: 1px solid black;
		}
	</style>
<body>

	
	
	
	<!-- ตารางสินค้าและค้นหา -->
	<h2>PRODUCT</h2>
	FIND : <input type="text" id="myInput" onkeyup="myFunction()" placeholder="ค้นหาชื่อสินค้น ..." title="Type in a name">
	<table align="center" id="myTable">
  		<tr class="header">
			<th>ID</th>
    		<th>NAME</th>
    		<th>AMOUNT</th>
			<th colspan="3">MANU</th>
  		</tr>
		<?php 
		if ($result->num_rows > 0) {
    		while($row = $result->fetch_assoc()) {
		?>
  		<tr>
			<td><?php echo $row["id"]; ?></td>
    		<td><?php echo $row["name"]; ?></td>
			<td><?php echo $row["amount"]; ?></td>
			<td>
				<form action="editProduct.php" method="post">
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">EDIT</button>
				</form>
			</td>
			<td>
				<form action="p_delProduct.php" method="post">
					<button type="submit" name="id" value="<?php echo $row["id"]; ?>">DELETE</button>
				</form>
			</td>	
  		</tr>
		<?php }
			} else {
    			echo "0 results";
		} ?>
	</table>
	
	<!-- เงื่อนไขการค้นหา -->
	<script>
		function myFunction() {
  			var input, filter, table, tr, td, i, txtValue;
  			input = document.getElementById("myInput");
  			filter = input.value.toUpperCase();
  			table = document.getElementById("myTable");
  			tr = table.getElementsByTagName("tr");
  			for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
    			if (td) {
      				txtValue = td.textContent || td.innerText;
      				if (txtValue.toUpperCase().indexOf(filter) > -1) {
        				tr[i].style.display = "";
      				} else {
        				tr[i].style.display = "none";
      				}
    			}       
  			}
		}
	</script>
		<!-- ออกจากระบบ -->
	<br>
	<!-- เมนูรายการ -->
	<table align="center">
		<tr>
			<th>
				<form action="reportUser.php" method="post">
					<input type="submit" value="User">
				</form>
			</th>
			<th>
				<form action="addProduct.php" method="post">
					<input type="submit" value="ADD PRODUCT">
				</form>
			</th>
		</tr>
	</table>
	<br>
	<form action="logout.php" method="post"><input type="submit" value="logout"></form>
</body>
</html>
<?php $conn->close(); } ?>