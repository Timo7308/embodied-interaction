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
            background-color: #f0f0f0;
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
        <form action="phase_4.php" method="POST">
            
            <br /><h5>Phase 3: Questions about AI Experiences</h5><br />
            
            <p>1. My discussion with the system felt very natural and authentic.</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_experience" value="No Experience" required>
              <label class="form-check-label" for="inlineRadio1">Disagree</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_experience" value="Beginner" required>
              <label class="form-check-label" for="inlineRadio2">Slightly Disagree</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_experience" value="Intermediate" required>
              <label class="form-check-label" for="inlineRadio3">Neutral</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_experience" value="Advanced" required>
              <label class="form-check-label" for="inlineRadio2">Slightly Agree</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_experience" value="Advanced" required>
              <label class="form-check-label" for="inlineRadio2">Agree</label>
            </div>
            <br /><br />
            
            <p>2. Did your discussion with the system feel natural and authentic?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="natural_status" value="NotatAllNatural" required>
              <label class="form-check-label" for="inlineRadio1">Not at All Natural</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="natural_status" value="SomewhatUnnatural" required>
              <label class="form-check-label" for="inlineRadio2">Somewhat Unnatural</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="natural_status" value="MostlyNatural" required>
              <label class="form-check-label" for="inlineRadio2">Mostly Natural</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="natural_status" value="CompletelyNatural" required>
              <label class="form-check-label" for="inlineRadio2">Completely Natural</label>
            </div>
            <br /><br />
            
            <p>3. How much did you like the system?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="system_like_status" value="Disliked" required>
              <label class="form-check-label" for="inlineRadio1">Disliked</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="system_like_status" value="Neutral" required>
              <label class="form-check-label" for="inlineRadio2">Neutral</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="system_like_status" value="Liked" required>
              <label class="form-check-label" for="inlineRadio3">Liked</label>
            </div> 
            <br /><br />
            
            <p>4. Do you use AI systems in other contexts than learning?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_use_other" value="Never" required>
              <label class="form-check-label" for="inlineRadio1">Never</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_use_other" value="Rarely" required>
              <label class="form-check-label" for="inlineRadio2">Rarely</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_use_other" value="Sometimes" required>
              <label class="form-check-label" for="inlineRadio3">Sometimes</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_use_other" value="Often" required>
              <label class="form-check-label" for="inlineRadio3">Often</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="ai_use_other" value="Always" required>
              <label class="form-check-label" for="inlineRadio3">Always</label>
            </div> 
            <br /><br />
            
            <p>5. How much trust do you have in AI systems?</p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="trust_status" value="NoTrust" required>
              <label class="form-check-label" for="inlineRadio1">No Trust</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="trust_status" value="ModerateTrust" required>
              <label class="form-check-label" for="inlineRadio2">Moderate Trust</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="trust_status" value="HighTrust" required>
              <label class="form-check-label" for="inlineRadio3">High Trust</label>
            </div> 
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="trust_status" value="CompleteTrust" required>
              <label class="form-check-label" for="inlineRadio3">Complete Trust</label>
            </div> 
            <br /><br />
        
            <p>6. Anything you wanna say or comment on?</p>
             <div class="form-group">
                <textarea class="form-control" name="final_comment" rows="3"></textarea>
            </div>
            <br />
            
            <button type="submit" class="btn btn-success" name="final_submit">Submit</button>
        </form>

    </div>
</body>
</html>
