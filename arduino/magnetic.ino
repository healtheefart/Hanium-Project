void setup() {

  // put your setup code here, to run once:

  Serial.begin(9600);

  pinMode(3,INPUT);

  pinMode(13,OUTPUT);

}



void loop() {

  // put your main code here, to run repeatedly:

  int a = digitalRead(3);

  Serial.println(a);

  if(a == HIGH)

  {

    digitalWrite(13,HIGH);

  }

  else{digitalWrite(13,LOW);}

  delay(100);

}
