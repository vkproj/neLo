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
     while($info = mysql_fetch_array( $data)) 
     { 
     Print "<tr>"; 
     Print "<th>Room:</th> <td>".$info['room'] . "</td> "; 
     Print "<th>De la data de:</th> <td>".$info['startDate'] . "</td> "; 
     Print "<th>Pana la data de:</th> <td>".$info['endDate'] . "</td> "; 
Print "<th>Nr persoane:</th> <td>".$info['capacity'] . "</td> "; 
     Print "<th>Pret:</th> <td>".$info['price'] . " </td></tr>";
     
      
     } 
     Print "</table>"; 
}



 ?>   
