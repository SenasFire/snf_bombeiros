<?php
  include("../../inc/class/dbh.class.php");
  include("../../inc/class/usuario-db.class.php");
  include("../../inc/class/login.class.php");

  $dbh = new Dbh();
  $id = $_GET["id"];
  $sql = "SELECT * FROM usuarios_socorristas WHERE usuarios_id = :id";

  $stmt = $dbh->connect()->prepare($sql);
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);
  $stmt->execute();

  $result = $stmt->fetch();

  $nome = $result["usuarios_username"];
  $num_fibra = $result["usuarios_num_fibra"];
  $pwd = $result["usuarios_pwd"];
  $adm = $result["usuarios_e_cmdt"];
  $adm_code = $result["usuarios_cmdt_cod"];

?>
<main class="flex flex-col h-fit overflow-y-auto px-16 py-8 gap-8 self-stretch items-start justify-start font-poppins">
  <a onclick="window.history.back()" class='flex flex-row items-center justify-center cursor-pointer gap-2.5'>
    <img src="../../public/images/arrow_left.svg" alt="Flecha voltar">
    <p class="text-vermelho text-xl font-bold">Voltar</p>
  </a>
  <header>
    <h1 id="title_socorristas" class="font-poppins font-semibold text-3xl">Usuário <?php echo $nome; ?></h1>
    <p>Você selecionou o(a) usuário: <?php echo $nome; ?>, sinta se <b>livre</b> para realizar as alterações desejadas.</p>
  </header>
  <section class="flex flex-col w-full">
    <form class='flex flex-col gap-5' action='../../inc/alterar-usuario.php?id=<?php echo $id?>' method='POST'>
      <table class="flex flex-row w-full h-fit border-collapse font-poppins">
        <thead class="w-1/2">
          <tr class="flex flex-col h-full border bg-gray-200">
            <td class='py-6 px-12'>Nome</td>
            <td class='py-6 px-12'>Número Fibra</td>
            <td class='py-6 px-12'>Senha</td>
            <td class='py-6 px-12'>Administrador</td>
            <td class='py-6 px-12'>Adm. Code</td>
          </tr>
        </thead>
        <tbody class="w-full">
          <tr class="flex flex-col h-full border border-gray-300">
            <?php
              echo "
                <td class='py-4 px-4'><input type='text' name='nome' value='$nome' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>
                <td class='py-4 px-4'><input type='text' name='num_fibra' value='$num_fibra' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>
                <td class='py-4 px-4'><input type='text' name='pwd' value='$pwd' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>
                <td class='py-4 px-4'><input type='text' name='adm' value='$adm' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>
                <td class='py-4 px-4'><input type='text' name='adm_code' value='$adm_code' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>
              ";
            ?>
          </tr>
        </tbody>
      </table>
      <button type="submit" class="button w-full px-6 py-4 mb-5 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
            transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">Salvar Alterações</button>
    </form>
  </section>
</main>