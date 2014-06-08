<?php
 include_once('library.php');
 
 if(isset($_POST['action']) && $_POST['action'] == 'submit')
 {
 
 
if(!isset($_SESSION['username'])) 
    {
        //header("Location: login.php");
    }
    $username = $_SESSION['username'];
 
	  $roomId = mysql_real_escape_string( $_POST["roomId"] );
	  $startDate = mysql_real_escape_string(($_POST["startDate"]) );
	  $endDate = mysql_real_escape_string( $_POST["endDate"] );
	   $capacity = mysql_real_escape_string( $_POST["capacity"] );
	     $price = mysql_real_escape_string( $_POST["price"] );
		 
		
 {
 

 

	
	  {
	   	  $sql = "INSERT INTO $username VALUES('$roomId',
                                           '$startDate', 
                                           '$endDate', 
                                           '$capacity',
                                            '$price'										   
                                           )";
	    if( mysql_query($sql) )
	     echo 1;
	   else
	     echo 0;
		 
		 
		
	}
	
	
}

}	
?>
