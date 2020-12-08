<?php
$con = mysqli_connect('localhost', 'root', '','db_contact');

//define variables
$login=$password=$hashedPassword="";

// get the post records

$login = $_POST['login'];
$password = $_POST['password'];

/*   //debug
$hash2 = password_hash($password,  
          PASSWORD_DEFAULT); 
		  $checked="rossz minden";
		  */
// database select SQL code

$sql = "select customerID, customerPassword from customer where customer.login= '" . $login . "';";



// check
$result = mysqli_query($con, $sql);

if ($result->num_rows > 0) {
 while($row = $result->fetch_assoc()) {
    $customerID= $row["customerID"];
	$hashedPassword=$row["customerPassword"];
	$verify = password_verify($password, $hashedPassword);
	if ($verify){
		$cookie_name = "user";
		$cookie_value = $customerID;
		setcookie($cookie_name, $cookie_value, time() + (3600), "/"); // 3600= 1 hour
		
		
		//setcookie( 'site', $_GET['site'], 0, COOKIEPATH, COOKIE_DOMAIN); //DELETE COOKIE ONCE BROWSER IS CLOSED


		//echo "<br>Létezik!!" . $_COOKIE[$cookie_name];
		header("Location: http://localhost/hazi/Web_HF/Code/HTML/index/index.php");
		//$checked="jó jelszó";
	}
	else{
		//$checked="jó név rossz jelszó";
		header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login2.html");
		}
 }
}
else{
		//$checked="rossz név";
		header("Location: http://localhost/hazi/Web_HF/Code/HTML/login/login2.html");
		}
/*   //debug
echo "<br>" . $checked ;
echo "<br> jelszó az adatbázisból:" .$hashedPassword;
echo "<br> jelszó a felhasználótól:" .$password ;
echo "<br> hashelt jelszó a felhasználótól:" .$hash2 ;
*/


 //setcookie("user", "", time() - 3600);   // cookie törlése

mysqli_close($con);

?>