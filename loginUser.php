<?php 
	//Creating Variables populated by the front end
    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');
	function loginUser($username,$password) {
		$conn = new mysqli("127.0.0.1", "root", "", "epiz_28288046_fuelQuotes");
		
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

        $sql = "SELECT * FROM users where username = '$username'";
        $result = $conn->query($sql);
        if(mysqli_num_rows($result)<1){
            echo 'Username does not exists';
            return 1;
        }
        $hash = password_hash($password, PASSWORD_BCRYPT);
        //$hash = password_hash($password, PASSWORD_DEFAULT);
        //$hash = "$2y$10$Ze3PffUPwKS989NBpHJFQ.PkM5M5YKAOvsLeK0YHb.v";
        #echo "Generated hash: ".$hash;

        $sql = "SELECT password FROM users WHERE username = '$username'";
		$result = $conn->query($sql);
        //echo $result;
        if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $tester = $row["password"];
        }
        $verify = password_verify($password, $tester);
        
        

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
