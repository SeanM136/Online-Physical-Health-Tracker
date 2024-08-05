<?php
session_start();

    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_name,password) values('$user_id','$user_name','$password')";
            
            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }
        else
        {
            echo "Please enter valid information";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
    </head>
    <body>
        <style type="text/css">
            
            body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        #box {
            background-color: #007bff;
            margin: 50px auto;
            width: 300px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        #box form {
            color: white;
            font-size: 20px;
            margin-bottom: 20px;
        }

        #text {
            height: 25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
            margin-bottom: 10px;
        }

        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: #0056b3;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #button:hover {
            background-color: #003d7a;
        }

        a {
            color: white;
            text-decoration: none;
            font-size: 14px;
        }
        </style>

        <div id="box">
        <form method="post">
            <div>Sign up</div>
            <input id="text" type="text" name="user_name" placeholder="Username"><br><br>
            <input id="text" type="password" name="password" placeholder="Password"><br><br>

            <input id="button" type="submit" value="Sign up"><br><br>

                <a href="login.php">Click to Login</a><br><br>
        </form>
        </div>
    </body>
</html>