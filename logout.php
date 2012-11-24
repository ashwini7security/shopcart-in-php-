<?php
/**
 *It contains logout logic
 */
session_start();
if (isset($_GET['logout']))
{
	session_destroy();
	header ('Location:login.php') ;
}


echo "<input type='button' name='logout' value='logout' >" ;

?>
