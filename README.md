
# EvE Ping Slack Integrator beta
**(ESPI 0.2b)**
*Creative Commons - free to share, edit and distribute.*

Connects your team's Slack (https://slack.com) account to EvE Ping (https://eveping.com). You can configure the eveping.php with Slack's Slash Command and Slack's Outgoing Webhook. Both can be configured at sametime if you wish.

To install: download & host the eveping.php file (PHP 5.0 or later, _NOT_ 4). Follow the instructions below for configuring either of the two options with EvE Ping and Slack.

Quick side note, since I'm dealing with EvE Players. No data is collected, your keyid, vcode, ping messages are sent directly between the server you host the eveping.php file on and slack, eve ping respectively. I recommend hosting it on a server with HTTPS configured. The code is there take a look, improve it and let me know what you think.

You're welcome to rename the eveping.php file to anything. I have it as index.php in a folder so that my URL's in slack and nice and clean :)

Fly Dangerous 07
Orange Aideron (John Grant)
johnagrant@outlook.com

## EvE Ping Slack: Slash Command

1. Setup EvE Ping: https://eveping.com/

2. Setup Slack (Admin): https://your_team.slack.com/services
  * Install "slash commands"
  * Command: /eveping
  * URL: http://yourdomain.com/path/eveping.php (replace URL to your hosted eveping.php)
  * Method: GET
  * Token: 9n5yfLPm44e4vM5yvqcuJK5H (example. Copy your token for updating in eveping.php)
  * check "Show this command in the autocomplete list"
  * Description: Send an EvE Ping
  * Usage Hint: [message]
  * Descriptive Label: EvE Ping Command
  * Save

3. Fill out the 3 variables in the eveping php file:
*  ` $evepingCmd_SlackToken = "9n5yfLPm44e4vM5yvqcuJK5H"; ` - copy & paste from your Slack slash command token
*  ` $evepingCmd_KeyId = "6311939"; ` - copy & paste from your EvE Ping user account KeyId
*  ` $evepingCmd_Vcode = "9c3915810698c50f41dff7607aa8d795101e62aea88808a201322f132b874e67"; ` - copy & paste from your EvE Ping user account KeyId

## EvE Ping Slack: Outgoing Webhook 

1. Setup EvE Ping: https://eveping.com/

2. Setup Slack (Admin): https://your_team.slack.com/services
  * Install "outgoing webhook"
  * Channel: I recommend making a dedicated PvP, or Intel, or Ping Channel. NOT General.
  * Trigger words: leave blank
  * URL: http://yourdomain.com/yourphpfile.php (replace with correct URL)
  * Token: XXX (Copy this)
  * Descriptive Label: Automatically Sends an EvE Ping from *your_channel*
  * Customize Name: EvE Ping Service
  * Customize Icon: 
![alt text](http://tinyurl.com/obrne6x "EvE Ping Logo") 
Download and upload to Slack
  * Save
  
3. Fill out the 3 variables in the eveping php file: - *this can use different EvE Ping credentials than the slash command (optional)*
*  ` $evepingWebHook_SlackToken = "9n5yfLPm44e4vM5yvqcuJK5H"; ` - copy & paste from your Slack outgoing webhook token
*  ` $evepingWebHook_KeyId = "6311939"; ` - copy & paste from your EvE Ping user account KeyId
*  ` $evepingWebHook_Vcode = "9c3915810698c50f41dff7607aa8d795101e62aea88808a201322f132b874e67"; ` - copy & paste from your EvE Ping user account KeyId
