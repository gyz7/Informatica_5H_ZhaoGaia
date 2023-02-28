<html>
        
    <body>
        <?php
		require ('function.php');
		session_start();
		/*$_SESSION['pag_count']++; echo $_SESSION['pag_count'];*/
			$erusername=$erpassword='';
			$username=$password='';

            if(!isset($_REQUEST["Submit"]))
            {
				form($erusername,$erpassword);
				$_SESSION["username"]=$username;
            }
                
            else{
				// Dichiarazione delle variabili per lo username e la password inseriti dall'utente
				$username=$_POST["username"];
                $password=$_POST["password"];
				$_SESSION["username"]=$username;
				
				checkusername($username,$erusername);
				checkpassword($password,$erpassword);
				//checkemail
				//Connessione al database
				connectionDB($username,$password);
                }
        ?>

    </body>
</html>
