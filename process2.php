<?php
include 'library.php'; // include the library for database connection

function encrypt($string){
	return base64_encode(base64_encode(base64_encode($string)));
}

function decrypt($string){
	return base64_decode(base64_decode(base64_decode($string)));
}

if(isset($_POST['action']) && $_POST['action'] == 'register'){ // Check the action `register`
	$username 		= htmlentities($_POST['username']); // Get the username
	$password 		= htmlentities($_POST['pass']); // Get the password and decrypt it
	$type 			= htmlentities($_POST['type']);
	 if( empty($username) || empty($password) )
	  {
	  	echo "Username and Password are mandatory - from PHP!";
		exit();
	  }
 
 
 $res = mysql_query("SELECT username FROM users WHERE username='$username'");
	  $row = mysql_fetch_row($res);
 
	  if( $row > 0 )
	    echo "Username has already been taken";
	  else
	  {
	   	  $sql = "INSERT INTO users VALUES('',
                                           '$username', 
                                           '$password', 
                                           '$type' 
                                           )";
	    if( mysql_query($sql) )
	     echo "Inserted Successfully";
	   else
	     echo "Insertion Failed";
		 
		 
		 $create ="CREATE TABLE $username (room CHAR(30),startDate DATE,endDate DATE,capacity INT,price INT)";
 
              mysql_query($create);
	}
}
?>
