$servername = "localhost";
$username = "username";
$password = "password";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";


Simplified

$conn = mysqli_connect('localhost', 'username', 'password');
$database = mysqli_select_db($conn, 'database');