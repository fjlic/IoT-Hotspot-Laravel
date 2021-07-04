import requests
import json

url = "https://hotspot.fjlic.com/api/file/list"
payload = {"set": "demo"}
header = {"Accept": "application/json"} 
response_decoded_json = requests.post(url, data=payload, headers=header)
datas = response_decoded_json.json()

for data in datas['data']:
    url = "https://hotspot.fjlic.com/api/file/download"
    payload = {"id": data['id'], "name_file": data['name_file'], "set": data['set']}
    header = {"Accept": "application/json"} 
    video_post = requests.post(url, data=payload, headers=header).content
    with open(data['name_file'],'wb') as handler:
        handler.write(video_post)