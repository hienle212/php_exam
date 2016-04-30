<?php  ?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Welcome Page</title>
	<style type="text/css">

.div_form2{
	display: inline-block;
}

.div_form1{
	display: inline-block;
	vertical-align: top;
}


	</style>
</head>
<body>
	<div id="wrapper">
			<div class="div_form2">
	<?php		
	if($this->session->flashdata("registration_errors"))
			{
	echo $this->session->flashdata("registration_errors");
			}
	?>
			<form id="register" action="/main/register" method="post">
			  <fieldset>
         		 <legend>Register</legend>

				<label for="name">Name: </label>
				<input type="text" name="name"/>
				</br>
				<label for="email">Email : </label>
				<input type="text" name="email"/>
				</br>
				<label for="password">Password</label>
				<input type="password" name="password"/>
				<p>*Password should be at least 8 characters</p>
				<label for="confirm_password">Confirm Password</label>
				<input type="password" name="confirm_password"/>
				</br>
				<label for="birthday">Day of Birth</label>
            	<input type="date" name="birthday" >
				</br>
				<input type="submit" value="register" />
				</fieldset>
			</form>
		</div>
		<div class="div_form1">
	<?php		
	if($this->session->flashdata("login_errors"))
			{
	echo $this->session->flashdata("login_errors");
			}
	?>
			<form id="login" action="/main/login" method="post">
			 <fieldset>
         		 <legend>Login</legend>

				<label for="email">Email : </label>
				<input type="text" name="email"/>
				</br>
				<label for="password">Password</label>
				<input type="password" name="password"/>
				</br>
				<input type="submit" value="Login" />
				</fieldset>
			</form>
		</div>

	</div>
</body>
</html>