<?php
include("connection.php");
session_start();
$uid=$_SESSION['empid'];
$quest=$_POST['quest'];
date_default_timezone_set('Asia/Kolkata');
$qdate=date('Y-m-d');
// $qtime=date("h:i:sa");
// $qdate=date(Y-m-d);

 // $crt = "CREATE TABLE det2 (
 // email VARCHAR(50)  PRIMARY KEY NOT NULL,
 // password VARCHAR(30) NOT NULL,
 // rpt VARCHAR(30) NOT NULL)";

 // if ($conn->query($crt) === TRUE) {
 //     echo "Table MyGuests created successfully";
 // } else {
 //     echo "Error creating table: " . $conn->error;
 // }

$SQL="INSERT INTO question (user,quest) VALUES ('$uid','$quest')";
$result=$conn->query($SQL);
if($result==0)
	echo "<script>alert('Invalid Credentials') ;
	window.location.href='dashboard.php;
	</script>";
 // echo "The data has not been entered";
 else
 	echo "<script>alert('Your question has been posted') ;
	window.location.href='dashboard.php';
	</script>";
 // echo "The data has been entered";

$conn ->close();

header("Location: dashboard.php")

?>