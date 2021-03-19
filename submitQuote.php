<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "fuelquote";
$conn = new MySQLi($servername, $username, $password, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = "123";
$postgalReq = filter_input(INPUT_POST, 'galReq');
$postdelAdd = filter_input(INPUT_POST, 'delAdd');
$postdate = filter_input(INPUT_POST, 'date');
$postsugPrice = filter_input(INPUT_POST, 'sugPrice');
$posttotal = filter_input(INPUT_POST, 'total');
function submitQuote($id, $galReq, $delAdd,$date, $sugPrice, $total)
{
    if (is_numeric($galReq) && !empty($galReq)) {
        if (is_numeric($delAdd) && !empty($delAdd)) {
            if (!empty($date)) {
                if (is_numeric($sugPrice) && !empty($sugPrice)) {
                    if (is_numeric($total) && !empty($total)) {
                        $sql = "INSERT INTO 'fuelquotehistory' ('id', 'galReq', 'delAdd', 'date', 'pricePer', 'total') VALUES ('$id', '$galReq', '$delAdd','$date', '$sugPrice', '$total')";
                        echo '<script>';
                        echo 'alert("' . $sql . '\nInsert Complete")';
                        echo '</script>';
                        return 0;
                    } else {
                        echo "total";
                        
                        return 1;
                    }
                } else {
                    echo "sugPrice";
                    return 1;
                }
            } else {
                echo "date";
                
                return 1;
            }
        } else {
            echo "delAdd";
            
            return 1;
        }
    } 
    else 
    {
        echo "galReq";
        return 1;
    }
}
mysqli_close($conn);
