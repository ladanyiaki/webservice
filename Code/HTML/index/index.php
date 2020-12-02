<!-- List categories -->
<?php
session_start();
print('

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kiwi Store</title>
	<link rel="stylesheet" href="index.css">     
	<link rel="shortcut icon" href="../images/kiwi3.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
			<nav id="navigation">
				<ul>
					<li  id="transparent"><a href="../index/index.php"><img src = "../images/kiwi_store.png" class = "logo" alt="kiwi_logo"/></a> </li> <!-- Lehet CSS-be el kell rakni -->
					<li class = "lia toright"><a href="../login/login.html">Sign in</a></li>
					<li class = "lia toright"><a href="../register/register.html">Create an account</a></li>
				</ul>
			</nav>	
	</header>
		
	<div><!--  MÉRETEZD ÁT ADAPTÍVAN, ha kicsi az ablak összetolódik  -->
		<nav title = "Hello there!"> <!-- Categories -->
			<ul class = "lia2" id = "navigation2">
');

	/*function listcat(){*/
		  $con = mysqli_connect('localhost', 'root', '','db_contact');

//define variables
$sql2 = "select catName from category";
$list = mysqli_query($con,$sql2);

/*if($list)
{*/
  
        while($row = mysqli_fetch_array($list)){
			echo '<li><a href="../Categories/categories.php">' . $row['catName'] . '</a> </li>';

		}
/*}*/
		
/*else{
		echo		'<li><a href="../Categories/categories.php">Sport und Hobby</a> </li>';
		echo		'<li><a href="../Categories/categories.php">Electronics</a> </li>';
		echo		'<li><a href="../Categories/categories.php">Household</a> </li>';
		echo		'<li><a href="../Categories/categories.php">Fashion</a> </li>';
		echo		'<li><a href="../Categories/categories.php">Beauty</a> </li>';
		echo		'<li><a href="../Categories/categories.php">Office</a> </li>';
		echo		'<li><a href="../Categories/categories.php">Toys</a> </li>';
		echo		'<li><a href="https://www.twitter.com">Education</a></li>';
}*/

mysqli_free_result($list);
mysqli_close($con);
	/*}*/
	
print('

</ul>
		</nav>
	</div>
	
	<div id="contents">
		<div id="products">
			<ul class="items">
				<li class = "underline"> <span>
											<a href="#" class="view">
												<span class= "picturebox">
													<img src="../images/kiwi3.png" class = "center_img" alt="">
												</span>
												<span class=underimg>
													Red T-Shirt 
												</span>
												<span class=underimg2>
													$1.00
												</span>
											</a>
										 </span>
												<br>
				</li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/shirt-green.jpg" alt="" class = "center_img"></span><span class=underimg>Green T-Shirt </span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/shirt-green.jpg" alt="" class = "center_img"></span><span class=underimg>Green T-Shirt </span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/shirt-green.jpg" alt="" class = "center_img"></span><span class=underimg>Green T-Shirt </span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/shirt-green.jpg" alt="" class = "center_img"></span><span class=underimg>Green T-Shirt </span><span class=underimg2>$1.00</span></a></span><br></li>
				<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/shirt-green.jpg" alt="" class = "center_img"></span><span class=underimg>Green T-Shirt </span><span class=underimg2>$1.00</span></a></span><br></li>
				<!--<li class="last"> <span><img src="../images/shirt-blue.jpg" alt=""></span> <span class="price">$1.00</span>Product name<br>
					<a href="#" class="View">View</a> </li>-->
			</ul>
		 </div>
    </div>

	<footer>
		<span><em>Copyright &copy; 2020 Kiwi Store Inc.<sup>&reg;</sup>	</em> </span>
		<span class="toright footerr"><a id = "footerr" href="../help/help.html"> Help and contact</a></span>
	</footer>
</body>
');
	
?>