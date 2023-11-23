<?php
    
  require_once "../inc/class/dbh.class.php";
  $dbh = new Dbh();

  $sql = "SELECT * FROM equipes";
  $stmt = $dbh->connect()->prepare($sql);
  $stmt->execute();
  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<header class="noar_logo flex flex-col text-center items-center justify-center gap-1 font-poppins
    tablet:flex-row tablet:justify-start tablet:w-full md:hidden">
    <img src="../public/images/logo-noar-opt.svg" alt="" srcset="" class="w-[192px] h-[192px] tablet:w-[236px] tablet:h-[236px]">
    <div class="tablet:flex tablet:flex-col tablet:items-start tablet:gap-5 tablet:pt-10 tablet:justify-start tablet:text-left">
      <legend class="hidden tablet:flex font-bold text-3xl text-white tablet:text-preto">Bombeiros Voluntários</legend>
    </div>
</header>

<section class="form-container flex flex-col items-center justify-center md:w-full tablet:w-full">  
  <form class="flex flex-col gap-8 font-poppins" action="../inc/class/cadastrar-ocorrencia.class.php" method="POST">
    <!-- EQUIPE DE ATENDIMENTO: -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Equipe de Atendimento</legend>
      <select name="equipe_atendimento" id="equipe de atendimento" class="select text-xl border-2 border-[#595959]">
        <option class="text-xs" value="None" disabled selected>Selecione:</option>
        <?php
          foreach ($resultados as $resultado) {
            $id = $resultado['equipe_id'];
            $nome_equipe = $resultado['equipe_nome'];
            
            echo("<option class='text-xs' value=$id>");
              echo($nome_equipe);
            echo("</option>");
          }
        ?>
      </select>
    </section>
    <!-- CABEÇALHO DA OCORRÊNCIA -->
    <section class="flex flex-col gap-2.5">  
      <legend class="font-bold text-xl tablet:text-2xl">Cabeçalho da Ocorrência</legend>
      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Nome do Paciente:</label>
        <input name="input_name" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: Henrique Osmar Adelino" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="data">Data</label>
        <input id="data" name="data" type="date" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: 4200" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Sexo:</label>
        <select name="sexo" id="sexo" class="select text-xl border-2 border-[#595959]">
          <option value="None" disabled selected>Selecione: Masculino / Feminino</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
        </select>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Nome do Hospital:</label>
        <input name="nome_hospital" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: Hospital Dona Helena" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">RG/CPF do Paciente:</label>
        <input name="rg_paciente" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho"placeholder="Ex: 123.456.789-01" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Idade do Paciente:</label>
        <input name="idade_paciente" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: 56 anos" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Acompanhante:</label>
        <input name="acompanhante_paciente" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho"placeholder="Ex: (47) 9002-8922" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Idade do Acompanhante:</label>
        <input name="idade_acompanhante" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: Paulo César" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Local da Ocorrência:</label>
        <input name="local_ocorrencia" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: Rua Petrópolis 1940" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">N° USB:</label>
        <input name="numero_usb" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: 123" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">N° da Ocorrência:</label>
        <input name="numero_ocorrencia" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: 456789" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">DESP:</label>
        <input name="despachante" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: 190" required>
      </div>

      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">H.CH:</label>
        <input name="hch" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:bg-white focus:text-black focus:outline-vermelho" placeholder="Ex: xxx" required>
      </div>
    </section>
    <!-- ANAMNESE -->
    <section class="flex flex-col gap-2.5">  
      <legend class="font-bold text-xl tablet:text-2xl">Anamnese Médica</legend>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Aconteceu outras vezes?</label>
        <div class="container_radio flex flex-row justify-start items-start gap-10">
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_anamnese_1" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_anamnese_1" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div class="input_box flex flex-col gap-2.5 justify-center items-start" title="Input Box">
        <label for="input_senha">Quanto tempo isso aconteceu?</label>
        <input id="input_senha" name="anamnese_tempo" placeholder="Digite aqui..." type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm w-full
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" required>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Possui algum problema de saúde?</label>
        <div class="container_radio flex flex-row justify-start items-start gap-10">
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_anamnese_2" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_anamnese_2" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>

      <div class="input_box flex flex-col gap-2.5 justify-start items-start" title="Input Box">
        <label for="input_senha">Quais os problemas de saúde?</label>
        <input id="input_senha" name="anamnese_problema_saude" placeholder="Digite aqui..." type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm w-full
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" required>
      </div>

      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Faz o uso de medicações?</label>
        <div class="container_radio flex flex-row justify-start items-start gap-10">
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_anamnese_3" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_anamnese_3" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>

      <div class="input_box flex flex-col gap-2.5 justify-start items-start" title="Input Box">
        <label for="input_senha">Horário da última medicação:</label>
        <input id="input_senha" name="anamnese_medicacao" placeholder="Digite aqui..." type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm w-full
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" required>
      </div>
      
      <div class="input_box flex flex-col gap-2.5 justify-start items-start" title="Input Box">
        <label for="input_senha">Quais os medicamentos usados?</label>
        <input id="input_senha" name="anamnese_medicacao_usada" placeholder="Digite aqui..." type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm w-full
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" required>
      </div>

      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">É alérgico à algo?</label>
        <div class="container_radio flex flex-row justify-start items-start gap-10">
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_anamnese_4" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_anamnese_4" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>

      <div class="input_box flex flex-col gap-2.5 justify-start items-start" title="Input Box">
        <label for="input_senha">Se sim, especifique:</label>
        <input id="input_senha" name="anamnese_alergia" placeholder="Digite aqui..." type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm w-full
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" required>
      </div>
      
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Ingeriu alimento ou líquido à mais de 6 horas?</label>
        <div class="container_radio flex flex-row justify-start items-start gap-10">
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_anamnese_5" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-start gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_anamnese_5" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full" required><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>

      <div class="input_box flex flex-col gap-2.5 justify-start items-start" title="Input Box">
        <label for="input_senha">Que horas?</label>
        <input id="input_senha" name="ananmese_horas" placeholder="Digite aqui..." type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm w-full
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho focus:bg-white" required>
      </div>
    </section>

    <!-- AVALIAÇÃO DO PACIENTE -->
    <section class="flex flex-col gap-2.5">  
      <legend class="font-bold text-xl tablet:text-2xl">Avaliação do Paciente</legend>
      <div class="input_box flex flex-col g-2.5 justify-center items-center " title="Input Box">
        <label for="nome">Abertura Ocular:</label>
      </div>
      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_ocular[]" value="Espontânea" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Espontânea </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_ocular[]" value="Comando verbal" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Comando verbal </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_ocular[]" value="Estímulo doloroso" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Estímulo doloroso </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_ocular[]" value="Nenhuma" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Nenhuma </span>
        </div>
      </div>

      <div class="input_box flex flex-col g-2.5 justify-center items-center " title="Input Box">
          <label for="nome">Resposta Verbal:</label>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_verbal[]" value="Orientado" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Orientado </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_verbal[]" value="Confuso" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Confuso </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_verbal[]" value="Palavras inapropriadas" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Palavras inapropriadas </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_verbal[]" value="Palavras incompreensíveis" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Palavras incompreensíveis</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_verbal[]" value="Nenhuma" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Nenhuma</span>
        </div>
      </div>

      <div class="input_box flex flex-col g-2.5 justify-center items-center " title="Input Box">
          <label for="nome">Resposta Motora:</label>
        </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_motora[]" value="Obedece comandos" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Obedece comandos</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_motora[]" value="Localiza dor" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Localiza dor</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_motora[]" value="Movimento de retirada" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Movimento de retirada</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_motora[]" value="Flexão anormal" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Flexão anormal</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_motora[]" value="Extensão anormal" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Extensão anormal</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="ava_checkbox_motora[]" value="Nenhuma" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Nenhuma</span>
        </div>
      </div>

      <div class="p-4">
        <label for="nome">Total (GCS)(3-15):</label>
        <input id="input_name" name="ava_total" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: 7" required>
      </div>
    </section>

    <!-- TIPO DE OCORRÊNCIA: -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Tipo de Ocorrência</legend>
      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Causas animais" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Causado por animais </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Meio de tranporte" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Com meio de transporte </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Desmoronamento/deslizamento" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Desmoronamento/Deslizamento </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Emergência médica" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Emergência Médica </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Queda 2 metros" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Queda de altura 2M </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Tentativa de suicídio" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Tentativa de Suicídio </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Queda própria altura" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda própria altura </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Afogamento" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Afogamento</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Agressão" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Agressão</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Atropelamento" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Atropelamento</span>
        </div>
      </div>
    </section>

    <section>
      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Choque Elétrico" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Choque Elétrico </span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Desabamento" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Desabamento</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Doméstico" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Doméstico</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Esportivo" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Esportivo</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Intoxicação" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Intoxicação</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Queda de bicicleta" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda de bicicleta</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="Queda de moto" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda de moto</span>
        </div>
      </div>

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700">Queda de nível menor que 2M </span>
        </div>
      </div>

        <div class="p-4">
          <div class="flex items-center gap-2 space-x-2">
            <input type="checkbox" name="tipo_checkbox[]" value="" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
            <span class="text-gray-700"> Trabalho </span>
          </div>
      </div> 

      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="tipo_checkbox[]" value="" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Tranferência </span>
        </div>
      </div>
    </section>

    <!-- Avaliação Cinemática -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Avaliação Cinemática</legend>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Distúrbio de comportamento:</label>
        <div class="container_radio flex flex-row justify-start items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_cinematica" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_cinematica" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Encontrado de capacete:</label>
        <div class="container_radio flex flex-row justify-start items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_cinematica_cap" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_cinematica_cap" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Encontrado de cinto:</label>
        <div class="container_radio flex flex-row justify-start items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_cinematica_cinto" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_cinematica_cinto" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Para-brisas avariado:</label>
        <div class="container_radio flex flex-row justify-start items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_cinematica_pb" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_cinematica_pb" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin">Caminhando na cena:</label>
        <div class="container_radio flex flex-row justify-start items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_cinematica_cam" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_cinematica_cam" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Painel avariado:</label>
        <div class="container_radio flex flex-row justify-start items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_cinematica_painel" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_cinematica_painel" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="admin" class="text-left">Volante torcido:</label>
        <div class="container_radio flex flex-row justify-start items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim" name="escolha_cinematica_vol" value="Sim" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_sim">Sim</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao" name="escolha_cinematica_vol" value="Não" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full"><label for="adm_nao">Não</label>
          </div>
        </div>
      </div>
    </section>

    <!-- PROBLEMAS SUSPEITOS: -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Problemas Suspeitos</legend>
      <div class="p-4">
        <div class="flex items-center gap-2 space-x-2">
          <input type="checkbox" name="prob_sus_checkbox[]" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Psiquiátrico </span>
        </div>
      </div>
      <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
        <input type="checkbox" name="prob_sus_checkbox[]" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <label for="id1">Respiratório</label>
        
        <select name="problema_respiratorio" id="">
          <option value="None" disabled="" selected="">Selecione:</option>
          <option value="Nenhum">Nenhum</option>
          <option value="DPOC">DPOC</option>
          <option value="Inalação">Inalação Fumaça</option>
        </select>
      </div>
      <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
        <input type="checkbox" name="prob_sus_checkbox[]" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <label for="id1">Diabetes</label>

        <select name="diabetes" id="">
          <option value="None" disabled="" selected="">Selecione:</option>
          <option value="Nenhum">Nenhum</option>
          <option value="Hiperglicemia">Hiperglicemia</option>
          <option value="Hipoglecima">Hipoglecima</option>
        </select>
      </div>
      <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
        <input type="checkbox" name="prob_sus_checkbox[]" value="Obstérico" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <label for="id1">Obstérico</label>
        
        <select name="problema_obsterico" id="">
          <option value="None" disabled="" selected="">Selecione:</option>
          <option value="Nenhum">Nenhum</option>
          <option value="Parto Emergencial">Parto Emergencial</option>
          <option value="Gestante">Gestante</option>
          <option value="Hemor.Excessiva">Hemor.Excessiva</option>
        </select>
      </div>
      <legend class="font-bold text-xl tablet:text-2xl">Forma de transporte</legend>
      <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">

        <input type="checkbox" name="prob_sus_checkbox[]" value="Sim" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
        <label for="id1">Transporte</label>
        
        <select name="forma_transporte" id="">
          <option value="None" disabled="" selected="">Selecione:</option>
          <option value="Nenhum">Nenhum</option>
          <option value="Aéreo">Aéreo</option>
          <option value="Clínico">Clínico</option>
          <option value="Emergencial">Emergencial</option>
          <option value="Pós-Trauma">Pós-Trauma</option>
          <option value="Samu">Samu</option>
          <option value="Sem Remoção">Sem Remoção</option>
        </select>
      </div>
      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">Outros:</label>
        <input name="outros_problemas" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Digite aqui..." required>
      </div>
    </section>

    <!-- SINAIS E SINTOMAS: -->
    <section class="flex flex-col gap-2.5">  
      <legend class="font-bold text-xl tablet:text-2xl">Sinais e Sintomas</legend> 
      <section class="flex flex-col laptop:flex-row gap-4 laptop:gap-10 desktop:gap-20">
        <section class="flex flex-col gap-4">
          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Abdomen sensível" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Abdomen sensivel ou rígido </span>
            </div>
          </div>
      
          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Afundamento de Crânio" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Afundamento de crânio </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Agitação" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Agitação </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Amnésia" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Amnésia </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Angina de peito" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Angina de peito </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Apinéia" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Apinéia </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Bradicardia" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Bradicardia </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Bradipnéia" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Bradipnéia </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Bronco aspirando" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Bronco - Aspirando </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Cefaléia" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Cefaléia </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" name="sinais_sintomas_checkbox[]" value="Cianose" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Cianose </span>
            </div>
          </div>
        </section>
        <section class="flex flex-col gap-4 desktop:border-l-2 border-[#595959] desktop:px-10">
          <div class="input-box flex flex-row justify-between items-center px-8 py-4 w-full bg-[#F2F2F2]">
            <select name="tipo_cianose" id="">
                <option value="None" disabled selected>Selecione:</option>
                <option value="Labial">Lábios</option>
                <option value="Extremidades">Extremidade</option>
              </select>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Convulção </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Decorticação </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Deformidade </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Descerebração </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Desmaio </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Desvio de traquéia </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Dispenéia </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <input type="checkbox" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
              <span class="text-gray-700"> Dor local </span>
            </div>
          </div>

          <div class="p-4">
            <div class="flex items-center gap-2 space-x-2">
              <span class="text-gray-700">Outro</span>
              <input id="input_other" type="text" class="input w-full border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
              transition ease-in-out focus:scale-105 focus:text-black focus:bg-white focus:outline-vermelho" placeholder="Digite aqui..." required>
            </div>
          </div>
        </section>
      </section>
    </section>

    <!-- FORMA DE CONDUÇÃO: -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Forma de Condução</legend>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <div id="admin" class="container_radio flex flex-col gap-5">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim_desktop" name="escolha_conducao" value="Deitada" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="adm_sim_desktop">Deitada</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao_desktop" name="escolha_conducao" value="Sentada" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="adm_nao_desktop">Sentada</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao_desktop" name="escolha_conducao" value="Semi-deitada" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="adm_nao_desktop">Semi-deitada</label>
          </div>
        </div>
      </div>
    </section>

    <!-- O QUE A VÍTIMA ERA: -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Vítima era</legend>
      <section class="flex flex-col gap-2.5">
        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Ciclista" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Ciclista </span>
        </div>
      
        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Condutor moto" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Condutor moto </span>
        </div>
      
        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Gestante" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Gestante </span>
        </div>
      
        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Passageiro" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Passageiro do banco da frente </span>
        </div>
      
        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Passageiro moto" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Passageiro moto </span>
        </div>

        <div class="flex items-center gap-2 ">
          <input type="checkbox"  name="vitima_era_checkbox[]" value="Condutor carro" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Condutor carro </span>
        </div>

        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Clínico" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Clínico </span>
        </div>

        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Trauma" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Trauma </span>
        </div>

        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Passageiro banco de trás" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Passageiro do banco de trás </span>
        </div>

        <div class="flex items-center gap-2 ">
          <input type="checkbox" name="vitima_era_checkbox[]" value="Pedestre" class="form-checkbox h-7 w-7 text-blue-500 border-gray-300 rounded focus:ring-blue-400">
          <span class="text-gray-700"> Pedestre </span>
        </div>
      </section>
    </section>

    <!-- DECISÃO DE TRANSPORTE: -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Decisão de Transporte</legend>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <div id="admin" class="container_radio flex flex-col gap-5">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim_desktop" name="escolha_transporte" value="Crítico" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="adm_sim_desktop">Crítico</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao_desktop" name="escolha_transporte" value="Instável" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="adm_nao_desktop">Instável</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao_desktop" name="escolha_transporte" value="Potencialmente instável" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="adm_nao_desktop">Potencialmente instável</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao_desktop" name="escolha_transporte" value="Estável" class="appearance-none w-7 h-7 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="adm_nao_desktop">Estável</label>
          </div>
        </div>
      </div>
    </section>

    <!-- SINAIS VITAIS: -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Sinais Vitais</legend>
      <div id="error" class="error_message error bg-error_bg border-2 border-border_error hidden flex-row gap-2.5 px-3 p-2.5 rounded-[30px] items-center self-stretch" title="Alerta" aria-label="Alerta">
        <img src="../public/images/alert-icon.svg" alt="Alerta">
        <p class="text-sm text-vermelho font-poppins">Há campos inválidos</p>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="input_name">Pressão Arterial</label>
        <input name="pressao" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 laptop:focus:scale-100 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 10 X 6 mmHg" required>
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="prim_socorr">Pulso (B.C.P.M)</label>
        <input name="pulso" id="prim_socorr" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 laptop:focus:scale-100 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 120 bpm">
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="seg_socorr">Respiração (M.R.M)</label>
        <input name="respiracao" id="seg_socorr" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 laptop:focus:scale-100 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 22 mrm">
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="terc_socorr">Saturação (%)</label>
        <input name="saturacao" id="terc_socorr" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 laptop:focus:scale-100 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 96%">
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="demandante_name">Temperatura (°C)</label>
        <input name="temperatura" id="demandante_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 laptop:focus:scale-100 focus:text-black focus:outline-vermelho focus:bg-white" placeholder="Ex: 37,2 °C">
      </div>
      <div class="input_box flex flex-col gap-2.5" title="Input Box">
        <label for="sinaisv">Perfusão:</label>
        <div id="sinaisv" class="container_radio flex flex-row items-center gap-10">
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_sim_desktop" name="escolha_perfusao" value=">2" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="maior_2_desktop"> > 2 SEG</label>
          </div>
          <div class="flex items-center gap-2.5">
            <input type="radio" id="adm_nao_desktop" name="escolha_perfusao" value="<2" class="appearance-none w-5 h-5 border border-input_placeholder checked:bg-vermelho rounded-full">
            <label for="menor_2_desktop"> < 2 SEG</label>
          </div>
        </div>
      </div>
    </section>

    <!-- FIM CABEÇALHO OCORRÊNCIA -->
    <section class="flex flex-col gap-2.5">
      <legend class="font-bold text-xl tablet:text-2xl">Fim da Ocorrência</legend>
      <div class="input_box flex flex-col g-2.5" title="Input Box">
        <label for="nome">KM Final:</label>
        <input name="km_final" id="input_name" type="text" class="input border-b-2 border-[#595959] p-3 bg-input_color text-input_placeholder text-sm 
        transition ease-in-out focus:scale-105 focus:text-black focus:outline-vermelho" placeholder="Ex: xxx" required>
      </div>
    </section>

    <button type="submit" class="text-[1px] px-6 py-4 gap-2.5 self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-xl text-white
          transition ease-in-out hover:scale-105">Registrar dados</button>
    <p class="text-cinza text-sm text-center w-full">Os dados serão salvos na sua ocorrência e só podem ser alterados na área do administrador</p>

  </form>
</section>