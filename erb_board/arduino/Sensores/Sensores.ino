/* 
  CONEXIONES:
  5.0 V     VCC
  GND       GND
  PIN D2 pin2 // Envio de Pulso (-) ACTIVA ALGUN PANICO SE�AL NEGATIVA |Habilitado| POR DEFINIR
  PIN D3 pin3 // Envio de Pulso (-) ACTIVA ALGUN PANICO SE�AL NEGATIVA |Habilitado| POR DEFINIR
  PIN D4 pin4 // Envio de Pulso (-) ACTIVA SIRENA/FOCO SE�AL NEGATIVA |Habilitado| CABLE AMARILLO NEGRO
  PIN D5 pin5 // Envio de Pulso (-) ACTIVA ALGUN PANICO SE�AL NEGATIVA |Habilitado| CABLE CAFE NEGRO
  PIN D6 pin6 // Envio de Pulso (+) Activa Relay # 1 |Habilitado| CABLE VERDE SOLIDO
  PIN D7 pin7 // Envio de Pulso (+) Activa Relay # 2 |Habilitado| CABLE BLANCO SOLIDO
  PIN D8 pin8 // Envio de Pulso (+) Activa Relay # 3 |Habilitado| CABLE AMARILLO SOLIDO
  PIN D9 pin9 // Envio de Pulso (+) Activa Relay # 4 |Habilitado| CABLE NARANJA SOLIDO
  PIN D10 pin10 // Lectura de Pulso (-) Toma lectura todo el tiempo de pulso negativo |Habilitado| POR DEFINIR
  PIN D11 pin11 // LECTURA PUERTO RS232 CON GPS RX |HABILITADO| CABLE ROJO NEGRO
  PIN D12 pin12 // LECTURA PUERTO RS232 CON GPS TX |HABILITADO| CABLE AZUL NEGRO
  PIN D13 pin13 // Indicador Led de Estados (+) Indicado cambio de estados en los sensores |Habilitado| VISIBLE DE LA TARJETA ARDUINO NANO
  PIN ANALOGO A0 // Lectura de Pulso (-) Toma lectura todo el tiempo de pulso negativo |Habilitado| PUERTAS CAFE SOLIDO
  PIN ANALOGO A1 // Lectura de Pulso (-) Toma lectura todo el tiempo de pulso negativo |Habilitado| JAMMER NEGRO ROJO
  PIN ANALOGO A2 // Lectura de Pulso (-) Toma lectura todo el tiempo de pulso negativo |Habilitado| AZUL RESTABLECIMIENTO DE TIEMPO CABLE AZUL SOLIDO
  PIN ANALOGO A3 // Lectura de Pulso (+) Toma lectura todo el tiempo y sea mayor a 1.0 volt. |Habilitado|CABLE POR DEFINIR
  PIN ANALOGO A4 // Lectura de Pulso (+) Toma lectura todo el tiempo y sea mayor a 1.0 volt. |Habilitado|CABLE NARANJA
  PIN ANALOGO A5 // Lectura de Pulso (+) Toma lectura todo el tiempo y sea mayor a 1.0 volt. |Habilitado|CABLE AMARILLO
*/
#include <ArduinoJson.h>

int relay_1 = 7; // Relay A # 1
int relay_2 = 8; // Relay B # 2
int relay_3 = 9; // Relay C # 3
int relay_4 = 6; // Relay D # 4
int puerta_1 = 10; // Puerta 1
int puerta_2 = 14; // Puerta 2
int puerta_3 = 15; // Puerta 3
int puerta_4 = 16; // Puerta 4
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

// the loop function runs over and over again forever
void loop() {
  //digitalWrite(relay_1, HIGH);
  //digitalWrite(relay_2, HIGH);
  //digitalWrite(relay_3, HIGH);
  //digitalWrite(relay_4, HIGH);
  //delay(5000);
  //digitalWrite(relay_1, LOW);
  //digitalWrite(relay_2, LOW);
  //digitalWrite(relay_3, LOW);
  //digitalWrite(relay_4, LOW);
  //delay(5000);
  
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
         digitalWrite(relay_1, HIGH);
         //Serial.print("Relay_1: ");
         //Serial.println(rlay_1);
         }
         else if(rlay_1.equals("Off"))
         {
         digitalWrite(relay_1, LOW);
         //Serial.print("Relay_1: ");
         //Serial.println(rlay_1);
         }
         else{
         //Serial.print("Erro_Relay_1: ");
         //Serial.println(rlay_1);
         }
     
         if(rlay_2.equals("On"))
         { 
         digitalWrite(relay_2, HIGH);
         //Serial.print("Relay_2: ");
         //Serial.println(rlay_2);
         }
         else if(rlay_2.equals("Off"))
         {
         digitalWrite(relay_2, LOW);
         //Serial.print("Relay_2: ");
         //Serial.println(rlay_2);
         }
         else{
         //Serial.print("Erro_Relay_2: ");
         //Serial.println(rlay_2);
         }
     
         if(rlay_3.equals("On"))
         { 
         digitalWrite(relay_3, HIGH);
         //Serial.print("Relay_3: ");
         //Serial.println(rlay_3);
         }
         else if(rlay_3.equals("Off"))
         {
         digitalWrite(relay_3, LOW);
         //Serial.print("Relay_3: ");
         //Serial.println(rlay_3);
         }
         else{
         //Serial.print("Erro_Relay_3: ");
         //Serial.println(rlay_3);
         }
     
         if(rlay_4.equals("On"))
         { 
         digitalWrite(relay_4, HIGH);
         //Serial.print("Relay_4: ");
         //Serial.println(rlay_4);
         }
         else if(rlay_4.equals("Off"))
         {
         digitalWrite(relay_4, LOW);
         //Serial.print("Relay_4: ");
         //Serial.println(rlay_4);
         }
         else{
         //Serial.print("Erro_Relay_4: ");
         //Serial.println(rlay_4);
         }
         
         ////////////////////
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
         //delay(1000);
         ////////////////////
       }
   }
  
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////FUNCIONES REUTILIZABLES PARA EL PROGRAMA///////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

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

