<?php
    session_start();

    include("db.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $teamname = $_POST['teamname'];
        $gmail = $_POST['email'];
        $password = $_POST['pass'];

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail)){
            $query ="INSERT INTO form (`fname`,`lname`,`teamname`,`email`,`password`) VALUES  (?,?,?,?,?)";
            $stmt = $con->prepare($query);
            mysqli_stmt_bind_param($stmt, "sssss", $firstname,$lastname,$teamname,$gmail,$password);
            mysqli_stmt_execute($stmt);
            echo "<script type='text/javascript'> alert('Succesfully Registered')</script>" ;
            
        }
        else{
            echo "<script type='text/javascript'> alert('Please enter valid information')</script>"; 
        }
    }
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width,initial-scale-1">
        <title>Form Login and Register</title>
        <link rel="stylesheet" href="style_auth.css">
    </head>
    <body>
        <img src="background.PNG">
        <div id="page-wrap">
        </div>
        <div class="signup">
            <h1>Sign Up</h1>
            <h4>It's free and only takes a minute</h4>
            <form method="POST">
                <label>First Name</label>
                <input type = "text" name="fname" required>
                <label>Last Name</label>
                <input type = "text" name="lname" required>
                <label>Team Name</label>
                <input type = "text" name="teamname" required>
                <label>Email</label>
                <input type = "email" name="email" required>
                <label>Password</label>
                <input type = "password" name="pass" required>
                <input type="submit" name="" value="Submit">
            </form>
            <p>By clicking the Sign Up button, you agree to our<br>
            <a href="">Terms and Condition</a>
        and <a href="#">Policy Privacy</a>
            </p>
            <p>
                Already have an account? <a href="login.php">Login Here</a>
            </p>
        </div>
    </body>
</html>
