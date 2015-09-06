<?php 
perform_session();
$page="login";
?>
<form id="tploginform" class="form-signin" method="post" 
      onsubmit="return tpl_login('<?=BURL?>/<?=getLink('welcome.php', $database)?>')">
<h2 class="form-signin-heading">Please Login</h2>
<div class="tpl_alerterror">
</div>
<label for="inputEmail" class="sr-only">Email address</label>
<input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
<button id="btnlogsb" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
</form>
<div align="center">
<a href="<?=BURL?>/<?=getLink('register.php', $database)?>">New Member? Register Now</a>
</div>
<!-- project sign in - register CSS -->
<link href="css/signin.css" rel="stylesheet">

