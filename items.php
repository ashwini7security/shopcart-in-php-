<?php
/**
 *@author : Ashwini Kumar
 *@date: 12 november 2012
 *@program: fetching items from db
 *@status: complete
 */

# including database file 
#
include "db_info.php" ; 

# fetching data from table
$fetching_data = mysql_query("select * from tablename");


	echo "<h2> Products list </h2>";
	echo "<table border = \"2\">";
	echo "<tr><th>Product ID</th><th>Title </th><th width=\"800\"> Description </th><th> Price </th></tr>";


	while ($products = mysql_fetch_array($fetching_data))
	{
		echo "<tr><td>" . $products['product_id'] . "</td><td>" . $products['title'] . "</td><td>" . $products['description'] . "</td><td>" . $products['price'] . "</td></tr>" ; 
	}

	echo "</table>";



#closing database connection 
mysql_close($connect);






?>
