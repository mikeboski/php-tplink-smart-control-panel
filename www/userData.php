<?php

$userPassword = 'Password from KASA app';
$userName = 'Email from KASA app';

$UUID = '3db43df6-0c32-468e-b8b3-2257d3848daa'; 
$UUID = 'cat'; // does not seem to matter what $UUID you use just keep it consistant

if($userPassword == 'Password from KASA app') {
    echo "<div style='background:red; border:yellow 3px solid; padding:10px; margin:10px;' >";
    echo "Please check userData file and update with your account info: userPassword</div>";
}

if($userName == 'Email from KASA app') {
    echo "<div style='background:red; border:yellow 3px solid; padding:10px; margin:10px;' >";
    echo "Please check userData file and update with your account info: userName</div>";
}

if($UUID == 'cat') {
    echo "<div style='background:red; border:yellow 3px solid; padding:10px; margin:10px;' >";
    echo "Please check userData file and update UUID</div>";
}
