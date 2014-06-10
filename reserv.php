
<?php
      include_once('library.php');
 
   // echo '<form name="form" action="rezerv.php" method="post">';
	///echo '<input type="text" name="idCam">';
	//echo '<input type="submit" name="submit"  value="Rezerva">';
	//echo '</form>';
	 
	if(!isset($_SESSION['username'])) 
    {
        //header("Location: login.php");
    }
    $username = $_SESSION['username'];
	
 if(isset($_POST['submitted']))
 {
  
	 
	$sub =$_POST["submit"];
	if($sub)
	{
	
	$id=$_POST["idCam"];	
	  
	$data = mysql_query("SELECT capacity,price FROM rooms WHERE roomId='$id' ") or die(mysql_error());  
	   while($row = mysql_fetch_array($data))
	  {
	  
	  $cap=$row["capacity"];
	  $price=$row["price"];
	  }
	  
	  
	$sql = "INSERT INTO $username VALUES('$id',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                            '$price*$days'										   
                                           )";
										   
										    $sql2 = "INSERT INTO rezervations VALUES('',
		                                   '$id',
                                           '$startDate', 
                                           '$endDate', 
                                           '$cap',
                                            '$price*$days'										   
                                           )";
										   
	    if( mysql_query($sql) && mysql_query($sql2))
	     echo "inserted";
	   else
	     echo "not inserted";
	
	
	
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
		 <h3>Camerele disponibile ce respecta cerintele dumneavoastra sunt:</h3> 
			
		<div id="inner3">	
             <form action="rezerv.php" method="post">
              <?php
		
	$row = 1;
if (($handle = fopen("file.csv", "r")) !== FALSE) {
    
	$counter = 0;
 
while ( ! feof ( $handle) )
{     
    if ( $counter === 1 )
        break;
 
    $buffer = fgetcsv ( $handle, 5000 ); 
    ++$counter;
}
	
	$sdates=implode(",",$buffer);
	$dates=explode(",", $sdates);
	
	$startDate=$dates[0];
	$endDate=$dates[1];
	//echo "$startDate $endDate";
	$days = floor(abs($endDate - $startDate) / 86400);
	
    echo '<table border="1">';
    
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            echo '<thead><tr>';
        }else{
            echo '<tr>';
        }
        
		
		
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
           
		   if(empty($data[$c])) {
               $value = "&nbsp;";
            }else{
               $value = $data[$c];
            }
            if ($row == 1) {
                echo '<th>'.$value.'</th>';
            }else{
                echo '<td>'.$value.'</td>';
            }
			
			
        }
        
        if ($row == 1) {
            echo '</tr></thead><tbody>';
        }else{
            echo '</tr>';
        }
        $row++;
    }
    
    echo '</tbody></table>';
    fclose($handle);
}
?>
              
			  <br><input type="text" name='idCam'>
               <input type='hidden' name='submitted' value='true'>
              <input type='submit' name='submit'  value='Rezerva'>
              
              

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

