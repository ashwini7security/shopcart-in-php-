<?php
/**
 *@author : Ashwini Kumar
 *@date: 12 november 2012
 *@program: fetching items from db
 *@status: complete
 */
?>
<?php
/* it starts the session in application and continue on all pages of application */
session_start();

/* It basically deals with the data and store it in session. $_SESSION is pre define variable in php*/
$_SESSION ['checkbox'] = $_POST['products'];

echo $_SESSION ; 






?>
<!DOCTYPE html>
<html>
<meta charset='utf-8' lang="en">
<title>Shopcart|Purchase </title>
<head>
<?php
# including database file
include "db_info.php" ; 
?>
</head>

<body>
<a href="index.php" >Home </a>
<form action='confirms.php' method='post'>

<?php
# fetching data from table
$fetching_data = mysql_query("select * from products");


	echo "<h2> Products list </h2>";
	echo "<table border = \"2\">";
	echo "<tr><th>Select here</th><th>Product ID </th><th>Title </th><th width=\"800\"> Description </th><th> Price </th></tr>";

	while ($products = mysql_fetch_assoc($fetching_data))
	{
		echo "<tr><td>" . 
		"	<input name=\"products[]\" type=\"checkbox\" value='" .$products['product_id'].  "'>" . "</td><td>" . $products['product_id'] . "</td><td>" . $products['title'] . "</td><td>" . $products['description'] . "</td><td>" .  "$". $products['price'] . "</td></tr>" ; 
	}

	echo "</table>";
	echo "<input type=\"submit\" name=\"submit\" value=\"checkout\">";
	



#closing database connection 
#mysql_close($connect);
?>
</form>
</body>
</html>
