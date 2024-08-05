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
    <title>Calorie Calculator</title>
    <link rel="stylesheet" href="bmiStyles.css">
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-button">Logout</a>
        <h1>Calculate Calories</h1>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="bmi.php">Calculate BMI</a>
            <a href="progress.php">Exercises</a>
            <a href="calories.php" class="active">Calculate Calories</a>
            <a href="tracker.php">Log Workouts</a>
        </div>

        <section class="purpose">
            <h2>Why Calculate Calories?</h2>
            <p>
                Calculating your daily calorie intake is essential for maintaining a healthy lifestyle. It helps you understand how much energy your body needs to perform its daily functions and activities.
            </p>
            <br>
            <p>
                By knowing your daily calorie intake, you can make informed decisions about your diet and nutrition, ensuring that you consume the right amount of calories to achieve your health and fitness goals, whether it's weight loss, weight maintenance, or muscle gain.
            </p>
            <br>
            <p>
                Additionally, for personalized nutrition plans tailored to your specific needs and goals, you can make use of our AI chatbot. Interact with the chatbot to receive customized recommendations based on your dietary preferences, fitness level, and health objectives.
            </p>
        </section>
        <br>
        
           <!-- Form for daily calorie intake calculation -->
           <form id="calorieForm">
            <label for="age">Enter Age:</label>
            <input type="text" id="age" name="age">
            <label for="weight">Enter Weight (in kg):</label>
            <input type="text" id="weight" name="weight">
            <label for="gender">Select Gender:</label>
            <select id="gender" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <label for="activityLevel">Select Activity Level:</label>
            <select id="activityLevel" name="activityLevel">
                <option value="level_1">Sedentary (little to no exercise)</option>
                <option value="level_2">Lightly active (light exercise/sports 1-3 days a week)</option>
                <option value="level_3">Moderately active (moderate exercise/sports 3-5 days a week)</option>
                <option value="level_4">Very active (hard exercise/sports 6-7 days a week)</option>
                <option value="level_5">Super active (very hard exercise/sports & physical job)</option>
            </select>
            <button type="submit">Calculate Daily Calorie Intake</button>
        </form>

        <!-- Element to display fetched daily calorie intake -->
        <div id="dailyCalories"></div>
    </div>

    <script>
        // Function to handle form submission for daily calorie intake calculation
        document.getElementById('calorieForm').addEventListener('submit', async function(event) {
            event.preventDefault(); // Prevent default form submission behavior

            // Get user input from the form
            const age = document.getElementById('age').value;
            const weight = document.getElementById('weight').value;
            const gender = document.getElementById('gender').value; // Retrieve gender value
            const activityLevel = document.getElementById('activityLevel').value;

            // Construct the API URL based on user input
            const url = `https://fitness-calculator.p.rapidapi.com/dailycalorie?age=${age}&gender=${gender}&height=180&weight=${weight}&activitylevel=${activityLevel}`;
            const options = {
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': '30b5ac17a1msh24037f57de0e0a5p1fca6ejsn102d0ccddafd',
                    'X-RapidAPI-Host': 'fitness-calculator.p.rapidapi.com'
                }
            };

            try {
                const response = await fetch(url, options);
                const result = await response.json();

                // Format the fetched daily calorie intake data
                const formattedData = `
                    <ul>
                        <li>BMR: ${result.data.BMR}</li>
                        <li>Goals:
                            <ul>
                                <li>Maintain Weight: ${result.data.goals["maintain weight"]}</li>
                                <li>Mild Weight Loss:
                                    <ul>
                                        <li>Loss Weight: ${result.data.goals["Mild weight loss"]["loss weight"]}</li>
                                        <li>Calories: ${result.data.goals["Mild weight loss"]["calory"]}</li>
                                    </ul>
                                </li>
                                <li>Weight Loss:
                                    <ul>
                                        <li>Loss Weight: ${result.data.goals["Weight loss"]["loss weight"]}</li>
                                        <li>Calories: ${result.data.goals["Weight loss"]["calory"]}</li>
                                    </ul>
                                </li>
                                <li>Extreme Weight Loss:
                                    <ul>
                                        <li>Loss Weight: ${result.data.goals["Extreme weight loss"]["loss weight"]}</li>
                                        <li>Calories: ${result.data.goals["Extreme weight loss"]["calory"]}</li>
                                    </ul>
                                </li>
                                <li>Mild Weight Gain:
                                    <ul>
                                        <li>Gain Weight: ${result.data.goals["Mild weight gain"]["gain weight"]}</li>
                                        <li>Calories: ${result.data.goals["Mild weight gain"]["calory"]}</li>
                                    </ul>
                                </li>
                                <li>Weight Gain:
                                    <ul>
                                        <li>Gain Weight: ${result.data.goals["Weight gain"]["gain weight"]}</li>
                                        <li>Calories: ${result.data.goals["Weight gain"]["calory"]}</li>
                                    </ul>
                                </li>
                                <li>Extreme Weight Gain:
                                    <ul>
                                        <li>Gain Weight: ${result.data.goals["Extreme weight gain"]["gain weight"]}</li>
                                        <li>Calories: ${result.data.goals["Extreme weight gain"]["calory"]}</li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                `;

                // Display the fetched daily calorie intake on the screen
                document.getElementById('dailyCalories').innerHTML = formattedData;
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