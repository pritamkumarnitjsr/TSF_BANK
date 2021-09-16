<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "id17539486_root";
    $password = "8VCRE9SP]DbwQ@e6";
     $dbname = 'id17539486_bank';

    // Create a database connection
   // $con = mysqli_connect($server, $username, $password);
       $con = mysqli_connect('localhost', 'id17539486_root', '8VCRE9SP]DbwQ@e6','id17539486_bank');
    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $msg = $_POST['msg'];
    $sql = " INSERT INTO `id17539486_bank`.`contact` (`name`, `email`, `phone`,`msg`) VALUES ('$name', '$email', '$phone', '$msg') ";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
     <link rel="icon" href="staka-logo.jpeg">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" media="screen and (max-width: 1170px)" href="phone.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bree+Serif&display=swap" rel="stylesheet">

    <style>
#contact {
    position: relative;
}

#contact::before {
    content: "";
    position: absolute;
    width: 100%;
    height: 100%;
    z-index: -1;
    opacity: 0.7;
    background: url('../contact.jpg') no-repeat center center/cover;
}

#contact-box {
    display: flex;
    padding:2px 32px;
    justify-content: center;
    align-items: center;
    padding-bottom: 8px;
}

#contact-box input,
#contact-box textarea {
    width: 100%;
    padding: 0.8rem;
    border-radius: 12px;
    font-size: 1.2rem;
}

#contact-box form {
    width: 40%;
}

#contact-box label {
    font-size: 0.5rem;
    font-family: 'Bree Serif', serif;
}



    </style>

</head>

<body bgcolor="#FFC0CB">
    <nav id="navbar">
        <div id="logo">
            <img src="staka-logo.jpeg" >
        </div>
        <ul>
            <li class="item"><a href="index.html">Home</a></li>
            <li class="item"><a href="services.html">Services</a></li>
            <li class="item"><a href="user.php">Users</a></li>
            <li class="item"><a href="contact.php">Contact Us</a></li>
            <li class="item"><a href="https://www.thesparksfoundationsingapore.org/">TSF</a></li>
        </ul>
    </nav>
        <?php
        if($insert == true){
        echo "<h3 class='submitMsg'>Thanks for submitting the form. We would communicate with you later. </h3>";
        }
    ?>
    <section id="contact">
        <h1 class="h-primary center" style="font-size:300%; color:red; font-family:serif;"><u>Contact Us</u></h1>
        <div id="contact-box">
            <form action="contact.php" method='post'>
            <input type="text" name="name" id="name" placeholder="Enter your name">


            <input type="email" name="email" id="email" placeholder="Enter your email">
            

            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            

            <textarea name="msg" id="msg" cols="30" rows="10" placeholder="Enter your message"></textarea>

                <button class="btn" class="h-primary center">Submit</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="center">
            Copyright &copy; TSF-Banking All rights reserved!
        </div>
    </footer>
    </div>
    <script src="index.js"></script>
    
</body>
</html>