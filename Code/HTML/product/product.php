<?php
session_start();
$ID = '';
	print('<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Kiwi Store</title>
		<link rel="stylesheet" href="product.css">     
		<link rel="shortcut icon" href="../images/kiwi3.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/php"></script>
	</head>
	<body>

		<header>
				<nav id="navigation">
					<ul>
						<li id="transparent"><a href="../index/index.php"><img src = "../images/kiwi_store.png" class = "logo" alt="kiwi_logo"/></a> </li> <!-- Lehet CSS-be el kell rakni -->
						<li class = "lia toright"><a href="../login/login.html">Sign in</a></li>
						<li class = "lia toright"><a href="../register/register.html">Create an account</a></li>
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
		
	print('
	
			</ul>
		</nav>
	</div>
');	
		
if (isset($_GET['productID']))
{
 $ID = $_GET['productID'];
}




//define variables
$sql3 = "SELECT *
FROM product p
WHERE p.productID = '11';";

$list2 = mysqli_query($con,$sql3);

/*if($list2)
{*/



print('
<section class="container">
  <div class="left-blank">
    <article>
    </article>
  </div>
  <div id="left-half">
	<article>
		<span><a href="../images/tv.jpg" class="view">
			<span>
				<img src="../images/tv.jpg" alt="" class = "center_img">
			</span>
			</a>
		</span><br>
		</article>
  </div>
  <div class="right-half">
    <article>
	  <form method = "post" action = "../cart/cart.php">
	  <ul class = "underline">
		<li class = "forbutton">
	');

			/*Dynamic list element load*/
	
			/*Get category elements*/
        while($row = mysqli_fetch_array($list2)){
			/*echo '<li><a href="../Categories/categories.php">' . $row['catName'] . '</a> </li>';*/
			$productID = $row['productID'];
			$productName = $row['productName'];
			$productPrice = $row['productPrice'];
			$priceUnit = $row['priceUnit'];
			$quantity = $row['quantity'];
			$photoLocation = $row['photoLocation'];
			
			print('		
			
					<h1>Pruduct name: ' .$productName .'</h1>
					<!--<p>Price: ' . $productPrice . ' ' . $priceUnit . '</p>-->
					<p>Available: ' . $quantity . '</p>
				<!--<p>Shipping:</p> -->
				<!--<p>Category:</p> -->
					<input type="number" step="1" value = "1" min = "1" max = "' . $quantity . '"/><br><br>
					<a href="../cart/addtocart.php" id = "cart">Add to cart</a><br><br><!-- COOKIE MOSTER-->
					<input type="submit" value = "Buy">
			');
				/*<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>*/

		}



print('
	  </ul>
	  </form>
    </article>
  </div>
</section>

	<footer>
		<span><em>Copyright &copy; 2020 Kiwi Store Inc.<sup>&reg;</sup>	</em> </span>
		<span class="toright footerr"><a id = "footerr" href="../help/help.php"> Help and contact</a></span>
	</footer>
</body>
');

mysqli_free_result($list);
mysqli_free_result($list2);
mysqli_close($con);	
	
	?>