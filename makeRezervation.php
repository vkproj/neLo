<?php

 include_once('library.php');

 
 if(isset($_POST['submitted']))
 {
 
 
if(!isset($_SESSION['username'])) 
    {
        //header("Location: login.php");
    }
    $username = $_SESSION['username'];
 
	  
	  $startDate = mysql_real_escape_string(($_POST["startDate"]) );
	  $endDate = mysql_real_escape_string( $_POST["endDate"] );
	   $capacity = mysql_real_escape_string( $_POST["capacity"] );
	    
		$other=implode(",", $_POST['other']);
		
		 
		 $submit = $_POST['submit'];
		 $test=0;						
		$days = floor(abs($endDate - $startDate) / 86400);
		
		
		
 if($submit)
 {
 
  echo '<form method="LINK" action="rezerv.php">';
  echo '<input type="submit" value="Vezi camerele disponibile">';
  echo '</form>';
  
  
  $specie=mysql_query("SELECT type FROM users WHERE username='$username'");
  $qr=mysql_fetch_array($specie);
  
 

  
  

     


 
	  if(  empty($startDate) || empty($endDate) || empty($capacity) || empty($other))
	  {
	  	echo "Complete all fields!";
		exit();
	  }
 
else
{
      $q1="DROP TABLE temp";
	  mysql_query($q1) or die(mysql_error());
	  $q2="CREATE TABLE temp (roomId CHAR(20),Type CHAR(20),Capacity INT,Others CHAR(200),price INT)";
	  mysql_query($q2) or die(mysql_error());
     
    // $sel1=mysql_query("SELECT roomId,type,capacity,others INTO temp FROM rooms WHERE type='$qr[0]' AND capacity='$capacity' AND others LIKE '%$other%'");
	  $sel1=mysql_query("INSERT INTO temp SELECT roomId,type,capacity,others,price FROM rooms WHERE type='$qr[0]' AND capacity='$capacity' AND others LIKE '%$other%'");
	
	 
 //$data = mysql_query("SELECT * FROM temp ") or die(mysql_error()); 
 // $rez=mysql_fetch_assoc($data);
 // if($rez)
   
    // Print "<table border cellpadding=3>"; 
    // while($info = mysql_fetch_array( $data)) 
    // { 
    // Print "<tr>"; 
    // Print "<th>room:</th> <td>".$info['roomId'] . "</td> "; 
   //  Print "<th>Type:</th> <td>".$info['Type'] . "</td> "; 
   //  Print "<th>Capacity:</th> <td>".$info['Capacity'] . "</td> "; 

   //  Print "<th>Other:</th> <td>".$info['Others'] . " </td></tr>";
     
      
   //  } 
    // Print "</table>"; 

  
  

      $q5="DROP TABLE available";
	  mysql_query($q5) or die(mysql_error());
	  $q6="CREATE TABLE available (rId CHAR(20),type CHAR(20),capacity INT,others CHAR(200),price INT)";
      mysql_query($q6) or die(mysql_error());
     
	 
	 
	 
	  $q3="DROP TABLE aux";
	  mysql_query($q3) or die(mysql_error());
	  $q4="CREATE TABLE aux (rId CHAR(20),sDate DATE,eDate DATE,cap INT,price INT)";
	  mysql_query($q4) or die(mysql_error());
	  $sel2=mysql_query("INSERT INTO aux SELECT rezervations.roomId,rezervations.startDate,rezervations.endDate,rezervations.capacity,rezervations.price FROM rezervations,temp WHERE rezervations.roomId=temp.roomId");
	 
	 $data = mysql_query("SELECT rId,sDate,eDate,cap,price FROM aux ") or die(mysql_error()); 
     // $rows=mysql_num_rows($data);
      // echo "$rows";
	  
	
	  
	  
    // if($rows>0)
   
   // {
    
      
 
	  
	  
	  while($row = mysql_fetch_array($data))
	  {
	  
	  $id=$row["rId"];
	  $sDate=$row["sDate"];
	  $eDate=$row["eDate"];
	  $cap=$row["cap"];
	  $price=$row["price"];
	 // echo "$price";
	  $test=0;
	  $from=$row["sDate"];
	 
	   // $from=strtotime('$row["sDate"]');
	   $to=$row["eDate"];
	 
	  // $to=strtotime('$row["eDate"]');
	  $myfrom=$startDate;
	 
	   //$myfrom=strtotime('$startDate');
	   //$myto=strtotime('$endDate');
	$myto=$endDate;

	   
	 
	   
	    if($myfrom >= $from && $myfrom <= $to)
	         $test=1;
			 else
			    if($myto >= $from && $myto <= $to)
	                    $test=1;
						else 
						   if($from >= $myfrom && $from <= $myto)
						        $test=1;
								else
								   if($to >= $myfrom && $to <= $myto)
								      $test=1;
									  
									  
		if($test==0)	  
	  {
	   	 /* $sql = "INSERT INTO $username VALUES('$id',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                            '$price'										   
                                           )";
										   
										    $sql2 = "INSERT INTO rezervations VALUES('',
		                                   '$id',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                            '$price'										   
                                           )";
										   
	    if( mysql_query($sql) && mysql_query($sql2))
	     echo "inserted";
	   else
	     echo "not inserted";*/
		 
		 $sel3="INSERT INTO available SELECT rooms.roomId,rooms.type,rooms.capacity,rooms.others,rooms.price FROM rooms WHERE rooms.roomId='$id' AND NOT EXISTS (
       SELECT * 
       FROM available
       WHERE rId='$id'     );";
	   
		 mysql_query($sel3);
	     
		 
		
		
		 
		
	}
	//else
	//echo"not available";							  
									  
									  
	  }
	  
	  
	
// }
     
      
    
 
 
 
 //echo "$test";
 
 $data2 = mysql_query("SELECT * FROM available ") or die(mysql_error()); 
   $rows=mysql_num_rows($data2);
      
	  if($rows!=0)
	  {
	  
	 // echo "Introduceti id-ul camerei pe care o doriti din cele disponibile";
	  
	// Print "<table border cellpadding=3>"; 
	
	$list = array (array ($startDate,$endDate),
	                array('Camera','Tip','Nr locuri','Beneficii','Pret'));
	
	 $fp = fopen('file.csv', 'w');

     foreach ($list as $fields) {
     fputcsv($fp, $fields);
    }
	
     while($info = mysql_fetch_array( $data2)) 
     {

     	$id=$info["rId"];
	  $type=$info["type"];
	  $cap=$info["capacity"];
	  $other=$info["others"];
	  $price=$info["price"]; 
	
	 $list = array (array($id,$type,$cap,$other,$price));
	 $fp = fopen('file.csv', 'a');

     foreach ($list as $fields) {
     fputcsv($fp, $fields);
    }

     fclose($fp);
	 
	 
     //Print "<tr>"; 
    // Print "<th>room:</th> <td>".$info['rId'] . "</td> "; 
    // Print "<th>Type:</th> <td>".$info['type'] . "</td> "; 
    // Print "<th>Capacity:</th> <td>".$info['capacity'] . "</td> "; 
    // Print "<th>Other:</th> <td>".$info['others'] . "</td> "; 
    // Print "<th>Price:</th> <td>".$info['price'] . " </td></tr>";     
     } 
    // Print "</table>"; 
	 
	 
	// echo '<form name="form" action="" method="post">';
	/// echo '<input type="text" name="idCam">';
	// echo '<input type="submit" name="submit"  value="Rezerva">';
	 //echo '</form>';
	 
	//  $submit = $_POST['submit'];
	 //$idc=$_POST['idCam'];
	// $id = mysql_real_escape_string( $_POST["idCam"] );
	//  echo "$id";
	 // echo "$submit";
	 
	  //if($submit)
	 // {
	 
	  
	  
	 /* $sql = "INSERT INTO $username VALUES('$idcam',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                           '$price'										   
                                           )";
										   
										    $sql2 = "INSERT INTO rezervations VALUES('',
		                                   '$idcam',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                            '$price'										   
                                           )";
										   
	    if( mysql_query($sql) && mysql_query($sql2))
	     echo "inserted";
	   else
	     echo "not inserted";*/
	  
	  	  
	  
	  
	 // }else "Nu ati ales o camera";
	 
      }
	  else echo"Nu exista nicio camera disponibila";
 
     /*if($test==0)
	  
	  {
	   	  $sql = "INSERT INTO $username VALUES('$id',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                            '$price'										   
                                           )";
										   
										    $sql2 = "INSERT INTO rezervations VALUES('',
		                                   '$id',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                            '$price'										   
                                           )";
										   
	    if( mysql_query($sql) && mysql_query($sql2))
	     echo "inserted";
	   else
	     echo "not inserted";
		 
		
		 
		
	}
	else
	echo"not available";*/
	
}
}
}	
?>

	
	

	
	

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">



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
			<li><a href="">Acasa</a></li>
			<li><a href="http://localhost/neLo/about.html">Despre noi</a></li>
			<li class = "cazare_menu"><a href="http://localhost/neLo/camere.html">Camere & Tarife</a>
				
			</li>

			<li><a href="#">Contact</a></li>
			<li><a href="#" class="login-button" data-modal = ".login-modal">Login</a></li>
			<li><a href="#" class="register-button" data-modal = ".register-modal">Inregistrare</a></li>
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
		 <h3>Introdu date in functie de dorintele tale in materie de camera</h3> 
			<h3>iar noi iti vom arata ce putem oferi.</h3>
		<div id="inner3">	
			
			
