

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

require_once '../controller/readData.php';
$rows = fetchHistory();

?>



<!DOCTYPE html>
<html>

 <?php include('header2.php')?>

<style>
.error {color: #394393;}


</style>

<?php 

    $q="";



      echo "<p><br></p><p><br></p><fieldset><legend><h1 align='center'>All Doctor Details</h1></legend><table align='center' border='15px'>
          <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Speciality</th>
               <th>Schedule</th>
               <th>Gender</th>
               <th>Appointment Date</th>
               <th>Status</th>
           </tr>";

      foreach($rows  as $row)  
          {  
          
               echo "



               <tr>
                   <td>
                      <h3  align = \"center\">".$row["Name"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Email"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Speciality"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Schedule"]."</h3>
                   </td>


                   <td>
                      <h3  align = \"center\">".$row["Gender"]."</h3>
                   </td>

                   <td>
                      <h3  align = \"center\">".$row["Appointment_Date"]."</h3>
                   </td>
                   <td>
                      <h3  align = \"center\">".$row["Status"]."</h3>
                   </td>


              </tr>
              
               ";

              
          }

          echo '</table><p><br></p><p><br></p><p><br></p>

          </fieldset>';

    ?>

<body>

</body>


  <?php include('footer.php')?>

  </html>