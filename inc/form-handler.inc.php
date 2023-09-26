<?php
  // =============================================================================== //
  // ===================== GERENCIAR FORMULÁRIOS COM SEGURANÇA ===================== //

  // Não acessar a página pela estrutura de pastas, se isso acontecer manda pro else
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Converter dados em entidades HTML por exemplo:
    // caractere & vira em HTML -> &amp
    $username  =   filter_var($_POST["username"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $num_fibra =   filter_var($_POST["num_fibra"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $pwd       =   filter_var($_POST["pwd"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

  } else {
    header("Location: ../dist/cadastro.php");
    exit();
  }

  // ============================================================== //
  // Se os inputs estiverem vazios alterar estado para exibir erro: //
  if (empty($username) || empty($num_fibra) || empty($pwd)) {
    header("Location: ../dist/cadastro.php?submit_state=empty_input");
    exit();
  } else {
    header("Location: ../dist/cadastro.php?submit_state=success");
  }