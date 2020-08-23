<?php
include("connection.php");
session_start();
$uid=$_SESSION['empid'];
$qid=$_SESSION['qid'];
$answer=$_POST['reply'];

$SQL="INSERT INTO answer (quesid,ans,userid) VALUES ('$qid','$answer','$uid')";
$result=$conn->query($SQL);
if($result==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";

$SQL1="SELECT user FROM question WHERE qid=$qid";
// $resultone=$conn->query($SQL1);
$time_left = mysqli_query($conn,$SQL1);
// if($resultone==0)
if(mysqli_num_rows($time_left)==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";
$row=mysqli_fetch_assoc($time_left);
$user=$row["user"];
echo $user;

$SQL2="SELECT email FROM emp WHERE empid='$user'";
// $result2=$conn->query($SQL2);
// if($result2==0)
$time_left2 = mysqli_query($conn,$SQL2);
// if($resultone==0)
if(mysqli_num_rows($time_left2)==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";
$row2=mysqli_fetch_assoc($time_left2);
$mailid=$row2["email"];
echo $mailid;


$SQL3="SELECT quest FROM question WHERE qid=$qid";
// $resultone=$conn->query($SQL1);
$time_left3 = mysqli_query($conn,$SQL3);
// if($resultone==0)
if(mysqli_num_rows($time_left3)==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";
$row3=mysqli_fetch_assoc($time_left3);
$question=$row3["quest"];
echo $question;

if ($uid!=$user) {
	# code...
$msg=$uid." has replied to your question:\n".$question."\nKindly log in back to Eclipse to view your replies.";
$msg = wordwrap($msg,70);
echo $msg;
mail($mailid,"Eclipse Notification",$msg);
}

$conn ->close();

header("Location: question.php?subject=$qid")

?>
