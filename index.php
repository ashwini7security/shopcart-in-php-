<?php
/**
 *Home page of shopcart 
 *
 *
 */
?>

<!DOCTYPE html>
<html>
<meta charset="utf-8" lang="en">
<title>Shopcart|Home</title>
<head></head>
<body>
<a href="index.php?id=items">Product list</a>
<?php
/* here we are including all php files in index.php .  */

switch ($_GET['id']) #$_GET check the id of hyperlink created . When user clicks on link it redirect to sepecified case in switch control structure 
{

case "items":
	include "items.php";

}





?>

















</body>
</html>

