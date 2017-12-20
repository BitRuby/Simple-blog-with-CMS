<?php

include("connect.php");
include("posts.php");
$connetion = new Connection("localhost", "root", "", "test");
$posts = new Posts();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">    
    <link rel="stylesheet" type="text/css" href="font-awesome.min.css">    
    <title>Document</title>
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <span style="font-size:1.5em">My Blog</span>  
            </div>
            <div class="menu">
                <i class="fa fa-bars" id="click-menu" aria-hidden="true"></i>                
            </div>
        </div>
    </header>
    <nav id="menu" style="display:none;">
        <div class="container">
            <ul>
                <li><a href="loginm.php">Login</a></li>
            </ul>
        </div>
    </nav>
    <section>
        <div class="container">
            <div id="background">
                <img src="images/cover.jpg" title="Photo">
                <h1>
                    Hi, my name is Vanessa
                </h1>
                <h3>
                    This is my blog
                </h3>
            </div>
        </div>
    </section>
    <section class="main">
        <aside>
            <h2>
                Latest posts
            </h2>
            <ul>
                <li>2015</li>
                <?php $posts->printList(); ?>
            </ul>
        </aside>
				<?php if(isset($_GET['post'])) $posts->printInternalPosts($_GET['post']); ?>
				<?php if(isset($_GET['post'])) $posts->printExternalPosts($_GET['post']); ?>
    </section>
    <footer>
        <div class="container">
                <hr>
            &copy; 2015 Vanessa Alingthon photography. All rights reserved. Theme by Wojtek Lisowski &amp; Michał Zwierzyński
        </div>
    </footer>
    <script>
        window.onload = function(){
            var menu = document.getElementById("click-menu");
            var el = document.getElementById("menu");
            menu.onclick = function(){
                if (el.style.display == "none"){
                    el.style.display="block";
                }
                else{
                    el.style.display="none";
                }
            }
        }
    </script>
</body>
</html>