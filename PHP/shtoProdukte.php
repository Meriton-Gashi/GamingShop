<?php
    include "inc/header.php"
?>

<?php
    $connection = mysqli_connect("localhost", "root", "");
    $db=mysqli_select_db($connection, 'eshop');

    if(isset($_POST['upload'])){
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $emri=$_POST['emri'];
        $pershkrimi=$_POST['pershkrimi'];
        $qmimi=$_POST['qmimi'];

        $query=" INSERT INTO `produktet`(`image`, `emri`, `pershkrimi`, `qmimi`) VALUES('$file', '$emri', '$pershkrimi', '$qmimi' )";
        $query_run=mysqli_query($connection,$query);

        if($query_run){
            echo '<script type="text/javascript">alert(" Produkt Upload")</script>';


        }
        else{
            echo '<script type="text/javascript">alert(" Produkt Not Upload")</script>';
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
        <h1>Shfaq te dhenat per prduktin</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            
            <label>Produktiid </label><br>
            <input type="text" name="produktetid" placeholder="produktetid" /> <br>

            <label>Choose an Photo for product: </label><br>
            <input type="file" name="image" id="image"/><br>

            <label>Emri i produktit: </label><br>
            <input type="text" name="emri" placeholder="Emri"/><br>
            
            <label>Pershkrimi i produktit: </label><br>
            <input type="text" name="pershkrimi" placeholder="Pershkrimi"/><br>

            <label>Qmimi i produktit: </label><br>
            <input type="text" name="qmimi" id="qmimi" placeholder="Cmimi"/><br>

            <input type="submit" name="upload" value="Upload" /><br>
        </form>
    </center>
</body>

</html>

