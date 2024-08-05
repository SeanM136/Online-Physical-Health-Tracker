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
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="bmiStyles.css">
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-button">Logout</a>
        <h1>BMI Calculator</h1>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="bmi.php" class="active">Calculate BMI</a>
            <a href="progress.php">Exercises</a>
            <a href="calories.php">Calculate Calories</a>
            <a href="tracker.php">Log Workouts</a>
        </div>
        <br>

        <div class="container2">
            <div class="box">
                <h2>Calculate your BMI<h2>
                    <div class="content">
                        <div class="input">
                            <label for="height">Age</label>
                            <input type="text" class="text-input" id="age" autocomplete="off" required/>
                        </div>

                        <div class="gender">
                            <label class="container2">
                                <input type="radio" name="radio" id="m"><p class="text">Male</p>
                                <span class="checkmark"></span>
                            </label>

                            <label class="container2">
                                <input type="radio" name="radio" id="f"><p class="text">Female</p>
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    <div class="containerHW">
                        <div class="inputH">
                            <label for="height">Height(cm)</label>
                            <input type="number" id="height" required>
                        </div>

                        <div class="inputW">
                            <label for="weight">Weight(kg)</label>
                            <input type="number" id="weight" required>
                        </div>
                    </div>

                    <button class="calculate" id="submit" onclick="calculate();">Calculate BMI</button>
                    
                    <div class="result">
                        <p>Your BMI is</p>
                        <div id="result">00.00</div>
                        <p class="comment"></p>
                    </div>
                </div>
        </div>

        <section class="explanation">
                <h2>Understanding BMI and BMI Calculator</h2>
                <p>
                    Body Mass Index (BMI) is a measure of body fat based on height and weight that applies to adult men and women. It is often used as a screening tool to identify possible weight problems in adults. BMI is calculated by dividing a person's weight in kilograms by the square of their height in meters.
                </p>
                <br>
                <p>
                    A BMI calculator is a tool that allows you to quickly determine your BMI based on your height and weight. By knowing your BMI, you can assess whether you are underweight, normal weight, overweight, or obese, and take appropriate steps to maintain or improve your health.
                </p>
            </section>
        </div>
    </div>

    <script src="script.js"></script>


    <script type="text/javascript">
        (function(d, t) {
            var v = d.createElement(t), s = d.getElementsByTagName(t)[0];
            v.onload = function() {
                window.voiceflow.chat.load({
                verify: { projectID: '660d5ce7a94d255b1a74ee47' },
                url: 'https://general-runtime.voiceflow.com',
                versionID: 'production'
                });
            }
            v.src = "https://cdn.voiceflow.com/widget/bundle.mjs"; v.type = "text/javascript"; s.parentNode.insertBefore(v, s);
        })(document, 'script');
    </script>
</body>
</html>