<?php
include("connection.php");
if (count($_POST)>0)
{
	session_start();
	$uid=$_SESSION['empid'];
$qid=$_POST["qid"];
$sql="DELETE FROM $uid WHERE markid='$qid'";
$result=$conn->query($sql);
if($result==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";

$conn ->close();

 header("Location: bookmark.php");

}


?>