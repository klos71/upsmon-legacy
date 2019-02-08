from pysnmp.hlapi import *

batteryTime= ""
batteryPrecent = ""
serial = ""
status = ""
batteryMfrDate = ""

def setVariables(upsNumber):
	global batteryTime
	global batteryPrecent
	global serial
	global status
	global batteryMfrDate
	if(upsNumber == 1):
		#OID for APC Pro 900, works with config in raspberry
		batteryTime = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.12.117.112.115.46.114.117.110.116.105.109.101.49"
		batteryPrecent = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.15.98.97.116.116.101.114.121.46.99.104.97.114.103.101.49"
		serial = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.11.117.112.115.46.115.101.114.105.97.108.49"
		status = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.11.117.112.115.46.115.116.97.116.117.115.49"
		batteryMfrDate = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.15.98.97.116.116.101.114.121.46.109.102.114.100.97.116.101"
	elif(upsNumber == 2):
		#OID set 2
		batteryTime = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.12.117.112.115.46.114.117.110.116.105.109.101.50"
		batteryPrecent = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.15.98.97.116.116.101.114.121.46.99.104.97.114.103.101.50"
		serial = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.11.117.112.115.46.115.101.114.105.97.108.50"
		status = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.11.117.112.115.46.115.116.97.116.117.115.50"
		batteryMfrDate = ".1.3.6.1.4.1.8072.1.3.2.3.1.2.16.98.97.116.116.101.114.121.46.109.102.114.100.97.116.101.50"
	elif(upsNumber == 3):
		#OID set 3
		batteryTime = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.12.117.112.115.46.114.117.110.116.105.109.101.51"
		batteryPrecent = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.15.98.97.116.116.101.114.121.46.99.104.97.114.103.101.51"
		serial = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.11.117.112.115.46.115.101.114.105.97.108.51"
		status = ".1.3.6.1.4.1.8072.1.3.2.3.1.1.11.117.112.115.46.115.116.97.116.117.115.51"
		batteryMfrDate = ".1.3.6.1.4.1.8072.1.3.2.3.1.2.16.98.97.116.116.101.114.121.46.109.102.114.100.97.116.101.51"


#gets batteryTime from given RaspberryPi ip TODO: get ip from database
def fetchBatteryTime(ip, upsnumber):
	#setVariables(int(upsnumber))
	errorIndication, errorStatus, errorIndex, varBinds = next(
		getCmd(SnmpEngine(),
			CommunityData('public', mpModel=0),
			UdpTransportTarget((ip, 161)),
			ContextData(),
			ObjectType(ObjectIdentity(batteryTime)))
		)
		
	if errorIndication:
		print(errorIndication)
	elif errorStatus:
		print(errorStatus.prettyPrint())
	else:
		for varBind in varBinds:
			temp = int(varBind[1])
			return temp/60

#Same as abov but with precent
def fetchBatteryPrecent	(ip, upsnumber):
		#setVariables(upsnumber)			
		errorIndication, errorStatus, errorIndex, varBinds = next(
			getCmd(SnmpEngine(),
				CommunityData('public', mpModel=0),
				UdpTransportTarget((ip, 161)),
				ContextData(),
				ObjectType(ObjectIdentity(batteryPrecent)))
		)
		
		if errorIndication:
			print(errorIndication)
		elif errorStatus:
			print(errorStatus.prettyPrint())
		else:
			for varBind in varBinds:
				temp = int(varBind[1])
				return temp

def fetchDeviceSerial(ip, upsnumber):
		#setVariables(upsnumber)
		errorIndication, errorStatus, errorIndex, varBinds = next(
			getCmd(SnmpEngine(),
				CommunityData('public', mpModel=0),
				UdpTransportTarget((ip, 161)),
				ContextData(),
				ObjectType(ObjectIdentity(serial)))
		)
		
		if errorIndication:
			print(errorIndication)
		elif errorStatus:
			print(errorStatus.prettyPrint())
		else:
			for varBind in varBinds:
				temp = varBind[1]
				return temp

def fetchDeviceStatus(ip, upsnumber):
		#setVariables(upsnumber)			
		errorIndication, errorStatus, errorIndex, varBinds = next(
			getCmd(SnmpEngine(),
				CommunityData('public', mpModel=0),
				UdpTransportTarget((ip, 161)),
				ContextData(),
				ObjectType(ObjectIdentity(status)))
		)
		
		if errorIndication:
			print(errorIndication)
		elif errorStatus:
			print(errorStatus.prettyPrint())
		else:
			for varBind in varBinds:
				temp = varBind[1]
				return temp
def fetchBatteryMfr(ip, upsnumber):
		#setVariables(upsnumber)			
		errorIndication, errorStatus, errorIndex, varBinds = next(
			getCmd(SnmpEngine(),
				CommunityData('public', mpModel=0),
				UdpTransportTarget((ip, 161)),
				ContextData(),
				ObjectType(ObjectIdentity(batteryMfrDate)))
		)
		
		if errorIndication:
			print(errorIndication)
		elif errorStatus:
			print(errorStatus.prettyPrint())
		else:
			for varBind in varBinds:
				temp = varBind[1]
				return temp
