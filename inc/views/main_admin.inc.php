<?php
  include("../../inc/class/dbh.class.php");
  include("../../inc/class/usuario-db.class.php");
  include("../../inc/class/login.class.php");

  // Instanciar classes de acesso / obtenção de usuários:

  $acessoDados = new UsuarioDB;               // Instanciar classe acesso
  $usuarios = $acessoDados->listarUsuarios(); // Obter usuários

  $dbh = new Dbh();
  $sql = "SELECT ocorrencia_id, ocorrencia.nome_paciente, ocorrencia.cpf, ocorrencia.data, ocorrencia.local_ocorrencia FROM ocorrencia ORDER BY ocorrencia.data";

  $stmt = $dbh->connect()->prepare($sql);
  $stmt->execute();

  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if ($stmt->rowCount() > 0) {
    $id = $resultados[0]['ocorrencia_id'];
  }
?>

<main class="flex flex-col h-screen px-16 py-8 gap-8 self-stretch items-center justify-start">
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

  <section aria-label="Lista de Socorristas e Médicos" title="Cadastros" class="flex flex-col lg:flex-row h-full justify-center items-start gap-10 self-stretch">
    <section aria-labelledby="title_socorristas" class="socorristas flex flex-col gap-5 h-full w-full" title="Socorristas Cadastrados">
      <header>
        <h1 id="title_socorristas" class="font-poppins font-semibold text-3xl">Ocorrências</h1>
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
            if($stmt->rowCount() > 0){
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

    <section aria-labelledby="title_medicos" class="medicos flex flex-col gap-5 h-full w-full" title="Médicos Cadastrados">
      <header>
        <h1 id="title_medicos" class="font-poppins font-semibold text-3xl">Bombeiros Cadastrados</h1>
      </header>
      <!-- Table aqui: -->
      <table class="min-w-full h-3/4 border-collapse border border-gray-300 font-poppins">
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
                <a href="../../inc/class/excluir-usuario.class.php?action=excluir&id=<?php echo $usuario->getId(); ?>" class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Deletar(<?php $usuario->getId();?>)">Excluir</a>
                <a class="cursor-pointer hover:text-indigo-300 transition-colors duration-300" onclick="Ver(<?php $usuario->getId();?>)">Visualizar</a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </section>
  </section>
</main>