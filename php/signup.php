<?php
    session_start();

    include("../php/db.php");

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
            header("location: ../html/home.html");
            
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
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/style_auth.css">
    </head>
    <style>
       html { 
  background: url(../images/signup.webp) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
    </style>
    <body>
        <div id="page-wrap">
        </div>
        <div class="signup">
            <h1 style="color: #1cbf9b;">Sign Up</h1>
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
            <a>Terms and Condition</a>
        and <a>Policy Privacy</a>
            </p>
            <p>
                Already have an account? <a href="../php/login.php">Login Here</a>
            </p>
        </div>
    </body>
</html>
