import serial
import time
import spidev
from gpiozero import LED
from signal import pause
import os
import requests
import json

led = LED(5)
led_coin = LED(6)
led_pub = LED(41)
led.on()#initial state
led_coin.on()#initial state
led_pub.on()#initial state
contador_global=0
time_publicidad=0
time_demo=0
x=0
constante=0x01
band = 0
datos=[]
spi = spidev.SpiDev()
spi.open(0,0)
spi.mode = 0b00
spi.max_speed_hz = 1000
spi.lsbfirst =  False
moneda_insertada=0;

def leer_contador(ruta_archivo):
    global contador_global,datos
    archivo = open(ruta_archivo, "r")
    datos = archivo.read().split(":")
    contador_global=int(datos[1])
    print(datos)
    archivo.close()
    
def guardar_contador(ruta_archivo):
    global contador_global,datos
    archivo = open(ruta_archivo, "w")
    datos_g = str(datos[1])+":"+str(contador_global)
    archivo.write(datos_g)
    print(datos)
    archivo.close()

def enviar_contador():
    global contador_global
    url = "https://hotspot.fjlic.com/api/cont/test" # 
    payload = {"crd_id": "1",
               "nfc_id": "1",
               "num_serie": "70000000001",
               "cont_qr": "1",
               "cont_mon":str(contador_global),
               "cont_mon_2": "1",
               "cont_corte": "1",
               "cont_prem": "1",
               "cost_mon":"1",
               "ssid": "GalexIOT",
               "passwd": "Galex",
               "ip_server": "1",
               "port": "1",
               "token": "1",
               "text": "1"} #nombre del conjunto
    header = {"Accept": "application/json"} 
    response_decoded_json = requests.post(url, data=payload, headers=header)
    datas = response_decoded_json.json() # lista de videos  del conjunto (Diccionario)
    print(response_decoded_json)
    print(datas)
    guardar_contador("/home/pi/Desktop/contador.txt")
    
    
    
def read_from(port = 1):
    #SPI stuff
    global band,moneda_insertada
    global spi
    read_from = [0x10 + port]
 
    #_________________MONEDERO_____________________________________________ 


    # pregunta que si el MONEDERO tiene datos  
    data = spi.xfer2([0x10,0x10]) # lee numero de caracteres de  puerto 2
    print ("Numero de caracteres Monedero",data)
    if data[0x01]!=0x00:
        data_1=[0x20,0x06]
        for elem in range(int(data[1])):
            data_1.append(0x00)
        #lee los caracteres  que tiene  puerto 2
            data = spi.xfer2(data_1)
            print ("Caracteres:",data)
            print(type(data))
            if set(data)==set([ 3, 172]):
                moneda_insertada=moneda_insertada+1
                band=1
            #       print ("Moneda 1") 
            if set(data)==set([ 3, 173]):
                moneda_insertada=moneda_insertada+2
                band=1
            #	  print ("Moneda 2")
            if set(data)==set([ 3, 174]):
                moneda_insertada=moneda_insertada+5
                band=1
                print ("Moneda 5")
            if set(data)==set([3, 175]):
                moneda_insertada=moneda_insertada+10
                band=1
                print ("Moneda 10")
 
    
#_________________BILLETERO_____________________________________________  

    # pregunta que si el billeteto tiene datos  
    data = spi.xfer2([0x11,0x11]) # lee numero de caracteres de  puerto 2
    print ("Numero de caracteres",data)
    # si el billetero tiene datos lee los datos
    if data[0x01]!=0x00:
        data_1=[0x21,0x06]
        for elem in range(int(data[1])):
            data_1.append(0x00)
            #lee los caracteres  que tiene  puerto 2
            data = spi.xfer2(data_1)
            print ("Caracteres:",data)
            if 64 in data:
                print ("billete de 20 ")
                band=1
            if 65 in data:
                print ("billete de 50")
                band=1
            if 66 in data:
                print ("billete de 100 ")
                band=1
            if 67 in data:
                print ("billete de 200 ")	
                band=1
            if 68 in data:
                print ("billete de 500 ")
                band=1
    else:
        print ("No hay caracteres")

 

def juego():
    global moneda_insertada,time_demo,band,contador_global
    print(moneda_insertada)
    if(moneda_insertada>0):
        credito=moneda_insertada/10
        while(credito>0):
            led_coin.on()
            led_pub.off()
            time.sleep(0.25)
            led_coin.off()
            time.sleep(0.25)
            time_demo=time_demo+180 # se agrega 3 minutos de tiempo de demo
            print ("credito")
            credito=credito-1
            contador_global=contador_global+1
            enviar_contador()		
        band=0
        moneda_insertada=moneda_insertada%10
	
	
def pantalla():
    global time_demo,time_publicidad
    if(time_demo>0):
        led_pub.off()
        time_publicidad=0
        time_demo=time_demo-1
    else:
        led_pub.on()#initial state
        time_publicidad=time_publicidad+1
        if(time_publicidad>24):
            time_demo=35
            time_publicidad=0
            
            
            
        
    
 
 #port = serial.Serial("/dev/ttyS0", baudrate=9600, timeout=0.5)

try :
	leer_contador("/home/pi/Desktop/contador.txt")
	while x<30000:         
		time.sleep(1)
		read_from()
		pantalla()
		juego()
		x=x+1
except KeyboardInterrupt:
		spi.close()

