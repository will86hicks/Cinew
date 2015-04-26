<?php
include 'login.php';
echo "<p><b>Logged In As: {$_SESSION["user"]}</b></p>";
echo "<p><b>Today's Date: {$_SESSION["today_date"]}</b></p>";
echo 
	"<form action='logout.php'>
	<div align='left'> <button class='button2'>LOG OUT</button> </div>
	</form>";
$user = $_SESSION["user"];
?>

<html> 

<body style="background-color:lightgrey">
<h3>ADD NEW MEMBER WITH NEW ACCOUNT</h3>
<br>

<form action="AdminAcctCreate.php" method="POST">
<form action=autocomplete="on">

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
Phone Number: <input type="input" name="phone" placeholder="(123)456-7890" minlength="13" maxlength="13" id="phoneNum"required>

Age: <input type="number" name="age" id="ages" required placeholder="23">
<br>

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

<br><br>
<button align = "center" type="submit">CREATE ACCOUNT</button>
</form>
</form>
<br>
</div>


<h3>ADD NEW MEMBER TO EXISTING ACCOUNT</h3>

<form action="AdminAddMemberToAcct.php" method="POST">
<form action=autocomplete="on">

<br><br>

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
Phone Number: <input type="input" name="phone" placeholder="(123)456-7890" minlength="13" maxlength="13" id="phoneNum"required>

Age: <input type="number" name="age" id="ages" required placeholder="23">
<br>

<br><br>
Existing Account Number:

<!-- Display all the available accounts to add to -->
<select name="account">

<?php
	$acctresults = mysql_query("SELECT DISTINCT mp.acct
						FROM membership mp") or die(mysql_error());
	while($row = mysql_fetch_array($acctresults)){
		echo "<option value='{$row['acct']}'> {$row['acct']}</option>" ;
	}
?>


</select>

<br><br>
<button type="submit">Add Member to Account</button>
</form>
</form>
<br><br>
<form action="AdminPanelForm.php">
<button type="submit">Back</button>
</form>
</div>
</body>
</html>