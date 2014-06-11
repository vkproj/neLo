<?php
      include_once('library.php');
 
	  $username = mysql_real_escape_string( $_POST["username"] );
	  $password = mysql_real_escape_string(md5($_POST["password"]));
	  $type = mysql_real_escape_string( $_POST["specie"] );
	 
 
 
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
?>
