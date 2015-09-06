<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$fetching_page_content = $database->select("pages","*",["id"=>$cid]);
if($fetching_page_content[0]['incfile']) { 
    include 'pages/'.$fetching_page_content[0]['incfile']; 
}
?>

