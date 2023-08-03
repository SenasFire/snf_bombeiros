<?php

  date_default_timezone_set('America/Sao_Paulo');

  // PDO declaration:
  try {
    $pdo = new PDO("mysql:dbname=snf_bombeiros;host=localhost;charset=utf8","root","");
  }
  catch (PDOException $erro) {
    echo("Erro na conexão:<br>".$erro->getMessage());
  }

?>