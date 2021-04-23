<?php

print('<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kiwi Store - Register </title>
	<link rel="stylesheet" href="register.CSS">     
	<link rel="shortcut icon" href="../images/kiwi3.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/php" src="register.php"></script>  
</head>
<body>
	<div class = "center pos_border">
		<a href = "../index/index.php"><img src = "../images/kiwi_store.png" class = "logo" alt="kiwi_logo"/></a>

		<p id="reg_text">Create an account!</p>
		<p class = "warning"> ');

if (isset($_GET['uservalid']))
{
    echo $actual_cat = $_GET['uservalid'];
}		
		
print('</p> 
		<form method = "post" autocomplete = "on" action = "register.php">
			<p  class = "ind" >
				<label>First Name*</label>
				<input type="text" placeholder="John" name="firstname" required />
			</p>
			<p  class = "ind" >
				<label>Last Name*</label>
				<input type="text" placeholder="Smith" name="lastname" required />
			</p>
						
			<p  class = "ind" >
				<label>Username*</label>
				<input type="text" placeholder="Username" name="login" required />
			</p>
			<p class = "ind">
				<label>Password*</label>
				<input type="password" placeholder="Password" name="password" required />			
			</p>
			<p  class = "ind" >
				<label>E-mail address*</label>
				<input type="email" placeholder="example@gmail.com" name="email" required />
			</p>
			<p  class = "ind" >
				<label>Phone number</label>
				<input type="tel" placeholder="+36201234567" name="phone" />
			</p>
		
			<input type="submit" value = "Create account"/> <!-- onclick = "register.js" --> 
		</form>
	<p> Already got an account? 
		<a href="../login/login.html">Sign in</a>  <!-- MISSING -->
	</p>
	</div>

	
</body>');
?>