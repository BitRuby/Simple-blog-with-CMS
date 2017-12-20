<?php
 
class Logout{
    
    function logout(){
        session_start();
        unset($_SESSION['member_username']);
        $cookie_name = "Login_FailMessage";
        setcookie($cookie_name, "", time() - 3600, "/"); 
    }

    function redirection(){
        if (empty($_SESSION['member_username'])) {
            header("location: loginm.php");        
        }
    }
}

$logout = new Logout();
$logout->logout();
$logout->redirection();
?>


