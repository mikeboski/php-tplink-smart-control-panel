<?php
    include_once "setDeviceState.php";
    if(!isset($_REQUEST["id"])) die("**no id**");
    $id = $_REQUEST["id"];
    $appServerUrl = urldecode($_REQUEST["appServerUrl"]);
    setDeviceState(0, $id, $appServerUrl);