//--FUNCION QUE RETORNA VALOR Y PERMITE PODER CONVERTIR LOS VALOR TOMADOS POR EL PIN ANALOGO A5 Y ASI TRADUCIRLOS A VALOR DE VOLTAGE REAL--//
void Lectura_Entrada_Analoga_A3_A4_A5() //FUNCION QUE RECIVE POR PARAMETRO 5 VALORES DE TIPO FLOAT
{
   sensorValue_A3 = analogRead(analog_posi_A3);// REALIZAR LA LECTURA PARA EL PIN ANALOGO A3 Y SABER SI EXISTE VOLTAGE CABLE NARANJA SOLIDO
   voltage_A3 = fmap(sensorValue_A3, 0, 1023, 0.0, 5.0);// cambiar escala a 0.0 - 5.0
   vol_1 = voltage_A3;
   sensorValue_A4 = analogRead(analog_posi_A4);// REALIZAR LA LECTURA PARA EL PIN ANALOGO A4 Y SABER SI EXISTE VOLTAGE CABLE NARANJA SOLIDO
   voltage_A4 = fmap(sensorValue_A4, 0, 1023, 0.0, 5.0);// cambiar escala a 0.0 - 5.0
   vol_2 = voltage_A4;
   sensorValue_A5 = analogRead(analog_posi_A5);// REALIZAR LA LECTURA PARA EL PIN ANALOGO A5 Y SABER SI EXISTE VOLTAGE CABLE AMARILLO SOLIDO
   voltage_A5 = fmap(sensorValue_A5, 0, 1023, 0.0, 5.0);// cambiar escala a 0.0 - 5.0 
   vol_3 = voltage_A5;
}

//--FUNCION QUE RETORNA VALOR Y PERMITE PODER CONVERTIR LOS VALOR TOMADOS POR EL PIN ANALOGO A5 Y ASI TRADUCIRLOS A VALOR DE VOLTAGE REAL--//
void Lectura_Entrada_Digital_D10_D14_D15_D16() //FUNCION QUE RECIVE POR PARAMETRO 5 VALORES DE TIPO FLOAT
{
     door_1 = digitalRead(10); // TOMA DE LECTURA DE ENTRADA DIGITAL PIN 10 PARA SABER SI EXISTE PULSO NEGATIVO PUERTAS (-) CABLE CAFE SOLIDO
     if(door_1.equals("1"))
     {
      door_1 = "Off";
     }
     else if(door_1.equals("0"))
     {
      door_1 = "On";
     }

     door_2 = digitalRead(14); // TOMA DE LECTURA DE ENTRADA DIGITAL PIN 14 PARA SABER SI EXISTE PULSO NEGATIVO PUERTAS (-) CABLE CAFE SOLIDO
     if(door_2.equals("1"))
     {
      door_2 = "Off";
     }
     else if(door_2.equals("0"))
     {
      door_2 = "On";
     }
     
     door_3 = digitalRead(15); // TOMA DE LECTURA DE ENTRADA DIGITAL PIN 15 PARA SABER SI EXISTE PULSO NEGATIVO JAMMER (-) CABLE NEGRO ROJO
     if(door_3.equals("1"))
     {
      door_3 = "Off";
     }
     else if(door_3.equals("0"))
     {
      door_3 = "On";
     }
     
     door_4 = digitalRead(16); // TOMA DE LECTURA DE ENTRADA DIGITAL PIN 16 PARA SABER SI EXISTE PULSO NEGATIVO SIRENA (-) CABLE AZUL SOLIDO
     if(door_4.equals("1"))
     {
      door_4 = "Off";
     }
     else if(door_4.equals("0"))
     {
      door_4 = "On";
     }
}
