<?php
function perform_session(){
    if(session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    if(!empty($_SESSION['tplmg_uid']) && $_SESSION['tplmg_uid']!=null){
        header("Location:index.php?tpl=welcome");
    }                                         
}

function tpl_check_session(){
    if(session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    if(!isset($_SESSION['tplmg_uid']) || $_SESSION['tplmg_uid']==null){
        header("Location:login.php"); 
        exit;
    }  
}

function tpl_admin_session(){
    if(session_status() == PHP_SESSION_NONE) {
    session_start();
    }
    if($_SESSION['tplmg_role']!=="Admin"){
        header("Location:index.php"); 
        exit;
    }  
}

function tpl_redirect_session($url){
    header("Location:".$url); 
}

function assure_security_transaction($user){
 if(session_status() == PHP_SESSION_NONE) {
    session_start();
    }
 if($user!==$_SESSION['tplmg_uid']){
    header("Location:index.php?tpl=welcome"); 
 }   
}

function getLink($incfile,$database){
    $result = $database->select("pages",["name_rw"],["incfile" => $incfile]); 
    $return = $result[0]["name_rw"]; 
    if($return){        
    return $return;
}
return "welcome";    
}

function getValue($table,$field,$value,$output,$database){
    $result = $database->select($table,[$output],[$field => $value]); 
    $return = $result[0][$output]; 
    if($return){        
    return $return;
}
return "N/A";
}

function custom_msg($type='info',$msg){
    echo "<br clear=\"all\" />
         <div class=\"alert alert-$type\">".
            $msg.""
            . "</div>";       
}
// get part of the post or others(there is a link view to display all the body of a post)
function summary_txt($str, $limit=100, $strip = false) {
    $str = ($strip == true)?strip_tags($str):$str;
    if (strlen ($str) > $limit) {
    $str = substr ($str, 0, $limit - 3);
    return (substr ($str, 0, strrpos ($str, ' ')).'...');
    }
    return trim($str);
}
?>