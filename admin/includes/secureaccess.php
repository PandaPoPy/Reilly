<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] != 'admin'){
	header('Location: index.php');
	die();
}