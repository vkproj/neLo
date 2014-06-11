<?php
include 'library.php';
if(!isset($_SESSION['id']) || $_SESSION['id'] == ''){
	echo '<script type="text/javascript">window.location = "login.php"; </script>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<html>
<head>
	<title>Cripta Z</title>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style3.css">
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
			<li><a href="logout.php" class="login-button" data-modal = ".login-modal">Logout</a></li>
			
		</ul>

		<div class="clear"></div>
	</div>
</div>










<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hi <?php echo ucfirst($_SESSION['username']); ?>, good to see you again</title>

</head>

<body>
    
     <br/>
    <div class="as_wrapper">
    	<h1>Buna <b><?php echo ucfirst($_SESSION['username']); ?></b>, bine ai revenit.Ai reusit sa te loghezi . Pentru deconectare clik <a href="logout.php" class="a">logout</a></h1>
       <img src="img/blood.gif" class="blood">
	   <img src="img/blood.gif" class="blood">
	   <img src="img/blood.gif" class="blood">
		<img src="img/blood.gif" class="blood">
		<img src="img/blood.gif" class="blood">
		<img src="img/blood.gif" class="blood">
	</div>
	<div id="linkuri">
	 <ul id="menu" >
         <p style="color:#CCCCCC;margin-left:450px;font-size:30px;">Sau poti sa :</p><br/>
        	<div>
    			<p style="float: left;"><img src="img/arrow.gif" class="arrow" style="margin-left:370px">
    				
    			<li><a href="makeRezervation.php" style="color:#CC0000;margin-left:40px;font-size:25px;">Faci o rezervare</a></li>
    		</div><br/>
			
			<div><p style="float: left;"><img src="img/arrow.gif" class="arrow" style="margin-left:0px">
             <li><a href="seeRezervation.php" style="color:#CC0000;margin-left:40px;font-size:25px;">Vezi istoricul rezervarilor</a></li>
	       </div><br/>
		   <div>
			<p style="float: left;"><img src="img/arrow.gif" class="arrow" style="margin-left:0px">
		    <li><a href="ocupied.php" style="color:#CC0000;margin-left:40px;font-size:25px;">Verifica o perioada daca e disponibila</a></li>
			</div>
	 </ul>
	</div>
	
</body
</html>
