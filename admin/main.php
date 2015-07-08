<?php
$page['title']= 'Accueil';
$page['windowTitle']='Gestion des Articles';
require_once('includes/functions.php');
secureAccess();

require_once('includes/header.php');
?>
<p><a href="edit.php">Créer un nouvel article</a></p>
	<table border = 1>
		<tr><th>Titre</th><th>Actions</th></tr>
		<tr><td>Lipsem dorem</td>
			<td><a href="edit.php">Modifier</a> - <a href="main.php">Supprimer</a></td>
		</tr>
		<tr><td>Lipsem dorem</td>
			<td><a href="edit.php">Modifier</a> - <a href="main.php">Supprimer</a></td>
		</tr>
	</table>
<?php
require_once('includes/footer.php');