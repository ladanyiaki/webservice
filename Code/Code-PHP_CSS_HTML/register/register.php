<?php

$con = mysqli_connect('localhost', 'root', '','db_contact');

//define variables
$firstname=$lastname=$login=$password=$email=$phone="";

// get the post records
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$hashed_password = password_hash($password,PASSWORD_DEFAULT);

// query database to check if there are any matching login names
//login name should be unique

$check="SELECT * FROM customer WHERE login = '$_POST[login]'";
$rs = mysqli_query($con,$check);
$data = mysqli_fetch_array($rs, MYSQLI_NUM);
if($data[0] > 1) {
	$output = "Username Already Exists";
	header("Location: http://localhost/hazi/Web_HF/Code/HTML/register/register2.php?uservalid=".$output);
}

	else if (!empty($firstname) && !empty($lastname))
{
	/*Register user*/
    $newCustomer="INSERT INTO customer (customerFirstName, customerLastName, login,customerPassword,email,phone) VALUES ('$firstname', '$lastname', '$login', '$hashed_password','$email','$phone')";
		if (mysqli_query($con,$newCustomer))
			
		header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login.html");

        echo "You are now registered<br/>";
    }
	else
    {
       echo "<br> Errror....Values are not set in variables...!!!";
    }

mysqli_close($con);

//***********OLD CODE***********
/* // database insert SQL code
if (!empty($firstname) && !empty($lastname))
  {
$sql = "INSERT INTO customer (customerFirstName, customerLastName, login,customerPassword,email,phone) VALUES ('$firstname', '$lastname', '$login', '$password','$email','$phone')";
  }
  else
     echo "<br> Errror....Values are not set in variables...!!!";
 
$sql2 = "select customerId,customerFirstName, customerLastName from customer";
// insert in database 
$rs = mysqli_query($con, $sql);

$list = mysqli_query($con,$sql2);

if($rs)
{
	/*echo "Contact Records Inserted";*/
//}


/* echo "<table>";
            echo "<tr>";
                echo "<th>id</th>";
                echo "<th>name</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($list)){
            echo "<tr>";
                echo "<td>" . $row['customerId'] . "</td>";
                echo "<td>" . $row['customerFirstName'] . "</td>";
                echo "<td>" . $row['customerLastName'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";


mysqli_free_result($list);


mysqli_close($con);

header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login.html"); */ 

//***********END OF OLD CODE***********
?>