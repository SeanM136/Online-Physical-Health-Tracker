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
            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }
            echo "Wrong username or password";
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
        <title>Login</title>
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
            <div>Login</div>
            <input id="text" type="text" name="user_name" placeholder="Username"><br><br>
            <input id="text" type="password" name="password" placeholder="Password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>

                <a href="signup.php">Click to Signup</a><br><br>
            </form>
        </div>
    </body>
</html>