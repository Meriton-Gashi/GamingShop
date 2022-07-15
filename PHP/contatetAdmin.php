<?php
    include "inc/header.php"
?>

<section id="contentt" class="box">
    <h3 class="title1">Lista e Kontakteve</h3>
   
    <div id="idusers">

        <table>
            <div class="tr_display">
                <tr class="border">
                    <th>Contactiid</th>
                    <th>Emri dhe Mbiemri</th>  
                    <th>Email</th>  
                    <th>Country</th>
                    <th>Age</th>
                    <th>Mesazhi</th>
                    <th>Delete</th>
                </tr>

                <?php
                    $dbConn=mysqli_connect('localhost','root','','eshop');
                    if(!$dbConn){
                        die("Deshtoi lidhja me DB ".mysqli_error($dbConn));
                    }
                    
                    $sql="SELECT contaktiid, emri, mbiemri, email, country, age, mesazhi FROM contact";
                    $contakt=mysqli_query($dbConn, $sql);
                    if($contakt){
                        while($contakti=mysqli_fetch_assoc($contakt)){
                            $cid=$contakti['contaktiid'];
                            echo "<tr class='border'>";
                            
                            echo "<td>".$contakti['contaktiid'] ."</td>";
                            
                            echo "<td>".$contakti['emri'] . " " .$contakti['mbiemri'] ."</td>";
                            
                            echo "<td>".$contakti['email'] ."</td>";
                            echo "<td>".$contakti['country'] ."</td>";
                            echo "<td>".$contakti['age'] ."</td>";
                            echo "<td>".$contakti['mesazhi'] ."</td>";


                            echo "<td> <a href='fshijcontact.php?cid={$cid}'><i style='font-size:24px' class='fa'>&#xf014;</i> </a></td>";
                            
                           

                            echo "</tr>";
                        }
                    }
                ?>
            </div>
        </table>
    </div>
    
</section>

<?php
    include "inc/footer.php";
?>






