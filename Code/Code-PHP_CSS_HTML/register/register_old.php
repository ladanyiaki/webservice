<?php
$con = mysqli_connect('localhost', 'root', '','db_contact');

//define variables
$firstname=$lastname=$login=$password=$email=$phone="";

// get the post records
$firstname = $_POST['firstname'];
include 'write.php';
$lastname = $_POST['lastname'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];
$phone = $_POST['phone'];

/*echo $firstname;
echo $lastname;
echo $login;
echo $password;
echo $email;
echo $phone;*/

// database insert SQL code
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
}


echo "<table>";
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

/*Jump to login after registration*/
header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login.html");
?>