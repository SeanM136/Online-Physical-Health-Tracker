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
    <title>Log Your Workouts</title>
    <link rel="stylesheet" href="bmiStyles.css">
</head>
<body>
    <style>
                #workoutForm {
            margin-bottom: 20px;
        }

        #workoutForm label {
            display: block;
            margin-bottom: 5px;
        }

        #workoutForm input[type="text"],
        #workoutForm input[type="number"],
        #workoutForm input[type="date"] {
            width: calc(50% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #workoutForm button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        #workoutForm button:hover {
            background-color: #0056b3;
        }

        #workoutHistory {
            width: 100%;
            border-collapse: collapse;
        }

        #workoutHistory th, #workoutHistory td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        #workoutHistory th {
            background-color: #007bff;
            color: #fff;
        }

        #workoutHistory tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
    <div class="container">
        <a href="logout.php" class="logout-button">Logout</a>
        <h1>Log Your Workouts</h1>
        <div class="navbar">
            <a href="index.php">Home</a>
            <a href="bmi.php">Calculate BMI</a>
            <a href="progress.php">Exercises</a>
            <a href="calories.php">Calculate Calories</a>
            <a href="tracker.php" class="active">Log Workouts</a>
        </div>
        
        <h1>Workout Tracker</h1>
        <form id="workoutForm">
            <label for="exercise">Exercise:</label>
            <input type="text" id="exercise" required>
            <label for="sets">Sets:</label>
            <input type="number" id="sets" required>
            <label for="reps">Reps:</label>
            <input type="number" id="reps" required>
            <label for="weight">Weight (kg):</label> <!-- Added weight input field -->
            <input type="number" id="weight" required>
            <label for="date">Date:</label>
            <input type="date" id="date" required>
            <label for="duration">Duration (minutes):</label>
            <input type="number" id="duration" required>
            <button type="submit">Log Workout</button>
        </form>

        <table id="workoutHistory">
            <thead>
                <tr>
                    <th>Exercise</th>
                    <th>Sets</th>
                    <th>Reps</th>
                    <th>Weight (kg)</th>
                    <th>Date</th>
                    <th>Duration</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>
        document.getElementById('workoutForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const exercise = document.getElementById('exercise').value;
            const sets = document.getElementById('sets').value;
            const reps = document.getElementById('reps').value;
            const weight = document.getElementById('weight').value; // Added weight variable
            const date = document.getElementById('date').value;
            const duration = document.getElementById('duration').value;
            logWorkout(exercise, sets, reps, weight, date, duration);
            displayWorkoutHistory();
            // Clear form fields
            document.getElementById('exercise').value = '';
            document.getElementById('sets').value = '';
            document.getElementById('reps').value = '';
            document.getElementById('weight').value = ''; // Clear weight input field
            document.getElementById('date').value = '';
            document.getElementById('duration').value = '';
        });

        function logWorkout(exercise, sets, reps, weight, date, duration) {
            let workouts = JSON.parse(localStorage.getItem('workouts')) || [];
            workouts.push({ exercise, sets, reps, weight, date, duration });
            localStorage.setItem('workouts', JSON.stringify(workouts));
        }

        function displayWorkoutHistory() {
            const workoutHistory = JSON.parse(localStorage.getItem('workouts')) || [];
            const historyTable = document.getElementById('workoutHistory').getElementsByTagName('tbody')[0];
            historyTable.innerHTML = '';
            workoutHistory.forEach((workout, index) => {
                const row = historyTable.insertRow();
                row.innerHTML = `
                    <td>${workout.exercise}</td>
                    <td>${workout.sets}</td>
                    <td>${workout.reps}</td>
                    <td>${workout.weight}</td> <!-- Added weight cell -->
                    <td>${workout.date}</td>
                    <td>${workout.duration}</td>
                    <td><button onclick="deleteWorkout(${index})">Delete</button></td>
                `;
            });
        }

        function deleteWorkout(index) {
            let workouts = JSON.parse(localStorage.getItem('workouts')) || [];
            workouts.splice(index, 1);
            localStorage.setItem('workouts', JSON.stringify(workouts));
            displayWorkoutHistory();
        }

        // Call displayWorkoutHistory function when the page loads
        window.onload = displayWorkoutHistory;
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