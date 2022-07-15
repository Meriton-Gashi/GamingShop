<?php
    include "inc/header.php"
?>


<?php
global $dbConn;
    $dbConn=mysqli_connect('localhost','root','','eshop');
    if(!$dbConn){
        die("Deshtoi lidhja me DB ".mysqli_error($dbConn));
    }
    if(isset($_GET['pid'])){
        $pid=$_GET['pid'];
        $sql="SELECT produktetid,emri, pershkrimi, qmimi FROM produktet WHERE produktetid=$pid";
        $produktet=mysqli_query($dbConn,$sql);
        if($produktet){
            while($produkti = mysqli_fetch_assoc($produktet)){
            $produktetid=$produkti['produktetid'];
            $emri=$produkti['emri'];
            $pershkrimi=$produkti['pershkrimi'];
            $qmimi=$produkti['qmimi'];
            }
        }
        if(isset($_POST['fshij'])){
            $produktetid=$_POST['produktetid'];
            $sql="DELETE FROM produktet WHERE produktetid=$pid";
            $produkti=mysqli_query($dbConn,$sql);
            if($produkti){
                echo "Produkti u fshi me sukses";
            }
            else{
                echo "Produkti deshtoi te fshihet ".mysqli_error($dbConn);

            }
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktet</title>
    <style>
        body{
            background-color: rgb(226, 217, 217);
        }
        h1{
            margin-top:30px;
        }
        input{
            width: 50%;
            height: 50%;
            border: 1px;
            border-radius: 05px;
            padding: 8px 15px 8px 15px;
            margin: 10px 0px 15px 0px;
            box-shadow: 1px 1px 2px 1 px grey;
            font-weight: bold;

        }
    </style>
</head>
<body>
    <center>
        <h1>Fshij produktin</h1>
        <form action="" method="POST" enctype="multipart/form-data">

            <label>Produktiid </label><br>
            <input type="text" name="produktetid" placeholder="produktetid" readonly
            value="<?php if(!empty($produktetid)) echo $produktetid; ?>"/><br> 

            <label>Choose an Photo for product: </label><br>
            <input type="file" name="image" id="image" readonly
            value="<?php if(!empty($image)) echo $image; ?>"/><br>

            <label>Emri i produktit: </label><br>
            <input type="text" name="emri" placeholder="Emri" readonly
                value="<?php if(!empty($emri)) echo $emri; ?>"/><br>
            
            <label>Pershkrimi i produktit: </label><br>
            <input type="text" name="pershkrimi" placeholder="Pershkrimi"  readonly
            value="<?php if(!empty($pershkrimi)) echo $pershkrimi; ?>"/><br>

            <label>Qmimi i produktit: </label><br>
            <input type="text" name="qmimi" id="qmimi" placeholder="Cmimi"  readonly
            value="<?php if(!empty($qmimi)) echo $qmimi; ?> " /><br>

            <input type="submit" name="fshij" value="fshij" /><br>
        </form>
    </center>
</body>

</html>
