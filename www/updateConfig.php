<?php 
    function updateConfig($token) {
        global $kasa_token;
        $kasa_token = $token;
        file_put_contents('config.php', "<?php\n\$kasa_token = '".$token."';");
    }
    //updateConfig("MikeTestToken");