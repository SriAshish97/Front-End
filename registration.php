<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyHomePage</title>
    <link rel="stylesheet" type="text/css" href="css/header.css">
    <link rel="stylesheet" href="./css/wepage.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">"
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<body>

<nav class=" row navbar navbar-expand-sm  blue bg-white sticky-top">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="navbar-brand" href="Home.html">The Shoe Company</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Home.html">Home</a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Men.html">Men</a>
        </li>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Women.html">Women</a>
        </li>

        <li class="nav-item"><a class="nav-link" href="Contact_Us.html">Contact Us</a></li>
        <li class="nav-item"><a class="nav-link" href="Login%20Page.html">Login</a></li>
    </ul>
</nav>
<div id="introduction">
    <?php


    $first=$_POST["first_name"];
    $last=$_POST["last_name"];
    $name=$_POST["first_name"]." ".$_POST["last_name"];
    $password1=$_POST["password"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];





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




    $sql = "SELECT email, first_name, last_name FROM user_details";
    $result = $conn->query($sql);
    $count=0;
    $check=1;
    echo "<br>";

    if ($result->num_rows >= 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $count=$count+1;
            if($email==$row["email"]) {
                echo "Email Already Registered";

                echo " <br><br><a href='Login Page.html' class='button'>Login</a>";

                $check=0;
                break;

            }
            if($name==($row["first_name"]." ".$row["last_name"])) {
                echo "Please Login with you email , Account already exists";

                echo " <br><br><a href='Login Page.html' class='button'>Login</a>";
                $check=0;
                break;
            }


        }
        if ($check==1){

            $sql = "INSERT INTO user_details (first_name, last_name,email,password,phone,user_id) VALUES ('$first','$last','$email','$password1','$phone','$count')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration Sucessfull";
                echo "<br><br><a href='Home.html' class='button'>Login</a>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        }

    } else {
        echo "0 results";
    }
    $conn->close();


    ?></div>

<footer class="page-footer font-small blue fixed-bottom bg-primary">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2020 Copyright:
        <a class="text-white" href="Home.html"> TheShoeCompany.com</a>
    </div>
    <!-- Copyright -->

</footer>
</body>
</html>