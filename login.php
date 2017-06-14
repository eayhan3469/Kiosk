<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$connection = mysqli_connect('localhost','root','root','kiosk');
		
		$data = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		
		
		if($result = mysqli_query($connection,$data))
			{
				while($row = mysqli_fetch_array($result))
				{
				$username2 = $row["username"];
				}
				 mysqli_free_result($result);
			}
		if (isset($username2)) {
			$result = mysqli_query($connection,$data);
			$row = mysqli_fetch_array($result);
			$id = $row["id"];
			session_start();
			$_SESSION['user_id'] = $id;
			echo "success";
		}
		else
		{
			echo "failed";
		}
	}

?>