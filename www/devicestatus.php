<?php
    include_once "config.php";
    include_once "getDeviceStatus.php";
    if(!isset($_REQUEST["id"])) die("**no id**");
    $id = $_REQUEST["id"];
    
    $status = getDeviceStatus($id);
    echo "&deviceON=".$status."&";