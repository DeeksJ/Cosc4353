<?php 
	//Creating Variables populated by the front end
	function loginUser($username,$password) {
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
		} elseif (strlen($password)>15) {
			echo "Password is too long. Maximum 15 characters.";
			return 2;
		}else {
		$sql = "SELECT username FROM users WHERE username = '$username' and password = '$password' LIMIT 1";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		if(empty($row)){
			echo "Username or Password not valid.";
			return 3;
			//header("location: login.html");
		} else {
			echo "Login was successful";
			return 4;
			//header("location: userHub.php");
		}
		$conn->close();
	}	//echo htmlentities($row['username']);
}
?>