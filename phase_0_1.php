<?php
    function getRandomEmotion() {
        $emotions = ['sad and dislike', 'happy and like'];
        $randomKey = array_rand($emotions);
        return $emotions[$randomKey];
    }
    $randomMood = getRandomEmotion();

    session_start();
    $_SESSION['randomMood'] = $randomMood;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #D8D8D8;
            margin: 0;
        }

        .chat-container {
            width: 800px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .message {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            max-width: 70%;
            display: inline-block;
        }

        .message.left {
            background-color: #e1ffc7;
            align-self: flex-start;
        }

        .message.right {
            background-color: #d1e7ff;
            align-self: flex-end;
            float: right;
            clear: both;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="chat-container">
        <?php include('menu.php'); ?>
        
        <h5>Phase 0: Demographic Data</h5><br />
          
        <form method="POST" action="phase_2.php">
            <p>How old are you?</p>
                
            <div class="mb-3">
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="age" required>
            </div>
              
            <br /><p>What's your study program?</p>
                
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="study_program" required>
            </div>
                    
            <br /><p>What's your gender?</p>        
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="male" required>
              <label class="form-check-label">Male</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="female" required>
              <label class="form-check-label">Female</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="gender" value="others" required>
              <label class="form-check-label">Others</label>
            </div>
    
            <br /><h5>Phase 1: Emotion Calibration</h5><br />
            
            <p>1. How was your day so far?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_status" value="Terrible" required>
              <label class="form-check-label" for="inlineRadio1">Terrible</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_status" value="Bad" required>
              <label class="form-check-label" for="inlineRadio2">Bad</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_status" value="Okay" required>
              <label class="form-check-label" for="inlineRadio3">Okay</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_status" value="Good" required>
              <label class="form-check-label" for="inlineRadio2">Good</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_status" value="Great" required>
              <label class="form-check-label" for="inlineRadio3">Great</label>
            </div> 
            <br /><br />
            
            <p>2. Did anything good or bad happend or was it a day like any other?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_comparison" value="Terrible" required>
              <label class="form-check-label" for="inlineRadio1">Terrible: My day has been quite bad so far. Several things went wrong, like missing an important meeting and dealing with some personal issues.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_comparison" value="Bad" required>
              <label class="form-check-label" for="inlineRadio2">Bad: It's been a rough day. I've faced quite a few challenges, such as a project setback and some unexpected bad news.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_comparison" value="Okay" required>
              <label class="form-check-label" for="inlineRadio3">Okay: It's been an average day. Nothing particularly good or bad happened; it was just a typical day.</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_comparison" value="Good" required>
              <label class="form-check-label" for="inlineRadio2">Good: My day has been pretty good so far. I received some positive feedback at work and had a nice chat with a friend.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="day_comparison" value="Great" required>
              <label class="form-check-label" for="inlineRadio3">Great: It's been an excellent day! I got a promotion at work, and everything else has been going wonderfully.</label>
            </div> 
            <br /><br />
            
            <p>3. How is your current semester going?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="semester_status" value="Terrible" required>
              <label class="form-check-label" for="inlineRadio1">Terrible</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="semester_status" value="Bad" required>
              <label class="form-check-label" for="inlineRadio2">Bad</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="semester_status" value="Okay" required>
              <label class="form-check-label" for="inlineRadio3">Okay</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="semester_status" value="Good" required>
              <label class="form-check-label" for="inlineRadio2">Good</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="semester_status" value="Great" required>
              <label class="form-check-label" for="inlineRadio3">Great</label>
            </div> 
            <br /><br />
            
            <p>4. Do you feel very stressed or is everything going as planned?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stress_status" value="VeryStressed" required>
              <label class="form-check-label" for="inlineRadio1">Very Stressed: I'm feeling very stressed because nothing seems to be going as planned. It's been a challenging day.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stress_status" value="Stressed" required>
              <label class="form-check-label" for="inlineRadio2">Stressed: I'm quite stressed today. A few things haven't gone as planned, and it's been hard to manage.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stress_status" value="ModeratelyStressed" required>
              <label class="form-check-label" for="inlineRadio3">Moderately Stressed: I'm moderately stressed. Some things are going as planned, but there have been a few unexpected issues.</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stress_status" value="NotVeryStressed" required>
              <label class="form-check-label" for="inlineRadio2">Not Very Stressed: I'm not very stressed. Most things are going as planned, with only minor hiccups.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="stress_status" value="Relaxed" required>
              <label class="form-check-label" for="inlineRadio3">Relaxed: I'm feeling relaxed and stress-free. Everything is going as planned, and it's been a smooth day.</label>
            </div> 
            <br /><br />
            
            <p>5. How well did you sleep today?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sleep_status" value="Terrible" required>
              <label class="form-check-label" for="inlineRadio1">Terrible</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sleep_status" value="Bad" required>
              <label class="form-check-label" for="inlineRadio2">Bad</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sleep_status" value="Okay" required>
              <label class="form-check-label" for="inlineRadio3">Okay</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sleep_status" value="Good" required>
              <label class="form-check-label" for="inlineRadio2">Good</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="sleep_status" value="Great" required>
              <label class="form-check-label" for="inlineRadio3">Great</label>
            </div> 
            <br /><br />
            
            <p>6. Do you feel energized or are you very tired?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="energy_status" value="VeryTired" required>
              <label class="form-check-label" for="inlineRadio1">Very Tired: I'm feeling very tired. It's been an exhausting day, and I have little energy left.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="energy_status" value="Tired" required>
              <label class="form-check-label" for="inlineRadio2">Tired: I'm quite tired. It's been a long day, and I'm starting to feel worn out.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="energy_status" value="ModeratelyEnergized" required>
              <label class="form-check-label" for="inlineRadio3">Moderately Energized: I'm feeling moderately energized. I've had a busy day, but I still have some energy left.</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="energy_status" value="Energized" required>
              <label class="form-check-label" for="inlineRadio2">Energized: I'm feeling energized. I've had a productive day, and I'm still feeling good.</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="energy_status" value="VeryEnergized" required>
              <label class="form-check-label" for="inlineRadio3">Very Energized: I'm feeling very energized! It's been a fantastic day, and I have plenty of energy left.</label>
            </div> 
            <br /><br />
            <!--<p><em>The system responds in <span style="color: red;"><?php //echo $_SESSION['randomMood']; ?> </span>way!</em></p>-->

            <button type="submit" class="btn btn-success" name="phase_0_1_next_botton">Next</button>
        
        </form>

    </div>
</body>
</html>
