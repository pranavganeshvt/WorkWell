<?php
    session_start();

    include("db.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
        $gmail = $_POST['email'];
        $password = $_POST['pass'];
        $mail = $gmail;
        $_SESSION['user_name'] = $mail;

        if(!empty($gmail) && !empty($password) && !is_numeric($gmail)){

            $query =  "select * from form where email='$gmail' limit 1";
            $result = mysqli_query($con, $query);

            if($result){
                if($result && mysqli_num_rows($result)>0){
                    $user_data = mysqli_fetch_assoc($result);
                    if($user_data['password']==$password){
                        header("location:menu.php");
                        die;
                    }
                }
            }
            echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
        }
        else{
            echo "<script type='text/javascript'> alert('Wrong username or password')</script>";
        }
    ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width,initial-scale-1">
        <title>Login</title>
        <link rel="stylesheet" href="style_auth.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <style>
            html { 
  background: url(images/signup.webp) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
h1{
    font-weight:bold;
}
        </style>
    </head>
    <body>
        <div class="login">
            <h1 style="color: #1cbf9b" >Login</h1>
            <form method="POST">
                <label>Email</label>
                <input type = "email" name="email" required>
                <label>Password</label>
                <input type = "password" name="pass" required>
                <input type="submit" name="" value="Submit">
            </form>
            <p>Don't have an account? <a href="signup.php">Sign Up here</a></p>
        </div>
    </body>
</html>