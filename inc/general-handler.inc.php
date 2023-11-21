<?php
  
  // =============================================================================== //
  // ===================== GERENCIAR FORMULÁRIOS COM SEGURANÇA ===================== //

  // Verificar se arquivo foi acessado corretamente:
  
    $tipo_cadastro = $_GET["action"];

    if($tipo_cadastro === "cadastrar-usuario") {
      // Capturar e dados em entidades HTML por exemplo:
      // caractere & vira em HTML -> &amp
      $username   = htmlspecialchars($_POST["username"]);
      $num_fibra  = filter_var($_POST["num_fibra"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $pwd        = filter_var($_POST["pwd"],        FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $cmdt_code  = filter_var($_POST["cmdt_code"],  FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      $cmdt_code  = $cmdt_code !== '' ? $cmdt_code : null;
      $cmdt_radio = $_POST["cmdt_radio"];

      // Instanciar as classes e banco de dados
      require_once "class/dbh.class.php";
      require_once "class/signup.class.php";
      require_once "class/usuario-db.class.php";
      $signup = new SignupAdm($username, $num_fibra, $pwd, $cmdt_radio, $cmdt_code);
      $signup->signupUser();

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

      $medico = new UsuarioDB();
      $doc_list = $medico->listarMedicos();
      
      $dados_medicos = [];

      foreach ($doc_list as $medico):
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
      exit();
    }
  