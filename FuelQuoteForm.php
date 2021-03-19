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
            color: rgb(78, 78, 78);
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
        .dis
        {
            background-color: rgb(165, 165, 165);
            color:rgb(0, 0, 0);
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

            };

        }
    </style>
</head>

<body>
    <div class="main-block">
        <h1>Fuel Quote Form</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "fuelquote";
        $conn = NEW MySQLi($servername, $username, $password,$db);
        if (!$conn) {
           die("Connection failed: " . mysqli_connect_error());
        }
        $id = "123";
        $profile = mysqli_query($db, "SELECT * FROM fuelquotehistory WHERE id = $id");
        $data = mysqli_fetch_array($profile);

        ?>
        <form method = "post" action="submitQuote.php"onload="getUser('<?php $id ?>')">
            <div class="info">
                <p>Gallons Requested</p>
                <input type="number" name="galReq" value="<?php echo $data['galReq']?>" required placeholder="Enter a number">
                <p>Delivery Address</p>
                <input type="text" name="delAdd" value="<?php echo $data['delAdd']?>" required placeholder="123 Main Street">
                <p>Delivery Date</p>
                <input type="date" name="date" value="<?php echo $data['date']?>" required placeholder="Please enter desired delivery date">
                <p>Suggested Price</p>
                <input type="number" class = "dis" name="sugPrice" value="<?php echo $data['sugPrice']?>" disabled placeholder="Here will be the Suggested Price">
                <p>Total Amount Due</p>
                <input type="number" class = "dis"name="total"value="<?php echo $data['total']?>"  placeholder="$2000" disabled>
            </div>
            <button href="/" class="button">Submit</button>
        </form>
    </div>
    
</body>

</html>