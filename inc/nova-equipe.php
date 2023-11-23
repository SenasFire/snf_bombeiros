<?php

require_once "class/dbh.class.php";
$dbh = new Dbh();

if($_SERVER["REQUEST_METHOD"] === "POST") {
  $motorista = $_POST["motorista"];
  $primeiro_socorrista = $_POST["primeiro_socorrista"];
  $segundo_socorrista = $_POST["segundo_socorrista"];
  $terceiro_socorrista = $_POST["terceiro_socorrista"];
  $demandante = $_POST["demandante"];
  $nome_equipe = $_POST["nome_equipe"];

  $sql = "INSERT INTO equipes(equipe_nome, equipe_motorista, equipe_primeiro_socorrista, equipe_segundo_socorrista, equipe_terceiro_socorrista, equipe_demandante)
  VALUES ('$nome_equipe', $motorista, $primeiro_socorrista, $segundo_socorrista, $terceiro_socorrista, $demandante)";

  $stmt = $dbh->connect()->prepare($sql);
  $stmt->execute();

  if($stmt) {
    header("Location: ../dist/adm/cadastrar_admin.php?success=equipe-cadastrada");
  } else {
    header("Location: ../dist/adm/cadastrar_admin.php?eror=stmt-failed");
  }
}