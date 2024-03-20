# /usr/bin/env python3


from pyclbr import Class
import RPI.GPIO as GPIO
import os
from http.server import BaseHTTPRequestHandler, HTTPServer

host_name = '192.168.1.49' # ip of my pi.
host_port = 22


def setupGPIO():
   GPIO.setmode(GPIO.BCM)
   GPIO.setwarnings(False)

   GPIO.setup(18, GPIO.OUT) # Voor koma noteerGPIO Pin die wordt gebruikt.


def getTemperature():
   temp = os.popen("/opt/vc/bin/vcgencmd measure_temp").read() 
   return temp   # Dit in windows directory.

class