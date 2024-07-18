<?php
session_start();

// Function to delete a record from the JSON file
function delete_record($indexToDelete) {
    $jsonFilePath = 'tests_data.json';
    $jsonData = file_get_contents($jsonFilePath);
    $dataArray = json_decode($jsonData, true);

    if ($dataArray === null) {
        echo "Error decoding JSON data.";
        exit;
    }

    if (isset($dataArray[$indexToDelete])) {
        unset($dataArray[$indexToDelete]);
        // Reindex the array after deletion
        $dataArray = array_values($dataArray);
        $newJsonData = json_encode($dataArray, JSON_PRETTY_PRINT);
        file_put_contents($jsonFilePath, $newJsonData);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $indexToDelete = intval($_POST['record_index']);
    delete_record($indexToDelete);
    // Redirect to prevent form resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results in Tabular Format</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            background-color: white;
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
    </style>
    <script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this record?");
    }
    </script>
</head>
<body>
    <div class="chat-container">
        <?php include('menu.php'); ?>

        <?php
        $jsonFilePath = 'tests_data.json';
        $jsonData = file_get_contents($jsonFilePath);
        $dataArray = json_decode($jsonData, true);

        if ($dataArray === null) {
            echo "Error decoding JSON data.";
            exit;
        }
        
        // Check if json_decode was successful
        if ($dataArray !== null) {
            $numberOfElements = count($dataArray);
            echo "Number of Participants: " . $numberOfElements."<hr />";
        }
        
        $counter = 0;
        $counter_two = 0;
        foreach ($dataArray as $index => $entry) {
            echo "<center><h4>Participant " . ++$counter . "</h4></center><br />";
            foreach ($entry as $key => $value) {
                $counter_two++;
                if (is_array($value)) {
                    $value = implode(", ", $value);

                }
                if($counter_two==5){
                    echo "<br /><h5><b>Phase 0: Demographic Data</b></h5><br />";
                }
                if($counter_two==8){
                    echo "<br /><h5><b>Phase 1: Emotion Calibration</b></h5><br />";
                }
                if($counter_two==14){
                    echo "<br /><h5><b>Phase 2: Interaction</b></h5><br />";
                }
                
                
                if($counter_two==16){
                    echo "<br />";
                }
                if($counter_two==18){
                    echo "<br />";
                }
                if($counter_two==20){
                    echo "<br />";
                }
                
                
                
                if($counter_two==21){
                    echo "<br /><h5><b>Phase 3: Questionnaire about AI Experience</b></h5><br />";
                }
                echo "<b>".htmlspecialchars($key) . ": </b><span style='color: blue;'>". htmlspecialchars($value) . "</span><br>";
            }
            $counter_two = 0;
            echo "
            <br /><form method='POST' onsubmit='return confirmDelete();'>
                <input type='hidden' name='record_index' value='$index'>
                <button type='submit' name='delete' class='btn btn-danger'>Delete</button>
            </form>
            <hr>";
        }
        ?>
    </div>
</body>
</html>
