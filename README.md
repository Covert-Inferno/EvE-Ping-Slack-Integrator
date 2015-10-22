
# EvE Ping Slack Integrator beta
*Creative Commons - free to share, edit and distribute.*

You can configure either Slash Command or Outgoing Webhook, or both.

To install: download the php file and upload onto some webhosting with PHP 5.4 or later. Follow the instructions below to configure EvE Ping and Slack.

No data is collected, your keyid, vcode, ping messages are safe. The code is open take a look, improve it. It takes slack messages in and passes them to EvE Ping. Use https url's if your paranoid about the hosting provider seeing the messages.

John Grant - 
johnagrant@outlook.com

## EvE Ping Slack: Slash Command

1. Setup EvE Ping: https://eveping.com/

2. Setup Slack (Admin): https://your_team.slack.com/services
  * Install "slash commands"
  * Command: /eveping
  * URL: http://yourdomain.com/yourphpfile.php (replace with correct URL)
  * Method: GET
  * Token: XXX (Copy this)
  * check "Show this command in the autocomplete list"
  * Description: Send an EvE Ping
  * Usage Hint: [message]
  * Descriptive Label: EvE Ping Command
  * Save

3. Fill out the 3 variables in the eveping php file:
  * $epcmd_eveping_keyid - Your EvE Ping registered eveonline api keyid
  * $epcmd_eveping_vcode - Your EvE Ping registered eveonline api vcode
  * $epcmd_slack_token - Copy and paste from Slack Slash Command (check above)

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
  
3. Fill out the 3 variables in the eveping php file:
  * $epcmd_eveping_keyid - Your EvE Ping registered eveonline api keyid
  * $epcmd_eveping_vcode - Your EvE Ping registered eveonline api vcode
  * $epcmd_slack_token - Copy and paste from Slack Slash Command (check above)
