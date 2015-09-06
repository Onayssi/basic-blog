<?php 
perform_session();
?>

<form id="tpregisterform" class="form-register" method="post"
      onsubmit="return tpl_register('<?=BURL?>/<?=getLink('welcome.php', $database)?>');">
<h4 class="form-signin-heading">Please Register for a new account</h4>
<div class="tpl_alerterror">
</div>
<label for="inputFullname" class="sr-only">Full name</label>
<input name="fullname" type="text" id="inputFullname" class="form-control" placeholder="Full Name" required autofocus>
<label for="inputGender" class="sr-only">Gender</label>
<select name="gender" id="inputGender" class="form-control" placeholder="Gender" required>
<option value="">Select Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<label for="inputEmail" class="sr-only">Email address</label>
<input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required>
<label for="inputPassword" class="sr-only">Password</label>
<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
<label for="inputRePassword" class="sr-only">Confirm password</label>
<input name="retypepassword" type="password" id="inputRePassword" class="form-control retypepassword" placeholder="Confirm password" required>
<button id="btnregistersb" class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
</form>
<div align="center">
<a href="<?=BURL?>/<?=getLink('login.php', $database)?>">Already Registered? Login Now</a>
</div>
<!-- project sign in - register CSS -->
<link href="css/signin.css" rel="stylesheet">

