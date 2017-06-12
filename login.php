<?php
	if(isset($_POST['username']) && isset($_POST['password'])){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$connection = mysqli_connect('localhost','root','root','kiosk');
		
		$data = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		
		
		if($result = mysqli_query($con,$data))
			{
				while($row = mysqli_fetch_array($result))
				{
				$username = $row["userName"];
				}
				 mysqli_free_result($result);
			}
		if (isset($username)) {
			$row = mysqli_fetch_array($data);
			$id = $row['id'];
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