<?php
session_start();
$dbConn="";
dbConnection();
function dbConnection(){
    global $dbConn;
    $dbConn=mysqli_connect('localhost','root','','eshop');
    if(!$dbConn){
        die("Deshtoi lidhja me bazen e shenimeve" . mysqli_error($dbConn));
    }
}
function login($email,$fjalekalimi){
    global $dbConn;
    $sql="SELECT userid,emri, mbiemri, telefoni, email, roli FROM users";
    $sql.=" WHERE email='$email' AND fjalekalimi='$fjalekalimi'";
    $datauseri=mysqli_query($dbConn,$sql);
    if($datauseri){
        echo "Useri duhet te regjistrohet ";
    }
        if(mysqli_num_rows($datauseri)==1){
            $datauseri=mysqli_fetch_assoc($datauseri);
            $useri=array();
            $useri['userid']=$datauseri['userid'];
            $useri['emrimbiemri']=$datauseri['emri'] . " " .  $datauseri['mbiemri'];
            $useri['roli']=$datauseri['roli'];
            $_SESSION['useri']=$useri;
            header("Location: home.php");
        }
}
?>
<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="../css/login.css">

</head>

<body>
            <?php
                if(isset($_POST['login'])){
                    login($_POST['email'],$_POST['fjalekalimi']);
                }
                if(!isset($_SESSION['useri'])){
            ?>
     <form action="login.php" method="post">

        <h2>Login</h2>
        


        <label>Email</label>

        <input type="text" name="email" placeholder="email"><br>

        <label>Password</label>

        <input type="password" name="fjalekalimi" placeholder="Password"><br> 
                <a href="regjistrohu.php">Regjistrohu</a>
        <button type="login" name="login" value="login"> Login </button>
       
        
     </form>
     <?php } ?>

</body>

</html>