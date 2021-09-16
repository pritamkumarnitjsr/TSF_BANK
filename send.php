<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
     <link rel="icon" href="staka-logo.jpeg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style type="text/css">
      button{
        transition: 1.5s;
      }
      button:hover{
        background-color:#616C6F;
        color: white;
      }
    </style>
</head>

<body bgcolor="#FFC0CB">

<?php
                        $host = 'localhost';
                        $username = 'id17539486_root';
                        $password = '8VCRE9SP]DbwQ@e6';
                        $dbname = 'id17539486_bank';
                        $conn = mysqli_connect('localhost','id17539486_root','8VCRE9SP]DbwQ@e6','id17539486_bank');
                        if (!$conn)  {die ("Could not connect to MYSQL Server: " .mysql_error());}  
                      $sql = "SELECT * FROM users";
                       $result = mysqli_query($conn,$sql);
                    ?>

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

<div class="container" >
        <h1 class="text-center pt-4"style="font-size:300%; color:red; font-family:serif;"><u>Money Transfer</u></h1>
        <br>
            <div class="row"  >
                <div class="col">
                    <div class="table-responsive-sm" style="font-size:150%; color:blue; font-family:serif";>
                    <table  class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead >
                            <tr >
                            <th scope="col" class="text-center py-2"style="font-size:90%; color:green; font-family:serif;">User ID</th>
                            <th scope="col" class="text-center py-2" style="font-size:90%; color:green; font-family:serif;">Name</th>
                            <th scope="col" class="text-center py-2" style="font-size:90%; color:green; font-family:serif;">Transaction ID</th>
                            <th scope="col" class="text-center py-2" style="font-size:90%; color:green; font-family:serif;">E-Mail ID</th>
                            <th scope="col" class="text-center py-2"style="font-size:90%; color:green; font-family:serif;">Amount</th>
                            <th scope="col" class="text-center py-2" >Details</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>
                        <td class="py-2"><?php echo $rows['uid'] ?></td>
                        <td class="py-2"><?php echo $rows['name']?></td>
                        <td class="py-2"><?php echo $rows['transid']?></td>
                        <td class="py-2"><?php echo $rows['email']?></td>
                        <td class="py-2"><?php echo $rows['amount']?></td>
                        <td> <a href="select.php?id= <?php echo $rows['uid'] ;?>"> <button type="button" class="btn"style="font-size:80%; ">Show Details/Transfer</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 

<footer>
        <div class="center">
            Copyright &copy; TSF-Banking All rights reserved!
        </div>
    </footer>

</body>
</html>