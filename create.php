

<?php
//uzytkownik i haslo do panelu administratora
//root
//admin1234
include ("connect.php");


class Db{

	function create_db(){
		// Create connection
         $db = new mysqli("localhost", "root", "admin");
        
        // Check connection
        if ( $db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        } 
		
		$sql_c_db = "Create database test";
		
				if($result = $db->query($sql_c_db)) {
				} else {
					printf("Error: %s\n", $db->error);
				}
				return $result;
	}
		

	function create(){
		
		$sql_c1 = "create table pages(
		id int primary key not null AUTO_INCREMENT,
		page_name varchar(50) not null, 
		page_type varchar(12) not null,
		page_content varchar(1024) not null
		)";
		$sql_c2 = "create table users(
		id int primary key not null AUTO_INCREMENT,
			username varchar(50) not null, 
		password varchar(12) not null
		)";
		$sql_i1 = "insert into users SET USERNAME='root', 	PASSWORD='admin1234'";
		
		$this->execute($sql_c1);
		$this->execute($sql_c2);
		$this->execute($sql_i1);
		
	}
	 function execute($c){
				$connect = $_SESSION['conn'];
				if($result = $connect->query($c)) {
				} else {
					printf("Error: %s\n", $connect->error);
				}
				return $result;
			}


      function redirection(){
                header("location: index.php");        
        }
}
    
	

	$db = new Db();
	$db->create_Db();
	
	$connetion = new Connection("localhost", "root", "", "test");
	
	$db->create();
	$db->redirection();



?>