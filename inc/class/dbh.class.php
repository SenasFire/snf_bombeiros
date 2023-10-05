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
    }
    catch (PDOException $erro) {
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
    return $pdo;
  }

  protected function getConnectionDetails() {
    $dsn = "mysql:host=localhost;dbname=snf_bombeiros;charset=utf8";
    $pdo = new PDO($dsn, $this->username, $this->pwd, $this->options);

    $connectionDetails = [
        'Host' => $pdo->getAttribute(PDO::ATTR_CONNECTION_STATUS),
        'Database' => $pdo->query('SELECT DATABASE()')->fetchColumn(),
        'Driver' => $pdo->getAttribute(PDO::ATTR_DRIVER_NAME),
        'Server Info' => $pdo->getAttribute(PDO::ATTR_SERVER_INFO),
    ];

    echo '<pre>';
      print_r($connectionDetails);
    echo '</pre>';
  }
}

// Exibir os dados da conexão:
class getConnection extends Dbh {
  public function getConnection() {
    $this->getConnectionDetails();
  }
}

?>