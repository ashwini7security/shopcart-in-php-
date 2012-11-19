<?php
/**
 *This file contain information
 *about databse connection
 */

//Now we will connect to this database

$connect = mysql_connect("localhost","username","password") ;
if (!$connect)
{
	die("We are sorry cannot connect to database server". mysql_error());
}

//select database of shopcart
$db_select = mysql_select_db("database name" , $connect) ;

if(!$db_select)
{
	die("We are sorry problem during database selection.");
}


?>
