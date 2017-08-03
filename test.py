#! /usr/bin/python
import time
from datetime import datetime 
import serial
import MySQLdb as mdb
from twilio.rest import Client


def sendsms(value1,value2):
        account_sid = "ACd4a5361556cddfda66f560eaa82f0014"
        auth_token = "8c0799d6b11411568ae551a6ab296c7c"

        client = Client(account_sid, auth_token)

        client.messages.create(
        to="+919741340717",
        from_="+1 319-313-5151 ",
        body="This is emergency message.\n"+" Heart rate is "+str(value1)+" Temperature is "+str(value2))

def sendsms2():
        account_sid = "ACd4a5361556cddfda66f560eaa82f0014"
        auth_token = "8c0799d6b11411568ae551a6ab296c7c"

        client = Client(account_sid, auth_token)

        client.messages.create(
        to="+919741340717",
        from_="+1 319-313-5151 ",
        body="Patient about to get unconscious.\n")

arduino = serial.Serial("/dev/ttyACM0")
arduino.baudrate = 9600



i= 10
while i<= 60  :
    d = datetime.now()	
    dat,tim = d.date(),d.time()		 		
    data = arduino.readline()
    arduino.flush()	
    rate = data.split()
    if len(rate) > 2:			
        temp,pulserate,adxl = rate[0],rate[1],rate[2]
        print pulserate,temp,adxl	
        if (int(pulserate) > 120 or int(pulserate) < 50) or (int(temp) > 39 or int(temp) < 33):		
	    sendsms(pulserate,temp)
        if int(adxl)>750:
	    sendsms2()
        db = mdb.connect("localhost","root","h3m@nth","pulsetest")
        cursor = db.cursor()
        data = '''INSERT INTO pulse VALUES (%s,%s,%s,%s)'''
        try:
            cursor.execute( data,( str(temp),str(pulserate),str(dat),str(tim) ) )
            db.commit()
        except:
            print "not inserted"
    time.sleep(10)	
    i+=1	 
    		

db.close()




 
