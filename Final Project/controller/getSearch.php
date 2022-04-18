

<?php 



    //$q="";

    $q=$_GET["q"];

    $con = mysqli_connect('localhost','root','','hospital');
    if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
    }


    $sql="SELECT * FROM `doctor_info` WHERE Name LIKE '%{$q}%'";
    $result = mysqli_query($con,$sql);

      echo "<p><br></p><p><br></p><table align='center' border='15px'>
          <tr>
               <th>Name</th>
               <th>Email</th>
               <th>Speciality</th>
               <th>Schedule</th>
               <th>Gender</th>
               <th>Apply for Appointment</th>
           </tr>";

      while($row = mysqli_fetch_array($result)) {   
          
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
                        <center>
                          <form method=\"post\" action=\"applied.php?q=".$row["Email"]."\">
                            <input type=\"date\" min=\"".date('Y-m-d')."\"  id=\"appointmentDate\" name=\"appointmentDate\"><br>
                            <input type=\"submit\" value=\"Apply\">&nbsp;&nbsp;
                          </form>
                        </center>
                   </td>


              </tr>
              
               ";

              
          }

          echo '</table><p><br></p><p><br></p><p><br></p>';

          mysqli_close($con);

    ?>

