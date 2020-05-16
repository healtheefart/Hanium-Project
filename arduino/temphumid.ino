#include <DHT11.h>

int pin=2;    // 연결한 아두이노 디지털 핀 번호
DHT11 dht11(pin); 
void setup()
{
   Serial.begin(9600);
}
 
void loop()
{
  float temp, humi;
  dht11.read(humi, temp);
  Serial.print("temperature:");
  Serial.print(temp);
  Serial.print(" humidity:");
  Serial.print(humi);
  Serial.println();
}
