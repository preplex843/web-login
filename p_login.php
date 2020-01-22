<?php 
session_start();
if(isset($_POST["user"])){
	
	include("connect.php");

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $sql="SELECT * FROM login WHERE uname='".$user."' and pass='".$pass."'";
    $result = $conn->query($sql);

	if ($result->num_rows > 0) {
    	while($row = $result->fetch_assoc()) {
			$_SESSION["uname"] = $row["uname"];
            $_SESSION["pass"] = $row["pass"];
			
			if($_SESSION["uname"]==$user && $_SESSION["pass"]==$pass){ 
                header("location:cart.php");
            } else {
				header("location:login.php");
			}
		}
	} else {
		header("location:login.php");
    }
}                 
?>