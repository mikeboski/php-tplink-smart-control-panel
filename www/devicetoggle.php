<?php
    include_once "config.php";
    include_once "getDeviceStatus.php";
    include_once "setDeviceState.php";
    if(!isset($_REQUEST["id"])) die("**no id**");
    $id = $_REQUEST["id"];
    
    $status = getDeviceStatus($id);
    $newstatus = 0;
    if($status == 0) {
        $newstatus = 1;
    }    
    echo $status."<br>".$newstatus;
    $appServerUrl = urldecode($_REQUEST["appServerUrl"]);
    setDeviceState($newstatus, $id, $appServerUrl);
   // echo "&deviceON=".$status."&";