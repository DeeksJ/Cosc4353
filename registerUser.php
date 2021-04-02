<?php	
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
	function registerUser($username,$password) {
	$host = 'localhost';
	$dbusername= 'root';
	$dbpassword = '';
	$dbname= 'accounts';
	
	$conn = new mysqli("sql203.epizy.com", "epiz_28288046", "wSejTvlnICy", "epiz_28288046_fuelQuotes");
	
	if(!$conn){
		die("Connection Failed: ".mysqli_connect_error());
	}
    

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
             $options = [
                'cost' => 12,
            ];
            $hash = password_hash($password, PASSWORD_BCRYPT, $options);
			$sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$hash')";
			$conn->query($sql);	
            $sql = "INSERT INTO `profiledata` (`username`, `name`, `address1`, `address2`, `city`, `state`, `zip`) VALUES ('$username', '', '', NULL, '', '', '')";
			$conn->query($sql);	
    
			echo "Registration of user was successful";
            header("location: login.html");
			return 3;
			
		} else {
			echo "Username already exists. Please enter new username.";
			return 2;
			}
	}
	$conn->close();
}

registerUser($username,$password);
?>