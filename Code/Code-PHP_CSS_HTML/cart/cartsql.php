<?php
session_start();
	$con = mysqli_connect('localhost', 'root', '','db_contact');

		$newAddress=$Country=$City=$Address=$Zip=$cartSelect=$inCart="";
		$Country=$_POST['Country'];
		$City=$_POST['City'];
		$Address=$_POST['Address'];
		$Zip=$_POST['Zip'];
		
		if (isset( $_COOKIE["user"]))
		{
			$customerID=$_COOKIE["user"];
			if (!empty($Country) && !empty($City) && !empty($Address) && !empty($Zip)){
			$newAddress=$Country." ". $City." ". $Address." ". $Zip;
			$setAddress="INSERT INTO shippingaddress VALUES ('" .$newAddress. "'," .$_COOKIE["user"]. ");";
			$deleteUserCart="DELETE FROM cart WHERE customerID=" . $customerID . ";";
			mysqli_query($con,$setAddress); 
			mysqli_query($con,$deleteUserCart); 
			}
			if (isset ($_GET['data']))
				{$deleteProduct= "DELETE FROM cart WHERE productID='".$_GET['data']."' AND customerID=".$customerID.";";
				mysqli_query($con,$deleteProduct);
				}
				
			$cartSelect="SELECT c.customerID, c.productID, SUM(c.cartQuantity), p.productName, p.productID, p.productPrice, p.priceUnit  FROM cart c, product p WHERE ". $_COOKIE["user"]." =c.customerID AND c.productID=p.productID GROUP BY c.productID;";
			$inCart=mysqli_query($con,$cartSelect);
		}
		else{
			header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login.html");
		}
	
		//echo'<p>'.$newAddress.','.$_COOKIE["user"].$_GET['data'].'</p>'; //degug
		
		$newAddress=" ";

	header("Location: https://help.one.com/hc/en-us/articles/115005585189-What-payment-methods-can-I-offer-in-the-Online-Shop");


mysqli_close($con);	
	
	?>