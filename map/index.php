<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../dist/output.css">
  <title>Map</title>
</head>

<body>
  <?php include("header.inc.php"); ?>
  <img src="corpo.jpg" alt="Corpo" usemap="#corpo">
  <map class="hover:cursor-pointer" name="corpo" id="imagemap">
    <area class="hover:cursor-pointer" shape="circle" coords="485,520,20" alt="Pênis" title="Pênis">
    <area class="hover:cursor-pointer" shape="circle" coords="410,585,30" alt="Femoral" title="Quadríceps Femoral">
    <area class="hover:cursor-pointer" shape="poly" coords="456,96,484,80,515,100,520,132,512,165,485,176,456,165,450,138" alt="Crânio" title="Crânio">
  </map>
</body>
<script>
  // Capturar o evento de clique no mapa
  document.getElementById('imagemap').addEventListener('click', function(event) {
    // Obter as coordenadas do ponto clicado
    var x = event.offsetX;
    var y = event.offsetY;

    // Exibir as coordenadas
    console.log('Coordenadas: x=' + x + ', y=' + y);

    window.open("process.php"+x,y"_self")
  });
</script>
</html>