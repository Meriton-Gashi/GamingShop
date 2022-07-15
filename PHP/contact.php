<?php
    include "inc/header.php"
?>

<?php
    $dbConn=mysqli_connect('localhost', 'root', '' , 'eshop');
    if(!$dbConn){
        die("Deshtoi lidhja me DB " .mysqli_error($dbConn));
    }
        if(isset($_POST['submit'])){
            $emri=$_POST['emri'];
            $mbiemri=$_POST['mbiemri'];
            $email=$_POST['email'];
            $country=$_POST['country'];
            $age=$_POST['age'];
            $mesazhi=$_POST['mesazhi'];
            
            $sql="INSERT INTO `contact`(emri, mbiemri, email, country, age, mesazhi) VALUES ";
            $sql.="('$emri','$mbiemri', '$email', '$country', '$age', '$mesazhi')";   
            $contakti=mysqli_query($dbConn,$sql);
            if(!$contakti){
                die("Deshtoi te regjistrohet anetari " .mysqli_error($dbConn));
            }
        }
    
?>
    
         
        
    <div class="contact-content">
        
        <h3 class="title">Contact Information</h3>
        <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
             Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
        <div class="contact-form">
            <form action="" id="contakti" class="box" method="post">
                
                <input type="text" id="emri" name="emri" placeholder="emri">
                
                <input type="text"  id="mbiemri" name="mbiemri" placeholder="mbiemri">
                
                <input type="email"  id="email" name="email" placeholder="email">
                
                <input type="text"  id="country" name="country" placeholder="country">

                <textarea type="text" id="mesazhi" name="mesazhi" cols="10" rows="6" placeholder="mesazhi" ></textarea>
                    <div class="col-span">
                        <input type="number" name="age" id="contact-age" placeholder="Age">
                    </div>
                </div>
                
                <input type="submit" name="submit" value="submit" id="submit">
            
            </form>
        </div>
    </div>
    <?php
        include "inc/footer.php";
    ?>
</body>
</html>