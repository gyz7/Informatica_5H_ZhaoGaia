<html>
<?php
require ('function.php');
session_start();
$erusername=$erpassword='';
$username=$password='';
$email=$eremail='';

			if(!isset($_REQUEST["Submit"]))
            {
				form2($erusername,$erpassword,$eremail);
				$_SESSION["username"]=$username;
            }
                
            else{
				// Dichiarazione delle variabili per lo username e la password inseriti dall'utente
				
				$username=$_POST["username"];
                $password=$_POST["password"];
				$email=$_POST["email"];
				$_SESSION["username"]=$username;
				
				checkusername($username,$erusername);
				checkpassword($password,$erpassword);
				//checkemail
				//Connessione al database
				insertutente($username,$password,$email);
?>
				<a href="paginariservata.php">Area riservata</a>
<?php
                }
?>	



</html>
