<?php
  date_default_timezone_set('America/Sao_Paulo');

  // Tipo do banco de dados, host, nome do banco de dados e codificação de charset para comunicação:
  $dsn = "mysql:host=localhost;dbname=snf_bombeiros;charset=utf8";
  $username = "root";

  $options = [
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Desabilitar emulação de consultas preparadas para segurança
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Alterar a exibição dos erros para formato de exceções
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Tornar o padrão de consultas PDO em array associativo
  ];

  // Declarar PDO:
  try {
    $pdo = new PDO($dsn,$username,"",$options);
    echo("Conexão sucedida");
  }
  catch (PDOException $erro) {
    exit("Erro na conexão:<br>".$erro->getMessage());
  }
?>