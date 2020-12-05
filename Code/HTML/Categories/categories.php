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
print('
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Kiwi Store</title>
	<link rel="stylesheet" href="categories.CSS">     
	<link rel="shortcut icon" href="../images/kiwi3.png" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header>
			<nav id="navigation">
				<ul>
					<li  id="transparent"><a href="../index/index.php"><img src = "../images/kiwi_store.png" class = "logo" alt="kiwi_logo"/></a> </li> <!-- Lehet CSS-be el kell rakni -->
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
				</ul>
			</nav>	
	</header>
		
	<div><!--  MÉRETEZD ÁT ADAPTÍVAN, ha kicsi az ablak összetolódik  -->
		<nav title = "Hello there!"> <!-- Categories -->
			<ul class = "lia2" id = "navigation2">
');
		

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
	
	<div id="category">
		<p>');	
		
if (isset($_GET['data']))
{

    echo $actual_cat = $_GET['data'];
}
else
{
     echo $_GET['Category'];
} 

print('
</p>
	</div>
');

//define variables
$sql3 = "SELECT p.productID, catName, productName, productPrice, priceUnit, photoLocation
FROM product p, cp
WHERE p.productID = cp.productID AND cp.catName = '" .$actual_cat ."';";

$list2 = mysqli_query($con,$sql3);

/*if($list2)
{*/



print('
	
	<div id="contents">
		<div id="products">
			<ul class="items">');

			/*Dynamic list element load*/
	
			/*Get category elements*/
        while($row = mysqli_fetch_array($list2)){
			/*echo '<li><a href="../Categories/categories.php">' . $row['catName'] . '</a> </li>';*/
			$productID = $row['productID'];
			$productName = $row['productName'];
			$productPrice = $row['productPrice'];
			$priceUnit = $row['priceUnit'];
			$photoLocation = $row['photoLocation'];
			
			print('		<li class = "underline"> <span>
											<a href="../product/product.php?productid='. $productID .'"class="view">
												<span class= "picturebox">
													<img src="'. $photoLocation. '" class = "center_img" alt="">
												</span>
												<span class=underimg>');
												echo $productName; 
										print('	</span>
												<span class=underimg2>');
												echo round($productPrice, 0); 
												echo $priceUnit;
												print('</span>
											</a>
										 </span>
												<br>
				</li>');
				/*<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/roller.jpg" alt="" class = "center_img"></span><span class=underimg>Roller</span><span class=underimg2>$1.00</span></a></span><br></li>*/

		}

print('
				<!--<li class = "underline"> <span><a href="#" class="view"><span class = "picturebox"><img src="../images/shirt-green.jpg" alt="" class = "center_img"></span><span class=underimg>Green T-Shirt </span><span class=underimg2>$1.00</span></a></span><br></li>-->
				<!--<li class="last"> <span><img src="../images/shirt-blue.jpg" alt=""></span> <span class="price">$1.00</span>Product name<br>
					<a href="#" class="View">View</a> </li>-->
			</ul>
		 </div>
    </div>

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