<?php
$host = 'localhost';
$username = 'id17539486_root';
$password = '8VCRE9SP]DbwQ@e6';
$dbname = 'id17539486_bank';
$conn = mysqli_connect('localhost','id17539486_root','8VCRE9SP]DbwQ@e6','id17539486_bank');
if (!$conn)  {die ("Could not connect to MYSQL Server: " .mysql_error());}  
$sql = "SELECT * FROM users";
$result = mysqli_query($conn,$sql);


if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from users where uid=$from";
    $qry = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($qry); 

    $sql = "SELECT * from users where uid=$to";
    $res = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($res);

    if (($amount)<0)
   {    
        echo '<script type="text/javascript">';
        echo ' alert("Oops! Negative values cannot be transferred")';
        echo '</script>';
    }

    else if($amount > $sql1['amount']) 
    {
        echo '<script type="text/javascript">';
        echo ' alert("Bad Luck! Insufficient amount")'; 
        echo '</script>';
    }
    
    else if($amount == 0)
    {
         echo "<script type='text/javascript'>";
         echo "alert('Oops! Zero value cannot be transferred')";
         echo "</script>";
     }

    else 
    {   
        $newamount = $sql1['amount'] - $amount;
        $sql = "UPDATE users set amount=$newamount where uid=$from";
        mysqli_query($conn,$sql);
             
        $newamount = $sql2['amount'] + $amount;
        $sql = "UPDATE users set amount=$newamount where uid=$to";
        mysqli_query($conn,$sql);

        echo "<script>
        alert('Transaction Successful!');
        </script>";
                
        $sender = $sql1['name'];
        $receiver = $sql2['name'];
        
        $sql = "INSERT INTO history(`sender`, `receiver`, `amount`) VALUES ('$sender','$receiver','$amount')";
         $query=mysqli_query($conn,$sql);       
        

        if($query)
        {
            echo "<script> 
                    alert('Transaction Successful');
                   
                </script>";    
            }
                
            $newamount= 0;
            $amount =0;
        }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
     <link rel="icon" href="staka-logo.jpeg">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="table.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <style type="text/css">
    	
		button{
			border:none;
			background: #d9d9d9;
		}
	    button:hover{
			background-color:#777E8B;
			transform: scale(1.1);
			color:white;
		}

    </style>
</head>

<body bgcolor="#FFC0CB">
 
<nav id="navbar">
        <div id="logo">
            <img src="staka-logo.jpeg" ">
        </div>
        <ul>
            <li class="item"><a href="index.html">Home</a></li>
            <li class="item"><a href="services.html">Services</a></li>
            <li class="item"><a href="user.php">Users</a></li>
            <li class="item"><a href="contact.php">Contact Us</a></li>
            <li class="item"><a href="https://www.thesparksfoundationsingapore.org/">TSF</a></li>
        </ul>
    </nav>

	<div class="container">
        <h2 class="text-center pt-4"style="font-family:serif; font-size:300%; color:red;">Transaction</h2>
            <?php
                $host = 'localhost';
                $username = 'id17539486_root';
                $password = '8VCRE9SP]DbwQ@e6';
                $dbname = 'id17539486_bank';
                $conn = mysqli_connect('localhost','id17539486_root','8VCRE9SP]DbwQ@e6','id17539486_bank');
                if (!$conn)  {die ("Could not connect to MYSQL Server: " .mysql_error());}  
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn,$sql);

                $s_id=$_GET['id'];
                $sql = "SELECT * FROM  users WHERE uid = $s_id";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows=mysqli_fetch_assoc($result);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
            <table class="table table-striped table-condensed table-bordered">
                <tr>
                    <th class="text-center">User ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Transaction ID</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Amount</th>
                </tr>
                <tr>
                    <td class="py-2"><?php echo $rows['uid'] ?></td>
                    <td class="py-2"><?php echo $rows['name'] ?></td>
                    <td class="py-2"><?php echo $rows['transid'] ?></td>
                    <td class="py-2"><?php echo $rows['email'] ?></td>
                    <td class="py-2"><?php echo $rows['amount'] ?></td>
                </tr>
            </table>
        </div>
        <br><br><br>

        <label>Transfer To:</label>
        <select name="to" class="form-control" required>
            <option value=" " disabled selected>Choose</option>
            <?php
                $host = 'localhost';
                $username = 'id17539486_root';
                $password = '8VCRE9SP]DbwQ@e6';
                $dbname = 'id17539486_bank';
                $conn = mysqli_connect('localhost','id17539486_root','8VCRE9SP]DbwQ@e6','id17539486_bank');
                if (!$conn)  {die ("Could not connect to MYSQL Server: " .mysql_error());}  
                $sql = "SELECT * FROM users";
                $result = mysqli_query($conn,$sql);
                                
                $tid=$_GET['id'];
                $sql = "SELECT * FROM users where uid!=$tid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['uid'];?>" >
                
                    <?php echo $rows['name'] ;?> (amount: 
                    <?php echo $rows['amount'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>Amount:</label>
            <input type="number" class="form-control" name="amount" required>   
            <br><br>
                <div class="text-center" >
            <button class="btn mt-3" name="submit" type="submit" id="myBtn">Transfer Confirm</button>
            </div>

        </form>
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