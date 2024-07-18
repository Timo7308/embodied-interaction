<?php
    session_start();
    function sendToApi($prompt){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $api_key = 'sk-proj-sm7NyGgNDn4Kgpaiz5wIT3BlbkFJZqlx97GM8nzRQZw9q9Fv';  // Replace YOUR_API_KEY with your actual OpenAI API key
        
            // OpenAI API endpoint for chat model
            $url = 'https://api.openai.com/v1/chat/completions';
        
            // Prepare the data to be sent to the API
            $data = [
                'model' => 'gpt-3.5-turbo-1106',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful assistant.'],
                    ['role' => 'user', 'content' => $prompt]
                ]
            ];
        
            // Initialize cURL session
            $ch = curl_init($url);
        
            // Set cURL options
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $api_key,
            ]);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        
            // Execute cURL request and get the response
            $response = curl_exec($ch);
        
            // Check for cURL errors
            if ($response === false) {
                echo "<h1>Error</h1><p>Curl error: " . curl_error($ch) . "</p>";
                curl_close($ch);
                exit;
            }
        
            curl_close($ch);
            $result = json_decode($response, true);
        
            // Check for errors in the API response
            if (isset($result['error'])) {
                echo "<h1>Error</h1><p>API error: " . $result['error']['message'] . "</p>";
            } 
            else {
                $output = $result['choices'][0]['message']['content'] ?? 'No response from API.';
                echo "<p>$output</p>";
                
            }
        return $output;
        }
    }
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
            /*height: 100vh;*/
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
        
        
        <?php
            if(isset($_POST['final_submit'])){
                
                $_SESSION['ai_experience'] = $_POST['ai_experience'];
                $_SESSION['natural_status'] = $_POST['natural_status'];
                $_SESSION['system_like_status'] = $_POST['system_like_status'];
                $_SESSION['ai_use_other'] = $_POST['ai_use_other'];
                $_SESSION['trust_status'] = $_POST['trust_status'];
                $_SESSION['final_comment'] = $_POST['final_comment'];   
                
            }
        ?>
        
        <center>
            
            
        <?php
            
            
            echo "<span>ChatID (automatically assigned by system): ".$_SESSION['chatID']."<br />";
            echo "System's mood (randomly chosen): ".$_SESSION['randomMood']."<br />";
            echo "Topic (selected by the user): "."<span style='color: red;'>".$_SESSION['topic']."</span><br />";
            echo "Chat started at: ".$_SESSION['start_date']."<br />";
            echo "<hr />";
            echo "<h3>Phase 0: Demographic Data</h3><br />";
            echo "User's age: "."<span style='color: red;'>".$_SESSION['age']."</span><br />";
            echo "User's study program: "."<span style='color: red;'>".$_SESSION['study_program']."</span><br />";
            echo "User's gender: "."<span style='color: red;'>".$_SESSION['gender']."</span><br />";
            echo "<hr />";
            echo "<h3>Phase 1</h3><br />";
        ?>
            
            
            
            
            <p>1. How was your day so far? <span style="color: red;"><?php echo $_SESSION['day_status']; ?></span></p>
            <p>2. Did anything good or bad happend or was it a day like any other? <span style="color: red;"><?php echo $_SESSION['day_comparison']; ?></span></p>
            <p>3. How is your current semester going? <span style="color: red;"><?php echo $_SESSION['semester_status']; ?></span></p>
            <p>4. Do you feel very stressed or is everything going as planed? <span style="color: red;"><?php echo $_SESSION['stress_status']; ?></span></p>
            <p>5. How well did you sleep today? <span style="color: red;"><?php echo $_SESSION['sleep_status']; ?></span></p>
            <p>6. Do you feel energized or are you very tired? <span style="color: red;"><?php echo $_SESSION['energy_status']; ?></span></p>
            
            
            
            
        <?php   
            echo "<hr />";
            echo "<h3>Phase 2: Interaction</h3><br />";
            echo $_SESSION['first_ai_question']."<br />"; 
            echo "<span style='color: red;'>".$_SESSION['first_user_answer']."</span><br />";
            echo "<br />";
            echo $_SESSION['second_ai_question']."<br />";
            echo "<span style='color: red;'>".$_SESSION['second_user_answer']."</span><br />";
            echo "<br />";
            echo $_SESSION['third_ai_question']."<br />";
            echo "<span style='color: red;'>".$_SESSION['third_user_answer']."</span><br />";
            echo "<br />";
            echo $_SESSION['ai_final_sentences']."<br />";  
            echo "<hr />";
            echo "<h3>Phase 3: Questions about AI Experiences</h3><br />";
        ?>

            <p>1. How much experience do you have with AI systems? <span style="color: red;"><?php echo $_SESSION['ai_experience']; ?></span></p>
            <p>2. Did your discussion with the system felt natural and authentic? <span style="color: red;"><?php echo $_SESSION['natural_status']; ?></span></p>
            <p>3. How much did you like the system? <span style="color: red;"><?php echo $_SESSION['system_like_status']; ?></span></p>
            <p>4. Do you use AI systems in other contexts than learning? <span style="color: red;"><?php echo $_SESSION['ai_use_other']; ?></span></p>
            <p>5. How much trust do you have in AI systems? <span style="color: red;"><?php echo $_SESSION['trust_status']; ?></span></p>
            <p>6. Anything you wanna say or comment on?<br /><span style="color: red;"><?php echo $_SESSION['final_comment']; ?></span></p>
        
        <?php

            echo "<hr />";
        ?>

        <?php
            if (!isset($_POST['session_clear'])) {
                ?>
                <form method="POST">
                    <button type="submit" class="btn btn-success" name="session_clear">Submit your answers!</button>
                </form>
                <?php
            }
        ?>
        <?php
            if(isset($_POST['session_clear'])){


                echo "<h3>Finished! Thanks!</h3>";
                echo "<br /><a href='https://aminagzd.ir/embodied_interaction/'>Go to the first page!</a><br /><br />";
                
                
                $chatID = $_SESSION['chatID'];
                $randomMood = $_SESSION['randomMood'];
                $topic = $_SESSION['topic'];
                $start_date = $_SESSION['start_date'];
                
                $age = $_SESSION['age'];
                $study_program = $_SESSION['study_program'];
                $gender = $_SESSION['gender'];
                
                $day_status = $_SESSION['day_status'];
                $day_comparison = $_SESSION['day_comparison'];
                $semester_status = $_SESSION['semester_status'];
                $stress_status = $_SESSION['stress_status'];
                $sleep_status = $_SESSION['sleep_status'];
                $energy_status = $_SESSION['energy_status'];
                
                $first_ai_question = $_SESSION['first_ai_question'];
                $first_user_answer = $_SESSION['first_user_answer'];
                $second_ai_question = $_SESSION['second_ai_question'];
                $second_user_answer = $_SESSION['second_user_answer'];
                $third_ai_question = $_SESSION['third_ai_question'];
                $third_user_answer = $_SESSION['third_user_answer'];
                $ai_final_sentences = $_SESSION['ai_final_sentences'];
                
                $ai_experience = $_SESSION['ai_experience'];
                $natural_status = $_SESSION['natural_status'];
                $system_like_status = $_SESSION['system_like_status'];
                $ai_use_other = $_SESSION['ai_use_other'];
                $trust_status = $_SESSION['trust_status'];
                $final_comment = $_SESSION['final_comment'];

                // Define the path to the JSON file
                $jsonFilePath = 'tests_data.json';
                
                // Check if the JSON file exists and has content
                if (file_exists($jsonFilePath) && filesize($jsonFilePath) > 0) {
                    // Read the existing data from the file
                    $jsonData = file_get_contents($jsonFilePath);
                    // Decode the JSON data into an array
                    $dataCollection = json_decode($jsonData, true);
                } else {
                    // Initialize an empty array if the file doesn't exist or is empty
                    $dataCollection = [];
                }
                
                // Create an associative array with all the current session variables you need to save
                $data = array(
                    "ChatID (automatically assigned by system)" => $_SESSION['chatID'],
                    "System's mood (randomly chosen)" => $_SESSION['randomMood'],
                    "Topic (selected by the user)" => $_SESSION['topic'],
                    "Chat started at" => $_SESSION['start_date'],
                    "User's age" => $_SESSION['age'],
                    "User's study program" => $_SESSION['study_program'],
                    "User's gender" => $_SESSION['gender'],
                    "1. How was your day so far?" => $_SESSION['day_status'],
                    "2. Did anything good or bad happen or was it a day like any other?" => $_SESSION['day_comparison'],
                    "3. How is your current semester going?" => $_SESSION['semester_status'],
                    "4. Do you feel very stressed or is everything going as planned?" => $_SESSION['stress_status'],
                    "5. How well did you sleep today?" => $_SESSION['sleep_status'],
                    "6. Do you feel energized or are you very tired?" => $_SESSION['energy_status'],
                    "First AI question" => $_SESSION['first_ai_question'],
                    "User's answer to the first question" => $_SESSION['first_user_answer'],
                    "Second AI question" => $_SESSION['second_ai_question'],
                    "User's answer to the second question" => $_SESSION['second_user_answer'],
                    "Third AI question" => $_SESSION['third_ai_question'],
                    "User's answer to the third question" => $_SESSION['third_user_answer'],
                    "AI ending" => $_SESSION['ai_final_sentences'],
                    "1. How much experience do you have with AI systems?" => $_SESSION['ai_experience'],
                    "2. Did your discussion with the system feel natural and authentic?" => $_SESSION['natural_status'],
                    "3. How much did you like the system?" => $_SESSION['system_like_status'],
                    "4. Do you use AI systems in other contexts than learning?" => $_SESSION['ai_use_other'],
                    "5. How much trust do you have in AI systems?" => $_SESSION['trust_status'],
                    "6. Anything you wanna say or comment on?" => $_SESSION['final_comment']
                );
                
                // Append the new data to the existing array
                $dataCollection[] = $data;
                
                // Convert the updated array back to JSON
                $jsonData = json_encode($dataCollection, JSON_PRETTY_PRINT);
                
                // Save the JSON data back to the file
                file_put_contents($jsonFilePath, $jsonData);

                $_SESSION = array();
                session_destroy();
                
        ?>    
        <?php       
            }
        ?>
        </center>

    </div>
</body>
</html>