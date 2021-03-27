#----------------------------Libraries Code---------------------------------------------------------
from machine import Pin, I2C
from machine import UART
from time import sleep
import network
import ujson
import urequests
#--------------------------The Led Pin by 2  GPIO2--------------------------------------------------

ledpin=2
pin = Pin(ledpin, Pin.OUT)

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
#-----------------NetWork Wifi Config----------------------------------------------------------------
SSID = "Galex_Moto"            #WiFi name
PASSWORD = "fjlic123"       #WiFi password
#SSID = "RedmiPro"                #WiFi name
#PASSWORD = "redmi123"            #WiFi password
#SSID = "INFINITUM3652"            #WiFi name
#PASSWORD = "eoRrKzMxkU"           #WiFi password
#---------------------------------------------------------------------------------------------------

#------------Data Api Conection---------------------------------------------------------------------
#---------------------------------------------------------------------------------------------------

#--------------------------Functions ---------------------------------------------------------------

def Get_Find_Sensor():
   parse_data = ""
   num_serie = '1000000001'
   passw = 'sensor@321'
   baseUrl = "https://hotspot.fjlic.com/api/sensor/"+num_serie
   Accept = {'Accept': 'application/json'}
   response = urequests.get(baseUrl,headers=Accept)
   #data = response.text
   data = response.json()
   #print(data)
   relay_status = {'rlay_4' : data['data']['rlay_4'],'rlay_3' : data['data']['rlay_3'],'rlay_2' : data['data']['rlay_2'],'rlay_1' : data['data']['rlay_1']}  
   json_str = ujson.dumps(relay_status)
   return json_str
   
def Post_Modify_Sensor(json_data):
   num_serie = '1000000001'
   passw = 'sensor@321'
   baseUrl = "https://hotspot.fjlic.com/api/sensor/modify"
   messageData = {
        'num_serie' :  num_serie,
        'passw' : passw,
        'vol_1' : json_data['vol_1'],
        'vol_2' : json_data['vol_2'],
        'vol_3' : json_data['vol_3'],
        'door_1' : json_data['door_1'],
        'door_2' : json_data['door_2'],
        'door_3' : json_data['door_3'],
        'door_4' : json_data['door_4'],
        'rlay_1' : json_data['rlay_1'],
        'rlay_2' : json_data['rlay_2'],
        'rlay_3' : json_data['rlay_3'],
        'rlay_4' : json_data['rlay_4'],
        'text' : json_data['text']}
   Accept = {'Accept': 'application/json'}
   response = urequests.post(baseUrl,data=messageData,headers=Accept)
   #print(messageData)
   
def ConnectionWifi(name_wifi, passw_wifi):
    wlan = network.WLAN(network.STA_IF) #Create WLAN object
    wlan.active(True)                   #Activate the interface
    #print(wlan.active(True))
    wlan.scan()                         #Scan access point
    #print(wlan.scan())
    wlan.isconnected()                  #Check whether the site is connected to the AP
    #print(wlan.isconnected())
    wlan.connect(name_wifi, passw_wifi)        #Connect to AP
    #print(wlan.connect(SSID, PASSWORD))
    #print("Connecting to :", essid)
    #while not wlan.isconnected():
    #    sleep(1)
    wlan.config('mac')                  #Get the MAC address of the interface
    #print(wlan.config('mac'))
    res = wlan.ifconfig()                     #Get the IP/netmask/gw/DNS address of the interface
    return res

#------------------------------------------------------------------------------------
connect = ConnectionWifi(SSID, PASSWORD)
print(connect)
#print('-------------------------------------------------------------------------------------------')
print("Prepare Port ")
sleep(2)
print("Start ")
while True:
      read_json_server = Get_Find_Sensor()
      nano_serial.write(read_json_server) # Le envia el comando  por consola
      #print('--------------Data-Sensor-Server--------------------')
      print(read_json_server)
      #read_jason_arduino = arduino.readline()
      #print('--------------Datos-Multirelay-Arduino--------------------')
      #print(read_jason_arduino)
      #covert_str = str(read_jason_arduino)
      #data_send = json.loads(covert_str)
      #Write_Post_MultiRelay(data_send)
      #print('---------------Datos-Qr-Module-------------------')
      #read_qr = qr.readline()
      #print(Read_Get_Srvr_Qr(read_qr))
      #print('--Espera--2--Segundos--')
      sleep(5)
      
      
nano_serial.close() # Termina la comunicacion serial arduino
a9g_serial.close() # Termina la comunicacion serial lector de qr