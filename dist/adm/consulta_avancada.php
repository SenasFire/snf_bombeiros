<?php
  // Os includes, uma bagunça, OOP já foi pro abraço:
  include("../../inc/class/dbh.class.php");
  include("../../inc/class/usuario-db.class.php");
  include("../../inc/class/login.class.php");
  $dbh = new Dbh();

  session_start();
  $id_usuario = $_SESSION['usuario_id'];

  if(!isset($id_usuario)) {
    header("Location: ../login.php?error=invalid-access");
  }

  // Genial (pelo menos pra mim) capturar os dados no próprio arquivo, assim não tem erro:
  if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    $tp_consulta = isset($_GET['tp_consulta']) ? $_GET['tp_consulta'] : '';
    $date = isset($_GET['date']) ? $_GET['date'] : '';
    $nome = isset($_GET['nome']) ? $_GET['nome'] : '';
    $local = isset($_GET['local']) ? $_GET['local'] : '';
    $num_fibra = isset($_GET['num_fibra']) ? $_GET['num_fibra'] : '';
    $tp_ocorrencia = isset($_GET['tp_ocorrencia']) ? $_GET['tp_ocorrencia'] : '';

    // Único role é forçar o usuário a selecionar o tipo da consulta
    // - mas acho que tá bem intuitivo no HTML já...
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
      $tp_ocorrencia = '';
  
      // Redireciona o usuário para a mesma página para reiniciar a consulta
      header("Location: {$_SERVER['PHP_SELF']}");
      exit();
    }

    // As consultas baseadas no $_GET['tp_consulta'] (valores no select), vários tipos
    // um tipo corresponde à uma consulta sql diferente:
    if($tp_consulta === "ocorrencia") {
      $sql = "SELECT ocorrencia_id AS 'ID', ocorrencia.nome_paciente AS 'Paciente', ocorrencia.cpf AS 'CPF do Paciente', ocorrencia.data AS 'Data', ocorrencia.local_ocorrencia AS 'Local', ocorrencia.tipo_ocorrencia AS 'Tipo da Ocorrência' FROM ocorrencia WHERE nome_paciente LIKE '%$nome%' OR local_ocorrencia LIKE '%$local%' OR data LIKE '%$date%' OR tipo_ocorrencia LIKE '%$tp_ocorrencia%' ORDER BY CONCAT(nome_paciente, ' ', local_ocorrencia, ' ', tipo_ocorrencia) LIKE '%$nome% $local% $tp_ocorrencia%' DESC";
    }
    if($tp_consulta === "usuarios_socorristas") {
      $sql = "SELECT * FROM usuarios_socorristas WHERE usuarios_username LIKE '%$nome%' OR usuarios_num_fibra = '$num_fibra' ORDER BY CONCAT(usuarios_username, ' ', usuarios_num_fibra) LIKE '%$nome% $num_fibra%' DESC";
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
      $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
  <main class="flex flex-col px-16 py-8 gap-8 self-stretch items-start justify-start w-full h-max font-poppins lg:h-screen overflow-y-auto">
    <a href="main_admin.php" class='flex flex-row items-center justify-center cursor-pointer gap-2.5'>
      <img src="../../public/images/arrow_left.svg" alt="Flecha voltar">
      <p class="text-vermelho text-xl font-bold">Voltar</p>
    </a>
    
    <!-- Opções de filtragem para consultas aqui: -->
    <form id="formFiltro" method="GET" class="flex flex-col justify-between w-full gap-5 bg-input_color p-6" aria-label="Filtros" title="Ações e filtros">
      <legend>Selecione as opções de filtragem conforme necessário:</legend>
      <section class="flex flex-col justify-between desktop:flex-row w-full gap-5">
        <!-- LAS entradas opcionales dos usuários! -->
        <div class="gap-2.5 flex flex-col desktop:flex-row items-center w-full justify-center">
          <div class="w-full">
            <select name="tp_consulta" class="text-xl w-full p-4" required>
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
          <input name="date" class="p-4 w-full focus:outline-vermelho" value="<?= isset($_GET['date']) == true ? :'' ?>" class="focus:outline-vermelho" type="date">
          <input name="nome" class="p-4 w-full focus:outline-vermelho" type="text" placeholder="Nome">
          <input name="local" class="p-4 w-full focus:outline-vermelho" type="text" placeholder="Local">
          <input name="num_fibra" class="p-4 w-full focus:outline-vermelho" type="text" placeholder="Número Fibra">
          <input name="tp_ocorrencia" class="p-4 w-full focus:outline-vermelho" type="text" placeholder="Tipo da Ocorrência">
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
      </section>
    </form>

    <!-- Obrigando o usuário a selecionar tipo de consulta, na real -->
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
    
    <!-- Aquelas instrução MEIA-BOCA que eu tô providenciando: -->
    <!-- Se um dia, eu fizer uma documentação pro que tem que fazer... -->
    <section class="flex flex-col gap-2.5">
      <h1 class="font-bold text-2xl">Instruções</h1>
      <p>Selecione o que você deseja consultar ácima, após isso preencha com os parâmetros que serão consultados e clique em "Filtrar"</p>
      <p>Caso queira, você pode reiniciar a consulta clicando no botão "Resetar"</p>
      <p>Dica: sempre seja específico na consulta</p>
    </section>

    <?php
      if (!empty($resultados)) {
        // Exiba uma tabela para cada resultado
        foreach ($resultados as $indice => $resultado) {
            echo "<h1 class='font-bold text-2xl'>Resultado #" . ($indice + 1) . "</h1>";
            if($tp_consulta === "ocorrencia") {
              $id = $resultado['ID'];
              echo "<a class='cursor-pointer hover:text-indigo-300 transition-colors duration-300' href='visualizar.php?action=visualizar-ocorrencia&id=$id'>Visualizar Detalhadamente</a>";
            }
            if($tp_consulta === "usuarios_socorristas") {
              $id = $resultado['usuarios_id'];
              echo "<a class='cursor-pointer hover:text-indigo-300 transition-colors duration-300' href='visualizar_bombeiro.php?id=$id'>Visualizar Detalhadamente</a>";
            }

            // Defina os cabeçalhos da tabela
            echo "<table class='flex flex-row w-full h-fit border-collapse font-poppins'>";
            echo "<thead class='w-1/2'>";
            echo "<tr class='flex flex-col h-full border bg-gray-200'>";
            foreach ($resultado as $campo => $valor) {
                echo "<td class='py-4 px-4'>$campo</td>";
            }
            echo "</tr>";
            echo "</thead>";
            echo "<tbody class='w-full'>";

            // Exiba os dados da tabela
            echo "<tr class='flex flex-col h-full border border-gray-300'>";
            foreach ($resultado as $campo => $valor) {
                echo "<td class='py-4 px-4'>$valor</td>";
            }
            echo "</tr>";

            echo "</tbody>";
            echo "</table>";
        }
      } else {
          echo "<p>Nenhum resultado encontrado.</p>";
      }
    ?>
  </main>
  <?php include("../../inc/views/footer-adm.inc.php"); ?>
</body>
<script>
  // Função para resetar os campos do formulário
  // Não sei se realmente funciona, é só prevenção
  function resetarFormulario() {
    document.getElementById("formFiltro").reset();
  }
</script>
</html>