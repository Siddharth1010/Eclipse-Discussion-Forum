<?php
include("connection.php");
$uid=$_POST['empid'];
$nam=$_POST['nam'];
$email=$_POST['email'];
$pid=$_POST['password'];

  $crt = "CREATE TABLE $uid (
  markid int not null primary key)";
  // email VARCHAR(50)  PRIMARY KEY NOT NULL,
  // password VARCHAR(30) NOT NULL,
  // rpt VARCHAR(30) NOT NULL)";

  if ($conn->query($crt) === TRUE) {
      echo "Table MyGuests created successfully";
  } else {
      echo "Error creating table: " . $conn->error;
  }

$SQL="INSERT INTO emp (empid,name,email,pass) VALUES ('$uid','$nam','$email','$pid')";
$result=$conn->query($SQL);
if($result==0)
 echo "The data has not been entered";
 else
 echo "The data has been entered";

$conn ->close();

header("Location: login.html")

?>