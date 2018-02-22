<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <style>
     #log {
         height: 400px;
         overflow: scroll;
         background-color:#DDDDDD;
     }
     .device {
        border: #999999 solid 1px;
        background-color: #EEEEEE;
        padding:8px;
        margin:8px;
     }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    function turnOn(e,id,appServerUrl) {
        e.preventDefault(e);
        turnOnOff("on",id,appServerUrl);

    }
    function turnOff(e,id,appServerUrl) {
        e.preventDefault(e);
        turnOnOff("off",id,appServerUrl);        
    }
    function turnOnOff(onOff, id,appServerUrl) {
    var jqxhr = $.post( "device"+onOff+".php", {id: id, appServerUrl: appServerUrl} )
        .done(function(data) {
            console.log( "success" );
            $("#log").append(data+"<BR>");
        })
        .fail(function() {
            console.log( "error" );
        })
        .always(function() {
            console.log( "complete" );
        });
    }
    function getStatus(e, id) {
    var jqxhr = $.post( "devicestatus.php", {id: id} )
        .done(function(data) {
            console.log( "success" );
            $("#log").prepend(data+"<BR>");
        })
        .fail(function() {
            console.log( "error" );
        })
        .always(function() {
            console.log( "complete" );
        });
    }
    </script>
</head>

<body>


<?php
    include_once "config.php";
    include_once "getDeviceList.php";
    //echo $kasa_token;
    $devices = getDeviceList();
    foreach ($devices as $key => $device) {
        $id = $device->deviceId;
        $url = urlencode($device->appServerUrl);
        echo "<div class='device' >".$device->alias.": <a href='#'  onclick='turnOn(event,\"".$id."\",\"".$url."\")' ><button>ON</button></a> ";
        echo "<a href='#'  onclick='turnOff(event,\"".$id."\",\"".$url."\")'><button>OFF</button></a> ";
        echo "<a href='#'  onclick='getStatus(event,\"".$id."\",\"".$url."\")'><button>STATUS</button></a></div>";
    }

?>
<h1>Logs:</h1>
<div id="log">
<?php
    echo "<br><br><br>print_r of \$devices:<br><br><br>";
    print_r($devices);
    echo "<br><br><br>\$debug_devices_json<br><br><br>";
    echo $debug_devices_json;
?>
</div>

</body>
</html>