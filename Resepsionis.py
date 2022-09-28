import serial
import time
import pyautogui
ser = serial.Serial('COM7', timeout=5)

while True:
    try:
        dt = ser.readline().decode()
        if '<' in dt and '>' in dt:
            dt = dt.replace('<','')
            dt = dt.replace('>','')
            dt = dt.replace('\n','')
            pyautogui.typewrite(dt)
            print(dt)
        else:
            print(dt)
    except Exception as e:
        print(str(e))
    time.sleep(1)
