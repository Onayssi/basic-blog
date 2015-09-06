<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$return = [];
$set_path = "../";
require("../helpers/connect.php");
// require functions in use
require("../helpers/modules.php");
$record_id = filter_input(INPUT_GET, 'id');

$delete = $database->delete("posts", [
	"AND" => [
		"id" => $record_id,
		"user_id" => $_SESSION['tplmg_uid']
	]
]);

$return['error'] = 'false';
print json_encode($return);
?>