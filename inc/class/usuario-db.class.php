<?php

// Instanciar as classes e banco de dados
require_once "dbh.class.php";
require_once "signup.class.php";
require_once "usuario-db.class.php";

class Usuario {
  private $id;
  private $username;
  private $num_fibra;
  private $cmdt_radio;
  private $cmdt_code;

  public function __construct($id, $username, $num_fibra, $cmdt_radio, $cmdt_code) {
    $this->id   = $id;
    $this->username   = $username;
    $this->num_fibra  = $num_fibra;
    $this->cmdt_radio = $cmdt_radio;
    $this->cmdt_code  = $cmdt_code;
  }

  public function getId() {
    return $this->id;
  }

  public function getNome() {
    return $this->username;
  }

  public function getFibra() {
    return $this->num_fibra;
  }

  public function getCmdt() {
    return $this->cmdt_radio;
  }

  public function getCmdtCode() {
    return $this->cmdt_code;
  }
}

// =============================================================================== //
// ======== Somente pode ser acessado por administradores já cadastrados: ======== //

class UsuarioDB extends Dbh {

  public function listarUsuarios() {
    $sql = "SELECT * FROM usuarios_socorristas";
    
    try {
      $stmt = $this->connect()->prepare($sql);

      // Se o execute retornar falso o código dentro do IF será executado --------- :
      if(!$stmt->execute()) {
        $stmt = null;
        header("Location: ../dist/main_admin.php?error=stmt-failed");
        exit();
      }
    } catch (PDOException $erro) {
      $stmt = null;
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
    $usuarios = [];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $usuario = new Usuario($row['usuarios_id'], $row['usuarios_username'], $row['usuarios_num_fibra'], $row['usuarios_e_cmdt'], $row['usuarios_cmdt_cod']);
      $usuarios[] = $usuario;
    }

    return $usuarios;
  }

  // =========================== LISTAR OS MÉDICOS:
  public function listarMedicos() {
    $sql = "SELECT * FROM usuarios_medicos";

    try {
      $stmt = $this->connect()->prepare($sql);

      // Se o execute retornar falso o código dentro do IF será executado --------- :
      if(!$stmt->execute()) {
        $stmt = null;
        header("Location: ../dist/main_admin.php?error=stmt-failed");
        exit();
      }
    } catch (PDOException $erro) {
      $stmt = null;
      exit("Erro na conexão:<br>".$erro->getMessage());
    }
    $medicos = [];

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $medico = new Medico($row['medicos_id'], $row['medicos_nome'], $row['medicos_cpf'], $row['medicos_pwd'], $row['medicos_email']);
      $medicos[] = $medico;
    }

    return $medicos;
  }
}

class SignupAdm extends Signup {
  private $username;
  private $num_fibra;
  private $pwd;
  private $cmdt_radio;
  private $cmdt_code;

  public function __construct($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code) {
    $this->username   = $username;
    $this->num_fibra  = $num_fibra;
    $this->pwd        = $pwd;
    $this->cmdt_radio = $cmdt_radio;
    $this->cmdt_code  = $cmdt_code;
  }

  public function signupUser() {

    if ($this->isInputEmpty() == true) {
      // Input vazio!
      header("Location: ../dist/adm/cadastrar_admin.php?error=empty-input");
      exit();
    }
    if ($this->checkNumFibra() == true) {
      // Input vazio!
      header("Location: ../dist/adm/cadastrar_admin.php?error=code-taken");
      exit();
    }

    $this->setUser($this->username, $this->num_fibra, $this->pwd, $this->cmdt_radio, $this->cmdt_code);
  }

  // =============================================================================== //
  // ======== Se os inputs estiverem vazios alterar estado para exibir erro ======== //
  private function isInputEmpty() {

    if (empty($this->username) || empty($this->num_fibra) || empty($this->pwd) || (!isset($this->cmdt_radio)) || $this->cmdt_radio === "sim" && empty($this->cmdt_code)) {
      $result = true;
    } else {  
      $result = false;
    }
    return $result;
  }

  // =============================================================================== //
  // ========= Verificar se o código número fibra é repetido, já foi usado ========= //
  private function checkNumFibra() {

    if ($this->isCodeTaken($this->num_fibra, $this->cmdt_code)) {
      $result = true;
    } else {
      $result = false;
    }
    return $result;
  }
}

class Medico {
  private $doc_id;
  private $doc_name;
  private $doc_cpf;
  private $doc_pwd;
  private $doc_email;

  public function __construct($doc_id, $doc_name, $doc_cpf, $doc_pwd, $doc_email) {
    $this->doc_id   = $doc_id;
    $this->doc_name   = $doc_name;
    $this->doc_cpf    = $doc_cpf;
    $this->doc_pwd    = $doc_pwd;
    $this->doc_email  = $doc_email;
  }

