<?php

if($_SERVER["REQUEST_METHOD"] === "POST") {
  // Capturar e dados em entidades HTML por exemplo:
  // caractere & vira em HTML -> &amp
  $num_fibra  = filter_var($_POST["num_fibra"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
  $pwd        = filter_var($_POST["pwd"],        FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  // Instanciar as classes e banco de dados
  require_once "class/dbh.class.php";
  require_once "class/login.class.php";
  require_once "class/login-controller.class.php";
  $login = new loginController($num_fibra, $pwd);

  // Inserir usuário / gerenciar erros
  $login->loginUser();
} else {
  header("Location: ../dist/login.php");
  exit();
}

?>