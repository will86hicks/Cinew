<?php
//Author:			Jacob LeCoq
//Date:				4-26-15
//Certification: 	I, Jacob LeCoq, hereby state that this document is my work and only my work.
?>

<?php
include 'login.php';
?>

<html>
<body>

<head>
<title> 
Create Account
</title>
</head>

<div align="center">
<body style="background-color:darkgrey">
<h1>CREATE ACCOUNT</h1>
<br>
</div>

<head>
<style>
.button2{
	background: red;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.button1{
	background: green;
	font-size: 16px;
	width: 100px;
	height: 50px
}
.background{
	font-size: 24px;
	background: lightblue;
}
</head>
</style>

<form action="AcctCreatePHP.php" method="POST">
<form action=autocomplete="on">
<font size="5"><b>E-mail: </b><input type="email" name="usremail" placeholder="bob@something.com" required id ="email" class="background">
<br><br>
<font size="5"><b>First Name: </b><input type="input" name="fname" required id="fname" required placeholder="BOB" class="background">
<br><br>
<b>Last Name: </b><input type="input" name="lname" required id="lname" required placeholder="BOBERSON" class="background">
<br><br>

<b>Address Line: </b><input type="input" name="address" id="address" required placeholder="1234 Rainbow Road" class="background">
<b>City: </b><input type="input" name="city" id="city" required placeholder="Mario Kart" class="background">
<b>State: </b><input type="input" name="state" id="state" required size="1"  placeholder="LA" class="background">
<b>ZipCode: </b><input type="input" name="zip"  id="zip"  size="5"  placeholder="70765" minlength="5" maxlength="5" class="background">
<br><br>
<b>Phone Number: </b><input type="input" name="phone" placeholder="(123)456-7890" minlength="13" maxlength="13" id="phoneNum"required class="background">

<b>Age: </b><input type="number" name="age" id="ages" required placeholder="23" class="background"></font>
<br>

<br><br>
<b>Months of Membership:</b>
<select name="months" class="background">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
  <option value="11">11</option>
  <option value="12">12</option>
</select>
<br><br>

<?php
    $result = mysql_query("SELECT * FROM member") or die(mysql_error());
?>
<div align="center">
<p><b>The membership fee is $30 per month per person.</b></p>
<br><br>
<button type="submit" class="button1">CREATE ACCOUNT</button>
</form>
</form>
<br><br>
<form action="LoginPage.php">
<button type="submit" class="button2">Back</button>
</form>
</div>
</body>
</html>