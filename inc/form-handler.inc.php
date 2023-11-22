<?php
  // =============================================================================== //
  // ===================== GERENCIAR FORMULÁRIOS COM SEGURANÇA ===================== //

  // Verificar se arquivo foi acessado corretamente:
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Capturar e dados em entidades HTML por exemplo:
    // caractere & vira em HTML -> &amp
    $username   = htmlspecialchars($_POST["username"]);
    $num_fibra  = filter_var($_POST["num_fibra"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd        = filter_var($_POST["pwd"],        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cmdt_code  = filter_var($_POST["cmdt_code"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cmdt_code  = $cmdt_code !== '' ? $cmdt_code : null;
    $cmdt_radio = $_POST["cmdt_radio"];

    // Instanciar as classes e banco de dados
    require_once "class-autoloader.inc.php";
    require_once "class/signup.class.php";
    require_once "class/signup-controller.class.php";
    $signup = new signupController($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code);

    // Inserir usuário / gerenciar erros
    $signup->signupUser();
  } else {
    header("Location: ../dist/cadastro.php");
    exit();
  }