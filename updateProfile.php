<?php

//Creating variables with form data
$postUsername = filter_input(INPUT_POST, 'username');
$postName = filter_input(INPUT_POST, 'name');
$postAddress1 = filter_input(INPUT_POST, 'address1');
$postAddress2 = filter_input(INPUT_POST, 'address2');
$postCity = filter_input(INPUT_POST, 'city');
$postState = filter_input(INPUT_POST, 'state');
$postZip = filter_input(INPUT_POST, 'zip');

function updateProfile($username, $name, $address1, $address2, $city, $state, $zip)
{
    if(!empty($username)){
        if(!empty($name) and strlen($name) <= 50){
        if(!empty($address1) and strlen($address1) <= 100){
                if(strlen($address2) <= 100){
                    if(!empty($city) and strlen($city) <= 100){
                        if(!empty($state) and strlen($state) == 2){
                        if(!empty($zip) and (strlen($zip) >= 5 and strlen($zip) <= 9)){
                                $host = "localhost";
                                $dbusername = "root";
                                $dbpassword = "";
                                $dbname = "profiletest";

                                //Creating connection
                                $conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

                                if(mysqli_connect_error()){
                                    die('Connect Error ('. mysqli_connect_error() .') '. mysqli_connect_error());
                                }
                                else{
                                    //Update Values
                                    $sql = "UPDATE customers SET name='$name', address1='$address1', address2='$address2', city='$city', state='$state', zip='$zip' WHERE username='$username'";
                                    if($conn->query($sql)){
                                        echo "New record has been updated successfully";
                                        return 1;
                                    }
                                    else{
                                        echo "Error: ". $sql ."<br>". $conn->error;
                                    }
                                    $conn->close();
                                }
                            }
                            else{
                                echo "Please enter a valid zipcode";
                                return 2;
                                die();
                            }
                        }
                        else{
                            echo "Please enter a valid State";
                            return 2;
                            die();
                        }
                    }
                    else{
                        echo "Please enter a valid city";
                        return 2;
                        die();
                    }
                }
                else{
                    echo "Please enter a valid address 2";
                    return 2;
                    die();
                }
            }
            else{
                echo "Please enter a valid address 1";
                return 2;
                die();
            }
        }
        else{
            echo "Please enter a valid name";
            return 2;
            die();
        }
    }
    else{
        echo "No matching username found";
        die();
    }
}

//Need to comment this out when testing
updateProfile($postUsername, $postName, $postAddress1, $postAddress2, $postCity, $postState, $postZip);

?>