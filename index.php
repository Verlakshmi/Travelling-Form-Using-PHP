<?php

if(isset($_POST['name'])){
    // set connection variable
    
    $_SERVER = "localhost";
    $username = "root";
    $password = "";
    
    // create a database connection

$con = mysqli_connect($_SERVER, $username, $password); 

// Check for connection success

if(!$con){
    die("connection to this database failed due to" .mysqli_connect_error());
}

// echo "Success connect to the DB";

// Collect post variables
$name = $_POST['name']; 
$age = $_POST['age']; 
$gender = $_POST['gender']; 
$email = $_POST['email']; 
$phone = $_POST['phone']; 
$desc = $_POST['desc'];  
$sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
// echo $sql;

// Execute the query

if($con->query($sql)== TRUE){
    // echo "Successfully Inserted";

    //Flag for successful insertion
    $insert = "true";
}
else{
    echo "Error: $sql  <br> $con->error";
}

//close the database connection
$con-> close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welvome to Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class = "bg" src="bg1.jpg" alt="BIT Durg">
    <div class="container">
        <h1>Welcome to BIT Durg US Trip Form</h1>
        <p>Enter Your details and submit this form to confirm your participation in trip</p>
        <?php
        if($insert == true){
        echo "<p class = 'submitMSG'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>

</body>
</html>