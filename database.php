<?php
$DB_DSN = 'mysql:host=localhost';
$DB_USER = 'root';
$DB_PASSWORD = 'root';
$DB_NAME = 'registration';
function create_user_table($bdd)
{
$bdd->query("CREATE TABLE IF NOT EXISTS registration (
	id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	token VARCHAR(100) NOT NULL 
    pwd VARCHAR(100) NOT NULL ,)");
}
?>