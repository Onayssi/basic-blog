<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
*/

// Main Title
define("EntityTITLE","Basic Blog");
// Base URL of project
define("BURL","http://localhost/basic-blog);
// using Medoo Database Library 
require(@$set_path."helpers/medoo.min.php");
try {  
    $database = new medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'moregroup',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8', 
	// optional
	'port' => 3306,
	// driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
	'option' => [
		PDO::ATTR_CASE => PDO::CASE_NATURAL
	]
]);
    }
catch(PDOException $e){
   die($e->getMessage());
}
?> 

