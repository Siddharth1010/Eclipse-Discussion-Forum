<?php
include("connection.php");
session_start();
$uid=$_SESSION['empid'];
$qid=$_GET["subject"];
$sql="SELECT * FROM likes WHERE userid='$uid' AND questionid=$qid";
$result=$conn->query($sql);
if(mysqli_num_rows($result)==1){

    $sql1="DELETE FROM likes WHERE userid='$uid' AND questionid=$qid";
    $result1=$conn->query($sql1);

}
else{
    $sql1="INSERT INTO likes VALUES ('$uid','$qid')";
    $result1=$conn->query($sql1);

}
// header("Location: feed.php")





?>