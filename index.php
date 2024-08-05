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
    <title>Homepage</title>
    <link rel="stylesheet" href="bmiStyles.css">
</head>
<body>
    <div class="container">
        <a href="logout.php" class="logout-button">Logout</a>
        <h1>Homepage</h1>
        <div class="navbar">
            <a href="index.php" class="active">Home</a>
            <a href="bmi.php">Calculate BMI</a>
            <a href="progress.php">Exercises</a>
            <a href="calories.php">Calculate Calories</a>
            <a href="tracker.php">Log Workouts</a>
        </div>
        <h2>Benefits and Features</h2>
        <ul>
            <li>
                <strong onclick="toggleDropdown('dropdown1')">Promote Healthier Lifestyle</strong>
                <div class="dropdown-content" id="dropdown1">
                    Inspire users to both adopt eating a balanced, nutritious diet and to exercise more on a regular basis, encouraging the consumption of high quality foods and effective workouts to improve physical health.
                </div>
            </li>
            <li>
                <strong onclick="toggleDropdown('dropdown2')">Provide Fitness Guidance</strong>
                <div class="dropdown-content" id="dropdown2">
                    Make use of our fitness AI chatbot that can help provide you with a custom personalised workout plan that is filtered to your needs, whatever your goals are. You can also make use of our 'Exercises' page which provides advice into most workouts for each muscle group.
                </div>
            </li>
            <li>
                <strong onclick="toggleDropdown('dropdown3')">Calculate BMI and Calorie Consumption</strong>
                <div class="dropdown-content" id="dropdown3">
                    Utilizes advanced algorithms to analyse user's data and provide valuable insights into health metrics such as BMI (Body Mass Index), calorie expenditure, and progress tracking. By leveraging this information, users can make informed decisions and track their progress over time.
                </div>
            </li>
            <li>
                <strong onclick="toggleDropdown('dropdown4')">Ensure Accessibility and Inclusivity</strong>
                <div class="dropdown-content" id="dropdown4">
                    Committed to making health and fitness accessible to all individuals, regardless of their age, background, or physical abilities. Our platform is designed to be intuitive, user-friendly, and accommodating to diverse needs and preferences.
                </div>
            </li>
            <li>
                <strong onclick="toggleDropdown('dropdown5')">Supply Educational Resources</strong>
                <div class="dropdown-content" id="dropdown5">
                    Through our platform, users gain access to educational resources like tips on various aspects of health, including nutrition, exercise, and specific workouts.
                </div>
            </li>
            <li>
                <strong onclick="toggleDropdown('dropdown6')">Log Your Workouts</strong>
                <div class="dropdown-content" id="dropdown6">
                    This website also provides users with the option to log their workouts, by doing this, users can track their progress over time and see how much they have improved.
                </div>
            </li>
        </ul>
    </div>

    <script>
        function toggleDropdown(id) {
            var dropdown = document.getElementById(id);
            dropdown.classList.toggle('show');
        }
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