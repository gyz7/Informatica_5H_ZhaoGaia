<html>

<?php       
            
            function checkusername(&$username, &$erusername)
            {
                $username=$_POST['username'];
                $username = trim($username);
                if ($username=="") {
                    $erusername= "campo username obbligatorio";
                    return 0;
                }
            }
            function checkpassword(&$password, &$erpassword)
            {
                $password=$_POST['password'];
                $password = trim($password);
                if ($password=="") {
                    $erpassword= "campo password obbligatorio'";
                    return 0;
                }
            }
			
			function connectionDB(&$username,&$password)
            {
				try {
					$pdo = new PDO("mysql:host=localhost;dbname=es05", 'GAIA', 'ok123456');
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					// Preparazione della query di selezione
					$stmt = $pdo->prepare("SELECT * FROM utente WHERE username = :username AND password = :password");
					$_SESSION['username']=$username;
					// Bind dei parametri
					$stmt->bindParam(':username', $username);
					$stmt->bindParam(':password', $password);
					// Esecuzione della query
					$stmt->execute();
					// Controllo se vi sono risultati
					if ($stmt->rowCount() > 0) {
					// ... // Autenticazione riuscita
					echo ' '.("Login eseguito correttamente");
?>
					<a href="paginariservata.php">Area riservata</a>
<?php
					} else {
					// ... // Autenticazione fallita
					echo ' '.("Attenzione! Utente non registrato");
?>					
					<a href="registrazione.php">Registrati</a>
<?php
					}
					$pdo = null; // Chiudi la connessione al database


				} catch (PDOException $e) {
					echo "Failed to connect to MySQL: " . $e->getMessage();
				}
            }
            function insertutente(&$username,&$password,&$email)
            {
                try {
					$pdo = new PDO("mysql:host=localhost;dbname=es05", 'GAIA', 'ok123456');
					$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					// Preparazione della query di selezione
					$stmt = $pdo->prepare("INSERT INTO utente (username,password,email) VALUES ('$username','$password','$email')");
					$stmt->execute();
					$pdo = null; // Chiudi la connessione al database


				} catch (PDOException $e) {
					echo "Failed to connect to MySQL: " . $e->getMessage();
				}
            }
			function form(&$erusername,&$erpassword)
            {
				global $username,$password;
?>	
                
                <h1>Log In</h1>
				<h3>login here using your username and password</h3>
				<form method="POST" action="index1.php">
					<label for="username" type="text">Username</label>
					<input type="text" id="username" name="username" placeholder="Username">
					<spam class="error"><?php echo $erusername;?></spam>
					<br>
					<br>
					<label for="password" type="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Password">
					<spam class="error"><?php echo $erpassword;?></spam>
					<br>
					<br>
					<input type="submit" name="Submit">
				</form>
                
<?php
			}
			function form2(&$erusername,&$erpassword,&$eremail)
			{
?>
				<h1>Pagina di registrazione</h1>
				
				<form method="POST" action="registrazione.php">
					<label for="username" type="text">Username</label>
					<input type="text" id="username" name="username" placeholder="Username">
					<spam class="error">* <?php echo $erusername;?></spam>
					<br>
					<br>
					<label for="password" type="password">Password</label>
					<input type="password" id="password" name="password" placeholder="Password">
					<spam class="error">* <?php echo $erpassword;?></spam>
					<br>
					<br>
					<label for="email" type="email">Email:</label>
					<input type="email" id="email" name="email"  placeholder="Email"required>
                    <span class="error">* <?php echo $eremail;?></span>
					<br>
					<br>
					<input type="checkbox" name="Privacy Accettata" value="privacy" required>
					<label for="Privacy Accettata" class="copy">
					<a href="index1.php" target="nw" > Ho letto e accetto l'Informativa sulla Privacy </a>
					</label>
					<br>
					<br>
					<input type="submit" name="Submit">
				</form>
		<?php
			}
		?>

            


</html>
