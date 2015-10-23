<?php 
/* 
ESPI 0.2b
Creative Commons - free to share, edit and distribute.
https://github.com/OrangeAideron/EvE-Ping-Slack-Integrator
*/

// ------- EvE Ping: Slash Command ------- \\

//Your Slack slash command token, example: 9n5yfLPm44e4vM5yvqcuJK5H
$evepingCmd_SlackToken = "";
//Your Eveping KeyID, example: 6311939
$evepingCmd_KeyId = "";
//Your Eveping vCode, example: 9c3915810698c50f41dff7607aa8d795101e62aea88808a201322f132b874e67
$evepingCmd_Vcode = ""; 
    
// ------- EvE Ping: Outgoing Webhook ------- \\

//Your Slack outgoing webhook token, example: 9n5yfLPm44e4vM5yvqcuJK5H
$evepingWebHook_SlackToken = "";
//Your Eveping KeyID, example: 6311939
$evepingWebHook_KeyId = "";
//Your Eveping vCode, example: 9c3915810698c50f41dff7607aa8d795101e62aea88808a201322f132b874e67
$evepingWebHook_Vcode = "";

// ------- END SETTINGS ------- \\

http_response_code(200); 
$EvePing = new EvePingSender;
switch ($_REQUEST['token']) {
    case $evepingCmd_SlackToken:
        $EvePing->ping($evepingCmd_KeyId,$evepingCmd_Vcode,true);
        break;
    case $evepingWebHook_SlackToken:
        $EvePing->ping($evepingWebHook_KeyId,$evepingWebHook_Vcode);
        break;
    default:
        echo "No Auth. Contact your Slack Admin.";
}
unset($EvePing);
class EvePingSender {
    public $slackToken = "";
    public $slackUser = "";
    public $slackMessage = "";
    public $evepingUrl = "https://www.eveping.com/api/sendmessage?";
    public $evepingOptions = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
        ),
    );
    public $evepingContext = "";
    public $evepingResponse = array();
    public $ESPIreturn = "EvE Ping Error";
    public function __construct() {
        $this->slackToken = urlencode($_REQUEST['token']);
        $this->slackUser = urlencode($_REQUEST['user_name']);
        $this->slackMessage = urlencode($_REQUEST['text']);
    }
    public function ping($id = "noid",$vcode = "novcode",$debug = false) {
        if ($this->slackMessage == urlencode("EvE Ping Sent") || $this->slackMessage == urlencode("EvE Ping Error"))
            die();
        $this->evepingUrl .= "keyid=$id&vcode=$vcode&type=corporation&message=$this->slackUser:+$this->slackMessage";
        $this->evepingContext = stream_context_create($this->evepingOptions);
        $this->evepingResponse[] = json_decode(file_get_contents($this->evepingUrl, false, $this->evepingContext));
        if (!is_array($this->evepingResponse)) 
            die("EvE Ping Error");
        if ($this->evepingResponse['status_txt'] != "ERROR")
            $this->ESPIreturn = json_encode(array("text" => "EvE Ping Sent"));
        if ($debug)
            $this->ESPIreturn = "EvE Ping Sent $this->slackUser: ".str_replace("+", " ", $this->slackMessage);
        echo $this->ESPIreturn;
    }
} //EvePingSender class
?>