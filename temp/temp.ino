#include <Wire.h>

#include <ADXL345.h>

#include <OneWire.h>
#include <DallasTemperature.h>

int pulse;
int temp_sensor = 5;       // Pin DS18B20 Sensor is connected to
int PulseSensorPurplePin = 0;
int temperature = 0;			//Variable to store the temperature in

OneWire oneWirePin(temp_sensor);

DallasTemperature sensors(&oneWirePin);

void setup(void){
  Serial.begin(9600);
  pinMode(A4, INPUT); 
  pinMode(A5, INPUT); 
  //Setup the LEDS to act as outputs
  
  sensors.begin();
}

void loop()
{
  pulse = analogRead(PulseSensorPurplePin);
  sensors.requestTemperatures(); 
  temperature = sensors.getTempCByIndex(0);
  Serial.print(temperature);
  Serial.print(" ");
  Serial.print(pulse);
  Serial.print(" ");
  Serial.println(analogRead(A4)-analogRead(A5)); 
  Serial.println();
  //Setup the LEDS to act as outputs
  delay(10000);
}


