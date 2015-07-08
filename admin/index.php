<?php
session_start();

if(isset($_SESSION['username'])){
    if ($_SESSION['username']=='admin'){
	header('Location: main.php');
	die();
	}
}

if (isset($_POST['username']) && isset($_POST['password'])){
	if ($_POST['username']=='admin' && $_POST['password']=='popy'){
		$_SESSION['username']=$_POST['username'];
		header('Location: main.php');
		die();
	}else{
		$erreur = "Nom d'utilisateur ou Mot de passe incorrect.";
	}
}
/*
if(isset($_GET['deconnexion'])) {
    $_SESSION = [];
    header('Location: index.php');
    die();
}

if(is_admin()) {
    header('Location: main.php');
    die();
}
*/
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projet REILLY - Administration - Authentification</title>
	<meta charset= "utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h1>Accès contrôlé</h1>
	<form method="post">
<?php
if(isset($erreur)) {
    echo '<p class="error">'.$erreur.'</p>';
}
?>
	<div><label for="id_user">Nom d'utilisateur Administrateur :</label>
         <input type = "text" name="username" id="id_user" />
    </div>
    <div><label for="id_password">Mot de passe d’administration :</label>
         <input type="password" name="password" id="id_password" />
    </div>
    <div><input type="submit" value="Connexion" /></div>
	</form>	
</body>
</html>