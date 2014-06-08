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
		
 if($submit)
 {
 
  $specie=mysql_query("SELECT type FROM users WHERE username='$username'");
  $qr=mysql_fetch_array($specie);
  
 

  
  

     echo "You selected: $other <br>";


 
	  if(  empty($startDate) || empty($endDate) || empty($capacity) || empty($other))
	  {
	  	echo "Complete all fields!";
		exit();
	  }
 
else
{
      $q1="DROP TABLE temp";
	  mysql_query($q1) or die(mysql_error());
	  $q2="CREATE TABLE temp (roomId CHAR(20),Type CHAR(20),Capacity INT,Others CHAR(200))";
	  mysql_query($q2) or die(mysql_error());
     
    // $sel1=mysql_query("SELECT roomId,type,capacity,others INTO temp FROM rooms WHERE type='$qr[0]' AND capacity='$capacity' AND others LIKE '%$other%'");
	$sel1=mysql_query("INSERT INTO temp SELECT roomId,type,capacity,others FROM rooms WHERE type='$qr[0]' AND capacity='$capacity' AND others LIKE '%$other%'");
	
	 
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

  
  
{


     
	 
	 
	 
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
	  
	  $test=0;
	  $from=$row["sDate"];
	 
	   // $from=strtotime('$row["sDate"]');
	   $to=$row["eDate"];
	 
	  // $to=strtotime('$row["eDate"]');
	  $myfrom=$startDate;
	 
	   //$myfrom=strtotime('$startDate');
	   //$myto=strtotime('$endDate');
	$myto=$endDate;

	   
	  // echo "$myto";
	   
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
	echo"not available";							  
									  
									  
	  }
	  
	  
	
// }
     
      
 }
 
 
 }
 echo "$test";
    /* if($test==0)
	  
	  {
	   	  $sql = "INSERT INTO $username VALUES('$rId',
                                           '$sDate', 
                                           '$eDate', 
                                           '$cap',
                                            '$price'										   
                                           )";
										   
										    $sql2 = "INSERT INTO rezervations VALUES('',
		                                   '$rId',
                                           '$sDate', 
                                           '$eDate', 
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
?>

	
	

	
	
	

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">




<form action="makeRezervation.php" method="post">
	<table>
     


    

     <tr>
      <td>
      	De la data de:
      </td>
      <td>
      	<input type='date' name='startDate'>
      </td>
     </tr>

     <tr>
      <td>
      	Pana la data de:
      </td>
      <td>
      	<input type='date' name='endDate'>
      </td>
     </tr>
	 
	 
	 
	  <tr>
      <td>
      	Numar persoane:
      </td>
      <td>
      	<input type='text' name='capacity'>
      </td>
     </tr>
	 
	 <tr>
      <td>
      	Beneficii:
      </td>
      <td>
      	<input type="checkbox" name="other[]" value="aer conditionat">aer conditionat<br>
		<input type="checkbox" name="other[]" value="balcon cu vedere la cimitir" style="margin-left: 50px;">balcon cu vedere la cimitir<br>
		<input type="checkbox" name="other[]" value="minibar cu 30 sortimente de sange"
		style="margin-left: 50px;">minibar cu 30 sortimente de sange<br>
		<input type="checkbox" name="other[]" value="masaj electric"
		style="margin-left: 50px;">masaj electric<br>
        <input type="checkbox" name="other[]" value="maturi la discretie"
		style="margin-left: 50px;">maturi la discretie<br><br>
      </td>
     </tr>
	 
	 
	 

<tr>
      
      <td>
        <input type='hidden' name='submitted' value='true'>
      </td>
     </tr>





	</table>

	<p>
    

		<input type='submit' name='submit'  value='Rezerva'>


</form>


</html>
