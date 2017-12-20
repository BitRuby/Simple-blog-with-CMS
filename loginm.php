<?php
session_start();
    if (!empty($_SESSION['member_username'])) {
        header("location: admin.php");       
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
        <h1>Login</h1>
    </div>
</header>
<section id="form">

    <div class="container">
        <form method="POST" action="auth.php">
        <input name="uname" class="hide" style="display:none;">
        
            <input type="hidden" name="login">
            <div class="label">
                <label for="">Login:</label>
            </div>
            <div>
                <input type="text" value="" name="uname" placeholder="Enter username">
            </div>
            <div class="label">
                <label for="">Password: </label>
            </div>
            <div>
                <input type="password" value="" name="pass" placeholder="Enter password">
            </div>
            <div class="submit">
                <input type="submit" value="Login">
            </div>
            <div class="reset">
            <input type="reset" value="Clear">
            </div>
            <div class="label">
                <p><a href="index.php">Home page</a></>
            </div>
            <div class="label">
                <p>
                <?php
                    if (!empty($_COOKIE['Login_FailMessage'])){
                        echo $_COOKIE['Login_FailMessage'];
                    }
                ?>
                </p>
            </div>
        </form>
    </div>
</section>    
</body>
</html>