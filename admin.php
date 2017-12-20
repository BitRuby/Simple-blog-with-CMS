<?php

session_start();
if (empty($_SESSION['member_username'])) {
    header("location: loginm.php"); 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">    
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css"> 
    <link rel="stylesheet" type="text/css" href="style-loginm.css">       
    <title>Login</title>
</head>
<body>
<header id="h2"> 
    <div class="container">
        <h1>Administration Panel</h1>
    </div>
</header>
<section>
    <div class="container">
        <h2>Welcome again, 
                    <?php
                        echo $_SESSION['member_username'].".";
                    ?>
        </h2>
        <div style="padding:15px 0;"></div>
        <ul id="adminOptions">
        <li>
                <form>
                    <a href="index.php" ><i class="fa fa-home" aria-hidden="true" style="background: rgb(52, 73, 94);padding-left:50px;padding-rigth:50px"></i></a>
                </form>
                <h3><b>Home</b></h3>
            </li>
            <li>
                <form>
                    <a href="#menu" id="open-form"><i class="fa fa-plus-square-o" aria-hidden="true" style="background:rgb(52, 152, 219);padding-left:50px;padding-rigth:50px"></i></a>
                </form>
                <h3><b>Add page</b></h3>
            </li>
            <li>
                <form method="POST" action="logout.php">
                    <a href="#" onclick="document.getElementsByTagName('form')[2].submit();"><i class="fa fa-sign-out" aria-hidden="true" style="background:rgb(26, 188, 156);"></i></a>
                </form>
                <h3><b>Logout</b></h3>
            </li>
        </ul>
        <hr>
    </div>
</section>
<form method="POST" action="new.php" novalidate>
<section id="menu" style="display:none">
    <div class="container">
        <h2 style="padding: 10px 0;">Add page</h2>
            <div class="labels">
                <b>Page type</b>
            </div>
            <div class="inputs">
                <input type="radio" value="ext" name="radio" checked>External
                <input type="radio" value="int" name="radio">Internal
            </div>
        </div>
        <div style="padding:15px 0;"></div>
        <div class="container">
            <div class="labels">
                <p><b>Page name</b></p>
            </div>
            <div class="inputs">
                <input type="text" value="" name="name" placeholder="Enter name" required>
            </div>
        </div>
        <div style="padding:15px 0;"></div>
        <div class="container">
            <div class="labels">
                <p><b>Link to page</b></p>
            </div>
            <div class="inputs">
                <input type="text" value="" name="link" placeholder="Enter link (followed by http://)" required>
            </div>
        </div>
        <div class="container" style="display:none;">
            <div class="labels">
                <p><b>Contents</b></p>
            </div>
            <div class="inputs">
                <textarea placeholder="Enter page text" name="content" maxlength="1024" required>
                </textarea>
            </div>
        </div>
        <div style="padding:15px 0;"></div>
        <div class="container">
                <div class="submit">
                    <input type="submit" value="Add">
                </div>
                <div class="message" style="color:green">
                <?php
                    if (!empty($_COOKIE['NewPage_Message'])){
                        echo $_COOKIE['NewPage_Message'];
                        ?>
                        <script>
                            var el = document.getElementById("menu");
                            el.style.display="block";
                        </script>
                        <?php
                    }
                ?>
                </div>
        </div>
    </div>
</section>
</form>
<div style="padding:25px 0;"></div>
<script>

 window.onload = function(){

            var form = document.getElementById("open-form");
            var el = document.getElementById("menu");
            form.onclick = function(){
                if (el.style.display == "none"){
                    el.style.display="block";
                }
                else{
                    el.style.display="none";
                }
            }
            var radio0 = document.getElementsByName("radio")[0];
            var radio1 = document.getElementsByName("radio")[1];
            radio0.onclick = function(){
                var el = document.getElementById("menu");
                el.getElementsByClassName("container")[3].style.display ="none";
                el.getElementsByClassName("container")[2].style.display ="block";
                document.cookie = 'NewPage_Message' + '=; Max-Age=0';
            }
            radio1.onclick = function(){
                el.getElementsByClassName("container")[2].style.display ="none";
                el.getElementsByClassName("container")[3].style.display ="block";
                document.cookie = 'NewPage_Message' + '=; Max-Age=0';
            }
 }
</script>

</body>
</html>