  public function getId() {
    return $this->doc_id;
  }

  public function getNome() {
    return $this->doc_name;
  }

  public function getCpf() {
    return $this->doc_cpf;
  }

  public function getPwd() {
    return $this->doc_pwd;
  }

  public function getMail() {
    return $this->doc_email;
  }

}

class SignupMedic extends Signup {
  private $doc_name;
  private $doc_cpf;
  private $doc_pwd;
  private $doc_email;

  public function __construct($doc_name, $doc_cpf, $doc_pwd, $doc_email) {
    $this->doc_name   = $doc_name;
    $this->doc_cpf    = $doc_cpf;
    $this->doc_pwd    = $doc_pwd;
    $this->doc_email  = $doc_email;
  }

  public function signupMedic() {
    if ($this->isInputEmpty() == true) {
      // Input vazio!
      header("Location: ../dist/adm/cadastrar_admin.php?error=empty-input");
      exit();
    }

    $this->setDoctor($this->doc_name, $this->doc_cpf, $this->doc_pwd, $this->doc_email);
  }

  private function isInputEmpty() {

    if (empty($this->doc_name) || empty($this->doc_cpf) || empty($this->doc_pwd) || (!isset($this->doc_email))) {
      $result = true;
    } else {  
      $result = false;
    }
    return $result;
  }

}

class DBoperations extends Dbh {
  private $id;

  public function __construct($id)
  {
    $this->id = $id;
  }

  public function deletarUsuario() {
    $sql = "DELETE FROM usuarios_socorristas WHERE usuarios_id = :id";

    try {
      $pdo = $this->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      $stmt->execute();

      // Verifique se a exclusão foi bem-sucedida
      $rowCount = $stmt->rowCount();

      if ($rowCount > 0) {
        return ['success' => true];
      } else {
        return ['success' => false, 'error' => 'Nenhum usuário encontrado para excluir.'];
      }
    } catch (PDOException $e) {
      return ['success' => false, 'error' => 'Erro durante a exclusão: ' . $e->getMessage()];
    }
  }

  public function deletarMedico() {
    $sql = "DELETE FROM usuarios_medicos WHERE medicos_id = :id";

    try {
      $pdo = $this->connect();
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $this->id, PDO::PARAM_INT);
      $stmt->execute();

      // Verifique se a exclusão foi bem-sucedida
      $rowCount = $stmt->rowCount();

      if ($rowCount > 0) {
        return ['success' => true];
      } else {
        return ['success' => false, 'error' => 'Nenhum médico encontrado para excluir.'];
      }
    } catch (PDOException $e) {
      return ['success' => false, 'error' => 'Erro durante a exclusão: ' . $e->getMessage()];
    }
  }
}

if (isset($_GET['action'])) {
  if($_GET['action'] === 'listarUsuarios')
  {
    $usuarioDB = new UsuarioDB();
    $usuarios = $usuarioDB->listarUsuarios();

    $dadosUsuarios = [];

    foreach ($usuarios as $usuario):
      $dadosUsuario = [
        'id' => $usuario->getId(),
        'nome' => $usuario->getNome(),
        'fibra' => $usuario->getFibra(),
        'cmdt' => $usuario->getCmdt(),
        'cmdtCode' => $usuario->getCmdtCode(),
      ];
      $dadosUsuarios[] = $dadosUsuario;
    endforeach;

    $json_texto = json_encode(["dadosUsuarios" => $dadosUsuarios]);
    echo($json_texto);  

    exit();
  } else if($_GET['action'] === 'listar-medicos') {
    $medico = new UsuarioDB();
    $medicos = $medico->listarMedicos();

    $dados_medicos = [];

    foreach ($medicos as $medico):
      $dados_medico = [
        'id' => $medico->getId(),
        'nome' => $medico->getNome(),
        'cpf' => $medico->getCpf(),
        'email' => $medico->getMail()
      ];
      $dados_medicos[] = $dados_medico;
    endforeach;

    $json_medicos = json_encode(["dados_medicos" => $dados_medicos]);
    echo($json_medicos);
  } else if ($_GET['action'] === 'excluir') {
    $id = $_GET["id"];

    $excluir = new DBoperations($id);
    $excluir->deletarUsuario();

    $response = ["success" => true];
    echo json_encode($response);
  } else if ($_GET['action'] === 'excluir-medico') {
    $id = $_GET["id"];

    $excluir = new DBoperations($id);
    $excluir->deletarMedico();

    $response = ["success" => true];
    echo json_encode($response);
  }
}