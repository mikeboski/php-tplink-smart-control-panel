<?php
    include_once "config.php";
    include_once "getContext.php";

    function setDeviceState($state, $id, $appServerUrl) {
        global $kasa_token;
        $try_count = 0;
        $success = false;
        while($try_count <2 && $success == false) {
            echo "try_count:".$try_count;
            $url = $appServerUrl.'?token='.$kasa_token;
    //can NOT setup php array and then convert to json with json_encode. 
    //(tplinkcloud does not like php formatting of json_encode for complex array)
            $data_s = '{"method":"passthrough",';
            $data_s .=' "params": {"deviceId": "'.$id.'", "requestData": "{\"system\":{\"set_relay_state\":{\"state\":'.$state.'}}}" }}';

            $context  = getContext($data_s);
            $result = file_get_contents($url, false, $context);
            $json = json_decode($result);
            echo $json;
            if($json->msg == "Token expired"){
                // "Bad token try password";
                $try_count++;
                updateToken();
            } else {
                $success = true;
            }
        }
        echo "endwhile";
    }