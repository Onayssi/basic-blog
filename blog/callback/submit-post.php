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
require("../helpers/modules.php");

$title = filter_input(INPUT_POST, 'posttitle');
$body = filter_input(INPUT_POST, 'postbody');
$action = filter_input(INPUT_POST, 'actiontype');
// select query to check if the email is already existed (edit case)
if($action!="create" && getValue("posts","id",$action,"title",$database)!="N/A"){
    // check the owner of the post
    $owner_post = $database->select("posts", 
    ["id"], 
    ["AND" => [
        "user_id" => $_SESSION['tplmg_uid'],
        "id" => $action
        ]
        ]
        );  
if(count($owner_post)>0){
    // permission allowed
 $result = $database->select("posts", 
    ["id"], 
    ["AND" => [
        "title" => trim(strtolower($title)),
        "id[!]" => $action
        ]
        ]
        );   
 if(count($result)==0 || !$result){
 // update post
 $update = $database->update("posts", [
	"title" => $title,
        "body" => $body
        ],
    ["id" => $action]
);
$data['error'] = 'false';
$data['posted'] = 'success'; 
 }else{
     // post already exist with the same title
   $data['error'] = 'true';
   $data['posted'] = 'failure'; 
 }        
}else{
    // permission denied
   $data['error'] = 'true';
   $data['posted'] = 'denied';      
}    
}else{
    // add new post 
    $result = $database->select("posts", 
    ["id"], 
    ["title" => trim(strtolower($title))]
        );
if(count($result)>0){
  $data['error'] = 'true';
  $data['posted'] = 'failure';    
}else{
    // insert new post
    $last_post_id = $database->insert("posts", [
	"title" => $title,
	"body" => $body,
	"user_id" => $_SESSION['tplmg_uid']
]);    
$data['error'] = 'false';
$data['posted'] = 'success';     
}
}

 print json_encode($data);
?>