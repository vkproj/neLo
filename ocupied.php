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
     Print "<tr>"; 
     Print "<th>Camera:</th> <td>".$info['roomId'] . "</td> "; 
     Print "<th>De la:</th> <td>".$info['startDate'] . "</td> "; 
     Print "<th>Pana la:</th> <td>".$info['endDate'] . "</td> "; 
Print "<th>Nr locuri:</th> <td>".$info['capacity'] . "</td> "; 
     Print "<th>Pret:</th> <td>".$info['price'] . " </td></tr>";
     
      
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
<html xmlns="http://www.w3.org/1999/xhtml">




<form action="ocupied.php" method="post">
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
        <input type='hidden' name='submitted' value='true'>
      </td>
     </tr>



	</table>

	<p>
    

		<input type='submit' name='submit'  value='Arata'>


</form>


</html>
