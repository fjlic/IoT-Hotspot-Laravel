#----------------------------Libraries Code---------------------------------------------------------
from machine import Pin, I2C
from machine import UART
from machine import SPI
from time import sleep
import network
import ujson
import urequests
import usocket as socket
import uselect as select
import os,machine, time
#-----------------NetWork Wifi Config----------------------------------------------------------------

#SSID = "Galex_Moto"            #WiFi name
#PASSWORD = "fjlic123"          #WiFi password
#SSID = "RedmiPro"             #WiFi name
#PASSWORD = "redmi123"         #WiFi password
#SSID = "INFINITUM3652"        #WiFi name
#PASSWORD = "eoRrKzMxkU"       #WiFi password
SSID = 'GalexIOT'
PASSWORD = 'G4l3x#1537'
#SSID = "GalexWimaxFin"        #WiFi name
#PASSWORD = "Galex1537"        #WiFi password

#--------------------------The Led Pin by 2  GPIO2 and Cont Global--------------------------------------------------

ledpin=2
pin = Pin(ledpin, Pin.OUT)
accoun_global=0
flag_srvr=0
wlan = network.WLAN(network.STA_IF)
wlan.active(True)
wlan.connect(SSID, PASSWORD)
intent=0

#---------------------------------------------------------------------------------------------------
#--------------------------------Activate Ic2 by Ntag NXP-------------------------------------------

nfc_ntag = I2C(1, scl=Pin(22), sda=Pin(21), freq=400000)
#print(i2c.scan())              # scan for slave devices

#---------------------------------------------------------------------------------------------------
#------------------------Uart seria # 1 and 2-------------------------------------------------------

a9g_serial = UART(1, 115200)                         # init with given baudrate
a9g_serial.init(115200,bits=8,parity=None,stop=1,rx=5,tx=18)

#------------------------Uart seria # 2-------------------------------------------------------------

nano_serial = UART(2, 115200)                         # init with given baudrate # 2 RX2 TX2  
nano_serial.init(115200,bits=8,parity=None,stop=1,rx=16,tx=17)

#----------------------------------------------------------------------------------------------------
#------------Content Api Consult--------------------------------------------------------------------

baseUrl = "https://hotspot.fjlic.com/api"
Accept={}
Accept["Content-Type"] = "application/json"

#------------Data Api Conection---------------------------------------------------------------------

num_serie = "1000000001"
passw = "sensor@321"
vol_1 = "Off"
vol_2 = "Off"
vol_3 = "Off"
temp_1 = "0.0"
temp_2 = "0.0"
temp_3 = "0.0"
temp_4 = "0.0"
door_1 = "Off"
door_2 = "Off"
door_3 = "Off"
door_4 = "Off"
rlay_1 = "Off"
rlay_2 = "Off"
rlay_3 = "Off"

rlay_4 = "Off"
text = "Test Sensor # 1000000001 OK"

#---------------------------------------------------------------------------------------------------
#--------------------------Functions ---------------------------------------------------------------

def ConnectionWifi(name_wifi, passw_wifi):
    global wlan,intent
    wlan = network.WLAN(network.STA_IF)  #Create WLAN object
    wlan.active(True)                    #Activate the interface
    #print(wlan.active(True))
    #print(wlan.scan())                  #Scan access point
    #print(wlan.isconnected())           #Check whether the site is connected to the AP
    #print(wlan.connect(SSID, PASSWORD)) #Connect to Wifi
    #print("Connecting to :", essid)
    #print(wlan.config('mac'))           #Get the MAC address of the interface
    intent=0
    while wlan.isconnected() == False and intento<3:
      intento=intento+1
      wlan.connect(name_wifi, passw_wifi)
      sleep(.5)

    if  wlan.isconnected() == True:
     #print('Connection successful')
     pin.on()
    else:
     pin.off() 
     #print(station.ifconfig())
    
    rest_wlan = wlan.ifconfig()                     #Get the IP/netmask/gw/DNS address of the interface
    return rest_wlan

