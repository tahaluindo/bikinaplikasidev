/*
 TESTING OLED CNC STORE
*/
#include <WiFi.h>
#include <HTTPClient.h>
#include <SPI.h>
#include <Wire.h>
#include <Adafruit_GFX.h>
#include <Adafruit_SSD1306.h>

#include <Adafruit_MLX90614.h>
#include "MAX30105.h"            // MAX3010x library
#include "heartRate.h"           // Heart rate calculating algorithm


MAX30105 particleSensor;

const byte RATE_SIZE = 4;        // Increase this for more averaging. 4 is good.
byte rates[RATE_SIZE];           // Array of heart rates
byte rateSpot = 0;
long lastBeat = 0;               // Time at which the last beat occurred
float beatsPerMinute;
int beatAvg;

#define SCREEN_WIDTH 128 // OLED display width, in pixels
#define SCREEN_HEIGHT 32 // OLED display height, in pixels

// Declaration for an SSD1306 display connected to I2C (SDA, SCL pins)
#define OLED_RESET     4 // Reset pin # (or -1 if sharing Arduino reset pin)
Adafruit_SSD1306 display(SCREEN_WIDTH, SCREEN_HEIGHT, &Wire, OLED_RESET);
Adafruit_MLX90614 mlx = Adafruit_MLX90614();

const int Buz = 4;

const char* ssid = "Zhaqueen 01";//wifi
const char* password = "02030511";

//Your Domain name with URL path or IP address with path
String serverName = "http://192.168.1.106:1880/update-sensor";//url ya

unsigned long lastTime = 0;
// Timer set to 10 minutes (600000)
//unsigned long timerDelay = 600000;
// Set timer to 5 seconds (5000)
unsigned long timerDelay = 5000;

void setup() {
  Serial.begin(115200);
  pinMode(Buz, OUTPUT);
  digitalWrite(Buz,LOW);

  Wire.setClock(400000);                         // Set I2C speed to 400kHz
  display.begin(SSD1306_SWITCHCAPVCC, 0x3C);
  mlx.begin();

   if(!display.begin(SSD1306_SWITCHCAPVCC, 0x3C)) { // Address 0x3C for 128x32
    Serial.println(F("SSD1306 allocation failed"));
    for(;;); // Don't proceed, loop forever
  }


  particleSensor.begin(Wire, I2C_SPEED_FAST);    // Use default I2C port, 400kHz speed
  particleSensor.setup();                        // Configure sensor with default settings
  particleSensor.setPulseAmplitudeRed(0x0A);     // Turn Red LED to low to indicate sensor is running


  WiFi.begin(ssid, password);
  Serial.println("Connecting");
   display.clearDisplay();
 display.setTextSize(1);
 display.setTextColor(WHITE);
 display.setCursor(20,0);
 display.println("CONNECTING");
  delay(2000);
  while(WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());


}

void loop() {

long irValue = particleSensor.getIR();              // Reading the IR value it will permit us to know if there's a finger on the sensor or not

  if (irValue > 50000)
  {

    if (checkForBeat(irValue) == true)                  //If a heart beat is detected, call checkForBeat as frequent as possible to get accurate value
    {
      long delta = millis() - lastBeat;                 //Measure duration between two beats
      lastBeat = millis();
      beatsPerMinute = 60 / (delta / 1000.0);           //Calculating the BPM
      if (beatsPerMinute < 255 && beatsPerMinute > 20)  //To calculate the average we strore some values (4) then do some math to calculate the average
      {
        rates[rateSpot++] = (byte)beatsPerMinute;       //Store this reading in the array
        rateSpot %= RATE_SIZE;                          //Wrap variable

        //Take average of readings
        beatAvg = 0;
        for (byte x = 0 ; x < RATE_SIZE ; x++)
          beatAvg += rates[x];
        beatAvg /= RATE_SIZE;

      }
    }
  }

  else
  {
  beatAvg = 0;
  }

  display.clearDisplay();
 display.setTextSize(1);
 display.setTextColor(WHITE);
 display.setCursor(20,0);
 display.println("SElAMAT BEKERJA");
 display.println("");
 display.print("Suhu Tubuh: ");
 display.print(mlx.readObjectTempC());
 display.println(" C");
 display.print("Denyut Nadi: ");
 display.println(beatAvg);
 if(mlx.readObjectTempC()>37){
    delay(1000);
    display.clearDisplay();
    display.setTextSize(1);
    display.setCursor(20,15);
    display.print("Anda Mengantuk!!");
    digitalWrite(Buz,HIGH);
    }
 else{
  digitalWrite(Buz,LOW);}

  kirim();

  display.display();

}

void kirim(){
  // Use WiFiClient class to create TCP connections
  WiFiClient client;
  const char * host = "192.168.100.71";            //default IP address
  const int httpPort = 80;

  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }

  // We now create a URI for the request. Something like /data/?sensor_reading=123
  String url = "/multisensor/kirimdata.php?suhu="+String(mlx.readObjectTempC())+"&denyut="+String(beatAvg);


  // This will send the request to the server
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 30000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
  while(client.available()){
    String line = client.readStringUntil('\r');
    Serial.print(line);

  }
  Serial.println();

  }