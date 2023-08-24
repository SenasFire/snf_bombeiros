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

<body class="bg-bg-mobile bg-no-repeat">
  <main class="flex flex-col items-center w-full h-fit p-5 gap-5 font-poppins">
    <?php
      include("../inc/header.inc.php");
    ?>
    <!-- Formulário -->
    <section aria-labelledby="title_cadastro" class="flex flex-col gap-2.5" title="Form Container">
      <header class="flex flex-col items-center">
        <h1 id="title_cadastro" class="font-bold text-preto text-xl font-poppins"><span class="font-bold text-vermelho">Cadastre-se</span> no app</h1>
        <p class="text-sm text-cinza">Insira suas informações para cadastro</p>
      </header>

      <form class="flex flex-col gap-2.5" action="" method="" id="form_cadastro">
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome">Nome:</label>
          <input type="text" class="border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: Henrique Osmar Adelino" id="nome">
        </div>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome">N° Fibra:</label>
          <input type="text" class="border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 4200" id="n_fibra">
        </div>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome">Senha:</label>
          <input type="password" class="border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="***" id="senha">
        </div>
        <button type="submit" onclick="event.preventDefault()" class="px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
          transition ease-in-out hover:scale-105">Cadastrar</button>
        <a href="#" onclick="event.preventDefault()" class="underline text-sm font-normal text-cinza"><b>Clique aqui</b> caso já tenha cadastro</a>
      </form>
    </section>
  </main>
  <?php
    include("../inc/footer.inc.php");
  ?>
</body>

</html>