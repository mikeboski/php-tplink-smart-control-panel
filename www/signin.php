<?php    
    include_once "updateConfig.php";
    include_once "userData.php";
    include_once "getContext.php";

    
    //sign into tplinkcloud
    
    function signIn() {
        global $userName, $userPassword, $UUID;

        $url = 'https://wap.tplinkcloud.com/?appName=Kasa_Android&termID='.$UUID.'&appVer=1.7.7.638&ospf=Android+4.1.2&netType=wifi&locale=en_US';
//can NOT setup php array and then convert to json with json_encode. 
//(tplinkcloud does not like php formatting of json_encode for complex array)
        $data_s = '{"method":"login","url":"https://wap.tplinkcloud.com",';
        $data_s .= '"params":{"appType":"Kasa_Android","cloudPassword":"'.$userPassword.'","cloudUserName":"'.$userName.'","terminalUUID":"'.$UUID.'"}}';

        $context  = getContext($data_s);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }
// you can remove all echo(statements) here for debuging
        echo "part2:<br>";
        echo($result);
        $json = json_decode($result);

        echo "<br>".$json->result->token."<br>";
        updateConfig($json->result->token);
    }

    //For Testing sign in only run this is file is not included
    if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
        signIn();
    }