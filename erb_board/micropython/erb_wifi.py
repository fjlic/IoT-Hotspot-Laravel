import network
import urequests
from machine import UART
from machine import Pin, I2C
from time import sleep

#---------El Pin led es el 2  GPIO2-------------------
ledpin=2
pin = Pin(ledpin, Pin.OUT)
#---------Activar Ic2 para Ntack NXP-------------------
i2c = I2C(1, scl=Pin(22), sda=Pin(21), freq=400000)
#print(i2c.scan())              # scan for slave devices
#------------------------Uart seria # 1----------------------------------------------------------------
uart1 = UART(1, 9600)                         # init with given baudrate
uart1.init(9600,bits=8,parity=None,stop=1,rx=5,tx=18)
#------------------------Uart seria # 2----------------------------------------------------------------
uart2 = UART(2, 300)                         # init with given baudrate # 2 RX2 TX2  
uart2.init(300,bits=8,parity=None,stop=1,rx=16,tx=17)
#------------------------------------------------------------------------------------------------------
#------------Redes Wifi Config------------------------
#SSID = "ECIDEAS_Work"            #WiFi name
#PASSWORD = "CID101216M37?"       #WiFi password
#SSID = "RedmiPro"                #WiFi name
#PASSWORD = "redmi123"            #WiFi password
SSID = "INFINITUM3652"            #WiFi name
PASSWORD = "eoRrKzMxkU"           #WiFi password
#------------Data Api Conection----------------------
qr_serie = "ABDORT3467"
id_esp32 = "1"
usuario_id = "3"
numero_serie = "777597841"
alias_name = "esp32_1"
contrasena = "esp32123"
token = "dWogqZnpxyy0BzIURVRrZmXJS6lWanoI"
#----------------------------------------------------

#--------------------------Funciones -----------------------------------------------

def Read_Get_Srvr_Qr(str_qr):
   json_str = ""
   if len(str_qr) is 0:
     json_str = "Lectura Qr: null"
   else:
     num_serie = '555597841'
     passw = 'rlay123'
     fin_line = "\r\n"
     parse_str = str_qr.replace(fin_line,"")
     baseUrl = "https://hotspot.fjlic.com/api/qr/"+parse_str
     Accept = {'Accept': 'application/json'}
     response = requests.get(baseUrl,headers=Accept)
     data = response.json()
     if data['success'] == True:
        if data['data']['qr_serie'] == qr_serie:
           rlay_1 = "Off"
           rlay_2 = "Off"
           rlay_3 = "Off"
           rlay_4 = "Off"
           messageDataMultirelay = {
             'num_serie' :  num_serie,
             'passw' : passw,
             'rlay_1' : "Off",
             'rlay_2' : "Off",
             'rlay_3' : "Off",
             'rlay_4' : "Off"
           }
           messageDataQr = {
             'qr_serie' :  data['data']['qr_serie'],
             'key_status' : "False",
             'gone_down' : '1'
           }
           baseUrl_multirelay = "https://hotspot.fjlic.com/api/sensor/qrunblock"
           response = requests.post(baseUrl_multirelay,data=messageDataMultirelay,headers=Accept)
           baseUrl_qr = "https://hotspot.fjlic.com/api/qr/unblock"
           response = requests.post(baseUrl_qr,data=messageDataQr,headers=Accept)
           json_str =  "Lectura Qr: (" + parse_str + ") Desactivando Sistema"
        else:
           json_str =  "Lectura Qr: (" + parse_str + ") No valido"
     else: 
        json_str =  "Lectura Qr: (" + parse_str + ") No valido"
    
   return json_str
    

def Read_Get_MultiRelay():
   parse_data = ""
   num_serie = '555597841'
   passw = 'rlay123'
   baseUrl = "https://hotspot.fjlic.com/api/sensor/"+num_serie
   Accept = {'Accept': 'application/json'}
   response = requests.get(baseUrl,headers=Accept)
   #data = response.text
   data = response.json()
   #print(data)
   if "trace" in data:
      parse_data = {
         'rlay_1' : rlay_1,
         'rlay_2' : rlay_2,
         'rlay_3' : rlay_3,
         'rlay_4' : rlay_4
      }
   else:
      parse_data = {
         'rlay_4' : data['data']['rlay_4'],
         'rlay_3' : data['data']['rlay_3'],
         'rlay_2' : data['data']['rlay_2'],
         'rlay_1' : data['data']['rlay_1']
      }
      rlay_1 = data['data']['rlay_1']
      rlay_2 = data['data']['rlay_2']
      rlay_3 = data['data']['rlay_3']
      rlay_4 = data['data']['rlay_4']
      
   
   json_str = json.dumps(parse_data)
   return json_str
   

def Write_Post_MultiRelay(json_data):
   num_serie = '555597841'
   passw = 'rlay123'
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
        'door_4' : json_data['door_4']
   }
   Accept = {'Accept': 'application/json'}
   response = requests.post(baseUrl,data=messageData,headers=Accept)
   #print(messageData)
   
def ConexionWifi(name_wifi, passw_wifi):
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
conectado = ConexionWifi(SSID, PASSWORD)
print(conectado)
rint('-------------------------------------------------------------------------------------------')
print("Preparando Puerto ")
sleep(10)
print("Inicio ")
while True:
      read_json_server = Read_Get_MultiRelay()
      arduino.write(read_json_server) # Le envia el comando  por consola
      print('--------------Datos-Multirelay-Server--------------------')
      print(read_json_server)
      read_jason_arduino = arduino.readline()
      print('--------------Datos-Multirelay-Arduino--------------------')
      print(read_jason_arduino)
      covert_str = str(read_jason_arduino)
      data_send = json.loads(covert_str)
      Write_Post_MultiRelay(data_send)
      print('---------------Datos-Qr-Module-------------------')
      read_qr = qr.readline()
      print(Read_Get_Srvr_Qr(read_qr))
      print('---------------Espera--1--Segundo-------------------')
      sleep(1)      
      
arduino.close() # Termina la comunicacion serial arduino
qr.close() # Termina la comunicacion serial lector de qr



