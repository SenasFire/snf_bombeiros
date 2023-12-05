<?php
  include("../inc/class/dbh.class.php");

  session_start();
  $id = $_SESSION["usuario_id"];

  if(!isset($_SESSION["usuario_id"])) {
    header("Location: login.php?error=invalid-access");
  }

  $dbh = new Dbh();
  $sql = "SELECT ocorrencia_id, ocorrencia.nome_paciente, ocorrencia.cpf, ocorrencia.data, ocorrencia.local_ocorrencia FROM ocorrencia WHERE socorrista_id = '$id' ORDER BY ocorrencia.data";

  $stmt_ocorrencias = $dbh->connect()->prepare($sql);
  $stmt_ocorrencias->execute();

  $resultados = $stmt_ocorrencias->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="Website Icon" type="png" href="../public/images/logo-noar.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="output.css">
  <script src="../inc/js/nav_script.inc.js" defer></script>

  <title>Tela principal do socorrista</title>
</head>

<body class="bg-bg-mobile bg-no-repeat bg-contain bg-local tablet:bg-none lg:bg-none">
  <?php include("../inc/views/nav.inc.php"); ?>
    <main class="flex flex-col px-16 py-8 gap-8 self-stretch items-center md:items-start justify-start w-full h-max font-poppins lg:h-screen">
      <header class="noar_logo flex flex-col text-center items-center justify-center gap-1 font-poppins
        tablet:flex-row tablet:justify-start tablet:w-full md:hidden">
        <img src="../public/images/logo-noar-opt.svg" alt="" srcset="" class="w-[192px] h-[192px] tablet:w-[236px] tablet:h-[236px]">
        <div class="tablet:flex tablet:flex-col tablet:items-start tablet:gap-5 tablet:pt-10 tablet:justify-start tablet:text-left">
          <h1 class="hidden tablet:flex font-bold text-3xl text-white tablet:text-preto">Bombeiros Voluntários</h1>
        </div>
      </header>

      <section aria-labelledby="title_noticias" title="Alertas e notícias" class="flex flex-col items-center md:items-start gap-2.5 w-full">
        <header class="text-center lg:text-left">
          <h1 class="text-preto font-poppins font-semibold text-4xl">Alertas e Notícias</h1>
        </header>
        <section aria-label="Notícias" class="flex flex-col lg:flex-row overflow-x-auto justify-start items-center md:items-start gap-10 p-4 py-6 self-stretch w-full">
          <?php
            $sql_noticias = "SELECT * FROM alertas_e_noticias";
            $stmt_noticias = $dbh->connect()->prepare($sql_noticias);
            $stmt_noticias->execute();

            if($stmt_noticias->rowCount() > 0) {
              while ($linhas = $stmt_noticias->fetch()) {
                $id_noticia = $linhas["noticia_id"];
                $imagem = $linhas["noticia_imagem"];
                $titulo = $linhas["noticia_nome"];

                $imagem_convertida = base64_decode($imagem);

                // Recupera o nome do criador para cada notícia
                $sql_criador = "SELECT usuarios_socorristas.usuarios_username AS nome FROM alertas_e_noticias INNER JOIN usuarios_socorristas ON alertas_e_noticias.noticia_criador = usuarios_socorristas.usuarios_id WHERE noticia_id = :noticia_id";
                $stmt_criador = $dbh->connect()->prepare($sql_criador);
                $stmt_criador->bindParam(':noticia_id', $id_noticia, PDO::PARAM_INT);
                $stmt_criador->execute();
                $dados_criador = $stmt_criador->fetch();

                echo "
                  <a class='w-full' href='adm/ver_noticia.php?noticia=$titulo&usuario=$id&id_noticia=$id_noticia&criador={$dados_criador['nome']}'>
                    <div class='hover:drop-shadow-2xl transition-all duration-500 bg-white p-2 drop-shadow-md font-poppins w-full h-[292px] overflow-hidden relative'>
                      <img src='data:image/jpeg;base64,$imagem' class='w-full h-full object-cover'>
                      <div class='absolute inset-0 flex flex-col justify-end'>
                        <div class='bg-white px-4'>
                          <p class='font-bold text-xl'>$titulo</p>
                          <p class='text-sm'>{$dados_criador['nome']}</p>
                        </div>
                      </div>
                    </div>
                  </a>
                ";
                echo "
                
                ";
              }
            } else {
              echo "
                <p>Não há nenhum alerta ou notícia próprio ou de nosso sistema, <a href='cadastrar_admin.php' class='font-bold underline'>cadastre uma notícia aqui!</a></p>
              ";
            }
          ?>
        </section>
      </section>
      <section aria-label="Botões" class="flex flex-col justify-center items-center gap-4 md:hidden">
        <button onclick="window.location.href='ocorrencia.php'" class="text-[16px] px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
          transition ease-in-out hover:scale-105">Nova Ocorrência</button>
        <button onclick="window.location.href='historico.php'" class="text-[16px] px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
          transition ease-in-out hover:scale-105">Histórico de Ocorrência</button>
      </section>

      <section aria-label="Lista de Socorristas e Médicos" title="Cadastros" class="flex flex-col lg:flex-row h-full w-full justify-center items-start gap-10 self-stretch font-poppins">
        <section aria-labelledby="title_socorristas" class="socorristas flex flex-col gap-5 h-full w-full" title="Socorristas Cadastrados">
          <header>
            <h1 id="title_socorristas" class="font-poppins font-semibold text-3xl">Ocorrências Cadastradas</h1>
            <p>Aqui você encontra uma visão geral das informações das ocorrências cadastradas por você, é possível visualizá-las com mais detalhes, incluindo o histórico de cada uma clicando na ação "visualizar"</p>
          </header>

          <!-- Table aqui: -->
          <table class="min-w-full h-3/4 border-collapse border border-gray-300 font-poppins">
            <thead>
                <tr class="bg-gray-200">
                  <th class="border border-gray-300 py-2 px-4">Paciente</th>
                  <th class="border border-gray-300 py-2 px-4">CPF</th>
                  <th class="border border-gray-300 py-2 px-4">Data</th>
                  <th class="border border-gray-300 py-2 px-4">Local</th>
                  <th class="border border-gray-300 py-2 px-4">Ações</th>
                </tr>
            </thead>
            <tbody>
              <?php
                if($stmt_ocorrencias->rowCount() > 0){
                  foreach ($resultados as $resultado) {
                    $id = $resultado['ocorrencia_id'];
                    $nome_paciente = $resultado['nome_paciente'];
                    $cpf = $resultado['cpf'];
                    $data = $resultado['data'];
                    $local = $resultado['local_ocorrencia'];
                    
                    echo("<tr class='border border-gray-300 hover:bg-gray-100'>");
                      echo("<td class='py-2 px-4 text-center'>".$nome_paciente."</td>");
                      echo("<td class='py-2 px-4 text-center'>".$cpf."</td>");
                      echo("<td class='py-2 px-4 text-center'>".$data."</td>");
                      echo("<td class='py-2 px-4 text-center'>".$local."</td>");
                      echo("<td colspan='2' class='py-2 px-4 text-center h-full flex flex-row gap-2.5 justify-center items-center'>
                      <a class='cursor-pointer hover:text-indigo-300 transition-colors duration-300' href='../../inc/class/usuario-db.class.php?action=excluir-ocorrencia&id=$id'>Excluir</a>
                      <a class='cursor-pointer hover:text-indigo-300 transition-colors duration-300' href='visualizar.php?action=visualizar-ocorrencia&id=$id'>Visualizar</a>
                      </td>");
                    echo("</tr>");
                  }
                } else {
                  echo("<tr class='border border-gray-300 hover:bg-gray-100'>");
                    echo("<td colspan='5' class='py-2 px-4 text-center'><p>Nenhuma ocorrência no momento.</p></td>");
                  echo("<tr>");
                }
              ?>
            </tbody>
          </table>
        </section>
      </section>
    </main>
  <?php include("../inc/views/footer.inc.php"); ?>
</body>
</html>