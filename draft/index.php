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
  <title>Index</title>
</head>

<body class="bg-vermelho">

  <main class="flex flex-col w-full h-screen p-5 gap-5 font-poppins">
    <?php include("../inc/header.inc.php"); ?>
    <!-- Formulário -->
    <section aria-labelledby="title_cadastro" class="flex flex-col" title="Form Container">
      <header>
        <h1 id="title_cadastro font-bold text-preto"><span class="font-bold text-vermelho">Cadastre-se</span> no app</h1>
        <p class="text-sm text-cinza">Insira suas informações para cadastro</p>
      </header>
      
      <form class="flex flex-col gap-2.5" action="" method="" id="form_cadastro">
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome">Nome:</label>
          <input type="text" class=" border-b bg-input_color text-input_placeholder text-exsm" placeholder="Ex: Henrique Osmar Adelino" id="nome">
        </div>
      </form>
    </section>
  </main>

</body>

</html>