<?php
  include("../inc/class/dbh.class.php");

  session_start();
  $id = $_SESSION["usuario_id"];

  if(!isset($_SESSION["usuario_id"])) {
    header("Location: login.php?error=invalid-access");
  }

  $dbh = new Dbh();
  $sql = "SELECT * FROM usuarios_socorristas WHERE usuarios_e_cmdt = 'Sim' AND usuarios_id = $id";
  $stmt = $dbh->connect()->prepare($sql);
  $stmt->execute();
  
  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

  <title>Cadastrar Nova Ocorrência</title>
</head>
<body class="bg-bg-mobile bg-no-repeat bg-contain bg-local tablet:bg-none lg:bg-none">
  <?php
    if($stmt->rowCount()>0) {
      include("../inc/views/nav-admin2.inc.php"); 
    } else {
      include("../inc/views/nav.inc.php"); 
    }
  ?>
  <main class="flex flex-col items-center md:items-start w-full md:h-screen gap-3 font-poppins p-12 md:gap-8 overflow-y-auto">
    <a onclick="window.history.back()" class='hidden md:flex flex-row items-center justify-center cursor-pointer gap-2.5'>
      <img src="../public/images/arrow_left.svg" alt="Flecha voltar">
      <p class="text-vermelho text-xl font-bold">Voltar</p>
    </a>
    <?php include("../inc/views/ocorrencia-conteudo.inc.php"); ?>
  </main>
  <?php include("../inc/views/footer.inc.php"); ?>
</body>
</html>