<?php

$myObj -> rx =(int) @file_get_contents("/sys/class/net/eth0/statistics/rx_bytes"); 
$myObj -> tx =(int)@file_get_contents("/sys/class/net/eth0/statistics/tx_bytes"); 

$myJSON = json_encode($myObj);
echo $myJSON;
?>