<?php
require_once "class/dbh.class.php";
$dbh = new Dbh();

$id = $_GET["id"];
$nome = $_POST["nome"];
$fibra = $_POST["num_fibra"];
$pwd = $_POST["pwd"];
$adm = $_POST["adm"];
$adm_code = $_POST["adm_code"];

$hashPwd = password_hash($pwd, PASSWORD_DEFAULT);

$sql = "UPDATE usuarios_socorristas SET usuarios_username = '$nome', usuarios_pwd = '$hashPwd', usuarios_num_fibra = '$fibra', usuarios_e_cmdt = '$adm', usuarios_cmdt_cod = '$adm_code' WHERE usuarios_id = :id";
$stmt = $dbh->connect()->prepare($sql);
$stmt->bindParam(":id", $id, PDO::PARAM_INT);
$stmt->execute();

if($stmt) {
    header("Location: ../dist/adm/visualizar_bombeiro.php?success=usuario-alterado&id=$id");
    exit();
} else {
    header("Location: ../dist/adm/visualizar_bombeiro.php?error=erro-alterar&id=$id");
    exit();
}

