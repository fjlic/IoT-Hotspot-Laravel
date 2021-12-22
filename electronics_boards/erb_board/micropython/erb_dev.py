#C:\Users\InoTec\Documents\PROYECTOS\ERB\DEV-ESP32-MCU

from machine import UART
from machine import SPI
from machine import Pin, I2C
from time import sleep
import network
import ujson
import urequests
import usocket as socket
import uselect as select
import os,machine, time

led = Pin( 2, Pin.OUT)

# Configuracion SPI para Multiuart
pin_spi_cs = Pin(5, Pin.OUT)
pin_spi_cs.on()

#spi = SPI(2,polarity=0, phase=0,baudrate=10000000,firstbit=SPI.MSB, sck=Pin(18), mosi=Pin(23), miso=Pin(19))
spi = SPI(2,polarity=0, phase=0,baudrate=10000000,firstbit=SPI.MSB, sck=Pin(18), mosi=Pin(23), miso=Pin(19))

# Configuracion Uart para  QR y MOnedero
qr = UART(2, 9600)                         # init with given baudrate # 2 RX2 TX2  

#---------Activar Ic2 para Ntack NXP-------------------------------------------------------------------
i2c = I2C(1, scl=Pin(22), sda=Pin(21), freq=400000)

#---------El Pin led es el 2  GPIO2--------------------------------------------------------------------
ledpin=2
coin_out=33 # Genera el credito a la maquina
coin_in=36 # si el credito se recibiera por pulso
pin = Pin(ledpin, Pin.OUT)
pin_coin_out = Pin(coin_out, Pin.OUT)
pin_coin_out.off()
pin_coin_in = Pin(coin_in, Pin.IN)
moneda=0 # monedas que se ha insertado por billtero o monedero
costo_moneda=int(5)

sleep(1)
#-------------------------------------------------
#ssid = "MotoG8Play"       #WiFi name
#ssid = "fjlic123"         #WiFi password
ssid = 'FJLIC'
password = 'Fjl1cFjfl0r35'

station = network.WLAN(network.STA_IF)
station.active(True)
station.connect(ssid, password)
intento=0

num_serie="9991"
cont_qr="0000"
cont_mon="41144"
cont_mon_2="00000"
cont_corte="11"
cont_prem="111"
ssid = 'FJLIC'
password = 'Fjl1cFjfl0r35'
ip_server="111"
port="11"
token="11"
text="11"

counter=0
counter_irq=0
band_qr=0

band=0
hola=bytearray([0x00]) # Auxiliar
suma_billetero=""
suma_monedero_1=""
suma_monedero_2=""
suma_qr=""
contador_time=0
band_server=0

def get_inicial_nfc():
  global costo_moneda

  try:
    block_3 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 8, 16))
    block_3 = Block_Parse_Nfc(block_3)
    sleep(.01)
    costo_moneda_1=int(block_3)
    if costo_moneda_1>0:
      costo_moneda=costo_moneda_1
    print ("costo moneda")
    print (costo_moneda)
  except:
    print("Sin poder escribir  contador de moneda en Nfc ")
    json_str = "Sin poder escribir  contador de moneda en Nfc "   
  


def conecta_wifi(ssid_1,password_1):
  global ssid,password,station,intento
  ssid=str(ssid_1)
  password=str(password_1)
  try:
    block_3 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 11, 16))
    block_3 = Block_Parse_Nfc(block_3)
    sleep(.01)
    block_4 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 12, 16))
    block_4 = Block_Parse_Nfc(block_4)
    ssid=str(block_3)+str(block_4) 
    block_3 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 13, 16))
    block_3 = Block_Parse_Nfc(block_3)
    sleep(.01)
    block_4 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 14, 16))
    block_4 = Block_Parse_Nfc(block_4)
    password=str(block_3)+str(block_4) 
    
  except:
    print("Sin poder conecta_wifi ")
    json_str = "Sin poder conecta_wifi "   
  
  station.connect(ssid, password)
  print (ssid)
  print (password)
  intento=0
  while station.isconnected() == False and intento<3:
   intento=intento+1
   station.connect(ssid, password)
   sleep(.5)
  print('Connection successful')
  print(station.ifconfig())
  
