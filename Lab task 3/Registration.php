  <!--  comments-->

<?php
  session_start();
?>



<!DOCTYPE html>
<html>
<style>
.error {color: #FF0000;}
</style>

<?php

    // define variables and set to empty values
    $nameErr = $emailErr = $genderErr = $birthdateErr= $degreeErr = $bloodgroupErr = $newpassErr = $renewpassErr = $usernameErr = "";

    $name = $email = $gender = $birthdate = $degree1 = $degree2 = $degree3 = $degree4= $bloodgroup =$newpass = $renewpass = $username = "";

    $check=0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      
      
      //name validation//name validation//name validation
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } 
      else {
        $name = test_input($_POST["name"]);
        //validating alphabet
        if (!preg_match("/^[a-zA-Z][a-zA-Z.\_\-]+ +[a-zA-Z.\-\_]+/",$name)) {
          $nameErr = "Only Can contain a-z, A-Z, period(.) , dash only(-) and at least two words";
        }
        else
          $check++;
          //!preg_match("/^[a-zA-Z-'{2,8} ]*$/",$name  
      }




      //email validation//email validation//email validation
    
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } 
      else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Must be a valid email_address : anything@example.Com";
        }
        else
          $check++;
      }
      
      //username username   
      if (empty($_POST["username"])) {
        $usernameErr = "username is required";
      } 
      else 
      {
          $username = test_input($_POST["username"]);
          //validating alphabet
          if (!preg_match("/^[0-9a-zA-Z-_]{2,}[^\s.]$/",$username)) {
            $usernameErr = "User Name must contain at least two (2) characters and can contain alpha numeric characters, period, dash or underscore only";
          }
          else
            $check++;
      }



      //password validation//password validation//password validation

      if(empty($_POST["newpass"])){
        $newpassErr=" must need to fill password";
      }else
        $newpass=test_input($_POST["renewpass"]);


      if(empty($_POST["renewpass"])){
        $renewpassErr=" must need to fill confirm password";
      }else
        $renewpass=test_input($_POST["renewpass"]);
      

      if (!preg_match("/^[0-9a-zA-Z@%#$]+$/",$newpass)) {
            $newpassErr = "UPassword must not be less than eight (8) characters contain at least one of the special characters (@, #, $, %)";
      }else if($_POST["newpass"]==$_POST["renewpass"]){
          $check++; 
      }
      else
        $renewpassErr="didn't macth the password ";





      //gender validation//gender validation//gender validation

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } 
      else {
        $gender = test_input($_POST["gender"]);
        $check++;
      }
      

      
      


      //date validation 
      if(empty($_POST["birthdate"])){
        $birthdateErr = " select up year, month, date ";
      }
      else{
        $birthdate = test_input($_POST["birthdate"]);
        $check++;
      }
      

      //form changing 
      if ($check == 6) {
          $_SESSION['name']=$_REQUEST['name'];
          $_SESSION['email']=$_REQUEST['email'];
          $_SESSION['username']=$_REQUEST['username'];
          $_SESSION['pass']=$_REQUEST['newpass'];
          $_SESSION['dob']=$_REQUEST['birthdate'];
          $_SESSION['gender']=$_REQUEST['gender'];
          header('location:submittedForm.php');
      }
  }
  

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>


<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
  <span class="error">(*) must need to fill </span><br>
  <fieldset>
    <legend  > <b> NAME:</legend><br>
		<input type="text" name="name"><br><br>
    <span class="error">* <?php echo $nameErr;?></span>
  </fieldset><br><br>

  <fieldset>
    <legend  > <b> EMAIL :</legend><br>
		<input type="text" name="email"><br><br>
    <span class="error">* <?php echo $emailErr;?></span>
		
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>  User Name:</legend><br> 
    <input type="text" name="username"><br><br>
    <span class="error">* <?php echo $usernameErr;?></span><br><br> 
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>Password :</legend><br>
      <input type="Password" name="newpass" minlength="8"><br><br>
    <span class="error">* <?php echo $newpassErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b>Confirm Password :</legend><br>
    <input type="Password" name="renewpass" minlength="8"><br><br>
    <span class="error">* <?php echo $renewpassErr;?></span>
  </fieldset><br><br>


  

  <fieldset>
    <legend  > <b> DATE OF BIRTH:</legend><br>
  	<input type="date" min="1953-01-01" max="1998-12-31" id="birthdate" name="birthdate"><br><br>
    <span class="error">* <?php echo $birthdateErr;?></span><br><br>
  </fieldset><br><br>


  <fieldset>
    <legend  > <b> GENDER :</legend><br>
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span><br><br>
    <input type="submit" value="submit">&nbsp;&nbsp;
  </fieldset><br><br>

  <!--<fieldset>
    <legend  > <b> DEGREE :</legend><br>

    <input type="checkbox" id="degree1" name="degree1" value="SSC">
    SSC
    <input type="checkbox" id="degree2" name="degree2" value="HSC">
    HSC
    <input type="checkbox" id="degree3" name="degree3" value="BSc">
    BSc
    <input type="checkbox" id="degree4" name="degree4" value="MSc">
    MSc<br><br>
    <span class="error">* <?php //echo $degreeErr;?></span><br><br>
    
  </fieldset><br><br>
-->


  <!--
  <fieldset>
    <legend  > <b> BLOOD GROUP :</legend><br>
    <select id="bloodgroup" name="bloodgroup">
      <option value="">Select</option>
      <option value="A+">A+</option>
      <option value="A-">A-</option>
      <option value="B+">B+</option>
      <option value="B-">B-</option>
      <option value="O+">O+</option>
      <option value="O-">O-</option>
      <option value="AB+">AB+</option>
      <option value="AB-">AB-</option>
    </select>
    <br><br>
    <span class="error">* <?php echo $bloodgroupErr;?></span><br><br>
    <input type="submit" value="submit">&nbsp;&nbsp; 
  </fieldset><br><br>
-->

<!--echo $birthdate("mm")  echo date_format($birthdate,"Y/m/d H:i:s");-->



  



  


</form>



</body>
</html>