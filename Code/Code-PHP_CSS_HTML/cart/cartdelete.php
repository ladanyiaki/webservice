<?php
session_start();
	$con = mysqli_connect('localhost', 'root', '','db_contact');
	
		if (isset( $_COOKIE["user"]))
		{
			$customerID=$_COOKIE["user"];

			if (isset ($_GET['data']))
				{$deleteProduct= "DELETE FROM cart WHERE productID='".$_GET['data']."' AND customerID=".$customerID.";";
				mysqli_query($con,$deleteProduct);
				}
				
			$cartSelect="SELECT c.customerID, c.productID, SUM(c.cartQuantity), p.productName, p.productID, p.productPrice, p.priceUnit  FROM cart c, product p WHERE ". $_COOKIE["user"]." =c.customerID AND c.productID=p.productID GROUP BY c.productID;";
			$inCart=mysqli_query($con,$cartSelect);
			header("Location: http://localhost/hazi/Web_HF/Code/HTML/cart/cart.php");
		}
		else{
			header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login.html");
		}
	
		//echo'<p>'.$newAddress.','.$_COOKIE["user"].$_GET['data'].'</p>'; //degug
		$newAddress=" ";

mysqli_close($con);	
	
	?>