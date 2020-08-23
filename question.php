<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="questionstyle.css">
</head>

<script type="text/javascript">
	function disp1(){
		// document.getElementById('form2').style.display="none";
		document.getElementById('form1').style.display="block";
	}

	function disp2(){
		document.getElementById('form1').style.display="none";
		document.getElementById('form2').style.display="block";
	}

</script>
<?php
session_start();
$uid= $_SESSION['empid'];
$ques=$_GET['subject'];
$_SESSION['qid']=$ques;
include("connection.php");
$sql="SELECT quest FROM question WHERE qid='$ques'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
		$item=$row["quest"];
	// $item=mysqli_fetch_assoc($result);
		}}
?>
<body>
	<?php
	include("connection.php");
	?>
	<div class="header">
		<div class="hi">
	<h1 class="hi1">Hi, <?php 
				echo $uid;  ?></h1>
	<h1 class="hi2" > DASHBOARD</h1>
	<div class="dropdown">
	<i class="fa fa-bars active" id="hi3"></i>
	<div class="dropdown-content">
		
			<a href="dashboard.php">Raise Query</a>
			<a href="feed.php">Feed</a>
			<a href="yourquestion.php">Your Questions</a>
			<a href="bookmark.php">Bookmarks</a>
			<a href="login.html">Logout</a>
		

	</div>
</div>
</div>
	</div>
	<h1 style="margin-top: 50px;margin-left: 20px;font-family: 'Krona One', 
	sans-serif;font-size: 2.5vw;font-weight: 1;word-wrap:break-word;"> <?php echo $item.":";
		?></h1>

<div class="qpanel">
	<?php
	$sql="SELECT * FROM answer WHERE quesid='$ques' ORDER BY adate ASC";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		$quesid=$row["quesid"];
		$users=$row["userid"];
		$answer=$row["ansid"];
		if($users!=$uid)
		{
		// $quesid=$row["qid"];
	echo "<div id='div2'>"."<div id='qstyle'>"."Answer ID: " .
	// "<a href='question.php?subject=$quesid'>"
	 $row["ansid"].
	// "</a>"
	"<br>Username: ". $row["userid"]."<br>Answer: ". $row["ans"]."<br>Date: ". $row["adate"]."<br>".
	" </div>"."</div>";
}
	else{

		echo "<div id='div2'>"."<div id='qstyle'>"."Answer ID: " .
	// "<a href='question.php?subject=$quesid'>"
	 $row["ansid"].
	// "</a>"
	"<br>Username: ". $row["userid"]."<br>Answer: ". $row["ans"]."<br>Date: ". $row["adate"].
	"<a id='astyle2' href='deletereply.php?subject=$quesid&web=$answer'>"."&nbsp;x"."</a>".
	" </div>"."</div>";
	}
	}
}
	else{
	echo "<span id='qstyle'>"."Sorry, there are no answers posted to this question"."</span>";

}

	?>

</div>

<button onclick="javascript:disp1()" style="margin-left: 40%; display: inline-block;">REPLY</button>
<!-- <button onclick="javascript:disp2()" style="margin-left: 25%; display: inline-block;">DELETE REPLY</button> -->
<br>
<form method="post" action="reply.php" id="form1">
	<textarea name="reply" required placeholder="Enter your reply"></textarea>
	<br>
	<!-- <input type="text" name="qid" required placeholder="Enter your reply" id="text2" style="margin-left: 40%;"> -->
	<button type="submit" id="sub">SUBMIT</button>
</form>

<!-- <form method="post" action="deletereply.php" id="form2">
	<textarea name="ans" required placeholder="Enter the answer id"></textarea>
	<br>
	<input type="text" name="qid" required placeholder="Enter your reply" id="text2" style="margin-left: 40%;">
	<button type="submit" id="sub">SUBMIT</button>

</form> -->
</body>
</html>