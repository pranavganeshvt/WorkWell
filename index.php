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
    </head>
    <body>
        <div class="hero">
            <nav> 
                <img src="images/logo.jpeg" class="logo">
                <h3 style="color:bisque">W O R K W E L L</h3>
                <ul class="nav-links">
                    <li><a href="index.html">Reminders</a></li>
                    <li><a href="Ergonomics.html">Ergonomics</a></li>
                    <li><a href="Breaks.html">Breaks</a></li>
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
                            <a href="#" class="sub-menu-link">
                                <img src="images/help.png">
                                <p>Help</p>
                                <span>></span>
                        <a href="/loggedout.html" class="sub-menu-link">
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
                    <p input type = "hidden"  id="content-holder"></p>
                    
                </ul>
        </div>
    </div>
</script>
<script type="text/javascript">
    const list = document.getElementsByClassName("list")[0];
const newReminder = document.getElementById("newReminder");


function createReminder(id, message)
{
    if(!message && message.length > 50)
    {
        alert("Reminder too long, please reduce size");
        return;
    }
    else if (!message)
    {
        alert("Enter a reminder");
        return;
    }
    
    const li = document.createElement("li");
    li.id = id;
    li.className = "reminder"
    const div = document.createElement("div");
    div.className = "text";
    div.innerText = message;

var contentHolder = []
contentHolder = document.getElementById('content-holder');
var a = [];
contentHolder.innerHTML += `${message},`;
a.push(contentHolder.innerHTML)
console.log(contentHolder.innerHTML);
console.log(a);
document.cookie = "cname=" + a;

    const actionContainer = document.createElement("div");
    actionContainer.className = "actions";

    const Check  = document.createElement("button");
    Check.className = "Check";
    Check.innerText = "Finish";

    const Delete = document.createElement("button");
    Delete.className = "Delete";
    Delete.innerText = "Delete"

    actionContainer.appendChild(Check);
    actionContainer.appendChild(Delete);
    
    Check.addEventListener("click", function()
    {
        if(li.id == id)
        {
            div.style.textDecoration = "line-through";
        }
    });

    Delete.addEventListener("click", function()
    {
        if(li.id == id) {
            list.removeChild(li);
        }
    });
    li.appendChild(div);
    li.appendChild(actionContainer);

    return li;
}

newReminder.addEventListener("click", function ()
{
    let message = prompt("Please enter a Reminder");
    let id = Math.floor(Math.random() *100);
    let reminder = createReminder(id, message);
    list.appendChild(reminder);
    
});

</script>
    <script>
        let subMenu =document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
     <!---  <script src="index.js" async defer></script> -->
    </body>
 </html>
