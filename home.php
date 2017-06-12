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
?>

<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="css/homePageStyle.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	</head>
	<body>
		<div id="logoDiv"><img src="rtalogo.png"></div><br>
		<div id="container">
			<div id="menuBar" class="tab">
				Welcome,&nbsp;<?php echo $first_name; ?>
					<br><br>
				<button class="tablinks" id="defaultOpen" onclick="openPage(event,'addUser')">Add User</button>
				<button class="tablinks" onclick="openPage(event,'addAnnouncement')">Add Announcements</button>
				<button class="tablinks" onclick="location.href='logout.php'">Logout</button>
			</div>
			<div id="contentBar">
				<div id="addUser" class="tabcontent">
					Add User
				</div>
				
				<div id="addAnnouncement" class="tabcontent">
					Add Announcement
				</div>
			</div>
		</div>
		<script>
			function openPage(evt,pageName) {
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
					for(i = 0; i < tabcontent.length; i++){
						tabcontent[i].style.display = "none";
					}
				tablinks = document.getElementsByClassName("tablinks");
				for(i = 0; i < tablinks.length; i++)
					{
						tablinks[i].className = tablinks[i].className.replace(" active","");
					}
				document.getElementById(pageName).style.display = "block";
				evt.currentTarget.className += " active";
			}
			document.getElementById("defaultOpen").click();
		</script>
		
	</body>
</html>