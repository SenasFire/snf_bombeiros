<?php
  session_start();

  if(!isset($_SESSION["usuario_id"])) {
    header("Location: ../login.php?error=invalid-access");
  }

  $id_usuario = $_SESSION['usuario_id'];
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="Website Icon" type="png" href=../public/images/logo-noar.png" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="output.css">
  <script src="../inc/js/nav_script.inc.js" defer></script>

  <title>Cadastrar Nova Ocorrência</title>
</head>
<body class="bg-bg-mobile bg-no-repeat bg-contain bg-local tablet:bg-none lg:bg-none">
  <?php include("../inc/views/nav.inc.php"); ?>
  <main class="flex flex-col items-center w-full h-fit gap-3 font-poppins p-12 md:gap-8">
    <?php include("../inc/views/ocorrencia-conteudo.inc.php"); ?>
  </main>
  <?php include("../inc/views/footer.inc.php"); ?>
</body>
</html>