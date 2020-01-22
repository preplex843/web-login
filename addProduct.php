<?php session_start();
if (!$_SESSION["uname"]){
	header("location:login.php"); 
}else { ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADD PRODUCT</title>
</head>
	
<body>
	<h1 style="text-align: center">ADD PRODUCT</h1>
	<form action="p_addProduct.php" method="post">
		NAME PRODUCT : <input type="text" name="name"> <br>
		AMOUNT : <input type="text" name="amount"> <br>
		<input type="submit" value="save">
	</form>
</body>
</html>
<?php } ?>