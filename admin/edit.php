<?php
session_start();

if ($_SESSION['username'] != 'admin'){
	header('Location: index.php');
	die();
}

if(isset($_POST)){
	if(trim($_POST['title'])){
		$fileName= strtolower(trim($_POST['title']));
		$originCharacters = 'àçéèêîôù';
		$destinCharacters = 'aceeeiou';
		$fileName = strtr($fileName, $originCharacters, $destinCharacters);
		$fileName = preg_replace('/[^a-z0-9-]/', '-', $fileName); 
		$fileName = 'posts/'.$fileName.'.md';
	}else{
		$erreur = "Titre insuffisant.";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projet REILLY - Administration - Edition</title>
	<meta charset= "utf-8">
	<meta name= "viewport" content="width= device-width, initial-scale= 1.0">
</head>
<body>
	<h2>Édition / Création d'article</h2>
<?php
if(isset($erreur)) {
    echo '<p class="error">'.$erreur.'</p>';
}
?>
	<form method="post">
		<label for= "title">Titre de l'article</label><input id="title"><br>
		<label for= "content">Contenu</label><br>
		<textarea id= "content" rows="25" cols="60"></textarea><br>
		<input type="submit">
	</form>
</body>
</html>