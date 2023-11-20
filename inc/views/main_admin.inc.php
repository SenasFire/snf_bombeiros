<?php
  include("../../inc/class/usuario-db.class.php");
  include("../../inc/class/login.class.php");

  // Instanciar classes de acesso / obtenção de usuários:

  $acessoDados = new UsuarioDB;               // Instanciar classe acesso
  $usuarios = $acessoDados->listarUsuarios(); // Obter usuários
?>

<main class="flex flex-col px-16 py-8 gap-8 self-stretch items-center justify-center">
  <section aria-labelledby="title_noticias" title="Alertas e notícias" class="flex flex-col items-start gap-2.5 w-full">
    <header>
      <h1 class="text-preto font-poppins font-semibold text-4xl">Alertas e Notícias</h1>
    </header>
    <section aria-label="Notícias" class="flex flex-row justify-start items-start gap-10 self-stretch w-full">
      <div class="bg-[#B9E4C5] w-full h-[180px] drop-shadow-lg"></div>
      <div class="bg-[#9EDEF2] w-full h-[180px] drop-shadow-lg"></div>
      <div class="bg-[#F0ACAC] w-full h-[180px] drop-shadow-lg"></div>
      <div class="bg-[#F5EC95] w-full h-[180px] drop-shadow-lg"></div>
      <div class="bg-[#f595dd] w-full h-[180px] drop-shadow-lg"></div>
    </section>
  </section>

  <section aria-label="Lista de Socorristas e Médicos" title="Cadastros" class="flex justify-center items-start gap-10 self-stretch">
    <section aria-labelledby="title_socorristas" class="socorristas flex flex-col gap-5 h-full w-full" title="Socorristas Cadastrados">
      <header>
        <h1 id="title_socorristas" class="font-poppins font-semibold text-3xl">Bombeiros Cadastrados</h1>
      </header>

      <!-- Table aqui: -->
      <table class="min-w-full border-collapse border border-gray-300 font-poppins">
        <thead>
            <tr class="bg-gray-200">
              <th class="border border-gray-300 py-2 px-4">Nome</th>
              <th class="border border-gray-300 py-2 px-4">Num Fibra</th>
              <th class="border border-gray-300 py-2 px-4">Usuário é Administrador</th>
              <th class="border border-gray-300 py-2 px-4">Código de Administrador</th>
              <th class="border border-gray-300 py-2 px-4">Ações</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr class="hover:bg-gray-100">
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getNome(); ?></td>
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getFibra(); ?></td>
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getCmdt(); ?></td>
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getCmdtCode(); ?></td>
              <td class="border border-gray-300 py-2 px-4">
                <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Deletar(<?php $usuario->getId();?>)">Excluir</a>
                <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Alterar(<?php $usuario->getId();?>)">Alterar</a>
                <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Ver(<?php $usuario->getId();?>)">Visualizar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>

    <section aria-labelledby="title_medicos" class="medicos flex flex-col gap-5 h-full w-full" title="Médicos Cadastrados">
      <header>
        <h1 id="title_medicos" class="font-poppins font-semibold text-3xl">Médicos Cadastrados</h1>
      </header>
      <!-- Table aqui: -->
      <table class="min-w-full border-collapse border border-gray-300 font-poppins">
        <thead>
            <tr class="bg-gray-200">
              <th class="border border-gray-300 py-2 px-4">Nome</th>
              <th class="border border-gray-300 py-2 px-4">Num Fibra</th>
              <th class="border border-gray-300 py-2 px-4">Usuário é Administrador</th>
              <th class="border border-gray-300 py-2 px-4">Código de Administrador</th>
              <th class="border border-gray-300 py-2 px-4">Ações</th>
            </tr>
        </thead>
        <tbody>
          <?php foreach ($usuarios as $usuario): ?>
            <tr class="hover:bg-gray-100">
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getNome(); ?></td>
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getFibra(); ?></td>
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getCmdt(); ?></td>
              <td class="border border-gray-300 py-2 px-4"><?php echo $usuario->getCmdtCode(); ?></td>
              <td class="border border-gray-300 py-2 px-4">
                <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Deletar(<?php $usuario->getId();?>)">Excluir</a>
                <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Alterar(<?php $usuario->getId();?>)">Alterar</a>
                <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Ver(<?php $usuario->getId();?>)">Visualizar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </section>
</main>