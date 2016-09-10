#d=69+12*log(2)*(f/440)
#d is midi, f is frequency
import math
f=raw_input("Type the frequency to be converted to midi: ")
d=69+(12*math.log(float(f)/440))/(math.log(2))
d=int(d)
notes = ["C", "C#", "D", "D#", "E", "F", "F#", "G", "G#", "A", "A#", "B"]
print notes[d % len(notes)]
