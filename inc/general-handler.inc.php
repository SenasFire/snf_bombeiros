<?php

  // =============================================================================== //
  // ===================== GERENCIAR FORMULÁRIOS COM SEGURANÇA ===================== //

  // Verificar se arquivo foi acessado corretamente:
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
  
    $tipo_cadastro = $_GET["action"];

    if($tipo_cadastro === "cadastrar-usuario") {
      // Capturar e dados em entidades HTML por exemplo:
      // caractere & vira em HTML -> &amp
      $username   = htmlspecialchars($_POST["username"]);
      $num_fibra  = filter_var($_POST["num_fibra"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $pwd        = filter_var($_POST["pwd"],        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $cmdt_code  = filter_var($_POST["cmdt_code"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $cmdt_radio = $_POST["cmdt_radio"];

      // Instanciar as classes e banco de dados
      require_once "class/dbh.class.php";
      require_once "class/signup.class.php";
      require_once "class/usuario-db.class.php";
      $signup = new SignupAdm($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code);

      // Inserir usuário / gerenciar erros
      $signup->signupUser();
    }
    else {
      $doc_name   = htmlspecialchars($_POST["doc_name"]);
      $doc_cpf    = htmlspecialchars($_POST["doc_cpf"]);
      $doc_pwd    = filter_var($_POST["doc_pwd"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $doc_email  = filter_var($_POST["doc_email"], FILTER_VALIDATE_EMAIL);

      // Instanciar as classes e banco de dados
      require_once "class/dbh.class.php";
      require_once "class/signup.class.php";
      require_once "class/usuario-db.class.php";

      $doc_signup = new SignupMedic($doc_name, $doc_cpf, $doc_pwd, $doc_email);
      $doc_signup->signupMedic();
    }
  } 
  else {
    $json_texto = json_encode(["error" => "Algo deu errado..."]);
    header('Content-Type: application/json'); // Definir o cabeçalho como JSON
    echo $json_texto;
    exit();
  }