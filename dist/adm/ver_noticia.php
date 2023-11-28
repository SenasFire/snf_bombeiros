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

  $id_noticia = $_GET["id_noticia"];
  $titulo = $_GET["noticia"];
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
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="../../dist/output.css">
  <script src="../../inc/js/nav_script.inc.js" defer></script>

  <title><?php echo $titulo ?></title>
</head>
<body>
  <?php include("../../inc/views/nav-admin.inc.php"); ?>

  <main class="flex flex-col px-16 py-8 gap-8 self-stretch items-start justify-start w-full font-poppins md:h-screen overflow-y-auto">
    <a onclick="window.history.back()" class='flex flex-row items-center justify-center cursor-pointer gap-2.5'>
      <img src="../../public/images/arrow_left.svg" alt="Flecha voltar">
      <p class="text-vermelho text-xl font-bold">Voltar</p>
    </a>
    <section title="nome_noticia" aria-labelledby="titulo_noticia" class="flex gap-8 flex-col items-center justify-start desktop:items-center desktop:justify-start w-full">
      <?php
        $sql_noticias = "SELECT * FROM alertas_e_noticias WHERE noticia_id = $id_noticia";
        $stmt_noticias = $dbh->connect()->prepare($sql_noticias);
        $stmt_noticias->execute();
            
        $sql_criador = "SELECT usuarios_socorristas.usuarios_username AS nome FROM alertas_e_noticias INNER JOIN usuarios_socorristas ON alertas_e_noticias.noticia_criador = usuarios_socorristas.usuarios_id WHERE noticia_id = $id_noticia";
        $stmt_criador = $dbh->connect()->prepare($sql_criador);
        $stmt_criador->execute();
        $dados_criador = $stmt_criador->fetch();
      
        $criador = $dados_criador["nome"];

        echo "
          <header class='w-1/2 pb-2 border-b-2 laptop:p-6 border-[#595959]'>
            <h1 id='titulo_noticia' class='font-semibold text-4xl text-center'>$titulo</h1>
            <p class='text-center'>Por: $criador, em alertas</p>
          </header>
        ";

        while ($linhas = $stmt_noticias->fetch()) {
          $id_noticia = $linhas["noticia_id"];
          $id_criador = $linhas["noticia_criador"];
          $imagem = $linhas["noticia_imagem"];
          $titulo = $linhas["noticia_nome"];
          $conteudo = $linhas["noticia_conteudo"];

          $imagem_convertida = base64_decode($imagem);
          echo "
            <div class='w-full flex items-start justify-center desktop:items-start desktop:justify-center drop-shadow-lg'>
              <img src='data:image/jpeg;base64,$imagem' class='w-full desktop:w-2/5'>
            </div>
          ";
        }
        echo "<p class='desktop:w-2/5'>$conteudo</p>";
      ?>
      <?php
        if($id_usuario === $id_criador) {
          echo "
            <section>
              <div class='error_message error cursor-pointer flex bg-error_bg border-2 border-border_error flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch' title='Alerta' aria-label='Alerta'>
                <img src='../../public/images/delete_forever.svg' alt='Deletar postagem'>
                <a href='../../inc/deletar-noticia.php?id=$id_noticia' class='text-sm text-vermelho font-poppins'>Excluir postagem: $titulo</a>
              </div>      
            </section>
          ";
        }
      ?>
    </section>
  </main>

  <?php include("../../inc/views/footer-adm.inc.php"); ?>
</body>
</html>