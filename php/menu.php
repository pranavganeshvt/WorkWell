<?php
    // Starting the session of the server
    session_start();

    // Including the file to get connection to the database
    include("../php/db.php");

    $mail = $_SESSION['user_name'];

    //Based on the user input of email and password, user_name will be obtained.
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
        <link rel="stylesheet" href="../css/style.css">
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>
        <title>Profile</title>
        <style>
            /* Styling the HTML elements */
            html { 
            background: url(../images/main1.jpeg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            display: block;
            }
        </style>
    </head>
    <body> 
        <div class="hero">
            <nav>
                <img src="../images/logo.jpeg" class="logo"><br>
                <h3 style="color:bisque">WORKWELL</h3>
                <ul class="nav-links">
                    <li><a href="../php/reminders.php">Reminders</a></li>
                    <li><a href="../php/breaks.php">Breaks/Ergonomics</a></li>
                </ul>
                <img src="../images/profile.png" class="user-pic" onclick="toggleMenu()">
                <div class="sub-menu-wrap" id="subMenu">
                    <div class="sub-menu">
                        <div class="user-info">
                            <img src="../images/profile.png" alt="profile pic">
                            <h5>
                                <?php echo $user_data['fname'];?> &nbsp; <?php echo $user_data['lname']; ?>
                            </h5>
                        </div>
                        <hr>
                        <a href="#" class="sub-menu-link"> 
                            <a href="../html/help.html" class="sub-menu-link">
                                <img src="../images/help.png">
                                <p>Help</p>
                                <span>></span>
                        <a href="../html/logout.html" class="sub-menu-link">
                            <img src="../images/logout1.png">
                            <p>Logout</p>
                            <span>></span>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container">
            <!-- Slider main container -->
<div class="swiper">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
      <!-- Slides -->
      <div class="swiper-slide"><img src="../images/timer.jpeg"></div>
      <div class="swiper-slide"><img src="../images/todo.webp"></div>
      <div class="swiper-slide"><img src="../images/erg.jpeg"></div>
      <div class="swiper-slide"><img src="../images/break.webp"></div>
      <div class="swiper-slide"><img src="../images/todo2.jpeg"></div>
      <div class="swiper-slide"><img src="../images/erg 3.jpeg"></div>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination">

    </div>
  
    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script>
            const swiper = new Swiper('.swiper', {
  // Optional parameters
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,

  },
  loop: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
    clickable: true
  },

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  
});
      //navigation
let subMenu =document.getElementById("subMenu");
    function toggleMenu(){
    subMenu.classList.toggle("open-menu");
}
        </script>
    </body>
</html>