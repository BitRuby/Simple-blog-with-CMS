<?php
class Connection{    
    function __construct($servername, $username, $password, $dbname){
        session_start();
        // Create connection
        $_SESSION['conn'] = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ( $_SESSION['conn']->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    }
    function __destruct(){
        mysqli_close($_SESSION['conn']);
    }
}
?>