<!DOCTYPE html>
<html>
<head>
	<title>Projet REILLY - Administration - <?php echo $page['windowTitle'];?></title>
	<meta charset= "utf-8">
	<meta name= "viewport" content="width= device-width, initial-scale= 1.0">
</head>
<body>
	<h1>Administration</h1>
	<div><a href= "indoex.html">Terminer la session</a></div>
	<h2><?php echo $page['title'];?></h2>
<?php
if(isset($erreur)) {
    echo '<p class="error">'.$erreur.'</p>';
}
?>