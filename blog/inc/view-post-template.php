<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h3>View Post:</h3>
<br clear="all" />
<div class="col-md-12">
    <div class="panel panel-default">
  <div class="panel-heading"><?=$currpost_details['title']?></div>
  <div class="panel-body">
    <?=($currpost_details['body'])?>
      <br clear='all' />
      <div class="pull-right dtcatpost">
          Created on <?=date("d F Y \a\\t H:i A",strtotime($currpost_details['created_at']));?>
      </div>
  </div> 
</div>
    <center>
        <a href="<?= BURL."/".getLink("welcome.php", $database)?>" class="btn btn-info">
            Back
        </a>
    </center>
</div>