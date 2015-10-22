<?php 
/* 
Slack EvE Ping Integration beta
Creative Commons - free to share, edit and distribute.
READ readme.md for install instructions: 
https://github.com/OrangeAideron/EvE-Ping-Slack-Integrator/blob/master/README.md
John Grant - johnagrant@outlook.com
*/

// ------- EvE Ping: Slash Command ------- \\

//Your Eveping KeyID example: 6311939
$epcmd_eveping_keyid = "";
//Your Eveping vCode example: 9c3915810698c50f41dff7607aa8d795101e62aea88808a201322f132b874e67
$epcmd_eveping_vcode = ""; 
//Your Slack Token example: 9n5yfLPm44e4vM5yvqcuJK5H
$epcmd_slack_token = "";
    
// ------- EvE Ping: Outgoing Webhooks ------- \\

//Your Eveping KeyID
$epwh_eveping_keyid = "";
//Your Eveping vCode
$epwh_eveping_keyid = "";
//Your Slack Token
$epwh_slack_token = "";

// ------- END SETTINGS ------- \\

http_response_code(200); 

if ($_REQUEST['token'] == $epcmd_slack_token) {
    $user = urlencode($_REQUEST['user_name']);
    $message = urlencode($_REQUEST['text']);
    $url = "https://www.eveping.com/api/sendmessage?keyid=$epcmd_eveping_keyid&vcode=$epcmd_slack_token&type=corporation&message=$user:+$message";
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
        ),
    );
    $context  = stream_context_create($options);
    file_get_contents($url, false, $context);
    $message = str_replace('+',' ',$message);
    echo "EvE Ping \n$user: $message";
} elseif ($_REQUEST['token'] == $epwh_slack_token) {
    if ($_REQUEST['text'] == "EvE Ping Sent") {
        die();
    }
    $user = urlencode($_REQUEST['user_name']);
    $message = urlencode($_REQUEST['text']);
    $message = str_replace("<!group>","",$message);
    $url = "https://www.eveping.com/api/sendmessage?keyid=$epwh_eveping_keyid&vcode=$epwp_slack_token&type=corporation&message=$user:+$message";
    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
        ),
    );
    $context  = stream_context_create($options);
    file_get_contents($url, false, $context);
    $response = array("text" => "EvE Ping Sent");
    echo json_encode($response);
} else {
    echo "ERROR: No Token, contact your Slack administrator.";
}
?>