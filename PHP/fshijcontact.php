<?php
    include 'inc/header.php';

?>


<div class="shtouser0">
<h3>Delete User</h3>

        <?php
            $dbConn=mysqli_connect('localhost','root','','eshop');
            if(!$dbConn){
                die("Deshtoi lidhja me DB ".mysqli_error($dbConn));
            }
            if(isset($_GET['cid'])){
                $cid=$_GET['cid'];
                $sql="SELECT contaktiid, emri, mbiemri, email, country, age, mesazhi FROM contact  WHERE contaktiid=$cid";
                $contakt=mysqli_query($dbConn, $sql);
                if($contakt){
                    $contakt=mysqli_fetch_assoc($contakt);
                    $contaktiid=$contakt['contaktiid'];
                    $emri=$contakt['emri'];
                    $mbiemri=$contakt['mbiemri'];
                    $email=$contakt['email'];
                    $country=$contakt['country'];
                    $age=$contakt['age'];
                    $mesazhi=$contakt['mesazhi'];
                    

                }
            }
            if(isset($_POST['fshij'])){
                $contaktiid=$_POST['contaktiid'];
                $sql="DELETE FROM contact WHERE contaktiid=$contaktiid";
                $contakt=mysqli_query($dbConn,$sql);
                if($contakt){
                    echo "Kontakti u fshi me sukses";
                }
                else{
                    echo "Kontakti deshtoi te fshihet ".mysqli_error($dbConn);

                }
            }
        ?>

<div class="contact-content">

    <div class="contact-form">
                <form action="" id="contakti" class="box" method="post">
                    <input type="hidden" id="contaktiid" name="contaktiid" readonly
                        value="<?php if(!empty($contaktiid)) echo $contaktiid; ?>">

                    <input type="text" id="emri" name="emri" placeholder="emri"  readonly
                        value="<?php if(!empty($emri)) echo $emri; ?>">
                    
                    <input type="text"  id="mbiemri" name="mbiemri" placeholder="mbiemri"  readonly
                        value="<?php if(!empty($mbiemri)) echo $mbiemri; ?>">
                    
                    <input type="text"  id="email" name="email" placeholder="email"  readonly
                        value="<?php if(!empty($email)) echo $email; ?>">
                    
                    <input type="email"  id="country" name="country" placeholder="country" readonly
                        value="<?php if(!empty($country)) echo $country; ?>">

                    <input type="text"  id="age" name="age" placeholder="age" readonly
                    value="<?php if(!empty($age)) echo $age; ?>">

                    <input type="text"  id="mesazhi" name="mesazhi" placeholder="mesazhi" readonly
                        value="<?php if(!empty($mesazhi)) echo $mesazhi; ?>">
                    
                    <input type="submit" name="fshij" value="fshij" id="fshij">
                
                </form>
            
    </div>
        </div>
</div>