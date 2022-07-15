<?php
    include "inc/header.php"
?>
<h3 class="title10">Lista e Produkteve</h3>

<?php
    if($_SESSION['useri']['roli']==1){  
        echo "<button class='shtoProdukte'><a href='shtoProdukte.php'>Shto Produkt</a></button>";
    }
?>
<div id="id001">
    <table class ="tabelaid">  
        
        <tr class ="klasaprodukt">
            
            <th>Produktiid</th>  
            <th>Image</th>  
            <th>Emri</th>
            <th>Pershkrimi</th>
            <th>Qmimi</th>
            <?php
                if($_SESSION['useri']['roli']==1){ 
                    echo "<th>Edit</th>";
                    echo"<th>Delete</th>";
                }
            ?>
            
        </tr>
    

<?php
    $dbConn=mysqli_connect('localhost','root','','eshop');
    if(!$dbConn){
        die("Deshtoi lidhja me DB ".mysqli_error($dbConn));
    }
    $sql="SELECT produktetid, 'image', emri, pershkrimi, qmimi FROM produktet";
    $produkt=mysqli_query($dbConn, $sql);
    if($produkt){
        while($produkti=mysqli_fetch_assoc($produkt)){
            $pid=$produkti['produktetid'];

            $img=$produkti['image'];
            $path="../image/$img";
            
            echo "<tr class='klasaprodukt'>";
            echo "<td>".$produkti['produktetid'] ."</td>";
            echo "<td><img src='$path; 'width='40' height='40'/></td>";
            /*echo "<td><img src='data:image;base64, '.base64_encode($row['image']).''></td>";*/
            echo "<td>".$produkti['emri'] ."</td>";
            echo "<td>".$produkti['pershkrimi'] ."</td>";
            echo "<td>".$produkti['qmimi'] ."</td>";
            if($_SESSION['useri']['roli']==1){ 
                echo "<td> <a href='modifikoproduktet.php?pid={$pid}'><i class='fa fa-edit'></i> </a></td>";
                echo "<td> <a href='fshijprodukt.php?pid={$pid}'><i style='font-size:24px' class='fa'>&#xf014;</i> </a></td>";
            }
            echo "</tr>";
        }
    }


?>
    </table>    
</div>

<?php 
    include "inc/footer.php";
?>