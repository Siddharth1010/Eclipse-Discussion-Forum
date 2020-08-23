<?php
include("connection.php");
if (count($_POST)>0)
{
	session_start();
	$uid=$_SESSION['empid'];
$qid=$_POST["qid"];
$sql="DELETE FROM question WHERE qid='$qid' AND user='$uid'";
$result=$conn->query($sql);
if($result==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";

$conn ->close();

 header("Location: yourquestion.php");

}


?>