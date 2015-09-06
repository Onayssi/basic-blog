<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand"><?=EntityTITLE?></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li<?php if(@$q['0']=="welcome"){?> class='active'<?php }?>><a href="<?=BURL."/".  getLink('welcome.php', $database)?>">Home</a></li>              
            <?php if(!empty($_SESSION['tplmg_uid'])){?>  
            <li<?php if(@$q['1']=="create" || @$q['2']=="edit"){?> class='active'<?php }?>><a href="<?=BURL?>/<?=getLink('posts.php',$database)?>/<?=getLink('create-post.php',$database)?>">Add New Post</a></li>
            <li><a href="<?=BURL?>/<?=getLink('logout.php',$database)?>" class="hidden-lg">Logout</a></li>            
            <?php }else{?>
            <li<?php if(@$q['0']=="login"){?> class='active'<?php }?>><a href="<?=BURL?>/<?=getLink('login.php',$database)?>">Login</a></li>
            <li<?php if(@$q['0']=="register"){?> class='active'<?php }?>><a href="<?=BURL?>/<?=getLink('register.php',$database)?>">Register</a></li>           
            <?php }?>
          </ul>
            <?php if(!empty($_SESSION['tplmg_uid'])){?>  
            <ul class="nav navbar-nav navbar-right">
                <li class="navbar-brand wlcuserlg hidden-xs">Welcome <font style='color:#darkorange;'><strong><?=$_SESSION['tplmg_ufn']?></strong></font></li>    
                <li>
                    <p class="navbar-btn hidden-xs">
                    <a href="<?=BURL?>/<?=getLink('logout.php',$database)?>" class="btn-logout btn btn-default">Logout</a>
                    </p>
                </li>
          </ul>
            <?php }?>          
        </div><!--/.nav-collapse -->
      </div>
    </nav>


