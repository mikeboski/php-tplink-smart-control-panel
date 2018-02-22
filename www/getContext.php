<?php 
function getContext($data) {
    if(is_array($data)) {
        $data = json_encode($data);
    }
    $options =  array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
        'http' => array(
            'header'  => "Content-Type: application/json",
            'method'  => 'POST',
            'content' => $data
        )
    );
    return stream_context_create($options);
}