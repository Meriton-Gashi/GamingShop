<?php
    $dbConn=mysqli_connect('localhost','root','','eshop');
    if(!$dbConn){
        die("Deshtoi lidhja me DB ".mysqli_error($dbConn));
    }
    if(isset($_POST['regjistro'])){
        $emri=$_POST['emri'];
        $mbiemri=$_POST['mbiemri'];
        $email=$_POST['email'];
        $fjalekalimi=$_POST['fjalekalimi'];
            
        $sql="INSERT INTO users(emri, mbiemri, email,  fjalekalimi) VALUE";
        $sql.="('$emri','$mbiemri','$email','$fjalekalimi')";
        $user=mysqli_query($dbConn,$sql);
        if($user){
            echo "Useri u regjistru me sukses";
        }
        else{
            die("Useri deshtoi te regjistrohet me sukse");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/regjistrohu.css">
    <title>Regjistrohu</title>
</head>
<body>
    <form action="" method="post">
        <h2>Regjistrohu</h2>
        <label>Emri</label>

        <input type="text" name="emri" placeholder="emri"><br>

        <label>Mbiemri</label>

        <input type="text" name="mbiemri" placeholder="Mbiemri"><br> 

        <label>Email</label>

        <input type="text" name="email" placeholder="email"><br>

        <label>Password</label>

        <input type="password" name="fjalekalimi" placeholder="Password"><br> 
        <a href="login.php">Login</a>
        <button type="regjistro" name="regjistro" value="regjistro"> Regjistrohu </button>
        
    </form>

</body>
</html>