

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

 <?php include('header2.php')?>

<style>
.error {color: #394393;}


</style>








<body onload="getAppointment()">

<fieldset><legend><h1 align='center'>All Doctor Details</h1></legend>

<div align="center">Search <input type="text" name="search" id="search"  onkeyup ="showResult(this.value)"></div>


<div id="getAppointment">




    

</div>

</fieldset>
</body>


<script type="text/javascript" src="../javascript/ajax.js"></script>


  <?php include('footer.php')?>

  </html>