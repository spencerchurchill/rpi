#algor the car
#first attempt at atonomous driving
#by spencer churchill
print "Algor the Car"

from BrickPi import *
import threading

BrickPiSetup()
BrickPi.MotorEnable[PORT_A] = 1
BrickPi.MotorEnable[PORT_B] = 1
BrickPi.SensorType[PORT_4] = TYPE_SENSOR_TOUCH
BrickPiSetupSensors()

algor = True
go = True

speed = 150

def forward():
   BrickPi.MotorSpeed[PORT_A] = -speed
   BrickPi.MotorSpeed[PORT_B] = -speed
def reverse():
   BrickPi.MotorSpeed[PORT_A] = speed
   BrickPi.MotorSpeed[PORT_B] = speed
def turn():
   BrickPi.MotorSpeed[PORT_A] = speed
   BrickPi.MotorSpeed[PORT_B] = -speed

class myThread (threading.Thread):
   def __init__(self, threadID, name, counter):
      threading.Thread.__init__(self)
      self.threadID = threadID
      self.name = name
      self.counter = counter
   def run(self):
      while go:
         BrickPiUpdateValues()
         #print BrickPi.Sensor[PORT_4]
thread1 = myThread(1, "Thread-1", 1)
thread1.setDaemon(True)
thread1.start()

while algor:
   try:
      if BrickPi.Sensor[PORT_4] == 1:
         reverse()
         time.sleep(.3)
         turn()
         time.sleep(.3)
      forward()
   except KeyboardInterrupt:
      algor = False
      go = False
      break
