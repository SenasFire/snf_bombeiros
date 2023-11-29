<?php
  include("../inc/class/dbh.class.php");

  session_start();
  $id = $_SESSION["usuario_id"];

  if(!isset($_SESSION["usuario_id"])) {
    header("Location: login.php?error=invalid-access");
  }
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
    <main class="flex flex-col items-center justify-center w-full h-fit gap-3 font-poppins md:gap-8 sm:h-screen
      md:px-16 md:py-8">
      <header class="noar_logo flex flex-col text-center items-center justify-center gap-1 font-poppins
        tablet:flex-row tablet:justify-start tablet:w-full md:hidden">
        <img src="../public/images/logo-noar-opt.svg" alt="" srcset="" class="w-[192px] h-[192px] tablet:w-[236px] tablet:h-[236px]">
        <div class="tablet:flex tablet:flex-col tablet:items-start tablet:gap-5 tablet:pt-10 tablet:justify-start tablet:text-left">
          <h1 class="hidden tablet:flex font-bold text-3xl text-white tablet:text-preto">Bombeiros Voluntários</h1>
        </div>
      </header>
      <section aria-label="Botões" class="flex flex-col justify-center items-center gap-4">
        <button onclick="window.location.href='ocorrencia.php'" class="text-[16px] px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
          transition ease-in-out hover:scale-105">Nova Ocorrência</button>
        <button onclick="window.location.href='historico.php'" class="text-[16px] px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
          transition ease-in-out hover:scale-105">Histórico de Ocorrência</button>
      </section>
    </main>
  <?php include("../inc/views/footer.inc.php"); ?>
</body>
</html>