<?php
  // =============================================================================== //
  // ===================== GERENCIAR FORMULÁRIOS COM SEGURANÇA ===================== //

  // Verificar se arquivo foi acessado corretamente:
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Converter dados em entidades HTML por exemplo:
    // caractere & vira em HTML -> &amp
    $username   = filter_var($_POST["username"],   FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $num_fibra  = filter_var($_POST["num_fibra"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd        = filter_var($_POST["pwd"],        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cmdt_code  = filter_var($_POST["cmdt_code"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $cmdt_radio = $_POST["cmdt_radio"];

    try {
      require_once "class/dbh.class.php";
      require_once "class/signup-controller.class.php";

      $stmt = new signupController($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code);

      if ($stmt->isInputEmpty() === false ) {
        header("Location: ../dist/cadastro.php?submit_state=empty_input");
        exit();
      } else {
        header("Location: ../dist/cadastro.php?submit_state=success");
        exit();
      }
    } 
    catch (PDOException $erro) {
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
  } else {
    header("Location: ../dist/cadastro.php");
    exit();
  }