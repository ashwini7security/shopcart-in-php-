<?php
session_start();

include_once("db_info.php");

if(isset($_REQUEST['op']))
	$op = $_REQUEST['op'];
else
	$op = 'shop';

switch ($op)
{
default :

/**
*It contain login authentication logic of user
*/
echo "<h2> Welcome to shopping world</h2> " ;

echo "<form method='post' action ='index.php?op=loginlogic' name='login' >
<label>Username </label> <br>
<input type='text' name='username' value='' > <br>
<label>Password </label> <br>
<input type='password' name='password' value='' > <br>
<input type='submit' name='submit' value='submit'>  
</form> ";


break;
case 'loginlogic':


$username = $_POST['username'];
$password = $_POST['password'];

#$username = $mysql_real_escape_string($username);
#$password = $mysql_real_escape_string($password);

#$username = $stripslashes($username);
#$password = $stripslashes($password);


$sql =mysql_query("SELECT *  FROM user_details WHERE username = '$username' AND password = '$password'");

if($sql)
{
	$count = mysql_num_rows($sql);
}
else{
	echo "error with query";
}

$result = mysql_fetch_array($sql);
if ($count==1)
{
#	session_start();
	$_SESSION['userid'] = $row['id'];
	$_SESSION['username'] = $username;
	header ('Location:index.php?op=home');
}

else
{
	echo "Login or password is incorrect";
	echo "<a href='index.php'> Login </a>";

}

break;
case 'home':
		
	if(!isset($_SESSION['username']))
		{
			header ('location: index.php');
		}
#	$_SESSION['username'] = $_POST['username'] ; 
	
#	echo "Welcome" . $_SESSION['username']  . "<br>" ; 

	echo "<a href='index.php?op=home' >Home </a><a href='index.php?q=logout' > Logout </a> " ;
	echo "<form action='index.php?op=confirms' method='post' name='product_list'  > " ;

# fetching data from table
$fetching_data = mysql_query("select * from products");


	echo "<h2> Products list </h2>";
	echo "<table border = \"2\">";
	echo "<tr><th>Select here</th><th>Product ID </th><th>Title </th><th width=\"800\"> Description </th><th> Price </th></tr>";

	while ($products = mysql_fetch_assoc($fetching_data))
	{
		$checked = in_array($products['product_id'],$_SESSION['check']) ? "checked" : " " ;
		echo "<tr><td>" . 
		"<input name= 'products[]'  type=\"checkbox\" value='" .$products['product_id'] ."' $checked >" . "</td><td>" . $products['product_id'] . "</td><td>" . $products['title'] . "</td><td>" . $products['description'] . "</td><td>" .  "$". $products['price'] . "</td></tr>" ; 
	}

	echo "</table>";
	echo "<input type=\"submit\" name=\"submit\" value=\"checkout\">";
	
	echo "</form>";
	break;


case 'confirms':


		$_SESSION['check'] = $_POST['products'];


		echo "<a href='index.php?op=home'>Cancel shopping <a>
			<a href='index.php' > Logout </a> 
<form action='index.php?op=thanks' method='post' name='product_selected'> " ;




echo "<h2>Your selected products are:</h2>" . "<br>";
echo "<a href='index.php?op=home'><h4>I want to Order more:</h4></a>" . "<br>";

#fetching all selected product list 

echo "<table border=\"2\">";
echo "<tr><th>Product_id</th><th>Title</th></tr>"; 

$product_id = $_POST['products'] ;



$result = mysql_query('SELECT product_id,title FROM products WHERE product_id IN ('.implode(',',$_POST['products']).')');

/*mysql_fetch_assoc() function fetch arrays from database using mysql_query() */
while($product_list = mysql_fetch_assoc($result) )
{
	echo "<tr><td>" . $product_list['product_id'] . "</td>";
	echo "<td>" . $product_list['title'] . "</td>" . "</tr>";
}

	echo "</table>" . "<br>";

echo "<input type=\"submit\" name=\"submit\" value=\"Confirm order\">" ;

echo "</form> ";
break;

case 'thanks':
	echo "<h4> Thanks your shipment will reach in 10 days. </h4> ";
	echo "<a href=index.php?op=home >I wanna do more shopping </a>" .
	"<br>"	."<a href=index.php?op=home >Home </a><br>" ;
	echo "<a href='index.php?op=logout'> Logout </a>";


break;

case 'logout':
	session_destroy();

	header ('location: index.php') ; 
 	
}
?>
