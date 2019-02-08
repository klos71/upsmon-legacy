import urllib2, urllib, datetime, time, snmp

#creates ups with some default data , thinks this is unused code
def createNewUps(name, serial, lastdc, currpower, battime):
    ts = time.time()
    st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
    data = [('upsname',name),('serial',serial),('lastdc', st),('currpower', 0),('battime', st)]
    data= urllib.urlencode(data)
    path = 'http://<insert ip>/UPSMON/server/upsHandeling/addUps.php'
    req = urllib2.Request(path, data)
    req.add_header("Content-type", "application/x-www-form-urlencoded")
    page=urllib2.urlopen(req).read()
    print(page)

#Updates ups database with data from snmp.py and time...
def updateUps(name, ip, upsnumber):
    ts = time.time()
    st = datetime.datetime.fromtimestamp(ts).strftime('%Y-%m-%d %H:%M:%S')
    snmp.setVariables(int(upsnumber))
    data = [('upsname',name),('serial',snmp.fetchDeviceSerial(str(ip),upsnumber)),('lastdc', st),('currpower', snmp.fetchBatteryPrecent(str(ip),upsnumber)),('battime', snmp.fetchBatteryTime(str(ip),upsnumber)),('lastupdate', st),('batterymfr', snmp.fetchBatteryMfr(str(ip),upsnumber)),('status', snmp.fetchDeviceStatus(str(ip),upsnumber))]
    data= urllib.urlencode(data)
    path = 'http://<insert ip>/UPSMON/server/upsHandeling/updateUps.php'
    req = urllib2.Request(path, data)
    req.add_header("Content-type", "application/x-www-form-urlencoded")
    page=urllib2.urlopen(req).read()
    print(page)
#removes ups
def removeUps(serial):
    data = [('serial', serial)]
    data = urllib.urlencode(data)
    path = 'http://<insert ip>/UPSMON/server/upsHandeling/removeUps.php'
    req = urllib2.Request(path,data)
    req.add_header("Content-type", "application/x-www-form-urlencoded")
    page=urllib2.urlopen(req).read()
    print(page)