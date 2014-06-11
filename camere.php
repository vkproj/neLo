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
		 <h3>Informatii privind camerele noaste:</h3> 
			
		<div id="inner3">	
			<?php
include 'library.php';
    if(!isset($_SESSION['username'])) 
    {
        //header("Location: login.php");
    }
    $username = $_SESSION['username'];
    
  $data = mysql_query("SELECT * FROM rooms ") or die(mysql_error()); 
  //$rez=mysql_fetch_assoc($data);
  //if($rez)
  {
     Print "<table>"; 
	 Print "<tr><th>Camere<th> Tip <th>Nr Loc<th>Beneficii<th>Pret<th></tr>";
     while($info = mysql_fetch_array( $data)) 
     { 
	 
    // Print "<tr id="">"; 
     Print "<td>".$info['roomId'] . "</td> "; 
     Print "<td>".$info['type'] . "</td> "; 
     Print "<td>".$info['capacity'] . "</td> "; 
     Print "<td>".$info['others'] . "</td> "; 
     Print "<td>".$info['price'] . " </td></tr>";
     
      
     } 
     Print "</table>"; 
}
 ?>
	</div>
	
	</div>
	</div>
<div class="dark-bg">

	<div class="l-modal login-modal">
		<label>E-mail</label>
		<input type="email" placeholder="email.."><br><br>

		<label>Parola</label>
		<input type="password" placeholder="password.."><br><br>

		<input type = "submit" value="Login">
		<input type = "submit" value="Close" class ="close" >
	</div>

	<div class="r-modal register-modal">
		<label>E-mail</label>
		<input type="email" placeholder="email.."><br><br>

		<label>Parola</label>
		<input type="password" placeholder="password.."><br><br>

		<label>Specie</label>
		<input type="radio" name="specie" value="vampir">Vampir<br>
		<input type="radio" name="specie" value="varcolac" style="margin-left: 50px;">Varcolac<br>
		<input type="radio" name="specie" value="vrajitoare"
		style="margin-left: 50px;">Vrajitoare<br>
		<input type="radio" name="specie" value="zombi"
		style="margin-left: 50px;">Zombi<br><br>

		<label> Data nasterii</label>
		<input type="date"><br><br>

		<input type="submit" value = "Register">
		<input type="submit" value = "Close" class="close">

	</div>

</div>

</body>
</html>
