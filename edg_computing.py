# PASPBERRY PI FOR EDGE COMPUTING

# Temperature sensor reading
def read_temperature():
    # COD TO READ TEMPERATURE FROM SENSSOR
    temperature = 25.5 # PLACEHOLDER
    return temperature

# MOTION DETECTION
def detect_motion():
    # COD TO DETECT MOTION
    motion_detected = True # PLACEHOLDER VALUE
    return motion_detected

# EDG COMPUTING LOGIC
def edg_computing():
    temperature = read_temperature()
    motion_detected = detect_motion()

    # PERFORM LOCAL ACTIONS BASED IN DATA
    if temperature > 30:
        print("Temperature is too high. Turning on the Air conditioner.")
        # COD TO CONTROL THE AIR CONDITIONER

    if motion_detected:
        print("Motion detected.Sending alert to homeworker.")
        # COD TO SEND AN ALERT


# RUN EDGE COMPUTING LOGIC
edg_computing()
