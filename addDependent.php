<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
$user = $_SESSION["user"];
?>

<html>
<body>

<head>
<title> 
Add Dependent
</title>
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
</style>
</head>

<div align="center">
<body style="background-color:darkgrey">
<h2>ADD DEPENDENT</h2>
<br></div>

<form action="" method="POST">
E-mail: <input type="email" name="usremail" placeholder="bob@something.com" required id ="email">
<br><br>
First Name: <input type="input" name="fname" required id="fname" required placeholder="BOB">
<br><br>
Last Name: <input type="input" name="lname" required id="lname" required placeholder="BOBERSON">
<br><br>

Address Line: <input type="input" name="address" id="address" required placeholder="1234 Rainbow Road">
City: <input type="input" name="city" id="city" required placeholder="Mario Kart">
State: <input type="input" name="state" id="state" required size="1"  placeholder="SNES" >
ZipCode: <input type="input" name="zip"  id="zip"  size="5"  placeholder="70765" minlength="5" maxlength="5">
<br><br>
Phone Number: <input type="input" name="phone" placeholder="(123)456-7890" minlength="13" maxlength="13" id="phoneNum" required>

Age: <input type="number" name="age" id="ages" required placeholder="23">

<br><br>
Months of Membership:
<select name="months">
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

<div align="center">
<p><b>The membership fee is $30 per month per person.</b></p>

</select-->
<br><br>
<button class ='button1' type="submit">Add Dependent</button>
</form>

<br><br><br>

<form action='StartPage.php'>
<div align='center'> <button class='button2'>Back</button> </div>
</form>

</div>
</body>
</html>