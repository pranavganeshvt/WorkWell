<?php
    session_start();
    include("db.php");
    $mail = $_SESSION['user_name'];
    $query = "select * from form where email='$mail' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    $text = $_COOKIE['cname'];
    $sql = "UPDATE form SET reminders = '$text' WHERE email='$mail'";
    $ans = mysqli_query($con, $sql);

$con->close(); ?>

<!DOCTYPE html> 
 <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Reminders</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="index.css">
        <style>
            html { 
                background: url(images/beachreminder.png) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
}
        </style>
    </head>
    <body>
        <div class="hero">
            <nav>
                <img src="images/logo.jpeg" class="logo"><br>
                <h3 style="color:bisque">WORKWELL</h3>
                <ul class="nav-links">
                    <li><a href="index.php">Reminders</a></li>
                    <li><a href="Breaks.php">Breaks/Ergonomics</a></li>
                </ul>
                <img src="images/profile.png" class="user-pic" onclick="toggleMenu()">
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="images/profile.png" alt="profile pic">
                            <h5>
                                <?php echo $user_data['fname'];?> &nbsp; <?php echo $user_data['lname']; ?>
                            </h5>
                        </div>
                        <hr>
                        <a href="#" class="sub-menu-link">
                            <img src="images/editprofile1.png">
                            <p>Edit Profile</p>
                            <span>></span>
                            <a href="help.html" class="sub-menu-link">
                                <img src="images/help.png">
                                <p>Help</p>
                                <span>></span>
                        <a href="loggedout.html" class="sub-menu-link">
                            <img src="images/logout1.png">
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class = "container">
        <div class = "col">
            <div class = "Appname">
                <h1> My Reminders</h1>
                <button id="newReminder"> +</button>
            </div>
                <ul class = "list">

                </ul>
        </div>
    </div>
    <script>
        let subMenu =document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
        <script src="index.js" async defer></script>
    </body>
 </html>