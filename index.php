<?php
$insert=false;
if(isset($_POST['name'])){

$server = "localhost";
$username = "root";
$password = "";
 
$con = mysqli_connect($server, $username, $password);

if(!$con){
    die("connection to this database failed due to" .
    mysqli_connect_error());
}
$name = $_POST['name'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$desc = $_POST['desc'];

$sql =  "INSERT INTO `trip`. trip (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES 
('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//echo $sql;
if($con->query($sql)==true){
    //echo "successfully inserted";
    $insert = true;
}
else{
    echo "ERROR: $sql <br> $con->error";
    
}
$con->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO TRAVEL FORM</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="sit" src="sit.jpg" alt="SIT TUMKUR">
    <div class="container">
        <h1>WELCOME TO SIT TUMKUR GOA TRIP</h1>
        <p>Enter your details and submit the form to confirm your participation in the strip</p>
        <?php
        if($insert==true){
        echo "<p class='submitMsg'>Thanks for submitting the form. We are happy to see you joining us for the GOA trip</p>>";
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter Your Name">
            <input type="text" name="age" id="aeg" placeholder="Enter Your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter Your Gender">
            <input type="email" name="email" id="email" placeholder="Enter Your email">
            <input type="number" name="phone" id="phone" placeholder="Enter Your Phone number ">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form> 
    </div>
    <script src="index.js"></script>
            
</body>
</html>