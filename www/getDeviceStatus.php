<?php 
include_once "config.php";
include_once "getContext.php";
    function getDeviceStatus($id) {
        global $kasa_token;
        $url = 'https://use1-wap.tplinkcloud.com?token='.$kasa_token;

        $data_s = '{"method":"passthrough",';
        $data_s .=' "params": {"deviceId": "'.$id.'", "requestData": "{\"system\":{\"get_sysinfo\":{}}}" }}';
        //echo $data_s."<br><br>";

        $context  = getContext($data_s);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }
        //uncomment echos for debugging
        //echo "<br><br> result raw:<br><br>";
        //echo $result;
        echo "STATUS DATA:<br>";
        echo json_decode($result)->result->responseData;
        echo "<br><br>";
        $data = json_decode($result)->result->responseData;
        return json_decode($data)->system->get_sysinfo->relay_state;
    }