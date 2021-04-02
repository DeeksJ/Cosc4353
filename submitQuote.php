<?php
$servername = "sql203.epizy.com";
$username = "epiz_28288046";
$password = "wSejTvlnICy";
$db = "epiz_28288046_fuelQuotes";
$id = "123";
$postgalReq = filter_input(INPUT_POST, 'galReq');
$postdelAdd = filter_input(INPUT_POST, 'delAdd');
$postdate = filter_input(INPUT_POST, 'date');
$postsugPrice = filter_input(INPUT_POST, 'sugPrice');
$posttotal = filter_input(INPUT_POST, 'total');
submitQuote($id, $postgalReq, $postdelAdd, $postdate, $postsugPrice, $posttotal);
function submitQuote($id, $galReq, $delAdd, $date, $sugPrice, $total)
{
    if (is_numeric($galReq) && !empty($galReq)) {
        if (is_numeric($delAdd) && !empty($delAdd)) {
            if (!empty($date)) {
                if (is_numeric($sugPrice) && !empty($sugPrice)) {
                    if (is_numeric($total) && !empty($total)) {
                        $conn = new mysqli("sql203.epizy.com", "epiz_28288046", "wSejTvlnICy", "epiz_28288046_fuelQuotes");
                        $host = "sql203.epizy.com";
                                $dbusername = "epiz_28288046";
                                $dbpassword = "wSejTvlnICy";
                                $dbname = "epiz_28288046_fuelQuotes";

                                //Creating connection
                                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                                if(mysqli_connect_error()){
                                    die('Connect Error ('. mysqli_connect_error() .') '. mysqli_connect_error());
                                }
                                else{
                        $sql = "INSERT INTO fuelquotehistory (id, galReq, delAdd, date, pricePer, total) VALUES ('$id', '$galReq', '$delAdd','$date', '$sugPrice', '$total')";
                        if($conn->query($sql)){
                            echo "New record has been updated successfully";
                            return 1;
                        }
                        else{
                            echo "Error: ". $sql ."<br>". $conn->error;
                        }
                        $conn->close();
                    }
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
    } else {
        echo "galReq";
        return 1;
    }
}

?>
