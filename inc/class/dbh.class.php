<?php

date_default_timezone_set('America/Sao_Paulo');

class Dbh {
  private $username = "root";
  private $pwd = "";
  private $options = [
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Desabilitar emulação de consultas preparadas para segurança
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Alterar a exibição dos erros para formato de exceções
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Tornar o padrão de consultas PDO em array associativo
  ];

  // Conexão ao banco de dados (protected para extender depois):
  protected function connect() {
    $dsn = "mysql:host=localhost;dbname=snf_bombeiros;charset=utf8";

    try {
      $pdo = new PDO($dsn, $this->username, $this->pwd, $this->options);
      echo("Conexão sucedida <br>");
    }
    catch (PDOException $erro) {
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
    return $pdo;
  }
}
?>