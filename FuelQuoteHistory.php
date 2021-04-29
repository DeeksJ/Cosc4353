<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php


function testing($string)
{
    return $string;
}
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "epiz_28288046_fuelQuotes";
$conn = new MySQLi($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$id = $_SESSSION["username"];

?>

<head>
    <title>Fuel Quote History</title>

    <style>
        table {
            width: 80%;
            padding: 25px;
            margin-bottom: 20px;
            background: rgb(121, 155, 153);
        }

        html,
        body {
            height: 100%;
        }

        td {
            text-align: center;
        }

        h1 {

            font-weight: 400;
            font-size: 32px;
            text-align: center;
        }

        .main-block {
            justify-content: center;
            align-items: center;
            width: 100%;
            min-height: 100%;
            background-size: cover;
            display: flex;
            flex-direction: column;
        }

        body {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="main-block">
        <h1>Fuel Quote History</h1>
        <!--<table style="width:100%">
            <tr>
                <th>Gallons Requested</th>
                <th>Delivery Address</th>
                <th>Delivery Date</th>
                <th>Suggested Price per Gallon</th>
                <th>Total Amount Due</th>
            </tr>
            <tr>
                <td>50</td>
                <td>123 Main St</td>
                <td>4/10/2021</td>
                <td>$1.3</td>
                <td>$65</td>
            </tr>
            <tr>
                <td>44</td>
                <td>321 niaM St</td>
                <td>10/4/2021</td>
                <td>$2</td>
                <td>$88</td>
            </tr>
            <tr>
                <td>44</td>
                <td>321 niaM St</td>
                <td>10/4/2021</td>
                <td>$2</td>
                <td>$88</td>
            </tr>
            <tr>
                <td>44</td>
                <td>321 niaM St</td>
                <td>10/4/2021</td>
                <td>$2</td>
                <td>$88</td>
            </tr>
            <tr>
                <td>44</td>
                <td>321 niaM St</td>
                <td>10/4/2021</td>
                <td>$2</td>
                <td>$88</td>
            </tr>
            <tr>
                <td>44</td>
                <td>321 niaM St</td>
                <td>10/4/2021</td>
                <td>$2</td>
                <td>$88</td>
            </tr>
            <tr>
                <td>44</td>
                <td>321 niaM St</td>
                <td>10/4/2021</td>
                <td>$2</td>
                <td>$88</td>
            </tr>
        </table>
        --->
        <table style="width:100%">
            <tr>
                <th>Gallons Requested</th>
                <th>Delivery Address</th>
                <th>Delivery Date</th>
                <th>Suggested Price per Gallon</th>
                <th>Total Amount Due</th>
            </tr>
            <?php
            $query = $conn->query("SELECT * FROM fuelquotehistory WHERE id = '$id'");
            if (mysqli_num_rows($query) > 0) {
                while ($row = $query->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $row["galReq"]; ?></td>
                        <td><?php echo $row["delAdd"]; ?></td>
                        <td><?php echo $row["date"]; ?></td>
                        <td><?php echo $row["pricePer"]; ?></td>
                        <td><?php echo $row["total"]; ?></td>
                    </tr>

            <?php
                }
            }
            else
            {
                echo $_SESSION["rows"];
                echo "words";
            }
            ?>
        </table>
        <form method = "POST" action = "FuelQuoteForm.php">
	    <button type="submit">Fuel Quote</button><br>
    </form> 
    </div>
    
</body>

</html>
