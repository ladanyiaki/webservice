<?php
session_start();
$con = mysqli_connect('localhost', 'root', '','db_contact');

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
		<link rel="stylesheet" href="cart.CSS">     
		<link rel="shortcut icon" href="../images/kiwi3.png" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script type="text/php"></script>
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
		

$customerID="";

if(isset($_COOKIE["user"])){
$customerID=$_COOKIE["user"];
}
else
{
	header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login.html");
}

if (isset($_POST["productid"]) && isset($_POST["productid"])){
$productID = $_POST["productid"];
$cartQuantity = $_POST["cartQuantity"];

$sql = "INSERT INTO cart (customerID,productID,cartQuantity) VALUES (" . $customerID . "," . $productID . "," . $cartQuantity . ");"; //customerID, productID, cartQuantity
$list0 = mysqli_query($con,$sql);}
//define variables
$sql2 = "select catName from category";
$list = mysqli_query($con,$sql2);

		/*Get categories*/
        while($row = mysqli_fetch_array($list)){
			/*echo '<li><a href="../Categories/categories.php">' . $row['catName'] . '</a> </li>';*/
			$phpVariable = $row['catName'];
			echo '<li><a href="../Categories/categories.php?data=' .$phpVariable . '">' . $row['catName'] . '</a> </li>';

		}


	print('			</ul>
		</nav>
	</div>
	<div>
		<form method = "post" autocomplete = "on" action = "cartsql.php" >
			<p  class = "ind" >
				<label>Country*</label>
				<input type="text" placeholder="My Country" name="Country" required />
			</p>
			<p  class = "ind" >
				<label>City/Department*</label>
				<input type="text" placeholder="My City" name="City" required />
			</p>
						
			<p  class = "ind" >
				<label>Street Address*</label>
				<input type="text" placeholder="My Street Address" name="Address" required />
			</p>
			<p class = "ind">
				<label>ZIP/Postal Code*</label>
				<input type="text" placeholder="My Postal Code" name="Zip" required />			
			</p>	
			<input type="submit" value = "PAY"/> 
		</form>
		');
		
		
		$totalPrice=0;
		
		if (isset( $_COOKIE["user"]))
		{
			$customerID=$_COOKIE["user"];
			
				
			$cartSelect="SELECT c.customerID, c.productID, SUM(c.cartQuantity), p.productName, p.productID, p.productPrice, p.priceUnit  FROM cart c, product p WHERE ". $_COOKIE["user"]." =c.customerID AND c.productID=p.productID GROUP BY c.productID;";
			$inCart=mysqli_query($con,$cartSelect);
			
			while($row = mysqli_fetch_array($inCart)){
				$productID = $row['productID'];
				$productName = $row['productName'];
				$productPrice = $row['productPrice'];
				$priceUnit = $row['priceUnit'];
				$quantity= $row['SUM(c.cartQuantity)'];
				$totalPrice=$totalPrice+$productPrice*$quantity;
				echo '<a href="../product/product.php?productid=' .$productID . '">' . $productName . '</a> <p> Quantity:'.$quantity. '</p><p> Price:'. round($productPrice,0) .' '.$priceUnit.'/piece</p>';
				echo '<span class = "lia " style = float:right><a href="../cart/cartdelete.php?data='.$productID.'">Delete</a></span>';
			
				
			}
		echo'<p> Cart Total: ' . $totalPrice . ' '; 
		if (isset($priceUnit)){echo $priceUnit;} else {echo 'Ft';} print('</p>');
		
		}
		else{
			header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login.php");
		}
	
		//echo'<p>'.$newAddress.','.$_COOKIE["user"].$_GET['data'].'</p>'; //degug
		
		$newAddress=" ";
print('</div>
	<footer>
		<span><em>Copyright &copy; 2020 Kiwi Store Inc.<sup>&reg;</sup>	</em> </span>
		<span class="toright footerr"><a id = "footerr" href="../help/help.php"> Help and contact</a></span>
	</footer>
</body>
');

mysqli_close($con);	
	
	?>