<form action="makeRezervation.php" method="post">
	  <div id="datein"><br>
      	<p style="margin-left:75px;font-size:20px;">De la data de:  
      
      	<input type='date' name='startDate' ></p><br>
      
      	<p style="margin-left:55px;font-size:20px;">Pana la data de:    
		
       	<input type='date' name='endDate'></p><br>
		
        <p style="margin-left:40px;font-size:20px;"> Numar persoane:   
          	<input type='text' name='capacity'></p><br>
      </div>
	  <div id="benef">
      	<p style="margin-left:40px;font-size:20px;">Beneficii:</p>
      
      	<p style="margin-left:145px;font-size:20px;"><input type="checkbox" name="other[]" value="aer conditionat">aer conditionat</p><br>
		<p style="margin-left:100px;font-size:20px;"><input type="checkbox" name="other[]" value="balcon cu vedere la cimitir" style="margin-left: 50px;">balcon cu vedere la cimitir</p><br>
		<p style="margin-left:100px;font-size:20px;"><input type="checkbox" name="other[]" value="minibar cu 30 sortimente de sange" style="margin-left: 50px;">minibar cu 30 sortimente de sange</p><br>
		<p style="margin-left:100px;font-size:20px;"><input type="checkbox" name="other[]" value="masaj electric" style="margin-left: 50px;">masaj electric</p><br>
        <p style="margin-left:100px;font-size:20px;"><input type="checkbox" name="other[]" value="maturi la discretie" style="margin-left: 50px;">maturi la discretie</p><br><br>
      </p>
	  
        
		<input type='hidden' name='submitted' value='true'>
    	  
		<p style="margin-left:400px;font-size:20px;"><input type='submit' name='submit'  value='Rezerva'></p><br>
 
  <p style="margin-left:320px;font-size:20px;"><?php  
  echo '<form method="LINK" action="rezerv.php">';
  echo '<input type="submit" value="Vezi camerele disponibile">';
  echo '</form>';?></p>

</form>

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
