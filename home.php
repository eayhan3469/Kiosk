<?php

	session_start();
	if(isset($_SESSION['user_id'])){
		
		$user_id = $_SESSION['user_id'];
		$connection = mysqli_connect('localhost','root','root','kiosk');
		$data = mysqli_query($connection, "SELECT * FROM users WHERE id = '$user_id'");
		
		$row_cnt = mysqli_num_rows($data);
		
		if($row_cnt == 1){
			$row = mysqli_fetch_array($data);
			$first_name = $row['name'];
			$last_name = $row['surname'];
		}
		else
		{
			session_destroy();
			header("Location: Index.php");
			exit;
		}
	}
	else{
		session_destroy();
			header("Location: Index.php");
			exit;
	}
?>
	<html>

	<head>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>HOME</title>
		<link rel="stylesheet" href="css/homePageStyle.css">
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	</head>

	<body>
		<div id="logoDiv"><img src="rtalogo.png"></div>
		<br>
		<div id="container">
			<div id="menuBar" class="tab">
				<p>Welcome,&nbsp;
					<?php echo $first_name; ?>
				</p><img src="line.png">
				<br>
				<br>
				<button class="tablinks" id="defaultOpen" onclick="openPage(event,'addUser')">Add User</button>
				<button class="tablinks" onclick="openPage(event,'addAnnouncement')">Add Announcements</button>
				<button class="tablinks" onclick="location.href='logout.php'">Logout</button>
			</div>
			<div id="contentBar">
				<div id="addUser" class="tabcontent">
					<h2>REGISTER FORM</h2>
					<div id="line"><img src="line2.png"></div>
					<form method="post" action="register.php">
						<div class="group">
							<input type="text" name="username" id="username" required> <span class="highlight"></span> <span class="bar"></span>
							<label>Username</label>
						</div>
						<div class="group">
							<input type="password" name="password" id="password" required> <span class="highlight"></span> <span class="bar"></span>
							<label>Password</label>
						</div>
						<div class="group">
							<input type="email" name="email" id="email" required> <span class="highlight"></span> <span class="bar"></span>
							<label>Email</label>
						</div>
						<div class="group">
							<input type="text" name="first_name" id="first_name" required> <span class="highlight"></span> <span class="bar"></span>
							<label>First Name</label>
						</div>
						<div class="group">
							<input type="text" name="second_name" id="second_name" required> <span class="highlight"></span> <span class="bar"></span>
							<label>Second Name</label>
						</div>
						<input type="hidden" id="date" name="date">
						<button type="submit" id="register_btn" class="button buttonBlue">Enter
							<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
						</button>
					</form>
				</div>
				<div id="addAnnouncement" class="tabcontent">
					<h2>Add Notice</h2>
					<div id="line"><img src="line2.png"></div>
					<form method="post" action="addNotice.php">
						<div class="group">
							<input id="nDate" name= "nDate" type="date" /> <span class="highlight"></span> <span class="bar"></span>
							<label>Notice Date</label>
						</div>
						<div class="group">
							<textarea name="notice"></textarea> <span class="highlight"></span> <span class="bar"></span>
							<label>Notice</label>
						</div>
						<button type="submit" id="register_btn" class="button buttonBlue">Enter
							<div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
						</button>
					</form>
				</div>
			</div>
		</div>
		<script>
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth() + 1; //January is 0!
			var yyyy = today.getFullYear();
			if (dd < 10) {
				dd = '0' + dd;
			}
			if (mm < 10) {
				mm = '0' + mm;
			}
			var today = yyyy + '-' + mm + '-' + dd;
			document.getElementById("date").value = today;
		</script>
		
		<script>
			function openPage(evt, pageName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) {
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) {
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(pageName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			document.getElementById("defaultOpen").click();
		</script>
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<script src="js/script.js"></script>
		<script src="js/ui.js"></script>
		<script src="js/loginPanel.js"></script>
	</body>

	</html>