def Activa_dispositivos():
 # Activacion  Billetero
 Activa_billetero()
 sleep(0.5)
 # Activacion Monedero_1 
 Activa_monedero(0x41)
 sleep(0.5)

 #Activa monedero 2
 Activa_monedero(0x42)

 
 



def Activa_billetero():
# Activacion  Billetero
#qr.write(bytearray([0x02,0x3E])) # Activacion Billetero por Uart
 pin_spi_cs.off()              # Activacion Billetero por SPI
 spi.write(bytearray([0x40]))
 spi.write(bytearray([0x02]))
 spi.write(bytearray([0x02]))
 spi.write(bytearray([0x3E]))
 pin_spi_cs.on() 


def Activa_monedero(num_monedero):
 pin_spi_cs.off()    # Activacion Monedero por SPI
 spi.write(bytearray([num_monedero]))
 spi.write(bytearray([0x06]))
 spi.write(bytearray([0x90]))

 spi.write(bytearray([0x05]))
 spi.write(bytearray([0x01]))
 spi.write(bytearray([0x03]))
 spi.write(bytearray([0x99]))
 spi.write(bytearray([0xFF]))
 pin_spi_cs.on()

def obtener_buffer(num_buffer,num_buffer_2):
 global hola,band,suma_billetero,suma_monedero_1,suma_monedero_2,suma_qr
 hola=bytearray([0x00]) # Auxiliar
 num_bytes=bytearray([0x00]) # Auxiliar
 pin_spi_cs.off()
 spi.write_readinto(num_buffer,hola)
 spi.write_readinto(num_buffer,num_bytes)
 pin_spi_cs.on()
 if num_bytes[0]!=0x00:
  band=4
  pin_spi_cs.off()
  spi.write_readinto(num_buffer_2,hola)
  spi.write_readinto(bytearray([num_bytes[0]]),hola)
  for x in range(int(num_bytes[0])):
   spi.write_readinto(bytearray([0x01]),hola)
   for value in hola: 
    if num_buffer==bytearray([0x10]):
     suma_billetero=suma_billetero+","+str(hex(value))

    elif num_buffer==bytearray([0x11]):
     suma_monedero_1=suma_monedero_1+","+str(hex(value))
    elif num_buffer==bytearray([0x12]):
      suma_monedero_2=suma_monedero_2+","+str(hex(value))
    elif num_buffer==bytearray([0x13]):
       suma_qr=suma_qr+","+str(value)
  spi.write_readinto(bytearray([0xFF]),hola)
  pin_spi_cs.on()

