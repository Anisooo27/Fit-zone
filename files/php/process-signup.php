<?php
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
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
    $stmt = $conn->prepare("insert into user(first_name, last_name, email, password) values (?,?,?,?)");
    if (!$stmt) {
        echo "false";
    }
    else {
    $stmt->bind_param("ssss",$first_name, $last_name, $email, $password);
    $stmt->execute();
    /**echo "registed"; */
    header("location: ../html/fit.html");
    $stmt->close();
    }
    $conn->close();
}


/**$sql= "INSERT INTO user(id_user, first_name, last_name, email, password) VALUES ('?','$name','$last_name','$mail','$password')";
$result = mysqli_query($conn, $sql);
if ($result== TRUE){
    header("location: fit.html");
 }**/
?>