def Post_Status_Sensor():
   global SSID, PASSWORD, num_serie, passw, vol_1, vol_2, vol_3, temp_1, temp_2, temp_3, temp_4, door_1, door_2, door_3, door_4, rlay_1, rlay_2, rlay_3, rlay_4, baseUrl, Accept
   if wlan.isconnected()==False:
       ConnectionWifi(SSID,PASSWORD)
   #Obtiene los datos por Post (Valores, Temperatura - Puertas)
   urlTmp = baseUrl + "/sensor/status"
   messageData = {}
   messageData['num_serie'] = num_serie
   messageData['passw'] = passw
   messageData['text'] = "Status Sensor"
   ujsonMessage=ujson.dumps(messageData)
   response = urequests.post(urlTmp,data=ujsonMessage,headers=Accept)
   data = response.json()
   vol_1 = data['data']['vol_1']
   vol_2 = data['data']['vol_2']
   vol_3 = data['data']['vol_3']
   temp_1 = data['data']['temp_1']
   temp_2 = data['data']['temp_2']
   temp_3 = data['data']['temp_3']
   temp_4 = data['data']['temp_4']
   door_1 = data['data']['door_1']
   door_2 = data['data']['door_2']
   door_3 = data['data']['door_3']
   door_4 = data['data']['door_4']
   rlay_1 = data['data']['rlay_1']
   rlay_2 = data['data']['rlay_2']
   rlay_3 = data['data']['rlay_3']
   rlay_4 = data['data']['rlay_4']
   relay_status = {'rlay_4' : data['data']['rlay_4'],
                   'rlay_3' : data['data']['rlay_3'],
                   'rlay_2' : data['data']['rlay_2'],
                   'rlay_1' : data['data']['rlay_1']}  
   json_str = ujson.dumps(relay_status)
   return json_str
   
def Post_Modify_Sensor():
   global SSID, PASSWORD, num_serie, passw, vol_1, vol_2, vol_3, temp_1, temp_2, temp_3, temp_4, door_1, door_2, door_3, door_4, rlay_1, rlay_2, rlay_3, rlay_4, baseUrl, Accept
   if wlan.isconnected()==False:
       ConnectionWifi(SSID,PASSWORD)
   #Envia informacion por Post (Valores, Temperatura - Puertas)
   urlTmp = baseUrl + "/sensor/modify"
   messageData = {}
   messageData['num_serie'] = num_serie
   messageData['passw'] = passw
   messageData['vol_1'] = vol_1
   messageData['vol_2'] = vol_2
   messageData['vol_3'] = vol_3
   messageData['temp_1'] = temp_1
   messageData['temp_2'] = temp_2
   messageData['temp_3'] = temp_3
   messageData['temp_4'] = temp_4
   messageData['door_1'] = door_1
   messageData['door_2'] = door_2
   messageData['door_3'] = door_3
   messageData['door_4'] = door_4
   messageData['text'] = "Modify Sensor"
   ujsonMessage=ujson.dumps(messageData)
   response = urequests.post(urlTmp,data=ujsonMessage,headers=Accept)
   data = response.json()
   rlay_1 = data['data']['rlay_1']
   rlay_2 = data['data']['rlay_2']
   rlay_3 = data['data']['rlay_3']
   rlay_4 = data['data']['rlay_4']
   relay_status = {'rlay_4' : data['data']['rlay_4'],
                   'rlay_3' : data['data']['rlay_3'],
                   'rlay_2' : data['data']['rlay_2'],
                   'rlay_1' : data['data']['rlay_1']}
   json_str = ujson.dumps(relay_status)
   return json_str

#------------------------------------------------------------------------------------

connect = ConnectionWifi(SSID, PASSWORD)
Post_Status_Sensor()
    
while True:
      accoun_global=accoun_global+1 
      if (accoun_global>=110):
        accoun_global=0
        band_server=0
        read_json_srvr = Post_Modify_Sensor()
        nano_serial.write(read_json_srvr) # Le envia el comando  por consola
        print(read_json_srvr)

      sleep(0.5)
      
nano_serial.close() # Termina la comunicacion serial arduino
a9g_serial.close() # Termina la comunicacion serial lector de qr
