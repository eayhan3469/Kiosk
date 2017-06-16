<?php
	$nDate = $_POST["nDate"];
	$dDate = $_POST["dDate"];
	$notice = $_POST["notice"];
	

	echo $nDate;
$con = mysqli_connect('127.0.0.1','root','root');//your host, username and password 
	if(!con)
	{
		echo 'Not Connected To Server';
	}
	if(!mysqli_select_db($con,'kiosk'))//select your database name
	{
		echo 'Database not selected';
	}

	$sql_2 = "INSERT INTO notices (content,date,endDate)
	VALUES ('$notice','$nDate','$dDate')";
	if ($con->query($sql_2) == TRUE) {
    echo "Successful";
	header("refresh:2;url = home.php");
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}
?>