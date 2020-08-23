<?php
include("connection.php");
session_start();
$uid=$_SESSION['empid'];
$qid=$_GET['subject'];
$SQL="INSERT INTO $uid VALUES ('$qid')";
$result=$conn->query($SQL);
if($result==0)
 echo "The data has not been entered";
 else
 {
 	echo "<script>alert('Question has been marked') ;
	window.location.href='feed.php';
	</script>";
}
 // echo "The data has been entered";

$conn ->close();

header("Location: feed.php")

?>