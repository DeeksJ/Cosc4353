<?php
	function registerUser($username,$password) {
	$host = 'localhost';
	$dbusername= 'root';
	$dbpassword = '';
	$dbname= 'accounts';
	
	$conn = new mysqli($host,$dbusername,$dbpassword,$dbname);
	
	if(!$conn){
		die("Connection Failed: ".mysqli_connect_error());
	}
	//$username = mysqli_real_escape_string($conn,$_POST['username']);
	//$password = mysqli_real_escape_string($conn,$_POST['password']);
	if(strlen($username)>15){
		echo "Username is too long. Maximum 15 characters.";
		return 1;
		die();
	} elseif (strlen($password)>15) {
		echo "Password is too long. Maximum 15 characters.";
		return 1;
		die();
	}else {
		$sql = "SELECT username FROM users WHERE username = '$username' LIMIT 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if(empty($row)){
			$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
			$conn->query($sql);	

			echo "Registration of user was successful";
			return 3;
			//header("location: login.html");
		} else {
			echo "Username already exists. Please enter new username.";
			return 2;
			}
	}
	$conn->close();
}
?>