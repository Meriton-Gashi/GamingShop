<?php
    include "inc/header.php"
?>

<section id="contentt" class="box">
    <h3 class="title1">Lista e User</h3>
    <?php
        if($_SESSION['useri']['roli']==1){      
            echo "<button class='shtoUser'><a href='shtouser.php'> Shto User</a></button>";
        }
    ?>
    <div id="idusers">

        <table>
            <div class="tr_display">
                <tr class="border">
                    <th>Emri dhe Mbiemri</th>  
                    <th>Komuna</th>  
                    <th>Email</th>
                    <th>Telefoni</th>
                    <th>Roli</th>
                    
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
                    $sql="SELECT userid, emri, mbiemri, komuna, email, telefoni, fjalekalimi,roli FROM users";
                    $user=mysqli_query($dbConn, $sql);
                    if($user){
                        while($useri=mysqli_fetch_assoc($user)){
                            $uid=$useri['userid'];
                            $roli=$useri['roli'];
                            echo "<tr class='border'>";
                            if($_SESSION['useri']['roli']==0){ 
                                
                               
                                if($roli == 1){
                                echo "<td>".$useri['emri'] . " " .$useri['mbiemri'] ."</td>";
                                echo "<td>".$useri['komuna'] ."</td>";
                                echo "<td>".$useri['email'] ."</td>";
                                echo "<td>".$useri['telefoni'] ."</td>";
                                
                                echo "<td>Admin</td>";
                                }
                                echo"</tr>";
                            
                        }
                        if($_SESSION['useri']['roli']==1){     
                            echo "<td>".$useri['emri'] . " " .$useri['mbiemri'] ."</td>";
                            echo "<td>".$useri['komuna'] ."</td>";
                            echo "<td>".$useri['email'] ."</td>";
                            echo "<td>".$useri['telefoni'] ."</td>";
                            echo "<td>".$useri['roli'] ."</td>";

                            echo "<td> <a href='modifikouser.php?uid={$uid}'><i class='fa fa-edit'></i> </a></td>";
                            echo "<td> <a href='fshijuser.php?uid={$uid}'><i style='font-size:24px' class='fa'>&#xf014;</i> </a></td>";
                        }
                    }
                            
                            
                            
                            

                            echo "</tr>";
                        
                    }
                ?>
            </div>
        </table>
    </div>
    
</section>

<?php
    include "inc/footer.php";
?>












<!--<div id="main">
            <div class="product1">
                <div class="product-image">
                    <img src="../image/img2.png" width="150px"; height="150px"; alt="">
                </div>
                <div class="product-details">
                    <p>Sindroma Observatory Mesh (Core I5 12400F, <br> 16GB RAM RGB, 500GB SSD M.2, RTX 3060 12GB)</p>
                </div>
                <div class="product-prince">
                    <p>1500$</p>
                </div>
                <div class="product-edit">
                    <a href="">Edit</a>
                </div>
                <div class="product-delete">
                    <a href="">Delete</a>
                </div>
                <div class="product-buy">
                    <a href="">BUY</a>
                </div>
            
            </div>
            <div class="prduct2"> 
                <div class="product-image">
                    <img src="../image/img5.png" width="150px"; height="150px"; alt="">
                </div>
                <div class="product-details">
                    <p>ACER 23.8" VG240Y NITRO VG0  75 Hz IPS, Gaming  <br> Monitor</p>
                </div>
                <div class="product-prince">
                    <p>500$</p>
                </div>
                <div class="product-edit">
                    <a href="">Edit</a>
                </div>
                <div class="product-delete">
                    <a href="">Delete</a>
                </div>
                <div class="product-buy">
                    <a href="">BUY</a>
                </div>
            </div>
        <div class="prduct3">
            <div class="product-image">
                <img src="../image/img12.png" width="150px"; height="150px"; alt="">
            </div>
            <div class="product-details">
                <p>MSI RTX 3070 Ti GAMING X TRIO 8G 8GB GDDR6X , <br> Graphics Card</p>
            </div>
            <div class="product-prince">
                <p>1277$</p>
            </div>
            <div class="product-edit">
                <a href="">Edit</a>
            </div>
            <div class="product-delete">
                <a href="">Delete</a>
            </div>
            <div class="product-buy">
                <a href="">BUY</a>
            </div>


        </div>
        <div class="prduct4">
            <div class="product-image">
                <img src="../image/img3.png" width="150px"; height="150px"; alt="">
            </div>
            <div class="product-details">
                <p>K100 RGB Mechanical Gaming Keyboard — CHERRY® <br> MX Speed Black </p>
            </div>
            <div class="product-prince">
                <p>150$</p>
            </div>
            <div class="product-edit">
                <a href="">Edit</a>
            </div>
            <div class="product-delete">
                <a href="">Delete</a>
            </div>
            <div class="product-buy">
                <a href="">BUY</a>
            </div>
        </div>
        <div class="prduct5">
            
        </div>
        <div class="prduct6">
            
        </div>
    </div>

-->