def revisar_pulso():
 global moneda,band,suma_billetero,suma_monedero_1,suma_monedero_2,suma_qr
 if ",0x81,0x40" in suma_billetero:
  moneda=moneda+20
  suma_billetero=suma_billetero.replace(",0x81,0x40","",1) 
 elif ",0x81,0x41" in suma_billetero:
  moneda=moneda+50
  suma_billetero=suma_billetero.replace(",0x81,0x41","",1) 
 elif ",0x81,0x42" in suma_billetero:
  moneda=moneda+100
  suma_billetero=suma_billetero.replace(",0x81,0x42","",1) 
 elif ",0x81,0x43" in suma_billetero:
  moneda=moneda+200
  suma_billetero=suma_billetero.replace(",0x81,0x43","",1)  
 elif ",0x81,0x44" in suma_billetero:
  moneda=moneda+500
  suma_billetero=suma_billetero.replace(",0x81,0x44","",1) 
 elif ",0x29,0x2f" in suma_billetero:
  suma_billetero=suma_billetero.replace(",0x29,0x2f","")  
 elif ",0x16" in suma_billetero:
  suma_billetero=suma_billetero.replace(",0x16","")
 elif ",0x3e" in suma_billetero:
  suma_billetero=suma_billetero.replace(",0x3e","")
 elif ",0x80" in suma_billetero:
  suma_billetero=suma_billetero.replace(",0x80","")
 elif ",0x8f" in suma_billetero:

  suma_billetero=suma_billetero.replace(",0x8f","")
 elif ",0x2f" in suma_billetero:
  suma_billetero=suma_billetero.replace(",0x2f","")
 elif ",0x10" in suma_billetero:
  suma_billetero=suma_billetero.replace(",0x10","")
 
 #-----------------------------------------#
 if ",0x90,0x6,0x12,0x1,0x3,0xac" in suma_monedero_1:
  moneda=moneda+1
  suma_monedero_1=suma_monedero_1.replace(",0x90,0x6,0x12,0x1,0x3,0xac","",1) 

 elif ",0x90,0x6,0x12,0x2,0x3,0xad" in suma_monedero_1:
  moneda=moneda+2
  suma_monedero_1=suma_monedero_1.replace(",0x90,0x6,0x12,0x2,0x3,0xad","",1) 
 elif ",0x90,0x6,0x12,0x3,0x3,0xae" in suma_monedero_1:
  moneda=moneda+5
  suma_monedero_1=suma_monedero_1.replace(",0x90,0x6,0x12,0x3,0x3,0xae","",1) 
 elif ",0x90,0x6,0x12,0x4,0x3,0xaf" in suma_monedero_1:
  moneda=moneda+10
  suma_monedero_1=suma_monedero_1.replace(",0x90,0x6,0x12,0x4,0x3,0xaf","",1) 
 elif ",0x90,0x6,0x12,0x5,0x3,0xb0" in suma_monedero_1:
  coin_out_valido()
  suma_monedero_1=suma_monedero_1.replace(",0x90,0x6,0x12,0x5,0x3,0xb0","",1) 
 elif ",0x90,0x5,0x50,0x3,0xe8" in suma_monedero_1:
  suma_monedero_1=suma_monedero_1.replace(",0x90,0x5,0x50,0x3,0xe8","") 




 #-----------------------------------------#
 if ",0x90,0x6,0x12,0x1,0x3,0xac" in suma_monedero_2:
  moneda=moneda+1
  suma_monedero_2=suma_monedero_2.replace(",0x90,0x6,0x12,0x1,0x3,0xac","",1) 
 elif ",0x90,0x6,0x12,0x2,0x3,0xad" in suma_monedero_2:

  moneda=moneda+2
  suma_monedero_2=suma_monedero_2.replace(",0x90,0x6,0x12,0x2,0x3,0xad","",1) 
 elif ",0x90,0x6,0x12,0x3,0x3,0xae" in suma_monedero_2:
  moneda=moneda+5
  suma_monedero_2=suma_monedero_2.replace(",0x90,0x6,0x12,0x3,0x3,0xae","",1) 
 elif ",0x90,0x6,0x12,0x4,0x3,0xaf" in suma_monedero_2:
  moneda=moneda+10
  suma_monedero_2=suma_monedero_2.replace(",0x90,0x6,0x12,0x4,0x3,0xaf","",1) 
 elif ",0x90,0x6,0x12,0x5,0x3,0xb0" in suma_monedero_2:
  coin_out_valido()
  suma_monedero_2=suma_monedero_2.replace(",0x90,0x6,0x12,0x5,0x3,0xb0","",1) 
 elif ",0x90,0x5,0x50,0x3,0xe8" in suma_monedero_2:
  suma_monedero_2=suma_monedero_2.replace(",0x90,0x5,0x50,0x3,0xe8","") 
    

def coin_out_valido():
  pin_coin_out.on()
  sleep(0.02)
  sleep(0.01)
  pin_coin_out.off()
  sleep(0.02)

