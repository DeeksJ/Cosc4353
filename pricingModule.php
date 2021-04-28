<?php
function calcPrice(){
    session_start();
    //Get Session variables from form
    $locFac = $_SESSION["locFac"];
    $rateHist = $_SESSION["rateHist"];
    $galReqFac = $_SESSION["galReqFac"];
    $galsReq = $_SESSION["galsReq"];
    //Calculating Price Per Gallon and Total price of request
    $margin = ($locFac - $rateHist + $galReqFac + 0.1) * 1.50;
    $ppg = 1.50 + $margin;
    $total = $ppg*(int)$galsReq;
    $_SESSION["ppg"] = $ppg;
    $_SESSION["total"] = $total;
    $_SESSION["gallons"] = $galReqFac;

    //We can use 'include' in main file and just reference the variables
}
calcPrice();
?>