import urllib2, urllib

def updateUpses():
    data = [('method',"name")]
    data= urllib.urlencode(data)
    path = 'http://<insert ip>/UPSMON/server/upsHandeling/upsSch.php'
    req = urllib2.Request(path, data)
    req.add_header("Content-type", "application/x-www-form-urlencoded")
    page=urllib2.urlopen(req).read()
    mail()
    dcCheck()
    print(page)

def mail():
    data = [('method',"name")]
    data= urllib.urlencode(data)
    path = 'http://<insert ip>/UPSMON/server/upsWarning/mailer.php'
    req = urllib2.Request(path, data)
    req.add_header("Content-type", "application/x-www-form-urlencoded")
    page=urllib2.urlopen(req).read()
    print(page)

def dcCheck():
    data = [('method',"name")]
    data= urllib.urlencode(data)
    path = 'http://<insert ip>/UPSMON/server/upsWarning/date.php'
    req = urllib2.Request(path, data)
    req.add_header("Content-type", "application/x-www-form-urlencoded")
    page=urllib2.urlopen(req).read()
    print(page)

updateUpses()