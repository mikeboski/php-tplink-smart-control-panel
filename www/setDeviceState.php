<?php
    include_once "config.php";
    include_once "getContext.php";

    function setDeviceState($state, $id, $appServerUrl) {
        global $kasa_token;
        $url = $appServerUrl.'?token='.$kasa_token;
//can NOT setup php array and then convert to json with json_encode. 
//(tplinkcloud does not like php formatting of json_encode for complex array)
        $data_s = '{"method":"passthrough",';
        $data_s .=' "params": {"deviceId": "'.$id.'", "requestData": "{\"system\":{\"set_relay_state\":{\"state\":'.$state.'}}}" }}';

        $context  = getContext($data_s);
        $result = file_get_contents($url, false, $context);
    }