def generar_credito():
  global moneda
  pulsos=int(moneda/costo_moneda)

  if pulsos>0:
    Write_count_coin_Ntag_Nfc(pulsos)
    for x in range(pulsos):
      coin_out_valido()
    moneda=moneda%costo_moneda
    band_server=0
    envio_datos_server() 
  
def Block_ParseInt_Nfc(str_block):
    str_block = list(str_block) # list() hace una copia de la lista
    for i in range(0,16):
        if i < len(str_block):
          str_block[i] = ord(str_block[i]) # regresa el unicode del caracter
        else:
          str_block.append(ord(' '))
    
    return str_block
    
def Block_Parse_Nfc(str_block_1):
    str_block= str(str_block_1)
    data_parse = ""
    if str_block.startswith("b\'"):
      str_block=str_block.replace("b\'","")
    if str_block.endswith("\'"):
      str_block=str_block.replace("\'","")
    for value in str_block:
      if value!='|':
       data_parse += value
    return data_parse
    
    
def Block_Parse_Nfc_str(str_block):
    cadena=str(str_block)
    data_parse =cadena.strip()# quita espacios en blanco de la cadena
    #print(data_parse)  
    return data_parse  
    
    
    
def Write_count_coin_Ntag_Nfc(moneda): # lee contador de monedas  y aumenta uno
  moneda_1=int(moneda)
  try:
    block_3 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 5, 16))
    block_3 = Block_Parse_Nfc(block_3)
    print(block_3)
    sleep(.01)
    cuenta=int(block_3)
    cuenta=cuenta+moneda_1
    print(cuenta)
    block_3
    buf = bytearray(Block_ParseInt_Nfc(str(cuenta)))     # create a buffer with 16 bytes
    block_3 = i2c.writeto_mem(85, 5, buf)
   # sleep(.1)#print('Write data['key_1'])
    print(cuenta)
    json_str = "escribir contador de moneda en Nfc "
    
  except:
    print("Sin poder escribir  contador de moneda en Nfc " )
    json_str = "Sin poder escribir  contador de moneda en Nfc "   
  
  #pin.off()  
  return json_str
 
 
def Read_defalt_Ntag_Nfc(): # escribe  numeros en los 16 espacios de la ntag (funcion para pruebas)
  global num_serie, cont_qr, cont_mon, cont_mon_2, cont_corte, cont_prem, ssid, password, ip_server, port, text, cost_mon

  
  try:
    block_3 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 3, 16))
    banderas = Block_Parse_Nfc(block_3)
    sleep(.2)
    block_4 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 4, 16))
    num_serie = Block_Parse_Nfc(block_4)
    sleep(.2)
    print(num_serie)
    block_5 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 5, 16))
    cont_mon = Block_Parse_Nfc(block_5)
    sleep(.2)
    print(cont_mon)
    block_5_2 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 6, 16))
    cont_mon_2 = Block_Parse_Nfc(block_5_2)
    sleep(.2)
    print(cont_mon_2)
    block_6 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 7, 16))
    cont_qr = Block_Parse_Nfc(block_6)
    sleep(.2)
    #print(block_6)
    print(cont_qr)
    block_7 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 8, 16))
    cost_mon = Block_Parse_Nfc(block_7)
    sleep(.2)
    print(cost_mon)
    
    block_8 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 9, 16))
    cont_corte = Block_Parse_Nfc(block_8)
    sleep(.2)
    #print(block_8)
    print(cont_corte)
    block_9 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 10, 16))
    cont_prem = Block_Parse_Nfc(block_9)
    sleep(.2)
    #print(block_9)
    print(cont_prem)
    block_10 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 11, 16))
    ssid_1 = Block_Parse_Nfc(block_10)
    sleep(.2)
    #print(ssid_1)
    #print ("hola Leo....")
    block_11 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 12, 16))
    ssid_2 = Block_Parse_Nfc(block_11)
    ssid = str(ssid_1)+str(ssid_2) 
    sleep(.2)
    print(ssid)
    #print(ssid)
    block_12 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 13, 16))
    passw_1 = Block_Parse_Nfc(block_12)
    sleep(.2)
    #print(block_12)
    block_13 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 14, 16))
    passw_2 = Block_Parse_Nfc(block_13)
    password = str(passw_1)+str(passw_2) 
    print(password)
    #print(block_13)
    block_14 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 15, 16))
    ipsrv_1 = Block_Parse_Nfc(block_14)
    sleep(.2)
    #print(block_14)
    block_15 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 16, 16))
    ipsrv_2 = Block_Parse_Nfc(block_15)
    ip_server = str(ipsrv_1)+str(ipsrv_2) 
    #print(block_15)
    print(ip_server)
    block_16 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 17, 16))
    port = Block_Parse_Nfc(block_16)
    sleep(.2)
    #print(block_16)
    print(port)
    block_17 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 18, 16))
    dat_1 = Block_Parse_Nfc(block_17)
    sleep(.2)
    #print(block_17)
    block_18 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 19, 16))
    dat_2 = Block_Parse_Nfc(block_18)
    sleep(.2)
    #print(block_18)
    block_19 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 20, 16))
    dat_3 = Block_Parse_Nfc(block_19)
    sleep(.2)
    #print(block_19)
    block_20 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 21, 16))
    dat_4 = Block_Parse_Nfc(block_20)
    text = str(dat_1)+str(dat_2)+str(dat_3)+str(dat_4)
    print(text)
    print('fin......')
    
  except:
    print("Sin poder leer NFC ")
    json_str = "Sin poder leer NFC "  
  
