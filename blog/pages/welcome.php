<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>List of all blog posts:</h3>
<br clear="all" />
<?php
$list_posts = $database->select("posts","*",["ORDER" => "created_at DESC"]);
foreach($list_posts as $post){
?>
<div class="col-md-6">
    <div class="panel panel-default">
  <div class="panel-heading"><?=$post['title']?></div>
  <div class="panel-body">
    <?=  strip_tags(summary_txt($post['body'],150,true),"</p>")?>
      <br clear='all' />
      <div class="pull-left dtcatpost">
          <?php 
          if(@$_SESSION['tplmg_uid']==$post['user_id']){
              ?>
          <a href="<?=  getLink('posts.php', $database)?>/<?=$post['id']?>/<?=  getLink('edit-post.php', $database)?>">Edit</a> | 
          <a href="javascript:void(0);" data-keyboard="false" data-record-id="<?=$post["id"]?>" 
                data-backdrop="static" data-toggle="modal" data-target="#popupModalDEL">Delete</a> | 
          <?php
          }?>
          <a href="<?=  getLink('posts.php', $database)?>/<?=$post['id']?>">View</a>
      </div>
      <div class="pull-right dtcatpost">
          Created at <?=date("d F Y \a\\t H:i A",strtotime($post['created_at']));?>
      </div>
  </div>
</div>
</div>
<?php }?>
<?php include("inc/popup-delete-post.php");?>