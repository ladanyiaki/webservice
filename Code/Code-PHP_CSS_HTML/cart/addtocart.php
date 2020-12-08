
<?php
$con = mysqli_connect('localhost', 'root', '','db_contact');

$customerID = $_POST["userid"];
$productID = $_POST["productid"];
$cartQuantity = $_POST["cartQuantity"];

$sql = "INSERT INTO cart (customerID,productID,cartQuantity) VALUES (" . $customerID . "," . $productID . "," . $cartQuantity . ");"; //customerID, productID, cartQuantity
$list = mysqli_query($con,$sql);

echo $list;
echo $sql;
echo $cartQuantity;
echo $productID;
echo $customerID;


header("Location: http://localhost/hazi/Web_HF/Code/HTML/index/index.php");
?>