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
			<div id="menuBar">
				Welcome,<?php echo $first_name; ?>
				<?php echo $last_name; ?><br><br>
				<button>Add User</button>
				<button>Add Announcements</button>
				<button></button><a href="logout.php">Logout</a>
				<button>Add User</button>
			</div>
			<div id="contentBar">
			</div>
		</div>
		
	</body>
</html>