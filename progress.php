<?php
session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercises</title>
    <link rel="stylesheet" href="bmiStyles.css">
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-button">Logout</a>
        <h1>Pick Your Exercise</h1>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="bmi.php">Calculate BMI</a>
            <a href="progress.php" class="active">Exercises</a>
            <a href="calories.php">Calculate Calories</a>
            <a href="tracker.php">Log Workouts</a>
        </div>
        
        <section class="purpose">
            <h2>What is the purpose of this page?</h2>
            <p>
                The purpose of this page is to provide you with a selection of exercises tailored to specific muscle groups. Whether you're targeting your abdominals, biceps, chest, or any other muscle group, you can find suitable exercises here to help you achieve your fitness goals.
            </p>
            <br>
            <p>
                Additionally, for personalized workout plans and further guidance, you can make use of our AI chatbot. Simply interact with the chatbot to receive customized recommendations based on your fitness level, goals, and preferences.
            </p>
        </section>
        <br>

        <!-- //Form for user input -->
        <form id="muscleForm">
        <label for="muscle_group">Select A Muscle Group:</label>
            <select id="muscle_group" name="muscle_group">
                <option value="abdominals">Abdominals</option>
                <option value="abductors">Abductors</option>
                <option value="adductors">Adductors</option>
                <option value="biceps">Biceps</option>
                <option value="calves">Calves</option>
                <option value="chest">Chest</option>
                <option value="forearms">Forearms</option>
                <option value="glutes">Glutes</option>
                <option value="hamstrings">Hamstrings</option>
                <option value="lats">Lats</option>
                <option value="lower_back">Lower Back</option>
                <option value="middle_back">Middle Back</option>
                <option value="neck">Neck</option>
                <option value="quadriceps">Quadriceps</option>
                <option value="traps">Traps</option>
                <option value="triceps">Triceps</option>
            </select>
            <button type="submit">Submit</button>
        </form> 

        <!-- Element to display fetched exercise data -->
        <ul id="exerciseList"></ul>
    </div>

    <script>
        // Function to handle form submission
        document.getElementById('muscleForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            // Get the user's selected muscle group from the form
            const muscleGroup = document.getElementById('muscle_group').value.trim();

            // Construct the API URL based on user input
            const url = `https://exercises-by-api-ninjas.p.rapidapi.com/v1/exercises?muscle=${muscleGroup}`;

            const options = {
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '30b5ac17a1msh24037f57de0e0a5p1fca6ejsn102d0ccddafd',
                    'X-RapidAPI-Host': 'exercises-by-api-ninjas.p.rapidapi.com'
                }
            };

            try {
                const response = await fetch(url, options);
                const result = await response.json(); // Parse response as JSON

                // Clear previous exercise list
                document.getElementById('exerciseList').innerHTML = '';

                // Create a list of exercises with instructions and equipment
                result.forEach(exercise => {
                    const exerciseItem = document.createElement('li');
                    exerciseItem.innerHTML = `
                        <strong>${exercise.name}</strong><br>
                        <em>Equipment:</em> ${exercise.equipment}<br>
                        <em>Instructions:</em> ${exercise.instructions}<br>
                        <br>
                    `;
                    document.getElementById('exerciseList').appendChild(exerciseItem);
                });
            } catch (error) {
                console.error(error);
            }
        });
    </script>

    <script type="text/javascript">
    (function(d, t) {
        var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
        v.onload = function() {
            window.voiceflow.chat.load({
            verify: { projectID: '660d5ce7a94d255b1a74ee47' },
            url: 'https://general-runtime.voiceflow.com',
            versionID: 'production'
            }).then(() => {
                setTimeout(function () {
                    window.voiceflow.chat.open();
                }, 1000)   
                });          
        }
        v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
    })(document, 'script');
    </script>

</body>
</html>

