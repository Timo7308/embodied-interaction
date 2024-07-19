<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Chatbot</title>
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
        .button-container {
            text-align: right;
        }

        .btn-custom {
            font-size: 1.25rem; /* Increase font size */
            padding: 10px 50px; /* Increase padding */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>


    <div class="chat-container">
        
        <center><h2>Welcome to Embodied Interaction Chatbot Test!</h2><br></br><img src="coverimage.webp" style="width: 100%;" /></center>
        <br></br> <h5>Data protection declaration</h5><br></br>

        <p>Dear Participant,<br></br>


           We are pleased about your interest in participating in this scientific study! Our sturdy analyzes the role of emotions while chatting with an AI chatbot.
           This study is being conducted as part of the course Embodied Interaction at the University of Bremen. The data may be accessed by the course instructor or the supervisor/reviewer of the scientific work for the purposes of performance evaluation. According to Art. 89 para. 1 GDPR, the collected data may generally be stored indefinitely.
           You have the right to be informed by the responsible party of this study about the collected personal data, as well as the right to rectification, deletion, restriction of processing, objection to the processing, and the right to data portability.

           Your data will be used exclusively for scientific purposes.
           The research follows no commercial interest. We treat all your data with strict confidentiality.<br></br>

           If you have any questions regarding this survey, please feel free to contact the responsible persons of this study:<br></br>
           Course: Entertainment Computing (Robert Porzel, University of Bremen)<br></br>
           Responsible persons for this survey: Amin Aghazadeh Mahrousiyan, Timo Schuchmann, Elnaz Mohammadi Asl, Metasit Getrak<br></br>
           
          
           By clicking continue you agree to participate in this study.</p>

           <div class="button-container">
            <form action="phase_0_1.php" method="post">
                <button type="submit" class="btn btn-success btn-custom" name="phase_0_1_next_button">Continue</button>
            </form>
        </div>
    </div>
   
</body>
</html>
