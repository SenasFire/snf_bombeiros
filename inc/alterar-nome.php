<?php
session_start();
require_once "class/dbh.class.php";
$dbh = new Dbh();

$nome = $_POST["nome"];
$fibra = $_POST["fibra"];
$pwd = $_POST["pwd"];
$id = $_SESSION["usuario_id"];

$sql = "UPDATE usuarios_socorristas SET usuarios_username = :nome, usuarios_pwd = :pwd, usuarios_num_fibra = :num_fibra WHERE usuarios_id = :id";
$stmt = $dbh->connect()->prepare($sql);

$stmt->bindParam(":nome", $nome);
$stmt->bindParam(":pwd", $pwd);
$stmt->bindParam(":num_fibra", $fibra);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);

$stmt->execute();

if($stmt) {
    header("Location: ../dist/adm/perfil.php?success=usuario-alterado");
    exit();
} else {
    header("Location: ../dist/adm/perfil.php?error=erro-alterar");
    exit();
}

