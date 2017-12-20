<?php

class Posts{
	
	function printList(){
		
		$sql = "SELECT * FROM pages";

        $result = $this->execute($sql);

        if ( $result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
				?>
				<ul>
                    <li>
						<a href="?post=<?php echo $row['id'];?>">
							<?php echo $row['page_name'];?>
						</a>
					</li>
                </ul>
				<?php
            }
        } 
	}
	
	function printInternalPosts($get){
		
		if ( isset($get) ){
			
			$sql = "SELECT * FROM pages WHERE id=".$get." AND page_type='internal'";
			$result = $this->execute($sql);
			
			 if ( $result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?>
					 <article id="article-<?php echo $row['id'];?>">
						<h2><b>
							<?php echo $row['page_name'];?>
						</b></h2>
						<p><i>Posted: Jun 24, 2015 9:30</i></p>
						<p>
							<?php echo $row['page_content'];?>
						</p>
						<a href="#">0 Comments</a>
					</article>
					<?php
				}
			 }
			
		}	
	}
	
	function printExternalPosts($get){
		
		if ( isset($get) ){
			
			$sql = "SELECT * FROM pages WHERE id=".$get." AND page_type='external'";
			$result = $this->execute($sql);
			
			 if ( $result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					?>
					 <article id="article-<?php echo $row['id'];?>">
						<h2><b>
							<?php echo $row['page_name'];?>
						</b></h2>
						<p><i>Posted: Jun 24, 2015 9:30</i></p>
						<p>
							<iframe src="<?php echo $row['page_content'];?>" width="100%" height="500px"></iframe>
						</p>
						<a href="#">0 Comments</a>
					</article>
					<?php
				}
			 }
			
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

?>