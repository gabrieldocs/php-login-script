<?php
$server = 'db-homebrew.mysql.uhserver.com';
$username = 'gabrieldocs';
$password = '@Lajg32d559862';
$database = 'db_homebrew';

try{
	$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch(PDOException $e){
	die( "Connection failed: " . $e->getMessage());
}