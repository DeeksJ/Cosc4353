<?php 
	//Creating Variables populated by the front end
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
	function loginUser($username,$password) {
		$conn = new mysqli("sql203.epizy.com", "epiz_28288046", "wSejTvlnICy", "epiz_28288046_fuelQuotes");
		
		if(!$conn){
			die("Connection Failed: ".mysqli_connect_error());
		}
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
			header("location: login.html");
		} else {
			echo "Login was successful";
            session_start();
            $_SESSION["username"] = $username;
            header("location: userHub.php");
			return 4;
		}
		$conn->close();
	}	
}
loginUser($username,$password);
?>