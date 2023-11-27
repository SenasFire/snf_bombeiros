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

    // Aqui você pode usar os valores para construir e executar sua consulta SQL
    // Exemplo de consulta básica:
    if($tp_consulta === "ocorrencia") {
      $sql = "SELECT ocorrencia_id, ocorrencia.nome_paciente, ocorrencia.cpf, ocorrencia.data, ocorrencia.local_ocorrencia FROM ocorrencia WHERE nome_paciente LIKE '%$nome%' OR local_ocorrencia LIKE '%$local%' OR data = '$date'";
    }
    if($tp_consulta === "usuarios_socorristas") {
      $sql = "SELECT * FROM usuarios_socorristas WHERE usuarios_username LIKE '%$nome%' AND usuarios_num_fibra = '$num_fibra'";
    }
    if($tp_consulta === "alertas_e_noticias") {
      $sql = "SELECT * FROM alertas_e_noticias WHERE noticia_nome LIKE '%$nome%' AND data_noticia = '$date'";
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
  <main class="flex flex-col px-16 py-8 gap-8 self-stretch items-start justify-start w-full h-max font-poppins lg:h-screen">
    <a onclick="window.history.back()" class='flex flex-row items-center justify-center cursor-pointer gap-2.5'>
      <img src="../../public/images/arrow_left.svg" alt="Flecha voltar">
      <p class="text-vermelho text-xl font-bold">Voltar</p>
    </a>
    
    <form method="GET" class="flex flex-col justify-between laptop:flex-row w-full gap-5 bg-input_color" aria-label="Filtros" title="Ações e filtros">
      <section class="text-xl" title="Selecione os filtros">
        <div>
          <legend>Selecione o tipo de tabela que deseja filtrar</legend>
          <select name="tp_consulta" class="text-xl">
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
      <div class="gap-2.5">
        <input name="date" value="<?= isset($_GET['date']) == true ? :'' ?>" class="focus:outline-vermelho" type="date">
        <input name="nome" type="text" placeholder="Nome">
        <input name="local" type="text" placeholder="Local">
        <input name="num_fibra" type="text" placeholder="Número Fibra">
      </div>
      
      <section class="flex flex-col laptop:flex-row gap-2.5" title="Botões">
        <button class="px-6 py-4 gap-2.5 lg:text-2xl text-xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
        transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">
          Filtrar
        </button>
        <button class="px-6 py-4 gap-2.5 lg:text-2xl text-xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
        transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">
          Resetar
        </button>
      </section>
    </form>

    <table class="flex flex-row w-full h-fit border-collapse font-poppins">
      <thead class="w-1/2">
        <tr class="flex flex-col h-full border bg-gray-200">
          <?php
            foreach ($resultados as $resultado) {
              foreach ($resultado as $campo => $valor) {
                echo "<td class='py-4 px-4'>$campo</td>";
              }
            }
          ?>
        </tr>
      </thead>
      <tbody class="w-full">
        <?php
          foreach ($resultados as $resultado) {
            echo "<tr class='flex flex-col h-full border border-gray-300'>";
            foreach ($resultado as $campo => $valor) {
                echo "<td class='py-2'><input type='text' name='$campo' value='$valor' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>";
            }
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </main>
  <?php include("../../inc/views/footer-adm.inc.php"); ?>
</body>
</html>