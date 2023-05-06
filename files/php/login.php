<?php
$email=$_POST['email'];
$password=$_POST['password'];

$servername = "localhost";
$username = "root";
$dbname = "fitzone_bdd";

// create connection
$conn = new mysqli($servername, $username, "", $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();

    if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['password'] === $password)
        {
            header("location: ../html/fit.html");
        }
        else{
        echo "<h2>Invalid Email or Password</h2>";
        }
    }
    else {
   
    echo "<h2>Invalid Email or Password</h2>";
    /***/  
    }
    $conn->close();
}
 

?>