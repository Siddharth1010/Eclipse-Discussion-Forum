<?php


if (count($_POST)>0) 
{
include("connection.php");
$uid=$_POST['empid'];
$pid=$_POST['password'];

// $result=$conn->query("SELECT * FROM emp WHERE empid='$uid' and pass='$pid'");
// $row=$result->fetch_assoc();
// if ($row==0) {
// 	echo "Invalid inputs";
// }

$result=mysqli_query($conn,"SELECT * FROM emp WHERE empid='$uid' and pass='$pid'");
$count=mysqli_num_rows($result);
if($count==0)
{
	
	echo "<script>alert('Invalid Credentials') ;
	window.location.href='login.html';
	</script>";
	// header("Location: login.html");
}
else{
	session_start();
	$_SESSION['empid']=$uid;
	// $_SESSION['password']=$pid;
	header("Location: dashboard.php");
}



// function function_alert($msg) {
//     echo "<script type='text/javascript'>alert('$msg');</script>";
// }
}


?>