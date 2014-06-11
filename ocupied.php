<?php

   include 'library.php';
   
    
   if(isset($_POST['submitted']))
   {
   
   $submit = $_POST['submit'];

   $sDate = $_POST['startDate'];

   $eDate= $_POST['endDate'];
   
   if($submit)
   {
   
   if($sDate && $eDate)
   {
   
   
  $data = mysql_query("SELECT * FROM rezervations ") or die(mysql_error()); 
  //$rez=mysql_fetch_assoc($data);
  //if($rez)
  {
     Print "<table border cellpadding=3>"; 
     while($info = mysql_fetch_array( $data)) 
     { 
	 
	 $tsDate=$info['startDate'];
	 $teDate=$info['endDate'];
	 if($tsDate>=$sDate && $tsDate<=$eDate && $teDate>=$sDate && $teDate<=$eDate)
	 
	 {
	  Print "<table border cellpadding=3>";
	  Print "<tr><th>Camera<th> De la:<th>Pana la<th>Nr locuri<th>Pret<th></tr>";
     Print "<tr>"; 
     Print "<td>".$info['roomId'] . "</td> "; 
     Print "<td>".$info['startDate'] . "</td> "; 
     Print " <td>".$info['endDate'] . "</td> "; 
     Print " <td>".$info['capacity'] . "</td> "; 
     Print " <td>".$info['price'] . " </td></tr>";
             
     } 
     Print "</table>"; 
}
}

}
else
    echo "Alege perioada de timp";
}
}
 ?>   




<!DOCTYPE html>
<html>
<head>

	<title>Camere & Tarife</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/style1.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/style2.css">
	<script type="text/javascript" src="jquery-1.11.0.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body>

<div class="header">
	<div class="center">
		<a href="index.html">
			<img src="img/logo.png" class="logo">
		</a>

		<ul class="menu">
			<li><a href="index.html">Acasa</a></li>
			<li><a href="about.html">Despre noi</a></li>
			<li class = "cazare_menu"><a href="camere.php">Camere & Tarife</a></li>

			<li><a href="contact.php">Contact</a></li>
			<li><a href="howto.html">Pas cu pas</a></li>
			<li><a href="login.php" class="login-button" data-modal = ".login-modal">Login</a></li>
			<li><a href="register.html" class="register-button" data-modal = ".register-modal">Inregistrare</a></li>
		</ul>

		<div class="clear"></div>
	</div>
</div>
	<div id="inner2">

 <div id="content-sidebar-wrap" style="position: relative;">
    <div id="content" class="hfeed">
        
        <div class="post-4103 page type-page status-publish hentry">
        
        <div class="entry-content">
	<iframe src="https://3dwarehouse.sketchup.com/embed.html?mid=u322a4692-d66e-4761-b086-7a0314824ec7&width=400&height=300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" width="600" height="500" allowfullscreen></iframe>

	  </div>
		</div>
     </div>
	   <div id="sidebar2" class="sidebar widget-area" style="position: absolute; left: 690px; top: 0px;">
         <br/>
		 <h3>Informatii privind camerele noaste in functie de datepe care le veti introduce:</h3> 
			
		<div id="inner3">	

<form action="ocupied.php" method="post">
	<table>
     
     <tr><br>
      <td>
      	De la data de:
      </td>
      <td>
      	<input type='date' name='startDate'>
      </td>
     </tr>

     <tr><br>
      <td>
      	Pana la data de:
      </td>
      <td>
      	<input type='date' name='endDate'>
      </td>
     </tr>
<tr>
      
      <td>
        <input type='hidden' name='submitted' value='true'>
      </td>
     </tr>
	</table>

	<p><input type='submit' name='submit'  value='Arata'></p>
</form>

</div>
</html>
