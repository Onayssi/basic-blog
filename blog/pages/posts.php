<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(!$q['1'] || ($q['0']!= getLink("posts.php", $database))){
    header("Location:".BURL."/".  getLink('welcome.php', $database));
}
// checking for posts page
if($q['1']==getLink("create-post.php", $database)){
// create-post template
  $epost_action = "Submit"; 
  $post_page_title = "Add New";
  include("inc/create-edit-post-template.php");  
}else if(is_numeric ($q['1']) && getValue("posts","id",$q['1'],"title",$database)!="N/A"){
   // edit or view post
    if(@$q['2']==getLink("edit-post.php", $database)){
        // edit post
        $current_post = $database->select("posts","*",[ 
    "AND" => ["user_id" => $_SESSION['tplmg_uid'],
              "id" => $q['1']]
        ]);
        if(count($current_post)>0){
            // post found and owner is the current user
            $current_post_details = $current_post[0];
            $epost_title = $current_post_details['title'];
            $epost_body = $current_post_details['body'];
            $epost_action = "Save";
            $post_page_title = "Update Current";
            include("inc/create-edit-post-template.php");
        }else{
            $post_page_title = "Error Update";
            // current user is not the owner of the post, so he cannot edit it
            echo custom_msg('danger','Error Occured! You are not the owner of this post. '
                    . 'Please, edit your own posts only.');
            ?>
    <center>
        <a href="<?= BURL."/".getLink("welcome.php", $database)?>" class="btn btn-info">
            Back to Home
        </a>
    </center>
<?php
        }
    }else{
        // view post 
        $current_post = $database->select("posts","*",[ 
              "id" => $q['1']]
        );
        $currpost_details = $current_post[0];
        include("inc/view-post-template.php");
    }
}else{
 echo custom_msg('danger','Error Navigation! Please check the source URL browsing.') 
  ?>
    <center>
        <a href="<?= BURL."/".getLink("welcome.php", $database)?>" class="btn btn-info">
            Back to Home
        </a>
    </center>
<?php
}
?>
