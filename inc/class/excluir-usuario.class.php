<?php
require_once "dbh.class.php";
require_once "usuario-db.class.php";
$dbh = new Dbh();

$id = $_GET["id"];

$sql = "DELETE FROM usuarios_socorristas WHERE usuarios_id = :id";
$stmt = $dbh->connect()->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
header("Location: ../../dist/adm/main_admin.php");

?>