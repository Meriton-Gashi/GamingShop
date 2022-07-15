<?php
session_start();
if(!isset($_SESSION['useri'])){
    header("location:login.php");
}
else{
$dbConn="";

function dbConnection(){
    global $dbConn;
    $dbConn=mysqli_connect('localhost','root','','eshop');
    if(!$dbConn){
        die("Deshtoi lidhja me bazen e shenimeve" . mysqli_error($dbConn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Gaming</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/CSSstyle1.css">
</head>
<body>
    <div id="header">
        <div class="container">
            <a id="logo" href="home.html">
                <img src="../image/img0.png" alt="Online Shop" title="Online Shop"> 
            </a>
            <ul class="navigimi">
                <li><a href="Home.php">Home</a></li>
                <?php 
                    if(isset($_SESSION['useri'])){
                        if($_SESSION['useri']['roli']!=1){
                            echo "<li><a href='AboutUs.php'>About Us</a></li>";
                            echo "<li><a href='Contact.php'>Contact</a></li>";
                            echo "<li><a href='produktet.php'>Produktet</a></li>";
                            echo "<li><a href='user.php'>User</a></li>";
                        }
                        else{
                            echo "<li><a href='AboutUs.php'>About Us</a></li>";
                            echo "<li><a href='contatetAdmin.php'>Contacts</a></li>";
                            echo "<li><a href='produktet.php'>Produktet</a></li>";
                            echo "<li><a href='user.php'>User</a></li>";
                        }
                        
                        /*if($_SESSION['useri']['roli']==1){
                            echo "<li><a href='user.php'>User</a></li>";
                        }*/
                    }
                    
                        
                   
                ?>
                
                
                
                <li><a href="Logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
<?php
}
?>
                            