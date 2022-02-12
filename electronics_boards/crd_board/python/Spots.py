import os
from os import remove
import requests
import json

url = "https://hotspot.fjlic.com/api/file/list" # 
payload = {"set": "demo_1"} #nombre del conjunto
header = {"Accept": "application/json"} 
response_decoded_json = requests.post(url, data=payload, headers=header)
datas = response_decoded_json.json() # lista de videos  del conjunto (Diccionario)
print(response_decoded_json)
print(datas)

direccion_local="/home/pi/Desktop/videos"
list_videos=os.listdir(direccion_local)
print(list_videos) 
download_video=[]
url_video=[]
remove_video=[]
#Lista de videos de la plataforma
for data in datas['data']:
    url_video.append(data['name_file'])
    if not(data['name_file'] in list_videos):
        download_video.append(data)

# Eliminar videos  duplicados
for key in list_videos:
    if not(key in url_video) and not(key=='Spots.py') :
        remove_video.append(key)
        remove(key)

print("---------------------------------------")
print (remove_video)
    
#Descargar videos si haen falta
status_video=0
try:
 last_video=""
 for data in download_video:
    url = "https://hotspot.fjlic.com/api/file/download"
    payload = {"id": data['id'], "name_file": data['name_file'], "set": data['set']}
    header = {"Accept": "application/json"} 
    video_post = requests.post(url, data=payload, headers=header).content
    last_video=data['name_file']
    with open(data['name_file'],'wb') as handler:
        handler.write(video_post)  
 status_video=1
except:
 status_video=0   
 remove(last_video)
#peticion para mandar si se genero algun error
url = "https://hotspot.fjlic.com/api/crd/status"
payload = {"num_serie": "333344441", "nick_name": "Crd_1", "status_video":status_video,"status_crd":1}
header = {"Accept": "application/json"} 
video_status = requests.post(url, data=payload, headers=header).content
print(video_status)