<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3><?=$post_page_title?> Post:</h3>
<form id="tplpostform" class="form-register" method="post"
      onsubmit="return tpl_addPost('<?=BURL?>/<?=getLink('welcome.php', $database)?>');">
    <h4 class="headttlebf">Please, fill in the required information below:</h4>
        <div class="tpl_alerterror"></div>
        <label for="posttitle">Post Title</label>
        <input name="posttitle" type="text" id="posttitle" class="form-control" placeholder="Post Title" autofocus="" value="<?=@$epost_title?>" required="">
        <label for="postbody">Post Body</label>
        <textarea name="postbody" id="postbody" class="form-control summernote" placeholder="Post Body"><?=@$epost_body?></textarea>
        <input id="currpid" type="hidden" value="<?=@$q['1']?>" name="currpid" />
        <button id="btnpostcrupdt" class="btn btn-lg btn-primary btn-block" type="submit"><?=$epost_action?> Post</button>
</form>