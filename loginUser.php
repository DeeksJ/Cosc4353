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
            //header("location: login.html");
			return 1;
		} elseif (strlen($password)>15) {
			echo "Password is too long. Maximum 15 characters.";
            //header("location: login.html");
			return 2;
		}else {
            $options = [
                'cost' => 12,
            ];
        $hash = password_hash($password, PASSWORD_BCRYPT, $options);
        //$hash = password_hash($password, PASSWORD_DEFAULT);
        //$hash = "$2y$10$Ze3PffUPwKS989NBpHJFQ.PkM5M5YKAOvsLeK0YHb.v";
          echo "Generated hash: ".$hash;

        $sql = "SELECT password FROM users WHERE username = '$username'";
		$result = $conn->query($sql);
        //echo $result;

        $verify = password_verify($password, $hash);

        if ($verify) {
            echo 'Password Verified! Login Successful.';
            session_start();
            $_SESSION["username"] = $username;
            header("location: userHub.php");
			return 4;
        } else {
            echo 'Incorrect Password!';
            return 3;
        }
		$conn->close();
	}	
}
loginUser($username,$password);
?>