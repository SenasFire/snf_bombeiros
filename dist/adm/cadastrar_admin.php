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
  <script type="text/javascript" src="../../jquery-1.8.2.min.js"></script>

  <title>Admin</title>
</head>

<body>
  <?php include("../../inc/views/nav-admin.inc.php"); ?>

  <main class="flex flex-col px-16 py-8 gap-8 self-stretch items-center justify-center w-full">
    <section class="flex flex-row items-center justify-center w-full font-poppins text-2xl gap-[1.875rem]">
      <section class="flex flex-col justify-center items-start p-[1.25rem] gap-2 bg-white shadow-lg w-full h-full">
        <header class="font-poppins text-[2rem] font-semibold">
          <h1>Acesso Rápido</h1>
        </header>
        <section class="flex flex-col actions gap-2 w-full">
          <div class="group hover:bg-vermelho hover:text-white transition-colors duration-300 flex p-2 rounded-2xl border-solid border-2 border-vermelho w-full">
            <svg class="stroke-vermelho group-hover:stroke-[#FFF] transition-colors duration-300" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4998 6.66675V25.3334M7.1665 16.0001H25.8332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <button id="btn_new_team" class="w-full items-start justify-start text-left">
              <p>Nova Equipe</p>
            </button>
          </div>
          <div class="group hover:bg-vermelho hover:text-white transition-colors duration-300 flex p-2 rounded-2xl border-solid border-2 border-vermelho w-full">
            <svg class="stroke-vermelho group-hover:stroke-[#FFF] transition-colors duration-300" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4998 6.66675V25.3334M7.1665 16.0001H25.8332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <button id="btn_new_rescuer" class="w-full items-start justify-start text-left">
              <p>Novo Socorrista</p>
            </button>
          </div>
          <div class="group hover:bg-vermelho hover:text-white transition-colors duration-300 flex p-2 rounded-2xl border-solid border-2 border-vermelho w-full">
            <svg class="stroke-vermelho group-hover:stroke-[#FFF] transition-colors duration-300" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4998 6.66675V25.3334M7.1665 16.0001H25.8332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <button id="btn_new_doctor" class="w-full items-start justify-start text-left">
              <p>Novo Médico</p>
            </button>
          </div>
          <div class="group hover:bg-vermelho hover:text-white transition-colors duration-300 flex p-2 rounded-2xl border-solid border-2 border-vermelho w-full">
            <svg class="stroke-vermelho group-hover:stroke-[#FFF] transition-colors duration-300" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4998 6.66675V25.3334M7.1665 16.0001H25.8332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <button id="btn_new_post" class="w-full items-start justify-start text-left">
              <p>Nova Notícia</p>
            </button>
          </div>
          <div class="group hover:bg-vermelho hover:text-white transition-colors duration-300 flex p-2 rounded-2xl border-solid border-2 border-vermelho w-full">
            <svg class="stroke-vermelho group-hover:stroke-[#FFF] transition-colors duration-300" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4998 6.66675V25.3334M7.1665 16.0001H25.8332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            <button id="btn_new_desp" class="w-full items-start justify-start text-left">
              <p>Novo DESP</p>
            </button>
          </div>
        </section>
      </section>

      <section class="flex flex-col justify-center items-start p-[1.25rem] gap-2 bg-white shadow-lg w-full h-full">
        <header class="flex flex-row font-poppins gap-2.5 items-center">
          <h1 class="text-[2rem] font-semibold">Ação Selecionada</h1>
        </header>

        <!-- Novo socorrista: -->
        <form id="form_new_rescuer" class="changeable_form flex flex-col gap-2.5 w-full max-h-[18rem] font-poppins overflow-y-scroll" action="">
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="nome_desktop" class="text-xl">Nome:</label>
            <input name="username" id="nome_desktop" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: Henrique Osmar Adelino" required>
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="num_fibra_desktop" class="text-xl">N° Fibra:</label>
            <input name="num_fibra" id="num_fibra_desktop" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 4200">
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="password_desktop" class="text-xl">Senha:</label>
            <input name="pwd" id="password_desktop" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="******">
          </div>
          <div class="input_box flex flex-col gap-2.5" title="Input Box">
            <label for="admin" class="text-xl">Administrador:</label>
            <div id="admin" class="container_radio flex flex-row items-center gap-10">
              <div class="flex items-center gap-2.5">
                <input type="radio" id="adm_sim_desktop" name="cmdt_radio" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
                <label for="adm_sim_desktop" class="text-xl">Sim</label>
              </div>
              <div class="flex items-center gap-2.5">
                <input type="radio" id="adm_nao_desktop" name="cmdt_radio" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
                <label for="adm_nao_desktop" class="text-xl">Não</label>
              </div>
            </div>
          </div>
          <div id="adm_code_container" class="input_box hidden flex-col g-2.5" title="Input Box">
            <label for="adm_code_desktop" class="text-xl">Registro de Comandante:</label>
            <input name="cmdt_code" id="adm_code_desktop" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 12665">
          </div>
          <button onclick="addUser(); event.preventDefault(); loadDoctor();" class="button px-6 py-4 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
            transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">Cadastrar Usuário<img src="../../public/images/caret.svg" alt=""></button>
        </form>

        <!-- Nova Equipe: -->
        <form id="form_new_team" class="changeable_form flex flex-col gap-2.5 w-full max-h-[18rem] font-poppins overflow-y-scroll" action="" method="">
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="nome_motorista" class="text-xl">Motorista:</label>
            <select name="" id="motorista" class="select text-xl border-2 border-[#595959]">
              <option class="text-xs" value="None" disabled selected>Selecione:</option>
              <?php

              ?>
            </select>
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="primeiro_socorrista" class="text-xl">Primeiro Socorrista:</label>
            <input id="primeiro_socorrista" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o nome aqui...">
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="segundo_socorrista" class="text-xl">Segundo Socorrista:</label>
            <input id="segundo_socorrista" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o nome aqui...">
          </div>
          <div id="adm_code_container" class="input_box hidden flex-col g-2.5" title="Input Box">
            <label for="terceiro_socorrista" class="text-xl">Terceiro Socorrista:</label>
            <input id="terceiro_socorrista" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o nome aqui...">
          </div>
          <div id="adm_code_container" class="input_box hidden flex-col g-2.5" title="Input Box">
            <label for="demandante" class="text-xl">Demandante:</label>
            <input id="demandante" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o nome aqui...">
          </div>
          <div id="adm_code_container" class="input_box hidden flex-col g-2.5" title="Input Box">
            <label for="nome_equipe" class="text-xl">Nome da Equipe:</label>
            <input id="nome_equipe" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o nome aqui...">
          </div>
          <button type="submit" onclick="event.preventDefault()" class="button px-6 py-4 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
            transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">Cadastrar Equipe<img src="../../public/images/caret.svg" alt=""></button>
        </form>

        <!-- Adicionar novo médico: -->
        <form id="form_new_doctor" class="changeable_form flex flex-col gap-2.5 w-full max-h-[18rem] font-poppins overflow-y-scroll" action="" method="">
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="medico_nome" class="text-xl">Nome do médico:</label>
            <input name="doc_name" id="medico_nome" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o nome aqui..." required>
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="medico_cpf" class="text-xl">CPF:</label>
            <input name="doc_cpf" id="medico_cpf" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o CPF aqui...">
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="medico_pwd" class="text-xl">Senha do doutor:</label>
            <input name="doc_pwd" id="medico_pwd" type="password" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Senha...">
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="medico_email" class="text-xl">Email:</label>
            <input name="doc_email" id="medico_email" type="email" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o email aqui...">
          </div>
          <button type="submit" onclick="addDoctor(); event.preventDefault(); loadDoctor();" class="button px-6 py-4 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
            transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">Cadastrar Médico<img src="../../public/images/caret.svg" alt=""></button>
        </form>

        <!-- Adicionar nova postagem -->
        <form id="form_new_post" class="changeable_form flex flex-col gap-2.5 w-full max-h-[18rem] font-poppins overflow-y-scroll" action="" method="">
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="titulo_post" class="text-xl">Título do post:</label>
            <input id="titulo_post" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o nome aqui..." required>
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="conteudo_post" class="text-xl">Conteúdo do post</label>
            <input id="conteudo_post" type="textarea" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite o conteúdo aqui...">
          </div>
          <div class="input_box flex flex-col g-2.5" title="Input Box">
            <label for="imagem_post" class="text-xl">Imagem do post:</label>
            <input id="imagem_post" type="file" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
            transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Insira a imagem aqui">
          </div>
          <div class="input_box flex flex-col gap-2.5" title="Input Box">
            <label for="comentarios" class="text-xl">Comentários habilitados:</label>
            <div id="comentarios" class="container_radio flex flex-row items-center gap-10">
              <div class="flex items-center gap-2.5">
                <input type="radio" id="adm_sim_cmt" name="escolha" value="sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
                <label for="cmt_sim_desktop" class="text-xl">Sim</label>
              </div>
              <div class="flex items-center gap-2.5">
                <input type="radio" id="adm_nao_cmt" name="escolha" value="nao" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
                <label for="cmt_nao_desktop" class="text-xl">Não</label>
              </div>
            </div>
          </div>
          <button type="submit" onclick="event.preventDefault()" class="button px-6 py-4 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
            transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">Criar Post<img src="../../public/images/caret.svg" alt=""></button>
        </form>
      </section>
    </section>

    <section aria-label="Lista de Socorristas e Médicos" title="Cadastros" class="flex justify-center items-start gap-10 self-stretch">
      <section aria-labelledby="title_socorristas" class="socorristas flex flex-col gap-5 h-full w-full" title="Socorristas Cadastrados">
        <header>
          <h1 id="title_socorristas" class="font-poppins font-regular text-4xl">Bombeiros Cadastrados</h1>
        </header>
        <div class="input_box flex flex-row items-center gap-2.5 w-full" title="Input Box">
          <label for="buscar">Pesquisar</label>
          <input id="buscar_socorristas" type="text" class="font-poppins input w-full border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Insira sua pesquisa aqui...">
        </div>
        <!-- Table aqui: -->
        <table class="min-w-full border-collapse border border-gray-300 font-poppins w-1/2">
          <thead>
              <tr class="bg-gray-200">
                <th class="border border-gray-300 py-2 px-4">Nome</th>
                <th class="border border-gray-300 py-2 px-4">Num Fibra</th>
                <th class="border border-gray-300 py-2 px-4">Admin</th>
                <th class="border border-gray-300 py-2 px-4">Código Admin</th>
                <th class="border border-gray-300 py-2 px-4">Ações</th>
              </tr>
          </thead>
          <tbody id="userTable" class="w-full">

          </tbody>
        </table>
      </section>
      <section aria-labelledby="title_medicos" class="medicos flex flex-col gap-5 h-full w-full" title="Médicos Cadastrados">
        <header>
          <h1 id="title_medicos" class="font-poppins font-regular text-4xl">Médicos Cadastrados</h1>
        </header>
        <div class="input_box flex flex-row items-center gap-2.5 w-full" title="Input Box">
          <label for="buscar">Pesquisar</label>
          <input id="buscar_medicos" type="text" class="font-poppins input w-full border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
          transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Insira sua pesquisa aqui...">
        </div>
        <!-- Table aqui: -->
        <table class="min-w-full border-collapse border border-gray-300 font-poppins w-full">
          <thead>
              <tr class="bg-gray-200">
                  <th class="border border-gray-300 py-2 px-4">ID</th>
                  <th class="border border-gray-300 py-2 px-4">Nome</th>
                  <th class="border border-gray-300 py-2 px-4">CPF</th>
                  <th class="border border-gray-300 py-2 px-4">Email</th>
                  <th class="border border-gray-300 py-2 px-4">Ações</th>
                </tr>
          </thead>
          <tbody id="doc_table">

          </tbody>
        </table>
      </section>
    </section>

  </main>

  <?php include("../../inc/views/footer-adm.inc.php"); ?>
</body>

</html>