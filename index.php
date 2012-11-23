<?php
session_start();

/*
$pdt = $_POST['product[]'];
$_SESSION['check'] = $pdt;

print_r ($pdt); */
/*
elseif(!isset($_POST['product']))
	$_SESSION['check'] = 'N';
else
	$_SESSION['check'] = $product['product_id'];
 */	




include_once("db_info.php");

if(isset($_REQUEST['op']))
	$op = $_REQUEST['op'];
else
	$op = 'shop';

switch ($op)
{

default :
	

#	print_r ($_SESSION['check']);

	echo "Welcome to shopping world";
	echo "<a href='index.php' >Home </a> <form action='index.php?op=confirms' method='post' name='product_list'  > " ;

# fetching data from table
$fetching_data = mysql_query("select * from products");


	echo "<h2> Products list </h2>";
	echo "<table border = \"2\">";
	echo "<tr><th>Select here</th><th>Product ID </th><th>Title </th><th width=\"800\"> Description </th><th> Price </th></tr>";

	while ($products = mysql_fetch_assoc($fetching_data))
	{
		$checked = (in_array($products['product_id'],$_SESSION['check']) )? "checked" : "" ;
		echo "<tr><td>" . 
		"<input name= 'products[]'  type=\"checkbox\" value='" .$products['product_id'] ."' $checked >" . "</td><td>" . $products['product_id'] . "</td><td>" . $products['title'] . "</td><td>" . $products['description'] . "</td><td>" .  "$". $products['price'] . "</td></tr>" ; 
	}

	echo "</table>";
	echo "<input type=\"submit\" name=\"submit\" value=\"checkout\">";
	



#closing database connection 
#mysql_close($connect);
	echo "</form>";
	break;


case 'confirms':

		$_SESSION['check'] = $_POST['products'];
	#	print_r ($_SESSION['check']) ;

		echo "<a href='index.php'>Cancel shopping <a>
<form action='index.php?op=thanks' method='post' name='product_selected'> " ;


/**
echo "<pre> ";
print_r ($_POST['products']);
echo "</pre>";
 */
# including database information file to connect to database.
/* include keyword used for including file in php */

echo "<h2>Your selected products are:</h2>" . "<br>";
echo "<a href='index.php?op=shop'><h4>I want to Order more:</h4></a>" . "<br>";

#fetching all selected product list 

echo "<table border=\"2\">";
echo "<tr><th>Product_id</th><th>Title</th></tr>"; 
/*$_POST is predefine variable in php  fetching products id of product selected by user*/
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
	echo "<a href=index.php?op=shop >I wanna do more shopping </a>" .
	"<br>"	."<a href=index.php >Home </a>" ;
	
	
}
?>
