<?php
/**
 *It contain login authentication logic of user
 */
include_once 'db_info.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result =mysql_query("SELECT username , password FROM user_detail WHERE username = $username and password = $password ");

if (!$result)
{
	$error = "Login or password is incorrect" ;
}
else
{
	session_start();

	$row = mysql_fetch_assoc($result);
	$_SESSION['userid'] = $row['id'];
	$_SESSION['username'] = $username;
	header ('Location:index.php');
}

?>

<!DOCTYPE html>
<html>
<meta lang="en" charset="utf-8">
<title>Shopcart|Login</title>

<body>
<form method='post' action ='index.php' name='login' >
<label>Username </label> <br>
<input type='text' name='username' value='' > <br>
<label>Password </label> <br>
<input type='password' name='password' value='' > <br>
<input type='submit' name='submit' value='submit'>
</form>


</body>
</html>


