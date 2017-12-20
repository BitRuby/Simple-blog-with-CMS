<?php
include("connect.php");

class Authorization{

    var $uname;
    var $pass;

    function __construct($uname, $pass){
            $this->uname = $uname;
            $this->pass = $pass;
    }

    function login(){

        $sql = "SELECT * FROM users WHERE username='".$this->uname."' AND password='".$this->pass."'";

        $result = $this->execute($sql);

        if ( $result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                $_SESSION['member_username'] = $row['username'];
            }
        } else {
            
            $cookie_name = "Login_FailMessage";
            $cookie_value = "Login failed. Invalid username/password.";
            setcookie($cookie_name, $cookie_value, time() + 3600, "/"); 

        }
    }

    function redirection(){
        if (!empty($_SESSION['member_username'])) {
            header("location: admin.php");         
        }
        else{
            header("location: loginm.php"); 
        }
    }
 
    function execute($c){
        $connect = $_SESSION['conn'];
        if($result = $connect->query($c)) {
        } else {
            printf("Error: %s\n", $connect->error);
        }
        return $result;
    }

}
    //Connect to DB
    $connetion = new Connection("localhost", "root", "", "test");

    $auth = new Authorization($_POST['uname'], $_POST['pass']);
    $auth->login();
    $auth->redirection();

    //Disconnect from DB
    //$connection = null;

?>