def Write_defalt_Ntag_Nfc(): # escribe  numeros en los 16 espacios de la ntag (funcion para pruebas)
  #global num_serie,cont_qr,cont_mon,cont_corte,cont_prem,ssid,password,ip_server,port,token,text
  #pin.on()
  print ("hola....")
  buf = bytearray("9999999999999999")     # cero
  block_3 = i2c.writeto_mem(85, 3, buf)
  sleep(.1)
  buf = bytearray("8888888888888888")     # serie
  block_3 = i2c.writeto_mem(85, 4, buf)
  sleep(.1)
  buf = bytearray("7777777777777777")     # cuenta monedas
  block_3 = i2c.writeto_mem(85, 5, buf)
  sleep(.1)
  buf = bytearray("9999999999999999")     # cuenta monedas 2
  block_3 = i2c.writeto_mem(85, 6, buf)
  sleep(.1)
  buf = bytearray("6666666666666666")      # cuenta QR
  block_3 = i2c.writeto_mem(85, 7, buf)
  sleep(.1)
  buf = bytearray("5555555555555555")     # costo moneda
  block_3 = i2c.writeto_mem(85, 8, buf)
  sleep(.1)
  buf = bytearray("4444444444444444")     # tiempo entre cortes
  block_3 = i2c.writeto_mem(85, 9, buf)
  sleep(.1)
  buf = bytearray("3333333333333333")     # contador de premios

  block_3 = i2c.writeto_mem(85, 10, buf)
  sleep(.1)
  buf = bytearray("2222222222222222")     # ssid 32
  block_3 = i2c.writeto_mem(85, 11, buf)
  sleep(.1)
  block_3 = i2c.writeto_mem(85, 12, buf)
  sleep(.1)
  buf = bytearray("1111111111111111")     # password 32
  block_3 = i2c.writeto_mem(85, 13, buf)
  sleep(.1)
  block_3 = i2c.writeto_mem(85, 14, buf)
  sleep(.1)

  buf = bytearray("9999999999999999")     # ip server 32
  block_3 = i2c.writeto_mem(85, 15, buf)
  sleep(.1)
  block_3 = i2c.writeto_mem(85, 16, buf)
  sleep(.1)
  buf = bytearray("8888888888888888")     # puerto 16
  block_3 = i2c.writeto_mem(85, 17, buf)
  sleep(.1)
  buf = bytearray("7777777777777777")     # texto 64
  block_3 = i2c.writeto_mem(85, 18, buf)
  sleep(.1)
  block_3 = i2c.writeto_mem(85, 19, buf)
  sleep(.1)
  block_3 =i2c.writeto_mem(85, 20, buf)
  sleep(.1)
  block_3 = i2c.writeto_mem(85, 21, buf)
  sleep(.1)
 
