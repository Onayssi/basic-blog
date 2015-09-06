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

$email = filter_input(INPUT_POST, 'email');
$password = sha1(filter_input(INPUT_POST, 'password'));
// check if the entered user exist in the list
$result = $database->select("users","*",[ 
    "AND" => ["email" => $email,
       "password" => $password]
        ]);
// if user exist
if(count($result)>0){
 $_SESSION['tplmg_uid'] = $result[0]['id'];
 $_SESSION['tplmg_email'] = $result[0]['email'];
 $_SESSION['tplmg_ufn'] = ucwords($result[0]['fullname']);
 $data['error'] = 'false';
 $data['logged'] = 'success';
}else{
  $data['error'] = 'true';
  $data['logged'] = 'failure';  
}

 print json_encode($data);
?>