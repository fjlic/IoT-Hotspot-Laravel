# Firmware Erb 🚀

---

- [Diseño prototipo Erb](#desing-prototye-erb)
- [Codigo fuente Esp32](#source-code-ep32)
- [Codigo fuente AtMega328](#source-code-atmega)

<a name="desing-prototye-erb"></a>

### El diseño prototipo fue desarollado con [`Fritzing`](https://fritzing.org/) ⚡
<br>
Descarga el diseño y modificalo a tu necesidades [`Erb_Pcb`](https://github.com/fjlic/IoT-Hotspot-Laravel/blob/master/electronics_boards/erb_board/fritzing/SensorIOT/PcbSensor_Prod_10-03-2021.fzz)
<br>

![screenshot](https://hotspot.fjlic.com/storage/Images/Pcb_ERB.jpg)
<br>

### La pcb fue fabricada en [`JLCPCB`](https://jlcpcb.com/) 🏭
<br>

![screenshot](https://hotspot.fjlic.com/storage/Images/Pcb_ERB_Armada.jpg)
<br>

### El ensamble de los componentes fue en casa [`IoT-Hotspot`](https://hotspot.fjlic.com/docs/1.0/overview) 🌀
<br>

![screenshot](https://hotspot.fjlic.com/storage/Images/Pcb_ERB_Instalada.jpg)
<br>

### El micro Esp32 su firmware es [`Micropython`](http://www.micropython.org/download/esp32/) 🌀
### El micro AT-Mega328P su firmware es [`Arduino`](https://www.arduino.cc/en/software) 🌀
<br>

---

- [Diseño prototipo Erb](#desing-prototye-erb)
- [Codigo fuente Esp32](#source-code-ep32)
- [Codigo fuente AtMega328](#source-code-atmega)

<a name="source-code-ep32"></a>
## Codigo fuente Esp32(Micropython)

Consulta la url [`Erb-Micropython`](https://github.com/fjlic/IoT-Hotspot-Laravel/blob/master/electronics_boards/erb_board/micropython/main.py) aqui encontraras el codigo completo.

> {info} Directorio  `electronics_boards/erb_board/micropython/main.py`

```php

#----------------------------Libraries Code---------------------------------------------------------
import network
import ujson
import urequests
import usocket as socket
import uselect as select
import os,machine, time
import machine, onewire, ds18x20, time
from machine import Pin, I2C
from machine import UART
from machine import SPI
from time import sleep
#-----------------NetWork Wifi Config----------------------------------------------------------------
#SSID = "MotoG8Play"           #WiFi name
#PASSWORD = "fjlic123"         #WiFi password
SSID = 'FJLIC'
PASSWORD = 'Fjl1cFjfl0r35'
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
#nfc_ntag = I2C(1, scl=Pin(22), sda=Pin(21), freq=400000)
#print(i2c.scan())              # scan for slave devices
#---------------------------------------------------------------------------------------------------
#------------------------Uart seria # 1------------------------------------------------------------
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
temp_1 = "0.0"
temp_2 = "0.0"
temp_3 = "0.0"
temp_4 = "0.0"
vol_1 = "Off"
vol_2 = "Off"
vol_3 = "Off"
door_1 = "Off"
door_2 = "Off"
door_3 = "Off"
door_4 = "Off"
rlay_1 = "Off"
rlay_2 = "Off"
rlay_3 = "Off"
rlay_4 = "Off"
text = "Test Sensor # 1000000001 OK"
ds_pin = machine.Pin(4)
ds_sensor = ds18x20.DS18X20(onewire.OneWire(ds_pin))
roms = ds_sensor.scan()
sensor=""

def ConnectionWifi(name_wifi, passw_wifi):
    global wlan,intent
    wlan = network.WLAN(network.STA_IF)  #Create WLAN object
    wlan.active(True)                    #Activate the interface
    intent=0
    while wlan.isconnected() == False and intent < 3:
      intent=intent+1
      wlan.connect(name_wifi, passw_wifi)
      sleep(.5)
    if  wlan.isconnected() == True:
     pin.on()
    else:
     pin.off()
    rest_wlan = wlan.ifconfig()          #Get the IP/netmask/gw/DNS address of the interface
    return rest_wlan

def Post_Status_Sensor():
       #Obtiene los datos por Post (Valores, Temperatura - Puertas)
       #Misma logica que sensor modify solo que  aqui no se amnda a llamar get_Sensor()
   return json_str
   
def Post_Modify_Sensor():
   global wlan,SSID, PASSWORD, num_serie, passw, temp_1, temp_2, temp_3, temp_4, vol_1, vol_2, vol_3, door_1, door_2, door_3, door_4, rlay_1, rlay_2, rlay_3, rlay_4, baseUrl, Accept
   json_str=""
   get_Sensor()
   if wlan.isconnected()==False:
       ConnectionWifi(SSID,PASSWORD)
   if wlan.isconnected()==True:
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
       print("----------Peticion ESP32 - Modify-----------------------------------------------")
       print(messageData)
       ujsonMessage=ujson.dumps(messageData)
       response = urequests.post(urlTmp,data=ujsonMessage,headers=Accept)
       data = response.json()
       print("----------Respuesta de la Plataforma-------------------------------------------")
       print(data)
       rlay_1 = data['data']['rlay_1']
       rlay_2 = data['data']['rlay_2']
       rlay_3 = data['data']['rlay_3']
       rlay_4 = data['data']['rlay_4']
       relay_status = {'rlay_4' : data['data']['rlay_4'],
                       'rlay_3' : data['data']['rlay_3'],
                       'rlay_2' : data['data']['rlay_2'],
                       'rlay_1' : data['data']['rlay_1']
                       }
       json_str = ujson.dumps(relay_status)
   return json_str

def get_Sensor():
  global temp_1,temp_2,temp_3,temp_4,ds_sensor,roms
  ds_sensor.convert_temp()
  time.sleep_ms(750)
  for rom in roms:
    temp_1=str(ds_sensor.read_temp(rom))
    temp_2=str(ds_sensor.read_temp(rom))
    temp_3=str(ds_sensor.read_temp(rom))
    temp_4=str(ds_sensor.read_temp(rom))
connect = ConnectionWifi(SSID, PASSWORD)
Post_Status_Sensor()

while True:
      accoun_global=accoun_global+1
      if (accoun_global>=16):
            accoun_global=0
            band_server=0
            read_json_srvr = Post_Modify_Sensor()
            nano_serial.write(read_json_srvr) # Le envia el comando  por consola
      sleep(0.5)
nano_serial.close() # Termina la comunicacion serial arduino
a9g_serial.close() # Termina la comunicacion serial lector de a9g

```

<a name="source-code-atmega"></a>
## Codigo fuente AtMega328(Arduino)

Consulta la url [`Erb-Aduino`](https://github.com/fjlic/IoT-Hotspot-Laravel/blob/master/electronics_boards/erb_board/arduino/Sensores/Sensores.ino) aqui encontraras el codigo completo.

> {info} Directorio  `https://github.com/fjlic/IoT-Hotspot-Laravel/blob/master/electronics_boards/erb_board/arduino/Sensores/Sensores.ino`

```php

#include <ArduinoJson.h>

int relay_1 = 7; // Relay A # 1
int relay_2 = 8; // Relay B # 2
int relay_3 = 9; // Relay C # 3
int relay_4 = 6; // Relay D # 4
int puerta_1 = 10; // Puerta 1
int puerta_2 = 14; // Puerta 2
int puerta_3 = 15; // Puerta 3
int puerta_4 = 16; // Puerta 4
const int LED = 13;
String data = "";
String vol_1 = "0.00";
String vol_2 = "0.00";
String vol_3 = "0.00";
String door_1 = "Off";
String door_2 = "Off";
String door_3 = "Off";
String door_4 = "Off";

const int analog_posi_A3 = A3; // ASIGNACION DEL PIN ANALOGO A4 COMO SENSOR DE LECTURA CONSTANTE POSTIVO CABLE AMARILLO
int sensorValue_A3; // VALOR QUE ALMACENA EL VALOR EN EXADECOMA Y LO TRADUCE A ENTERO (0 a 1023) POSTIVO CABLE AMARILLO
float voltage_A3;  // VARIABLE QUE ALMACENA LA LECTURA DE VOLTAGE (0.0 Volt a 5.0 Volt) POSTIVO CABLE AMARILLO

const int analog_posi_A4 = A4; // ASIGNACION DEL PIN ANALOGO A4 COMO SENSOR DE LECTURA CONSTANTE POSTIVO CABLE AMARILLO
int sensorValue_A4; // VALOR QUE ALMACENA EL VALOR EN EXADECOMA Y LO TRADUCE A ENTERO (0 a 1023) POSTIVO CABLE AMARILLO
float voltage_A4;  // VARIABLE QUE ALMACENA LA LECTURA DE VOLTAGE (0.0 Volt a 5.0 Volt) POSTIVO CABLE AMARILLO
  
const int analog_posi_A5 = A5; // ASIGNACION DEL PIN ANALOGO A4 COMO SENSOR DE LECTURA CONSTANTE POSITIVO CABLE NARANJA
int sensorValue_A5; // VALOR QUE ALMACENA EL VALOR EN EXADECOMA Y LO TRADUCE A ENTERO (0 a 1023) CABLE NARANJA
float voltage_A5;  // VARIABLE QUE ALMACENA LA LECTURA DE VOLTAGE (0.0 Volt a 5.0 Volt) CABLE NARANJA
  
void setup() {
  
  Serial.begin(115200);
  // initialize digital pin Relays.
  pinMode(LED,OUTPUT);
  pinMode(relay_1, OUTPUT);
  pinMode(relay_2, OUTPUT);
  pinMode(relay_3, OUTPUT);
  pinMode(relay_4, OUTPUT);
  // initialize sesor door pin diodes pulse (-)
  pinMode(puerta_1, INPUT_PULLUP);
  pinMode(puerta_2, INPUT_PULLUP);
  pinMode(puerta_3, INPUT_PULLUP); 
  pinMode(puerta_4, INPUT_PULLUP);

}
void loop() {
   while(Serial.available()){
      char character = Serial.read();
      if(character != '}'){
         data.concat(character);
      }
      else{
         data.concat('}');
         //Serial.println(data);
         StaticJsonBuffer<200> jsonBuffer;
         JsonObject& root = jsonBuffer.parseObject(data);
         JsonObject& root2 = jsonBuffer.createObject();
         data = "";
         if(!root.success()){
         Serial.println("Dessincronizado Fail()");
         }
         
         String rlay_1 = root["rlay_1"];
         String rlay_2 = root["rlay_2"];
         String rlay_3 = root["rlay_3"];
         String rlay_4 = root["rlay_4"];
         
         if(rlay_1.equals("On"))
         {
         //digitalWrite(LED,HIGH);
         digitalWrite(relay_1, HIGH);
         //Serial.print("Relay_1: ");
         //Serial.println(rlay_1);
         }
         else if(rlay_1.equals("Off"))
         {
         //digitalWrite(LED,LOW);
         digitalWrite(relay_1, LOW);
         //Serial.print("Relay_1: ");
         //Serial.println(rlay_1);
         }
         else{
         Serial.print("Erro_Relay_1: ");
         Serial.println(rlay_1);
         }
     
         if(rlay_2.equals("On"))
         {
         //digitalWrite(LED,HIGH); 
         digitalWrite(relay_2, HIGH);
         //Serial.print("Relay_2: ");
         //Serial.println(rlay_2);
         }
         else if(rlay_2.equals("Off"))
         {
         //digitalWrite(LED,LOW);
         digitalWrite(relay_2, LOW);
         //Serial.print("Relay_2: ");
         //Serial.println(rlay_2);
         }
         else{
         Serial.print("Erro_Relay_2: ");
         Serial.println(rlay_2);
         }
     
         if(rlay_3.equals("On"))
         {
         //digitalWrite(LED,HIGH);
         digitalWrite(relay_3, HIGH);
         //Serial.print("Relay_3: ");
         //Serial.println(rlay_3);
         }
         else if(rlay_3.equals("Off"))
         {
         //digitalWrite(LED,LOW);
         digitalWrite(relay_3, LOW);
         //Serial.print("Relay_3: ");
         //Serial.println(rlay_3);
         }
         else{
         Serial.print("Erro_Relay_3: ");
         Serial.println(rlay_3);
         }
     
         if(rlay_4.equals("On"))
         {
         //digitalWrite(LED,HIGH);
         digitalWrite(relay_4, HIGH);
         //Serial.print("Relay_4: ");
         //Serial.println(rlay_4);
         }
         else if(rlay_4.equals("Off"))
         {
         //digitalWrite(LED,LOW);
         digitalWrite(relay_4, LOW);
         //Serial.print("Relay_4: ");
         //Serial.println(rlay_4);
         }
         else{
         Serial.print("Erro_Relay_4: ");
         Serial.println(rlay_4);
         }
         Actualizar_Lectura_Analogas_Digitales();
         while(!Serial){
         }
         root2["vol_1"] = vol_1;
         root2["vol_2"] = vol_2;
         root2["vol_3"] = vol_3;
         root2["door_1"] = door_1;
         root2["door_2"] = door_2;
         root2["door_3"] = door_3;
         root2["door_4"] = door_4;
         root2.printTo(Serial);
         Serial.println();
         delay(1000);
       }
   }  
}
//--FUNCION QUE RETORNA VALOR Y PERMITE PODER CONVERTIR LOS VALOR TOMADOS POR EL PIN ANALOGO A5 Y ASI TRADUCIRLOS A VALOR DE VOLTAGE REAL--//
float fmap(float x, float in_min, float in_max, float out_min, float out_max) //FUNCION QUE RECIVE POR PARAMETRO 5 VALORES DE TIPO FLOAT
{
   return (x - in_min) * (out_max - out_min) / (in_max - in_min) + out_min; // RETORNA COMO RESULTADO DE LA OPERACION ARITMETICA EL VALOR DE VOLTAGE REAL (ENTERO CON DECIMALES EJEMPLO 4.3) 
}
//--FUNCION QUE RETORNA VALOR Y PERMITE PODER CONVERTIR LOS VALOR TOMADOS POR EL PIN ANALOGO A5 Y ASI TRADUCIRLOS A VALOR DE VOLTAGE REAL--//
void Actualizar_Lectura_Analogas_Digitales() //FUNCION QUE RECIVE POR PARAMETRO 5 VALORES DE TIPO FLOAT
{
    Lectura_Entrada_Analoga_A3_A4_A5();
    Lectura_Entrada_Digital_D10_D14_D15_D16();
}

```


<larecipe-newsletter></larecipe-newsletter>