<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="feedstyle.css">
</head>

<body onload="fScrollMove('qpanelscroll');">
<input type="hidden" id="hidScroll" name="a">
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
	<h1 style="margin-top: 50px;margin-left: 20px;font-family: 'Krona One', sans-serif;font-size: 2.5vw;font-weight: 1;display: inline-block;">Search Results</h1>

	<div class="qpanel" id="qpanelscroll" onscroll="fScroll(this);">
	<?php
	header("Cache-Control: no cache");
	// session_cache_limiter("private_no_expire");
	$word=$_POST['search2'];
	$sql="SELECT * FROM question WHERE quest LIKE '%$word%' ORDER BY qdate DESC";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
	while($row=mysqli_fetch_assoc($result)){
		$quesid=$row["qid"];
		$users=$row["user"];
		if($users!=$uid)
// 		{

// 	echo "<div id='div2'>"."<div id='qstyle'>"."Question ID: " ."<span id='getid'>".$quesid."</span>"
// 	."&nbsp;"
// 	."<br>Username: ". $row["user"]."<br>Question: ". $row["quest"]."<br>Date: ". $row["qdate"]."</div>".
// 	"<a id='astyle' href='mark.php?subject=$quesid'>"."Mark Question"."</a>".
// 	"<i class='fa fa-thumbs-up' id='likestyle'></i>".
// 	"<br>".
// 	"</div>";
// }
// else{

// 	echo "<div id='div2'>"."<div id='qstyle'>"."Question ID: " ."<span id='getid'>".$quesid."</span>"
// 	."&nbsp;"
// 	."<br>Username: ". $row["user"]."<br>Question: ". $row["quest"]."<br>Date: ". $row["qdate"].
// 	// "<a id='astyle' href='mark.php?subject=$quesid'>"."Mark Question"."</a>"."<i class='fa fa-thumbs-up' id='likestyle'></i>". 
// 	"<a id='astyle2' href='deleteqfromfeed.php?subject=$quesid'>"."&nbsp;x"."</a>".
// 	"<br>".
// 	" </div>"."</div>";

// }
// 	}
// }
{
	$sql1="SELECT * FROM likes WHERE userid='$uid' AND questionid='$quesid'";
	$result1=mysqli_query($conn,$sql1);
	if(mysqli_num_rows($result1)>0){
	while($row1=mysqli_fetch_assoc($result1)){
		$questionid=$row1["questionid"];
		if($questionid==$quesid){	

	$sql3="SELECT COUNT(*) as count FROM likes WHERE questionid='$quesid'";
	$result3=mysqli_query($conn,$sql3);
	$data=mysqli_fetch_assoc($result3);
	// "<a id='astyle' href='question.php?subject=$quesid'>".$row["qid"]."</a>"
echo "<div id='div2'>"."<div id='qstyle'>"."Question ID: " ."<span id='getid'>".$quesid."</span>"
."&nbsp;"
."<br>Username: ". $row["user"]."<br>Question: ". $row["quest"]."<br>Date: ". $row["qdate"].
"</div>".
"<a id='astyle' href='mark.php?subject=$quesid'>"."Mark Question"."</a>".
"<i class='fa fa-thumbs-up togglelikecolor' id='likestyle' ></i>"."<span id='nolikes'>"."Likes: ".$data['count']."</span>"
."<br>"."</div>";
		}

}
	}

else{
	$sql3="SELECT COUNT(*) as count FROM likes WHERE questionid='$quesid'";
	$result3=mysqli_query($conn,$sql3);
	$data=mysqli_fetch_assoc($result3);

		echo "<div id='div2'>"."<div id='qstyle'>"."Question ID: " ."<span id='getid'>".$quesid."</span>"
	."&nbsp;"
	."<br>Username: ". $row["user"]."<br>Question: ". $row["quest"]."<br>Date: ". $row["qdate"].
	"</div>".
	"<a id='astyle' href='mark.php?subject=$quesid'>"."Mark Question"."</a>".
	"<i class='fa fa-thumbs-up' id='likestyle' ></i>"."<span id='nolikes'>"."Likes: ".$data['count']."</span>"
	."<br>"."</div>";

	}
}
else{
$sql3="SELECT COUNT(*) as count FROM likes WHERE questionid='$quesid'";
$result3=mysqli_query($conn,$sql3);
$data=mysqli_fetch_assoc($result3);

echo "<div id='div2'>"."<div id='qstyle'>"."Question ID: " ."<span id='getid'>".$quesid."</span>"
."&nbsp;"
."<br>Username: ". $row["user"]."<br>Question: ". $row["quest"]."<br>Date: ". $row["qdate"]."<span id='nolikes'>"."Likes: ".$data['count']."</span>".
// "<a id='astyle' href='mark.php?subject=$quesid'>"."Mark Question"."</a>"."<i class='fa fa-thumbs-up' id='likestyle'></i>". 
"<a id='astyle2' href='deleteqfromfeed.php?subject=$quesid'>"."&nbsp;x"."</a>".
"<br>".
" </div>"."</div>";

}
}
}

	else{
	echo "<span id='qstyle'>"."No matches found"."</span>";

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
<script type="text/javascript">
	function disp1(){
		document.getElementById('form1').style.display="block";
	}

	function disp2(){
		document.getElementById('form1').style.display="none";
		document.getElementById('form2').style.display="block";
	}
	

	var likeButton = document.querySelectorAll("#likestyle");
	for(var item of likeButton)
	{
		item.addEventListener("click",function(){
			// this.classList.toggle("togglelikecolor");
			var x=this.parentElement.querySelector("#getid").textContent;
			//  window.location.href="like.php?subject="+x;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET", "like.php?subject="+ x, true);
            xmlhttp.send();
			window.setTimeout(function(){
				window.location.reload();
			
			}, 500);
			
			
		})
	}

	var jump=document.querySelectorAll("#qstyle");

	for(var i of jump){

		i.addEventListener("click",function(){

			var id=this.querySelector("#getid").textContent;
			console.log(id);
			window.location.href="question.php?subject="+id;

		})
	}

	var scrolval;

	function fScroll(val)
{
        var hidScroll = document.getElementById('hidScroll');
        hidScroll.value = val.scrollTop;
		scrolval=hidScroll.value;
		localStorage.setItem("someVarKey1", scrolval);
}

function fScrollMove(what)
{
        var hidScroll = document.getElementById('hidScroll');
		hidScroll.value = localStorage.getItem("someVarKey1");
        document.getElementById(what).scrollTop = hidScroll.value;
}

</script>
</body>
</html>