def Write_count_qr_Ntag_Nfc():# lee contador de qr y aumenta uno
  try:
    block_3 = Block_Parse_Nfc_str(i2c.readfrom_mem(85, 7, 16))
    block_3 = Block_Parse_Nfc(block_3)
    sleep(.1)
    cuenta=int(block_3)
    cuenta=cuenta+1
    buf = bytearray(Block_ParseInt_Nfc(str(cuenta)))     # create a buffer with 16 bytes
    block_3 = i2c.writeto_mem(85, 7, buf)
    sleep(.1)#print('Write data['key_1'])
    print(cuenta)
    json_str = "escribir  contador de qr en Nfc "
  except:
    print("Sin poder escribir escribir  contador de qr en Nfc " )
    json_str = "Sin poder escribir escribir  contador de qr en Nfc "   
  return json_str
  
def envio_datos_server():
  global num_serie,costo_moneda, cont_qr, cont_mon, cont_corte, cont_prem, ssid , password, ip_server, port, token, text,cont_mon_2
  Read_defalt_Ntag_Nfc()
  json_str = ""
  baseUrl_contador = "https://hotspot.fjlic.com/api/cont/test"
  datosContador = {}
  
  datosContador['esp32_id']='1'
  datosContador['nfc_id']='1'
  datosContador['num_serie']=num_serie
  datosContador['cont_qr']=cont_qr
  datosContador['cont_mon']=cont_mon
  datosContador['cont_mon_2']=cont_mon_2
  datosContador['cont_corte']=cont_corte
  datosContador['cont_prem']=cont_prem
  datosContador['ssid']=ssid
  datosContador['passwd']=password
  datosContador['ip_server']=ip_server
  datosContador['port']=port
  datosContador['token']=token
  datosContador['text']=text
  datosContador['cost_mon']=str(costo_moneda)
  print("Pruebas de la Data")
  print(datosContador)
  sleep(1)
  hola=ujson.dumps(datosContador)
  Accept={}
  sleep(1)
  Accept["Content-Type"] = "application/json"
  print(" Peticion satisfactoria...")
  sleep(1)
  response_cont = urequests.post(baseUrl_contador,data=hola,headers=Accept)
  qr_json = response_cont.json() 
  sleep(1)
  print(qr_json )

  
#-------------------Main--------------------------------------
conecta_wifi('FJLIC','Fjl1cFjfl0r35')
Activa_dispositivos()
get_inicial_nfc()
print('__________________')
Read_defalt_Ntag_Nfc()
print('__________________')
while True:
 spi = SPI(2,polarity=0, phase=0,baudrate=10000000,firstbit=SPI.MSB, sck=Pin(18), mosi=Pin(23), miso=Pin(19))

 #Billetero

 Activa_billetero()

 obtener_buffer(bytearray([0x10]),bytearray([0x20]))
 obtener_buffer(bytearray([0x11]),bytearray([0x21]))
 obtener_buffer(bytearray([0x12]),bytearray([0x22]))
 obtener_buffer(bytearray([0x13]),bytearray([0x23]))
 
 
 print("_______________")

 print(suma_billetero)
 print(suma_monedero_1)
 print(suma_monedero_2)
 print(suma_qr)
 revisar_pulso()
 generar_credito()
 sleep(1)
    

 contador_time=contador_time+1  
 if (contador_time>=100 and band_server>=1):

  print("Moneda")
  envio_datos_server()
  contador_time=0
  band_server=0
 if (contador_time>=300):

  print("Programacion 10 min")
  envio_datos_server()
  contador_time=0
  band_server=0
 #sleep(1)