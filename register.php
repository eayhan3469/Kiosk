<?php
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$first_name = $_POST["first_name"];
	$second_name = $_POST["second_name"];
	$date = $_POST["date"];


	$con = mysqli_connect('127.0.0.1','root','root');//your host, username and password 
	if(!con)
	{
		echo 'Not Connected To Server';
	}
	if(!mysqli_select_db($con,'kiosk'))//select your database name
	{
		echo 'Database not selected';
	}
	$sql = "SELECT username FROM users WHERE username = '$username' OR email = '$email'";
	$result = $con ->query($sql);
	if($result ->num_rows > 0)
	{
		echo "Username or Email already exist!";
		header("refresh:2;url = home.php");
	}

	else{
$sql_2 = "INSERT INTO users (username,email,password,name,surname,registryDate)
	VALUES ('$username','$email','$password','$first_name','$second_name','$date')";
	if ($con->query($sql_2) == TRUE) {
    echo "Successful";
	header("refresh:2;url = home.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
}
?>