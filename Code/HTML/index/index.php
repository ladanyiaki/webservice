<!-- List categories -->
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
	<link rel="stylesheet" href="index.css">     
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
print( '</span></li>
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
		  

//get category names
$sql2 = "select catName from category";
$list = mysqli_query($con,$sql2);


/**/
$sql3 = "SELECT p.productID, productName, productPrice, priceUnit, photoLocation
FROM product p, cp
GROUP BY productID;";

$list2 = mysqli_query($con,$sql3);
/*if($list)
{*/
  
        while($row = mysqli_fetch_array($list)){
			$phpVariable = $row['catName'];
			/* Href insert GET */
			echo '<li><a href="../Categories/categories.php?data=' .$phpVariable . '">' . $row['catName'] . '</a> </li>';

		}
/*}*/
	

	/*}*/
	
print('

</ul>
		</nav>
	</div>
	
	<div id="contents">
		<div id="products">
			<ul class="items">');

			/*Dynamic list element load*/
	
			/*Get category elements*/
        while($row2 = mysqli_fetch_array($list2)){
			/*echo '<li><a href="../Categories/categories.php">' . $row2['catName'] . '</a> </li>';*/
			$productid = $row2['productID'];
			$productName = $row2['productName'];
			$productPrice = $row2['productPrice'];
			$priceUnit = $row2['priceUnit'];
			$photoLocation = $row2['photoLocation'];
		
			print('	<li class = "underline"> <span>
						<a href="../product/product.php?productid='. $productid .'"class="view">
							<span class= "picturebox">
								<img src="'. $photoLocation. '" class = "center_img" alt="">
							</span>
							<span class=underimg>
					');
							echo $productName; 
					print('	</span>
							<span class=underimg2>
						 ');
							echo round($productPrice, 0); 
							echo $priceUnit;
							print('
							</span>
						</a>
					 </span>
							<br>
				</li>');
		}
		print('
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
