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
			<li><a href="logout.php" class="login-button" data-modal = ".login-modal">Logout</a></li>
			
		</ul>

		<div class="clear"></div>
	</div>
</div>
	
<div  style="alignment-adjust:central;padding-left:300px;>

        
		 <br><h3 style="font-size:larger;color:#CC0000;position:center;font-size:20px;">Acestea sunt rezervarile pe care le-ai facut pana acum:</h3><br>
		  </div>
		</div>
     </div>
	   <div   style="background-color:#B36666;position:center; left: 300px; top: 20px;border:double;">
		  <?php
            include 'library.php';
             if(!isset($_SESSION['username'])) 
                {
                    //header("Location: login.php");
                }
                $username = $_SESSION['username'];
                
              $data = mysql_query("SELECT * FROM $username ") or die(mysql_error()); 
              //$rez=mysql_fetch_assoc($data);
              //if($rez)
              {
                 Print "<table border cellpadding=3>"; 
				 Print "<tr><th>Camere<th> De la data de <th>Pana la data de<th>Nr persoane<th>Pret<th></tr>";
                 while($info = mysql_fetch_array( $data)) 
                 { 
                 Print "<tr>"; 
                 Print " <td>".$info['room'] . "</td> "; 
                 Print " <td>".$info['startDate'] . "</td> "; 
                 Print " <td>".$info['endDate'] . "</td> "; 
                 Print " <td>".$info['capacity'] . "</td> "; 
                 Print " <td>".$info['price'] . " </td></tr>";
                 
                    } 
                 Print "</table>"; 
            }
             ?> 
			 </div>
			 
			 <p style="float: left;"><img src="img/arrow.gif" class="arrow" style="margin-left:370px">
				<li><a href="makeRezervation.php" style="color:#CC0000;margin-left:40px;font-size:25px;">Fa o noua rezervare</a></li>
	
</body>
</html>
  
