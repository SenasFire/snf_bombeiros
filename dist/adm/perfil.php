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
  <link rel="stylesheet" href="../../dist/output.css">
  <script src="../../inc/js/nav_script.inc.js" defer></script>
  <script src="../../inc/js/form_script.inc.js" defer></script>
  <script src="../../inc/js/crud_adm.inc.js" defer></script>

  <title>Admin</title>
</head>

<body>
  <?php include("../../inc/views/nav-admin.inc.php"); ?>

  <main class="flex flex-row px-16 py-8 gap-8 self-stretch items-center justify-center w-full h-max font-poppins">
    <section class="flex flex-col">
      <header>
        <h1 class="font-semibold text-4xl">Meu Perfil</h1>
      </header>
      <section class="card flex flex-col h-full bg-vermelho rounded-3xl">
        <img src="https://s3-alpha-sig.figma.com/img/2e41/9381/822c8af7b5e6ebe22b0d2fcb55c27c2c?Expires=1698624000&Signature=TThybD2QerhZYKJtMrfQry~cYUE1eT9fCmJ4a1rMmMA9CDfyqa7oYgBqMr-NjUjsspCovAR4Pn4zVIqNWihsybYMNaH580qPbGN8uNMGUe7U4Ww2DzrOKg3pd3ZmQ-NHgqNQvCphyFpNJVeTtkMLjXdCH5lkJCw9z58edsmTKrXvwJf1g-~q2NKL37MErH1P9VjinxYqR~FBGUdV1FvT6Pwxw~7vSoJeuz9PtjzpxpBg439OmOD2nypajXsGIl~VXOtSUhULCA-5T8ldO3omA6ObdiudhNoRU6Y-TkGpHW5zNAVoQ-4UP8zrqzHc3PBwi~u1cj2yWGSjpU3AXivYZw__&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4" class="h-80 w-full rounded-3xl z-10" alt="Foto de Perfil">
        <section class="content flex flex-col bg-vermelho px-16 py-8 text-white rounded-3xl">
          <p>Nome: Jorginho</p>
          <p>Idade: 38</p>
          <p>N° Fibra: 33678</p>
          <p>Total de Ocorrências: 102</p>
        </section>
      </section>
    </section>
    <section class="alter_info flex flex-col w-full h-full items-center justify-center">
      <form class="flex flex-col gap-2.5 w-3/4 h-full font-poppins overflow-y-auto" action="" method="POST">
        <header>
          <h1 class="font-semibold text-4xl">Alterar Informações</h1>
        </header>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="nome_desktop" class="text-xl">Nome:</label>
          <input id="nome_desktop" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: Henrique Osmar Adelino" required>
        </div>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="num_fibra_desktop" class="text-xl">N° Fibra:</label>
          <input id="num_fibra_desktop" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 4200">
        </div>
        <div class="input_box flex flex-col g-2.5" title="Input Box">
          <label for="password_desktop" class="text-xl">Senha:</label>
          <input id="password_desktop" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="******">
        </div>
        <button type="submit" onclick="event.preventDefault()" class="button px-6 py-4 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
              transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">Salvar Informações<img src="../public/images/caret.svg" alt=""></button>
      </form>
    </section>
  </main>

  <?php include("../../inc/views/footer-adm.inc.php"); ?>
</body>

</html>