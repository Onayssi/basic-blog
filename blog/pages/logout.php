<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
tpl_check_session();
unset($_SESSION['tplmg_uid']);
unset($_SESSION['tplmg_email']);
session_destroy();
header("Location:".BURL."/".  getLink('welcome.php', $database))
?>

