<?php

session_start();
$email=$_POST["email"];
$pwd=$_POST["pwd"];


$_SESSION["i"]="HTML";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname="shoe";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$sql = "SELECT * FROM user_details where email='$email'";
$result = $conn->query($sql);
$count=0;
$check=1;
echo "<br>";

if ($result->num_rows  ==1 ) {

    echo "entered here";
    $row = $result->fetch_assoc();
    $_SESSION["username"]=$row['user_id'];
    $_SESSION["name"]=$row['first_name']." ".$row['last_name'];
    $_SESSION["email"]=$row['email'];
    if ($row["password"]==$pwd){
        echo "entered here 1";
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Logged In successfully');
          window.location.href='OurProducts.html';
       </script>");
    }
    else{
        echo ("<script LANGUAGE='JavaScript'>
          window.alert('Incorrect UserName Or Password Please Try Again');
          window.location.href='Login Page.html';
       </script>");
    }

} else {
    echo ("<script LANGUAGE='JavaScript'>
          window.alert('Incorrect UserName Or Password Please Try Again');
          window.location.href='Login Page.html';
       </script>");
}
$conn->close();
?>