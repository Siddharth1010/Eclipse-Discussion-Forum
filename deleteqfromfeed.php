<?php
include("connection.php");

	session_start();
	$uid=$_SESSION['empid'];
$qid=$_GET["subject"];
$sql="DELETE FROM question WHERE qid='$qid' AND user='$uid'";
$result=$conn->query($sql);
if($result==0)
 echo "The data has not been entered";
 else
 {
 	header("Location:feed.php");
 echo "The data has been entered";
}
$conn ->close();

 header("Location:feed.php");



?>