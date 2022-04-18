

<?php
session_start();

if(isset($_SESSION['username'])){


}
else{

    header('location: login.php');
}

?>
<!DOCTYPE html>
<html>
<style>
.error {color: #394393;}


</style>
<head>
    <title>Profile</title>
</head>

 <?php include('header2.php')?>



 <?php

    require_once '../controller/readData.php';
    $row = fetchUsers($_SESSION['username']);
    


    if($_SESSION['username']==$row["User_Name"] && $_SESSION['password']==$row["Password"]){

         echo "<h1 class=\"error\" align = \"center\">Profile Name : ".$row["Name"]."</h1>";

         echo "<h1 class=\"error\" align = \"center\">Email Address : ".$row["Email"]."</h1>";

         echo "<h1 class=\"error\" align = \"center\">User Name : ".$row["User_Name"]."</h1>";

         echo "<h1 class=\"error\" align = \"center\">Date of Birth : ".$row["Dob"]."</h1>";

         echo "<h1 class=\"error\" align = \"center\">Gender : ".$row["Gender"]."</h1>";

     }           

 
?>


<body>





</body>


  <?php include('footer.php')?>

  </html>