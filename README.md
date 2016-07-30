PHPDuino
============== 

This tool helps to send/receive information for an Arduino device or parallels, using USB port(initially of course).


Configuration
-------------

Below we have some steps to check and make basic configs to use PHPDuino:
- Plug your Arduino Board using your USB port
- Check the usb port that are you using. This code may help you to get it: `$ ls -la /dev | grep usb`
- Give permission to read and write in your USB port location. Example: `$ sudo chmod 770 /dev/cu.usbmodem1411`
- You will need to know the speed of communication with USB port that will be used between the Arduino Board and Application, like 9000 or 16000, for example.
- In some cases is necessary to use an capacitor of 10u between Reset PIN and Ground Pin to works well. 
