<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Krona+One&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="dashstyle.css">
</head>
<body>
	<form action="qpost.php" method="post">
	<div class="header">
		<div class="hi">
	<h1 class="hi1">Hi, <?php session_start(); echo $_SESSION['empid'];  ?></h1>
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
<h1 style="margin-top: 50px;margin-left: 20px;font-family: 'Krona One', sans-serif;font-size: 2.5vw;font-weight: 1;">What's on your mind?</h1>

<div id="login-box">
	<!-- <input type="text" name="quest" placeholder="Post a question"> -->
	<textarea  placeholder="Post a question" required  name="quest"></textarea>
</div>
<center>
	<button type="submit">Post</button>
</center>

</form>
</body>
</html>