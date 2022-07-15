<?php
    include 'inc/header.php';
?>
   
        
        <?php
            $dbConn=mysqli_connect('localhost','root','','eshop');
            if(!$dbConn){
                die("Deshtoi lidhja me DB ".mysqli_error($dbConn));
            }
            if(isset($_POST['submit'])){
                $emri=$_POST['emri'];
                $mbiemri=$_POST['mbiemri'];
                $komuna=$_POST['komuna'];
                $email=$_POST['email'];
                $telefoni=$_POST['telefoni'];
                $roli=$_POST['roli'];
                $fjalekalimi=$_POST['fjalekalimi'];

                

                $sql="INSERT INTO users(emri, mbiemri, komuna, email, telefoni, roli, fjalekalimi) VALUE";
                $sql.="('$emri','$mbiemri','$komuna','$email', '$telefoni','$roli','$fjalekalimi')";
                $user=mysqli_query($dbConn,$sql);
                if($user){
                    echo "Useri u shtua me sukses";
                }
                else{
                    die("Useri deshtoi te shtohet me sukse"); 
                }
            }
        ?>
<div class="contact-content">
    <div class="contact-form">
    <h3>Shto User</h3>
                <form action="" id="contakti" class="box" method="post">
                    
                
                    <input type="text" id="emri" name="emri" placeholder="emri">
                    
                    <input type="text"  id="mbiemri" name="mbiemri" placeholder="mbiemri">
                    
                    <input type="text"  id="komuna" name="komuna" placeholder="komuna">
                    
                    <input type="email"  id="email" name="email" placeholder="email">

                    <input type="text"  id="telefoni" name="telefoni" placeholder="telefoni">

                    <input type="text"  id="roli" name="roli" placeholder="roli">

                    <input type="text"  id="password" name="fjalekalimi" placeholder="password">

                    
                    
                    <input type="submit" name="submit" value="submit" id="submit">
                
                </form>
            
    </div>
</div>

<?php
    include 'inc/footer.php';
?>