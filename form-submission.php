<?php

$fnameErr = $lnameErr = $genderErr = $dobErr = $ReligionErr = $mailErr = $usernameErr = $passwordErr = "";
$fname = $lname= $gender= $dob = $Religion = $mail = $username = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First Name is required";
  } else {
    $fname = test_input($_POST["fname"]);
  }
  if (empty($_POST["lname"])) {
    $lnameErr = "Last Name is required";
  } else {
    $lname = test_input($_POST["lname"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr= "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  if (empty($_POST["dob"])) {
    $dobErr= "Date of birth is required";
  } else {
    $dob = test_input($_POST["dob"]);
  }
  if (empty($_POST["Religion"])) {
    $ReligionErr= "Religion is required";
  } else {
    $Religion = test_input($_POST["Religion"]);
  }
  if (empty($_POST["mail"])) {
    $mailErr = "Email is required";
  } else {
    $mail= test_input($_POST["mail"]);
  }
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username= test_input($_POST["username"]);
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password= test_input($_POST["password"]);
  }

  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Form</title>
</head>
<body>
  <h1>Registration Form</h1><br>
<fieldset>
  <legend> Basic information: <br> </legend>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<label for="fname">1.First Name:<label>
    <input type="text" id="fname" name="fname">
    <span style="color: red;"class="error">* <?php echo $fnameErr;?></span>
    <br>
<label for="lname">2.Last Name:</label>
    <input type="text" id="lname" name="lname">
    <span style="color: red;"class="error">* <?php echo $lnameErr;?></span>
    <br>
<label for="Gender">3.Gender:</label>
    <input type="radio" id="male" name="gender" value="male">
<label for="male">Male</label>
    
    <input type="radio" id="female" name="gender" value="female">
<label for="female">Female</label>
    
    <input type="radio" id="other" name="gender" value="other">
<label for="other">Other</label>
<span style="color: red;"class="error">* <?php echo $genderErr;?></span>
<br>
<label for="dob">4.DOB:<label>
    <input type="date" id="dob" name="dob">
    <span style="color: red;" class="error">* <?php echo $dobErr;?></span>
    <br>

  <label for="Religion">5.Religion:</label>
  <select name="Religion" id="Religion">
    <option value="hindu">Hindu</option>
    <option value="muslim">Muslim</option>
    <option value="other">Other</option>
    <span style="color: red;" class="error">* <?php echo $ReligionErr;?></span><br>
 </select>
 
</fieldset>
<fieldset>
  <legend>Contact information: <br></legend>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="paddress">1.Present Address:<label>
    <input type="text" id="paddress" name="paddress"><br>
  <label for="peraddress">2.Permanent Address:<label>
    <input type="text" id="peraddress" name="peraddress"><br>
  <label for="tel">3.Phone:<label>
    <input type="tel" id="tel" name="tel"><br>

  <label for="mail">4.Email:<label>
    <input type="Email" id="mail" name="mail">
    <span style="color: red;" class="error">* <?php echo $mailErr;?></span>
    <br>    
<label for="link">5.Personal web:<label>
    <input type="url" id="link" name="link"><br>    
</fieldset>
<fieldset>
  <legend>Account Information: <br></legend>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="username">1.UserName:<label>
    <input type="text" id="username" name="username">
    <span style="color: red;" class="error">* <?php echo $usernameErr;?></span>
    <br>
  <label for="password">2.Password:<label>
    <input type="password" id="password" name="password">
    <span style="color: red;" class="error">* <?php echo $passwordErr;?></span>
    <br>
  

</fieldset>
    <input type="submit" value="Submit">
  </form>
  </body>
</html>

<?php
echo "<h2>Your Input:</h2>";
echo $fname;
echo "<br>";
echo $lname;
echo "<br>";
echo $gender;
echo "<br>";
echo $dob;
echo "<br>";
echo $Religion;
echo "<br>";
echo $mail;
echo "<br>";
echo $username;
echo "<br>";
echo $password;

?>
