<?php
    include 'inc/header.php';

?>

<div class="shtouser0">
        <h3>Modifiko User</h3>
        <?php
            $dbConn=mysqli_connect('localhost','root','','eshop');
            if(!$dbConn){
                die("Deshtoi lidhja me DB ".mysqli_error($dbConn));
            }
            if(isset($_GET['uid'])){ /* uid eshte key */
                $uid=$_GET['uid'];
                $sql="SELECT userid, emri, mbiemri, komuna, email, telefoni, fjalekalimi,roli FROM users WHERE userid=$uid";
                $user=mysqli_query($dbConn, $sql);
                if($user){
                    $user=mysqli_fetch_assoc($user);
                    $userid=$user['userid'];
                    $emri=$user['emri'];
                    $mbiemri=$user['mbiemri'];
                    $komuna=$user['komuna'];
                    $email=$user['email'];
                    $telefoni=$user['telefoni'];
                    $roli=$user['roli'];
                    $fjalekalimi=$user['fjalekalimi'];


                }
            }
            if(isset($_POST['modifiko'])){ /*modifiko eshte key*/
                $userid=$_POST['userid'];
                $emri=$_POST['emri'];
                $mbiemri=$_POST['mbiemri'];
                $komuna=$_POST['komuna'];
                $email=$_POST['email'];
                $telefoni=$_POST['telefoni'];
                $roli=$user['roli'];
                $fjalekalimi=$_POST['fjalekalimi'];
                $sql="UPDATE users SET emri='$emri', mbiemri='$mbiemri', komuna='$komuna', email='$email', telefoni='$telefoni', fjalekalimi='$fjalekalimi',roli='$roli' WHERE userid=$userid";
                /*$sql.="('$emri','$mbiemri','$komuna','$email','$fjalekalimi','$telefoni')"; emri eshte e dhante e tabeles kurse $emri eshte variabel */
                $user=mysqli_query($dbConn,$sql);
                if($user){
                    echo "Useri u modifikua me sukses";
                }
                else{
                    die("Useri deshtoi te modifikohet me sukses");
                }
            }
        ?>

<div class="contact-content">
    <div class="contact-form">
                <form action="" id="contakti" class="box" method="post">
                    <input type="hidden" id="userid" name="userid" 
                        value="<?php if(!empty($userid)) echo $userid; ?>">

                    <input type="text" id="emri" name="emri" placeholder="emri"
                        value="<?php if(!empty($emri)) echo $emri; ?>">
                    
                    <input type="text"  id="mbiemri" name="mbiemri" placeholder="mbiemri"
                        value="<?php if(!empty($mbiemri)) echo $mbiemri; ?>">
                    
                    <input type="text"  id="komuna" name="komuna" placeholder="komuna" 
                        value="<?php if(!empty($komuna)) echo $komuna; ?>">
                    
                    <input type="email"  id="email" name="email" placeholder="email"
                        value="<?php if(!empty($email)) echo $email; ?>">

                    <input type="text"  id="password" name="fjalekalimi" placeholder="password"
                    value="<?php if(!empty($fjalekalimi)) echo $fjalekalimi; ?>">

                    <input type="text"  id="telefoni" name="telefoni" placeholder="telefoni"
                        value="<?php if(!empty($telefoni)) echo $telefoni; ?>">

                    <input type="text"  id="roli" name="roli" placeholder="roli"
                        value="<?php if(!empty($roli)) echo $roli; ?>">

                    
                    <input type="submit" name="modifiko" value="modifiko" id="modifiko">
                
                </form>
            
    </div>
</div>




<?php
    include 'inc/footer.php';
?>