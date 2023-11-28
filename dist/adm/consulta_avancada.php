<?php
  include("../../inc/class/dbh.class.php");
  include("../../inc/class/usuario-db.class.php");
  include("../../inc/class/login.class.php");
  $dbh = new Dbh();

  session_start();
  $id_usuario = $_SESSION['usuario_id'];

  if(!isset($id_usuario)) {
    header("Location: ../login.php?error=invalid-access");
  }

  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Recupera os valores dos campos do formulário
    $tp_consulta = isset($_GET['tp_consulta']) ? $_GET['tp_consulta'] : '';
    $date = isset($_GET['date']) ? $_GET['date'] : '';
    $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
    $local = isset($_GET['local']) ? $_GET['local'] : '';
    $num_fibra = isset($_GET['num_fibra']) ? $_GET['num_fibra'] : '';

    if($tp_consulta === "") {
      $error = "Tipo de consulta não foi selecionado";
    }

    if (isset($_GET['reset'])) {
      // Se o botão Reset foi clicado, redefine os valores para vazios ou padrões
      $tp_consulta = '';
      $date = '';
      $nome = '';
      $local = '';
      $num_fibra = '';
  
      // Redireciona o usuário para a mesma página para reiniciar a consulta
      header("Location: {$_SERVER['PHP_SELF']}");
      exit();
    }
    
    // Aqui você pode usar os valores para construir e executar sua consulta SQL
    // Exemplo de consulta básica:
    if($tp_consulta === "ocorrencia") {
      $sql = "SELECT ocorrencia_id AS 'ID', ocorrencia.nome_paciente AS 'Paciente', ocorrencia.cpf AS 'CPF do Paciente', ocorrencia.data AS 'Data', ocorrencia.local_ocorrencia AS 'Local' FROM ocorrencia WHERE nome_paciente LIKE '%$nome%' AND local_ocorrencia LIKE '%$local%' AND data LIKE '%$date%'";
    }
    if($tp_consulta === "usuarios_socorristas") {
      $sql = "SELECT * FROM usuarios_socorristas WHERE usuarios_username LIKE '%$nome%' OR usuarios_num_fibra = '$num_fibra'";
    }
    if($tp_consulta === "alertas_e_noticias") {
      $sql = "SELECT noticia_nome AS 'Título', noticia_imagem FROM alertas_e_noticias WHERE noticia_nome LIKE '%$nome%' AND data_noticia = '$date'";
    }

    // Execute a consulta e processe os resultados...
    // $stmt = $dbh->prepare($sql);
    // $stmt->execute();
    // $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(isset($sql)) {
      $stmt = $dbh->connect()->prepare($sql);
      $stmt->execute();
      $resultado = $stmt->fetch();
    }
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="Website Icon" type="png" href="../../public/images/logo-noar.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../output.css">
  <script src="../../inc/js/nav_script.inc.js" defer></script>
  <script src="../../inc/js/crud_adm.inc.js" defer></script>
  <script type="text/javascript" src="../../jquery-1.8.2.min.js"></script>

  <title>Consulta Avançada</title>
</head>
<body>
  <?php include("../../inc/views/nav-admin.inc.php"); ?>
  <main class="flex flex-col px-16 py-8 gap-8 self-stretch items-start justify-start w-full h-max font-poppins lg:h-screen">
    <a onclick="window.history.back()" class='flex flex-row items-center justify-center cursor-pointer gap-2.5'>
      <img src="../../public/images/arrow_left.svg" alt="Flecha voltar">
      <p class="text-vermelho text-xl font-bold">Voltar</p>
    </a>
    
    <form id="formFiltro" method="GET" class="flex flex-col justify-between desktop:flex-row w-full gap-5 bg-input_color p-6" aria-label="Filtros" title="Ações e filtros">
      <section class="text-xl" title="Selecione os filtros">
        <div>
          <legend>Selecione o tipo de tabela que deseja filtrar</legend>
          <select name="tp_consulta" class="text-xl w-full">
            <option class="text-xl" value="None" disabled selected>Selecione:</option>
            <option class="text-xl" value="ocorrencia" 
              <?= isset($_GET['tp_consulta']) == true ? ($_GET['tp_consulta'] == 'ocorrencia' ? 'selected':''):'' ?>
            >
            Ocorrência</option>
            <option class="text-xl" value="usuarios_socorristas" 
              <?= isset($_GET['tp_consulta']) == true ? ($_GET['tp_consulta'] == 'usuarios_socorristas' ? 'selected':''):'' ?>
            >
            Bombeiro</option>
            
            <option class="text-xl" value="alertas_e_noticias" 
              <?= isset($_GET['tp_consulta']) == true ? ($_GET['tp_consulta'] == 'alertas_e_noticias' ? 'selected':''):'' ?>
            >
            Postagem</option>
          </select>
        </div>
      </section>
      <div class="gap-2.5 flex flex-col desktop:flex-row items-center w-full justify-center">
        <input name="date" class="p-4 w-full focus:outline-vermelho" value="<?= isset($_GET['date']) == true ? :'' ?>" class="focus:outline-vermelho" type="date">
        <input name="nome" class="p-4 w-full focus:outline-vermelho" type="text" placeholder="Nome">
        <input name="local" class="p-4 w-full focus:outline-vermelho" type="text" placeholder="Local">
        <input name="num_fibra" class="p-4 w-full focus:outline-vermelho" type="text" placeholder="Número Fibra">
      </div>
      
      <section class="flex flex-col laptop:flex-row gap-2.5" title="Botões">
        <button type="submit" class="px-6 py-4 gap-2.5 lg:text-2xl text-xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
        transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">
          Filtrar
        </button>
        <button onclick="resetarFormulario()" name="reset" class="px-6 py-4 gap-2.5 lg:text-2xl text-xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
        transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">
          Resetar
        </button>
      </section>
    </form>

    <?php
      if(isset($error)) {
        echo "
          <div class='error_message error flex bg-error_bg border-2 border-border_error flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch' title='Alerta' aria-label='Alerta'>
            <img src='../../public/images/alert-icon.svg' alt='Alerta'>
            <p class='text-sm text-vermelho font-poppins'>Erro ao consultar: Tipo de consulta não selecionado</p>
          </div>
        ";
      }
    ?>
    
    <section class="flex flex-col gap-2.5">
      <h1 class="font-bold text-2xl">Instruções</h1>
      <p>Selecione o que você deseja consultar ácima, após isso preencha com os parâmetros que serão consultados e clique em "Filtrar"</p>
      <p>Caso queira, você pode reiniciar a consulta clicando no botão "Resetar"</p>
    </section>

    <table class="flex flex-row w-full h-fit border-collapse font-poppins">
      <thead class="w-1/2">
        <tr class="flex flex-col h-full border bg-gray-200">
          <?php
            if (isset($resultado)) {
              foreach ($resultado as $campo => $valor) {
                echo "<td class='py-4 px-4'>$campo</td>";
              }
            }
          ?>
        </tr>
      </thead>
      <tbody class="w-full">
        <?php
          echo "<tr class='flex flex-col h-full border border-gray-300'>";
          if (isset($resultado)) {
            foreach ($resultado as $campo => $valor) {
              echo "<td class='py-4 px-4'>$valor</td>";
            }
          }
          echo "</tr>";
        ?>
      </tbody>
    </table>
  </main>
  <?php include("../../inc/views/footer-adm.inc.php"); ?>
</body>
<script>
  // Função para resetar os campos do formulário
  function resetarFormulario() {
    document.getElementById("formFiltro").reset();
  }
</script>
</html>