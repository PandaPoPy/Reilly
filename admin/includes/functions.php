<?php
/**
 * Permet au client de s'authentifier en tant qu’administrateur, selon sa 
 * session.
 * @return page authentification si KO
 */
function secureAccess() {
	session_start();
	if (!checkAccess()){
		header('Location: index.php');
		die();
	}
}
/**
 * Indique si le client est authentifié en tant qu’administrateur, selon sa 
 * session.
 * @return bool
 */
function checkAccess(){
	return ($_SESSION['username']=='admin');
}
?>