<?php
/**
 *@duty:- It will fetch user selected product and display to user
 *on confirm page to complete purchase order.
 *
 */
?>
<!DOCTYPE html>
<meta charset='utf-8' lang='en'>
<title>Shopcart|order confirm</title>
<head></head>
<body>
<form action="thanks.html" method="post">
<?php

echo "<h2>Your selected products are:</h2>" . "<br>";
echo "<a href=\"items.php\"><h4>I want to Order more:</h4></a>";

#fetching all selected product list 
#
foreach($_POST['products'] as $product)
{
	echo $product . "<br>";
	
}
echo "<input type=\"submit\" name=\"submit\" value=\"Confirm order\">" ;

?>

</form>
</body>
</html>










