<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','db_contact');

$userid="";

if(isset($_COOKIE["user"])){
$userid=$_COOKIE["user"];
$sql = "select * from customer where customerID = '" . $userid . "';";
$list0 = mysqli_query($con,$sql);
while($row0 = $list0->fetch_assoc()){;
$customerFirstName = $row0['customerFirstName'];
}
}

	print('<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Kiwi Store</title>
		<link rel="stylesheet" href="help.CSS">     
		<link rel="shortcut icon" href="../images/kiwi3.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/php"></script>
	</head>
	<body>

		<header>
				<nav id="navigation">
					<ul>
						<li id="transparent"><a href="../index/index.php"><img src = "../images/kiwi_store.png" class = "logo" alt="kiwi_logo"/></a> </li> <!-- Lehet CSS-be el kell rakni -->
						<li class = "lia"><span>Hello, ');  
					if(isset($customerFirstName)){echo $customerFirstName;}else{echo " customer";} 
print( '</span></li>');
					
					if(isset($customerFirstName)){
						echo '<li class = "signout toright"><a href="../login/signout.php">Sign out</a></li>';
						}
					else{
						echo '<li class = "lia toright"><a href="../login/login.html">Sign in</a></li>';
						} 

					print('
						<li class = "lia toright"><a href="../register/register.html">Create an account</a></li>
						<li class = "lia toright"><a href="../cart/cart.php">Cart</a></li>
					</ul>
				</nav>	
		</header>
		
	<div><!--  MÉRETEZD ÁT ADAPTÍVAN, ha kicsi az ablak összetolódik  -->
		<nav title = "Hello there!"> <!-- Categories -->
			<ul class = "lia2" id = "navigation2">		
		');
		
$con = mysqli_connect('localhost', 'root', '','db_contact');

//define variables
$sql2 = "select catName from category";
$list = mysqli_query($con,$sql2);

/*if($list)
{*/
		/*Get categories*/
        while($row = mysqli_fetch_array($list)){
			/*echo '<li><a href="../Categories/categories.php">' . $row['catName'] . '</a> </li>';*/
			$phpVariable = $row['catName'];
			echo '<li><a href="../Categories/categories.php?data=' .$phpVariable . '">' . $row['catName'] . '</a> </li>';

		}
/*}		
else{
		echo		'<li><a href="../Categories/categories.php">I</a> </li>';
		echo		'<li><a href="../Categories/categories.php">can</a> </li>';
		echo		'<li><a href="../Categories/categories.php">not</a> </li>';
		echo		'<li><a href="../Categories/categories.php">reach</a> </li>';
		echo		'<li><a href="../Categories/categories.php">the</a> </li>';
		echo		'<li><a href="../Categories/categories.php">database</a> </li>';
		echo		'<li><a href="../Categories/categories.php">dude</a> </li>';
		echo		'<li><a href="https://www.twitter.com">!</a></li>';
}*/

	print('
	
			</ul>
		</nav>
	</div>
	
	<div class = "help">
		<h1>Help and contact</h1>
		<h3>Company information</h3>
		<p>This is a completely made-up company, not having any real assets or products to sell. 
		This company was hipotetically created for a homework.</p>
		<h3>Support</h3>
		<p>If you experience any problems with our service, please contact us via madeupcompany@gmail.com or via +49147561351</p>
	</div>

	<footer>
		<span><em>Copyright &copy; 2020 Kiwi Store Inc.<sup>&reg;</sup>	</em> </span>
		<span class="toright footerr"><a id = "footerr" href="../help/help.php"> Help and contact</a></span>
	</footer>
</body>
');

mysqli_free_result($list);
mysqli_close($con);	
	
	?>