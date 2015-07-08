<?php
require_once('includes/functions.php');
secureAccess();

if(isset($_POST['title']) && isset($_POST['content'])){
	if(trim($_POST['title'])){
		//minuscule transformation
		$fileName= $_GET['edition'] ? $_GET['edition'] : strtolower(trim($_POST['title']));
		//listing of unwished Characters
		$originCharacters = 'àçéèêîôù';
		//listing of wished Characters in the same order
		$destinCharacters = 'aceeeiou';
		$fileName = strtr($fileName, $originCharacters, $destinCharacters);
		//regular expression
		$fileName = preg_replace('/[^a-z0-9-]/', '-', $fileName); 
		$fileName = 'posts/'.$fileName.'.md';
		//création metaData for title
		$metaData['title'] = $_POST['title'];
		//conversion our Table in Characters sentence with JSON format
		$fileContent = json_encode($metaData)."/n";
		//we add the content with a security through the function strip_tags that is getting out all Html and Php characters
		$fileContent .= strip_tags($_POST['content']);
		//file_put_contents write the all content $fileContent in the file $fileName
		if (file_put_contents($fileName, $fileContent)) {
			header('Location: main.php');
			die();
		}else{
			$erreur = "Impossible d'enregistrer le fichier ".$fileName;
		}
	}else{
		$erreur = "Titre insuffisant.";
	}
}elseif (array_key_exists('edition', $_GET) && $_GET['edition']) {
		$fileContent= file_get_contents('posts/'.$_GET['edition'].'.md');
		$explodedContent = explode("\n", $fileContent, 2);
		//dé-sérialiser les métadonnées avec option true (tb associatif, par défaut, c'est un objet)
		$metaData = json_decode($explodedContent[0], true);
		$content= $explodedContent[1];
}
$page['title']= 'Création / Édition d\'articles';
$page['windowTitle']='Article';

require_once('includes/header.php');

?>
	<form method="post">
		<label for= "title">Titre de l'article</label><input id="title" name="title"
<?php
if (isset($metaData['title'])) echo 'value="'.$metaData['title'].'"';
?>
><br>
		<label for= "content">Contenu</label><br>
		<textarea id= "content" name = "content" rows="25" cols="60">
<?php
if ($content) echo $content;
?>
		</textarea><br>
		<input type="submit">
	</form>
<?php
require_once('includes/footer.php');