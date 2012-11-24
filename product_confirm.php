<?php
/**
 *It will fetch user selected product and display to user
 *on confirm page to complete purchase order.
 *
 */
?>
<!DOCTYPE html>
<meta charset='utf-8' lang='en'>
<title>Shopcart|order confirm</title>
<head></head>
<body>

<a href="index.php">Cancel shopping <a>
<form action="thanks.html" method="post">

<?php
/**
echo "<pre> ";
print_r ($_POST['products']);
echo "</pre>";
 */
# including database information file to connect to database.
/* include keyword used for including file in php */
include 'db_info.php' ;
?>



<?php

echo "<h2>Your selected products are:</h2>" . "<br>";
echo "<a href=\"items.php\"><h4>I want to Order more:</h4></a>" . "<br>";

#fetching all selected product list 

echo "<table border=\"2\">";
echo "<tr><th>Product_id</th><th>Title</th></tr>"; 
/*$_POST is predefine variable in php  fetching products id of product selected by user*/
$product_id = $_POST['products'] ;

/*foreach used to make loop among  all product id which user selected */
foreach($product_id as $product)
{
	
	echo "<td>" . $product ."</td>" ;


 
	# fetching product id of product names which user has selected 

	/*mysql_query() function used to write SQL queries in php */

$sql = mysql_query('SELECT title FROM products WHERE product_id IN ('.implode(',',$_POST['products']).')');

/*mysql_fetch_assoc() function fetch arrays from database using mysql_query() */
foreach(mysql_fetch_assoc($sql) as $title)
{
	echo "<td>" . $title . "</td>";
}

	echo "</table>" . "<br>";
}
echo "<input type=\"submit\" name=\"submit\" value=\"Confirm order\">" ;

?>

</form>
</body>
</html>










