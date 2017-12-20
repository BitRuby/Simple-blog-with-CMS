<?php
include("connect.php");

    class Page{

        var $title;
        var $type;
        var $content;
        var $link;
        var $cookie_value;
        var $cookie_name;
        var $status;

        function __construct($type, $title, $content, $link){

            if ( isset($type) )
                $this->type = $type;
            if ( isset($title) )
                $this->title = $title;
            if ( isset($content) )
                $this->content = $content;
            if ( isset($link) )
                $this->link = $link;
                
                var_dump($_POST);

        }

        function create(){
            if ( $this->type == "ext"){
                $this->newExternalPage();  
            }
            else{
                $this->newInternalPage();
            }
            $this->status = true;
        }
        
        function newExternalPage(){
            $sql = "INSERT INTO pages SET page_name='".$this->title."', page_type='external', page_content='".$this->link."'";
            
            $res = $this->execute($sql);
        
            $this->cookie_name = "NewPage_Message";
            $this->cookie_value = "Successfully created external page named ".$this->title;
            $this->cookie();

        }

        function newInternalPage(){
            $sql = "INSERT INTO pages SET page_name='".$this->title."', page_type='internal', page_content='".$this->content."'";

            $res = $this->execute($sql);

            $this->cookie_name = "NewPage_Message";
            $this->cookie_value = "Successfully created internal page named ".$this->title;
            $this->cookie();

        }

        function execute($c){
            $connect = $_SESSION['conn'];
            if($result = $connect->query($c)) {
            } else {
                printf("Error: %s\n", $connect->error);
            }
            return $result;
        }
        
        function cookie(){
            setcookie($this->cookie_name, $this->cookie_value, time() + 3600, "/"); 
        }

        function redirection(){
            if ($this->status) {
                header("location: admin.php");        
            }
        }

    }
    //Connect to DB
    $connetion = new Connection("localhost", "root", "", "test");

    $page = new Page($_POST['radio'], $_POST['name'], $_POST['content'], $_POST['link']);

    $page->create();
    $page->redirection();



?>