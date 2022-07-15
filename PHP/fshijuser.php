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
            if(isset($_GET['uid'])){
                $uid=$_GET['uid'];
                $sql="SELECT userid, emri, mbiemri, komuna, email, telefoni, fjalekalimi FROM users WHERE userid=$uid";
                $user=mysqli_query($dbConn, $sql);
                if($user){
                    $user=mysqli_fetch_assoc($user);
                    $userid=$user['userid'];
                    $emri=$user['emri'];
                    $mbiemri=$user['mbiemri'];
                    $komuna=$user['komuna'];
                    $email=$user['email'];
                    $telefoni=$user['telefoni'];
                    $fjalekalimi=$user['fjalekalimi'];

                }
            }
            if(isset($_POST['fshij'])){
                $userid=$_POST['userid'];
                $sql="DELETE FROM users WHERE userid=$userid";
                $user=mysqli_query($dbConn,$sql);
                if($user){
                    echo "Useri u fshi me sukses";
                }
                else{
                    echo "Useri deshtoi te fshihet ".mysqli_error($dbConn);

                }
            }
        ?>

<div class="contact-content">

    <div class="contact-form">
    
                <form action="" id="contakti" class="box" method="post">
                    
                    <input type="hidden" id="userid" name="userid" readonly
                        value="<?php if(!empty($userid)) echo $userid; ?>">

                    <input type="text" id="emri" name="emri" placeholder="emri"  readonly
                        value="<?php if(!empty($emri)) echo $emri; ?>">
                    
                    <input type="text"  id="mbiemri" name="mbiemri" placeholder="mbiemri"  readonly
                        value="<?php if(!empty($mbiemri)) echo $mbiemri; ?>">
                    
                    <input type="text"  id="komuna" name="komuna" placeholder="komuna"  readonly
                        value="<?php if(!empty($komuna)) echo $komuna; ?>">
                    
                    <input type="email"  id="email" name="email" placeholder="email" readonly
                        value="<?php if(!empty($email)) echo $email; ?>">

                    <input type="text"  id="password" name="fjalekalimi" placeholder="password" readonly
                    value="<?php if(!empty($fjalekalimi)) echo $fjalekalimi; ?>">

                    <input type="text"  id="telefoni" name="telefoni" placeholder="telefoni" readonly
                        value="<?php if(!empty($telefoni)) echo $telefoni; ?>">
                    
                    <input type="submit" name="fshij" value="fshij" id="fshij">
                
                </form>
            
    </div>
        </div>
</div>