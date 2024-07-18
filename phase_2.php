<?php

    session_start();   
    if(isset($_SESSION['randomMood'])){
        
        $randomMood = $_SESSION['randomMood'];
        
    }
    //echo $randomMood;

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
        

            
            if(isset($_POST['phase_0_1_next_botton'])){
                
                
                date_default_timezone_set('Europe/Paris');
                
                $_SESSION['start_date'] = date('Y/m/d H:i');
                
                $_SESSION['chatID'] = $_POST['age'].date('YmdHis');
                
                $_SESSION['age'] = $_POST['age'];
                $_SESSION['study_program'] = $_POST['study_program'];
                $_SESSION['gender'] = $_POST['gender'];
                
                $_SESSION['day_status'] = $_POST['day_status'];
                $_SESSION['day_comparison'] = $_POST['day_comparison'];
                $_SESSION['semester_status'] = $_POST['semester_status'];
                $_SESSION['stress_status'] = $_POST['stress_status'];
                $_SESSION['sleep_status'] = $_POST['sleep_status'];
                $_SESSION['energy_status'] = $_POST['energy_status'];
    
                
?>

        <h5>Phase 2: Interaction</h5>
        <?php //echo "System responds in <span style='color: red;'>".$randomMood."</span> way!<br />"; ?>
        <div class="message left">
            <p>Let's chat! Please select a Topic!</p>
            <form action="" method="post">
                <label>
                    <input type="radio" name="topic" value="Movie" required> Movie
                </label><br>
                <label>
                    <input type="radio" name="topic" value="Music" required> Music
                </label><br />
                <label>
                    <input type="radio" name="topic" value="Technology" required> Technology
                </label><br>
                <label>
                    <input type="radio" name="topic" value="Social Media" required> Social Media
                </label><br><br />
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
        <br />

<?php
                
                
                
                
                
                
                
                
                
                
            }
        ?>



        <?php
            $topic = $_POST['topic'];
            
            
            
            $stepCounter = 1;
            //echo "<p>Your Chosen Topic: ".$topic."</p>";
        ?>
            <?php 
                
                if($_POST['topic']){
                    
                    $_SESSION['topic'] = $_POST['topic'];
                    
                    echo "<div class='message right'>";
                    echo $topic;
                    echo "</div><br /><br />";
                }
            ?>
        
            <?php
                if($_POST['topic']){
                    $stepCounter++;
                    echo "<div class='message left'>";
                    $first_prompt = "To the question: about which topic do you want to talk about, the user replies: $topic. Write one $randomMood comment to the user's reply. And ask another $randomMood short question related to the same topic.";
                    $firstPromptResponse = sendToApi($first_prompt); 
                    $_SESSION['first_ai_question'] = $firstPromptResponse;
                    //echo $randomMood;
            ?>
                    <!--<p><em>The system responds in <span style="color: red;"><?php //echo $_SESSION['randomMood']; ?> </span>way!</em></p>-->
                    <form method="post">
                        <textarea type="text" name="input_one" placeholder="Type your answer..." class="form-control"></textarea>
                        <br /><input type="submit" value="Submit" class="btn btn-success">
                    </form>
            <?php
                    echo "</div>";
                }
            ?>
            <?php 
            
                if($_POST['input_one']){
                    echo "<div class='message right'>";
            
                    $input_one = $_POST['input_one'];
                    echo $input_one;
                    $_SESSION['first_user_answer'] = $input_one;
                    
                    echo "</div><br /><br />";
                }
            ?>
            
            <?php
                if($_POST['input_one']){
                    echo "<div class='message left'>";
                    $second_prompt = "To the question: $firstPromptResponse, the user replies: $input_one. Write one $randomMood comment to the user's reply. And ask another $randomMood short question related to the same topic.";
                    $secondPromptResponse = sendToApi($second_prompt);
                    $_SESSION['second_ai_question'] = $secondPromptResponse;
                    //echo $randomMood;
            ?>
                    <!--<p><em>The system responds in <span style="color: red;"><?php //echo $_SESSION['randomMood']; ?> </span>way!</em></p>-->
                    <form method="post">
                        <textarea type="text" name="input_two" placeholder="Type your answer..." class="form-control"></textarea>
                        <br /><input type="submit" value="Submit" class="btn btn-success">
                    </form>
            <?php
                    echo "</div>";
                }
            ?>
            

            <?php 
            
                if($_POST['input_two']){
                    echo "<div class='message right'>";
            
                    $input_two = $_POST['input_two'];
                    echo $input_two;
                    $_SESSION['second_user_answer'] = $input_two;
                    
                    echo "</div><br /><br />";
                }
            ?>
            
            <?php
                if($_POST['input_two']){
                    echo "<div class='message left'>";
                    $third_prompt = "To the question: $secondPromptResponse, the user replies: $input_two. Write one $randomMood comment to the user's reply. And ask another $randomMood short question related to the same topic.";
                    $thirdPromptResponse = sendToApi($third_prompt); 
                    $_SESSION['third_ai_question'] = $thirdPromptResponse;
                    //echo $randomMood;
            ?>
                    <!--<p><em>The system responds in <span style="color: red;"><?php //echo $_SESSION['randomMood']; ?> </span>way!</em></p>-->
                    <form method="post">
                        <textarea type="text" name="input_three" placeholder="Type your answer..." class="form-control"></textarea>
                        <br /><input type="submit" value="Submit" class="btn btn-success">
                    </form>
            <?php
                    echo "</div>";
                }
            ?>
            
            <?php 
            
                if($_POST['input_three']){
                    echo "<div class='message right'>";
            
                    $input_three = $_POST['input_three'];
                    echo $input_three;
                    $_SESSION['third_user_answer'] = $input_three;
                    
                    echo "</div><br /><br />";
                }
            ?>
            
            <?php
                if($_POST['input_three']){
                    echo "<div class='message left'>";
                    $fourth_prompt = "To the question: $thirdPromptResponse, the user replies: $input_three. Write one $randomMood comment to the user's reply. And end the conversation and say have a nice day and thanks for your time :)";
                    $fourthPromptResponse = sendToApi($fourth_prompt); 
                    $_SESSION['ai_final_sentences'] = $fourthPromptResponse;
                    //echo $randomMood;
            ?>
            
                    <!--<p><em>The system responds in <span style="color: red;"><?php //echo $_SESSION['randomMood']; ?> </span>way!</em></p>-->
                    <!--<form method="post">-->
                    <!--    <input type="text" name="input_three" placeholder="Type your answer...">-->
                    <!--    <input type="submit" value="Submit">-->
                    <!--</form>-->
            <?php
                    echo "</div>";
            ?>         
                    
                    
            <p>Please participate in our survey!</p>
            <form action="phase_3.php" method="POST">
                <button class="btn btn-success" name="final_phase" type="submit">Go to the survery</button>
            </form> 
                    
                    
            <?php
                }
            ?>

    </div>
</body>
</html>