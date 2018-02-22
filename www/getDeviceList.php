<?php
    include_once "config.php"; // contains $kasa_token
    include_once "signin.php"; // contains signIn()
    include_once "getContext.php";
    $debug_devices_json = null;
    function updateToken() {
        signIn();
    }

//call to tplinkcloud to get JSON formatted device list.
    function getDeviceListData() {
        global $kasa_token;
        $url = 'https://wap.tplinkcloud.com?token='.$kasa_token;
        $data = array('method' => 'getDeviceList');

        $context  = getContext($data);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }
        return $result;

    }
/*************************************
Function calls out to getDeviceListData() if that 
fails cause token is expired it request a new token with updateToken().
function then tries getDeviceListData() again.
on successful call to getDeviceListData() formats device list as a 
php array and returns it. 
****************************** */
    function getDeviceList() {
        global $debug_devices_json;
        $result = getDeviceListData();
        $debug_devices_json = $result;
        $json = json_decode($result);
        if($json->msg == "Token expired"){
            echo "<br>Bad token try password";
            updateToken();
            $result = getDeviceListData();
            $debug_devices_json = $result;
            $json = json_decode($result);
        }        
        return $json->result->deviceList;
    }
    getDeviceList();