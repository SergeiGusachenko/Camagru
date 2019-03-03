<?php
include 'database.php';
session_start();
session_destroy();
try {
	$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $requete = $bdd->prepare("SELECT * FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = :db_name");
		$requete->bindParam(':db_name', $DB_NAME);
		$requete->execute();
		$code = $requete->fetchAll(PDO::FETCH_ASSOC);
    }
	catch (PDOException $e) {
		print "Erreur : ".$e->getMessage()."<br/>";
		die();
	}
if ($code == NULL)
{
	try
	{
		$bdd = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$bdd->query("CREATE DATABASE IF NOT EXISTS $DB_NAME");
		$bdd->query("use $DB_NAME");
	}
	catch (PDOException $e) {
		print "Error : ".$e->getMessage()."<br/>";
		die();
	}
	header('Location: ../server.php');
}
else {
	header('Location: ../server.php');
}
?>