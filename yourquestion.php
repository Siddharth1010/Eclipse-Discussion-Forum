<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="yqstyle.css">
</head>

<script type="text/javascript">
	function disp1(){
		document.getElementById('form1').style.display="block";
	}

	function disp2(){
		document.getElementById('form1').style.display="none";
		document.getElementById('form2').style.display="block";
	}

</script>
<body>
	<?php
	include("connection.php");
	?>
	<div class="header">
		<div class="hi">
	<h1 class="hi1">Hi, <?php session_start();
		$uid= $_SESSION['empid'];
		echo $_SESSION['empid'];  ?></h1>
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
	<h1 style="margin-top: 50px;margin-left: 20px;font-family: 'Krona One', sans-serif;font-size: 2.5vw;font-weight: 1;">Queries Raised</h1>

<div class="qpanel">
	<?php
	$sql="SELECT * FROM question WHERE user='$uid' ORDER BY qdate DESC";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		$quesid=$row["qid"];
		$sql3="SELECT COUNT(*) as count FROM likes WHERE questionid='$quesid'";
		$result3=mysqli_query($conn,$sql3);
		$data=mysqli_fetch_assoc($result3);
	echo "<div id='div2'>"."<div id='qstyle'>"."Question ID: " ."<span id='getid'>".$quesid."</span>"
	."&nbsp;"
	."<br>Username: ". $row["user"]."<br>Question: ". $row["quest"]."<br>Date: ". $row["qdate"]."<span id='nolikes'>"."Likes: ".$data['count']."</span>".
	"<a id='astyle2' href='deleteqfromyq.php?subject=$quesid'>"."&nbsp;x"."</a>".
	// '<button class="but" onclick="javascript:del("echo $row["qid"]")">'."DELETE"."</button>".
	"</div>"."</div>";
	}
}
	else{
	echo "<span id='qstyle'>"."You have not posted any questions"." I guess you're too smart ;)"."</span>";

}

	?>

</div>

<!-- <button onclick="javascript:disp1()" style="margin-left: 40%;">DELETE</button> -->
<!-- <button onclick="javascript:disp2()">ANSWERS VIEW</button> -->
<!-- <form method="post" action="ansview.php" id="form2">
	<input type="text" name="qid" required placeholder="Enter the question id" id="text2">
	<button type="submit" style="margin-left: 63%;">SUBMIT</button>
</form> -->

<!-- <form method="post" action="deleteq.php" id="form1">
	<input type="text" name="qid" required id="text1" placeholder="Enter the question id">
	<button type="submit" style="margin-left: 40%;">SUBMIT</button>
</form> -->

<script>

var jump=document.querySelectorAll("#div2");

	for(var i of jump){

		i.addEventListener("click",function(){

			var id=this.querySelector("#getid").textContent;
			console.log(id);
			window.location.href="question.php?subject="+id;

		})
	}
</script>

</body>
</html>