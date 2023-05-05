<?php
    session_start();
    include("db.php");
    $mail = $_SESSION['user_name'];
    $query = "select * from form where email='$mail' limit 1";
    $result = mysqli_query($con, $query);
    $user_data = mysqli_fetch_assoc($result);
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
        <title>Breaks</title>
        <style>
            html { 
            background: url(images/doglappy.png) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            }
            h1{

                color: #6845a0;
                margin-left: 40px;
                font-weight: bold;
                
            }
            input[type=text], select {
            width: 35%;
            padding: 12px 20px;
            margin: 16px 0;
            display: inline-block;
            border-radius: 4px;
            box-sizing: border-box;
            margin-left: 40px;
            }

            input[type=submit] {
            width: 15%;
            background-color: #6845a0;
            color: white;
            padding: 14px 20px;
            margin: 8px 50px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            align-items: center;
            }

            input[type=submit]:hover {
            background-color: #514d57;
            }

            div {
            border-radius: 5px;
            padding: 0px;
            }
            
        </style>
    </head>
    <body> 
        <script> var timefrq;
        var timeF; </script>
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
        <div class="content">
                <input type="text" id="breakfrq" placeholder="Enter break frequency(minutes)"><br><br>
                <input type="submit" id="submit" value="submit" onclick="getTime()">
        </div>
        <div class="timertext">
           <h1>Next Break in <span id="time">{timefrq}</span> minutes!</h1> 
        </div>
        <div class="container">
            <div class="popup" id="popup">
                <img src="images/bell.jpeg">
                <p>You've been working so long</p>
                <h2>It's time for a break!!</h2>
                <button type="button" onclick="closePopup()">OK</button>
            </div>
            <div class="popups" id="popups">
                <img src="images/stretch.png">
                <p>It's time for some stretches</p>
                <h2>Stretch your arms and legs</h2>
                <button type="button" onclick="closePopups()">OK</button>
            </div>
            <div class="popupr" id="popupr">
                <img src="images/relaxeyes.png">
                <p>Your eyes are getting strained</p>
                <h2>Relax your eyes for a while</h2>
                <button type="button" onclick="closePopupr()">OK</button>
            </div>
            <div class="popupw" id="popupw">
                <img src="images/water.jpeg">
                <p>Stay hydrated</p>
                <h2>Have some water</h2>
                <button type="button" onclick="closePopupw()">OK</button>
            </div>
        </div>
<script>
    function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;
        console.log(display.textContent);
        timeF = display.textContent;
        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}

//alert popup 
let popup=document.getElementById("popup");      
function openPopup() {
    popup.classList.add("open-popup");
}
function closePopup(){
    popup.classList.remove("open-popup");
    popups.classList.add("open-popups")
}  
function closePopups(){
    popups.classList.remove("open-popups")
    popupr.classList.add("open-popupr")
}
function closePopupr(){
    popupr.classList.remove("open-popupr")
    popupw.classList.add("open-popupw")
}
function closePopupw(){
    popupw.classList.remove("open-popupw")
    startTimer();
}
//Taking break frequency time from frontend
function getTime() {
    timefrq = document.getElementById("breakfrq").value;
    var Minutes = 60*timefrq;
    console.log(Minutes);
    display = document.querySelector('#time');
    startTimer(Minutes, display);
    //Make sure the function fires as soon as the page is loaded
    setInterval(openPopup, 1000*Minutes); //Then set it to run again after every certain minutes
}

//navigation
let subMenu =document.getElementById("subMenu");
    function toggleMenu(){
    subMenu.classList.toggle("open-menu");
}
</script>
</body>
</html>