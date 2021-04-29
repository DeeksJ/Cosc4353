<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Fuel Quote Form</title>

    <style>
        html,
        body {
            height: 100%;
        }

        body,
        input,
        select {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
            color: rgb(145, 145, 145);
        }

        h1,
        h3 {
            font-weight: 400;
        }

        h1 {
            font-size: 32px;
        }

        h3 {
            color: #1c87c9;
        }

        .main-block,
        .info {
            display: flex;
            flex-direction: column;
        }

        .main-block {
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100%;
            background: url("/uploads/media/default/0001/01/e7a97bd9b2d25886cc7b9115de83b6b28b73b90b.jpeg") no-repeat center;
            background-size: cover;
        }

        form {
            width: 80%;
            padding: 25px;
            margin-bottom: 20px;
            background: rgb(121, 155, 153);
        }

        input,
        select {
            padding: 10px;
            margin-bottom: 30px;
            background: rgb(255, 255, 255);
            border: 1px rgb(0, 0, 0);

        }

        input::placeholder {
            color: rgb(0, 0, 0);
        }

        option {
            background: black;
            border: none;
        }

        input[type=radio] {
            display: none;
        }


        button {
            display: block;
            width: 200px;
            padding: 10px;
            margin: 20px auto 0;
            border: none;
            border-radius: 5px;
            background: #1c87c9;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        button:hover {
            background: #095484;
        }

        .dis {
            background-color: rgb(165, 165, 165);
            color: rgb(0, 0, 0);
        }

        @media (min-width: 568px) {
            .info {
                justify-content: space-between;
            }

            input {
                width: 30%;
                margin-left: 33%;
            }

            input.fname {
                width: 100%;
            }

            select {
                width: 30%;
                margin-left: 200px;
            }

            p {
                color: black;
                margin-left: 33%;

            }

            ;

        }
    </style>
</head>

<body>
    <div class="main-block">
        <h1>Fuel Quote Form</h1>
         <form method = "POST" action = "profile.php">
	        <button type="submit">Profile Management</button><br>
        </form>
        <?php
        $servername = "127.0.0.1";
        $username = "root";
        $password = "";
        $db = "epiz_28288046_fuelQuotes";
        $conn = new MySQLi($servername, $username, $password, $db);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            echo "Failed to connect";
        }
        
        $id = $_SESSION["username"];
        echo $id;
        $result =  $conn->query("SELECT * FROM profiledata WHERE username = '$id'");
        $data = $result->fetch_assoc();
        $_SESSION["state"] = $data["state"];
        global $pricePerGallon;
        global $totalCost;
        global $gallons;
        $gallons = 0;

        if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['getQuote'])){
            getPrice();
            $gallons = $_POST['galReq'];
            $_SESSION["galsReq"] =$_POST['galReq'];
            echo $_SESSION["galsReq"];
        }
        $query = $conn->query("select * from fuelquotehistory where id = '$id'");
        $_SESSION["rows"] = mysqli_num_rows($query);
        //echo $_SESSION["rows"];
        function getPrice() {
            if($_SESSION["state"] == "TX")
            {
                $_SESSION["locFac"] = .02; 
            }
            else
            {
                    $_SESSION["locFac"] = .04;
            }
            if ($_SESSION["rows"]==0)
            {
                $_SESSION["rateHist"] = 0;
            }
            else
            {
                $_SESSION["rateHist"] = .01;
            }
            if($_SESSION["galsReq"] > 1000)
            {
                $_SESSION["galReqFac"] = .02;
            }
            else{
                $_SESSION["galReqFac"] = .03;
            }
            include 'pricingModule.php';

            $pricePerGallon = $_SESSION["ppg"];
            $totalCost = $_SESSION["total"];
            sleep(5);
            header("Refresh:0");
        }
        function runMyFunction() {
            header("Location: http://www.http://www.fuelquote.epizy.com/FuelQuoteHistory.php");
        }

        if (isset($_GET['hello'])) {
             runMyFunction();
        }
        ?>
        <form method="post" action="submitQuote.php" onload="getUser('<?php $id ?>')">
            <div class="info">
                <p>Gallons Requested</p>
                <input type="number" name="galReq" value="" required placeholder="Enter a number">
                <p>Delivery Address</p>
                <input type="text" name="delAdd"  value="<?php echo $data["address1"]?>" required>
                <p>Delivery Date</p>
                <input type="date" name="date" value="<?php echo $data["date"] ?>" required placeholder="Please enter desired delivery date">
                <p>Suggested Price</p>
                <input type="number" class="dis" name="sugPrice" readonly value="<?php echo $_SESSION["ppg"] ?>"  placeholder="Here will be the Suggested Price">
                <p>Total Amount Due</p>
                <input type="number" class="dis" name="total" readonly value="<?php echo $_SESSION["total"] ?>" placeholder="Price will go here" >
            </div>
            <input type="submit" name="submit" value="Submit"/>
            <button type="submit" name="getQuote" formaction="FuelQuoteForm.php">Get Quote</button>
        </form>
        <form method = "POST" action = "FuelQuoteHistory.php">
	        <button type="submit">Fuel Quote History</button><br>
        </form>
        </div>
</body>

</html>
