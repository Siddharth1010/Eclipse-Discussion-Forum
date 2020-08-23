?php
include("connection.php");
session_start();
$uid=$_SESSION['empid'];
$qid=$_SESSION['qid'];
$answer=$_POST['ans'];

$SQL="DELETE FROM answer WHERE ansid=$answer AND userid='$uid'";
$result=$conn->query($SQL);
if($result==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";

$conn ->close();

header("Location: question.php?subject=$qid")

?>