<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
// adjust the path of including file for many use in different places
$set_path = "../";
require("../helpers/connect.php");

$fullname = filter_input(INPUT_POST, 'fullname');
$gender = filter_input(INPUT_POST, 'gender');
$email = filter_input(INPUT_POST, 'email');
$password = sha1(filter_input(INPUT_POST, 'password'));
// select query to check if the email is already existed
$result = $database->select("users", 
    ["email"], 
    ["email" => $email]
        );
if(count($result)>0){
  $data['error'] = 'true';
  $data['logged'] = 'failure';    
}else{
    // insert new user (create new account)
    $last_user_id = $database->insert("users", [
	"fullname" => $fullname,
	"gender" => $gender,
	"email" => $email,
        "password" => $password
]);
// set the session params    
$_SESSION['tplmg_uid'] = $last_user_id;
$_SESSION['tplmg_email'] = $email;
$_SESSION['tplmg_ufn'] = ucwords($fullname);
$data['error'] = 'false';
$data['logged'] = 'success';  
}

 print json_encode($data);
?>