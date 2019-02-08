# UPSMON
UPSMON is a tool to monitor upses, will be able to send warnings, display everything in a web interface and check multiple upses

# API SERVER
To start the API server run "gunicorn -w 4 -b 127.0.0.1:5000" request:app on API server
the 10 min update is runned with cron job, check ubuntu 14.04 cron jobs

# MAILER
E-mails are sent from server/upsWarning/mailer.php & date.php check comments for more information

# RASP CONFIG
if the rasp cannot connect to the ups/ the interface does not return any information then ssh into the rasp and run "upsc ups1@localhost" if that returns an error run command "service nut-server restart".

if nothing works, check the nut-server status and snmpd service status.
check config for ups in /etc/nut/ups.conf

# Multi ups config
the system supports max 3 upses/rasp
the raspberry is auto configed for one ups.

Check config from a previous rasp config (ex. soff) how to configure for multi upses.

/etc/nut/ups.conf
/etc/snmpd/snmpd.conf

the serial numbers in ups.conf should be as the upses you want to add. these are verry important for multi ups configuration
the snmpd.conf needs to be exatly the same as in all multi-ups raspberrys or the api will return null.
the scripts in the home folder on the raspberry can be copied from a previus raspberry as well.

Remember to restart nut-server and snmpd service after any configurations
