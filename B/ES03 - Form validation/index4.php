
<!DOCTYPE HTML>  
<html>
<style>
.error {color: #FF0000;}
</style>

<body>
        <?php
            $lnameErr = $fnameErr = $emailErr = $passwordErr = $nicknameErr = $comuneErr = $capErr = "";
            $lname= $fname = $email = $password = $nickname = $address = $comune = $cap = $phone = $birthday= $citta="";
            $cont=0;
            //funzioni di controllo
            function checkfnome(&$fname, &$fnameErr, &$var,&$cont)
            {
                $fname = trim($var);
                $fname = stripslashes($var);
                $fname = htmlspecialchars($var);
                if (!preg_match("/^[a-zA-Z]*$/",$fname)) {
                    $fnameErr= "Inserire un cognome valido";
                }
                else{
                    $cont++;
                }
            }
            function checklnome(&$lname, &$lnameErr, &$var, &$cont)
            {
                $lname = trim($var);
                $lname = stripslashes($var);
                $lname = htmlspecialchars($var);
                if (!preg_match("/^[a-zA-Z]*$/",$lname)) {
                    $fnameErr= "Inserire un nome valido";
                }
                else{
                    $cont++;
                }
            }
            function checkpassword(&$password, &$passwordErr, &$var, &$cont)
            {
                $password = trim($var);
                $password = stripslashes($var);
                $password = htmlspecialchars($var);
                if (!preg_match("/^[a-zA-Z0-9._!?+-]{8,}$/",$password)) {
                    $passwordErr= "Deve contenere almeno 8 caratteri'";
                }
                else{
                    $cont++;
                }
            }
            function checkemail(&$email, &$emailErr, &$var, &$cont)
            {
                $email = trim($var);
                $email = stripslashes($var);
                $email = htmlspecialchars($var);
                if (!preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/",$email)) {
                    $emailErr = "Inserire un email valido'";
                }
                else{
                    $cont++;
                }
            }
            function checknickname(&$nickname, &$nicknameErr, &$var, &$cont)
            {
                $nickname = trim($var);
                $nickname = stripslashes($var);
                $nickname = htmlspecialchars($var);
                if (!preg_match("/^[a-zA-Z0-9_-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,}$/",$nickname)) {
                    $emailErr = "Inserire un nickname valido";
                }
                else{
                    $cont++;
                }
            }
            function checkcomune(&$comune,&$comuneErr,&$var, &$cont)
            {
                $comune = trim($var);
                $comune = stripslashes($var);
                $comune = htmlspecialchars($var);
                if (!preg_match("/^[a-zA-Z ]*$/",$comune)) {
                    $comuneErr = "Inserire un comune valido";
                }
                else{
                    $cont++;
                }   
            }
            function checkcap(&$cap,&$capErr,&$var, &$cont)
            {
                $cap = trim($var);
                $cap = stripslashes($var);
                $cap = htmlspecialchars($var);
                if (!preg_match("/^[0-9]{5,5}$/",$cap)) {
                    $capErr = "Inserire un cap valido";
                }
                else{
                    $cont++;
                }   
            }
            function datiinseriti(&$fname,&$lname,&$email,&$phone,&$birthday,&$nickname,&$citta,&$address,&$comune,&$cap)
            {
                echo "<h2>I tuoi dati:</h2>";
                echo "Cognome: " . $fname;
                echo "<br>";
                echo "Nome: " . $lname;
                echo "<br>";
                echo "Email: " . $email;
                echo "<br>";
                echo "Cellulare: " . $phone;
                echo "<br>";
                echo "Data di nascita: " . $birthday;
                echo "<br>";
                echo "Nickname: " . $nickname;
                echo "<br>";
                echo "Citta': " . $citta;
                echo "<br>";
                echo "Indirizzo: " . $address;
                echo "<br>";
                echo "Comune: " . $comune;
                echo "<br>";
                echo "Cap: " . $cap;
                echo "<br>";
            }
            
        ?>

        <?php
            $c=0;
            if(isset($_REQUEST["Submit"]))
            {
                
                checkfnome($fname, $fnameErr, $_POST["fname"],$c);
                checklnome($lname, $lnameErr, $_POST["lname"],$c);
                checkpassword($password, $passwordErr, $_POST["password"],$c);
                checkemail($email, $emailErr, $_POST["email"],$c);
                checknickname($nickname, $nicknameErr, $_POST["nickname"],$c);
                checkcomune($comune, $comuneErr, $_POST["comune"],$c);
                checkcap($cap, $capErr, $_POST["cap"],$c);
            }


        ?>
        
        <?php
            if($c!=6)
            {
        ?>
                <h1>Log In</h1>
                <p><span class="error">* required field</span></p>
                <form method="POST" action="index4.php">
                    <label for="fname">Cognome:</label>
					<input type="text" name="fname"  id="fname" value="<?=$fname?>" placeholder="Cognome" required>
                    <span class="error">* <?php echo $fnameErr;?></span>
					<br>
					<br>
                    <label for="lname">Nome:</label>
					<input type="text" id="lname" name="lname" value="<?=$lname?>" placeholder="Nome" required>
                    <span class="error">* <?php echo $lnameErr;?></span>
					<br>
					<br>
                    <label for="password" type="password">Password:</label>
					<input type="password" id="password" name="password" placeholder="Password" required>
                    <span class="error">*<?php echo $passwordErr;?></span>
					<br>
					<br>
					<label for="email" type="email">Email:</label>
					<input type="email" id="email" name="email" value="<?=$email?>" placeholder="Email"required>
                    <span class="error">* <?php echo $emailErr;?></span>
					<br>
					<br>
                    <label for="phone">Numero di cellulare:</label>
					<input type="tel" id="phone" name="phone" value="<?=$phone?>" placeholder="0123456789" pattern="[0-9]{10}" >
                    <br>
					<small>Format: 0123456789</small>
					<br>
					<br>
					<label for="birthday">Data di nascita:</label>
					<input type="date" id="birthday" name="birthday" required>
                    <span class="error">*</span>
					<br>
					<br>
					<label for="nickname" type="text">Nickname:</label>
					<input type="text" id="nickname" name="nickname" value="<?=$nickname?>" placeholder="Nickname" >
                    <span class="error"><?php echo $nicknameErr;?></span>
                    <br><br> 
                    <tr><td>Città:</td><td>
                    <select name="citta" required>
                    <option>- Seleziona la tua città -</option>
                    <option value="Roma">Roma</option>
                    <option value="Milano">Milano</option>
                    <option value="Napoli">Napoli</option>
                    <option value="Firenze">Firenze</option>
                    <option value="Bologna">Bologna</option>
                    </select>
                    <span class="error">*</span>
                    <br><br>
                    <label for="indirizzo">Indirizzo:</label>
					<input type="text" id="address" name="address" value="<?=$address?>" placeholder="Indirizzo" required>
                    <span class="error">*</span> <br><br>
                    <label for="comune">Comune:</label>
					<input type="text" id="comune" name="comune" value="<?=$comune?>" placeholder="Comune" required>
                    <span class="error">*<?php echo $comuneErr;?></span><br><br>
                    <label for="cap">Cap:</label>
					<input type="text" id="cap" name="cap" value="<?=$cap?>" placeholder="Cap" required>
                    <span class="error">*<?php echo $capErr;?></span>
                    <br>
					<br>
					<input type="submit" name="Submit">
					<input type="reset" name="Reset">
				</form>

        <?php
            }
            else{
                
                $cog=$_POST["fname"];
                $nom=$_POST["lname"];
                $Psd=$_POST["password"];
                $ema=$_POST["email"];
                $tel=$_POST["phone"];
                $com=$_POST["birthday"];
                $nick=$_POST["nickname"];
                $ind=$_POST["address"];
                $cit=$_POST["citta"];
                $comu=$_POST["comune"];
                $ca=$_POST["cap"];
                if($cog=='zhao'&& $nom=='gaia')
                {
                    echo '<h2>Welcome Back!</h2>'.'     '.$cog.' '.$nom;
                    if($Psd=='123456789')
                    {
                        echo ' '.("le sue credenziali sono corretti");
                        datiinseriti($cog,$nom,$ema,$tel,$com,$nick,$cit,$ind,$comu,$ca);
    ?>
                        <br>
                        <br>
                        <input type="button" value="Back" onClick="history.go(-1);return true;">
    <?php
                    }
                    else
                    {
                        echo ' '.("le sue credenziali non sono corretti"); 
    ?>
                        <br>
                        <br>
                        <input type="button" value="Back" onClick="history.go(-1);return true;">
    <?php
                    }
                }
                else{
                    echo 'LOGIN ERRATO';
                    echo ' '.("i suoi cognome/nome sono errati");
    ?>				
                    <br>
                    <br>
                    <input type="button" value="Back" onClick="history.go(-1);return true;">
    <?php				
                }
            }
        ?>


</body>
</html>

        
