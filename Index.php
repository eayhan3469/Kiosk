<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Admin Login Panel</title>
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Overpass:100,200,300,400,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Exo+2:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext" rel="stylesheet">
</head>

<body>
	<div class="result"></div>
	<div id="logo"><img src="rtalogo.png"></div>
	<form method="post">
		<div class="group">
			<input type="text" name="username" id="username" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Username</label>
		</div>
		<div class="group">
			<input type="password" name="password" id="password" required>
			<span class="highlight"></span>
			<span class="bar"></span>
			<label>Password</label>
		</div>
		<button type="button" id="login_btn" class="button buttonBlue">Enter
			<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
		</button>
		<span id="login_message"></span>
	</form>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<script src="js/script.js"></script>
	<script src="js/loginPanel.js"></script>
</body>

</html>