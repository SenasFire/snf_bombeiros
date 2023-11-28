<?php
  include("../../inc/class/dbh.class.php");
  include("../../inc/class/usuario-db.class.php");
  include("../../inc/class/login.class.php");
  $id = $_GET["id"];
  $dbh = new Dbh();
  $sql = "SELECT `nome_paciente` AS 'Nome do paciente', `cpf` AS 'CPF', `genero` AS 'Gênero', `idade` AS 'Idade', `acompanhante` AS 'Acompanhante', `idade_acompanhante` AS 'Idade do acompanhante', 
  `num_ocorrencia` AS 'Número da ocorrência', `local_ocorrencia` AS 'Local da ocorrência', `data` AS 'Data da ocorrência', `equipe_atendimento` AS 'Equipe de atendimento', `num_desp` AS 'Despachante', 
  `aconteceu_outras_vezes` AS 'Ocorrência já aconteceu outras vezes', `qt_tempo_aconteceu` AS 'A quanto tempo aconteceu?', `problema_saude` AS 'Possuí problema de saúde?', `tipo_problema_saude` AS 'Problema de saúde', 
  `medicacao` AS 'Faz uso de medicação', `medicacao_horario` AS 'Horário da medicação', `medicamento_usado` AS 'Medicamento utilizado', `alergia` AS 'Possuí alergias', `alergia_tipo` AS 'Tipo da alergia', 
  `ingeriu_alimento` AS 'Ingeriu algo', `horario_ingestao` AS 'Horário da ingestão', `abertura_ocular` AS 'Resposta ocular', `resposta_verbal` AS 'Resposta verbal', 
  `resposta_motora` AS 'Resposta motora', `total_gcs` AS 'Avaliação GCS total', `tipo_ocorrencia` AS 'Tipo da ocorrência', `disturbio_comportamento` AS 'Distúrbio de comportamento', 
  `capacete` AS 'Vítima usava capacete', `cinto` AS 'Vítima usava cinto', `avariado_parabrisa` AS 'Para-brisas avariado', `caminhando` AS 'Vítima caminhando no local', `avariado_painel` AS 'Painel avariado', 
  `torcido_vol` AS 'Volante torcido', `problemas_suspeitos` AS 'Problemas suspeitos', `problema_resp` AS 'Problema respiratório', `problema_diabetes` AS 'Diabetes', 
  `problema_obstérico` AS 'Problema obstérico', `forma_transporte` AS 'Forma de transporte', `sinais_sintomas` AS 'Sinais e sintomas', `local_cianose` AS 'Local cianose', 
  `forma_conducao` AS 'Forma de condução', `vitima_era` AS 'Vítima era', `dec_transporte` AS 'Decisão de transporte', `pressao_arterial` AS 'Pressão arterial', `pulso` AS 'Pulso cardíaco BCPM', 
  `respiracao` AS 'Respiração M.R.M', `saturacao` AS 'Saturação (%)', `temperatura` AS 'Temperatura (°C)', `perfusao` AS 'Perfusão', `quilometragem_final` AS 'Quilometragem final', 
  `hospital` AS 'Hospital', `hch` AS 'HCH', `num_usb` AS 'Número USB' FROM ocorrencia WHERE ocorrencia_id = :id";

  $stmt = $dbh->connect()->prepare($sql);
  $stmt->bindParam(":id", $id, PDO::PARAM_INT);
  $stmt->execute();

  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
  foreach($resultados as $resultado) {
    $nome_paciente = $resultado["Nome do paciente"];
    $cpf = $resultado["CPF"];
  }
?>

<main class="flex flex-col md:h-screen overflow-y-auto px-16 py-8 gap-8 self-stretch items-start justify-start font-poppins">
  <a onclick="window.history.back()" class='flex flex-row items-center justify-center cursor-pointer gap-2.5'>
    <img src="../../public/images/arrow_left.svg" alt="Flecha voltar">
    <p class="text-vermelho text-xl font-bold">Voltar</p>
  </a>
  <section aria-label="Lista de Socorristas e Médicos" title="Cadastros" class="flex h-full justify-center items-start gap-10 self-stretch">
    <section aria-labelledby="title_socorristas" class="socorristas flex flex-col gap-5 h-full w-full" title="Socorristas Cadastrados">
      <header>
        <h1 id="title_socorristas" class="font-poppins font-semibold text-3xl">Ocorrência <?php echo $nome_paciente; ?>, CPF: <?php echo $cpf; ?></h1>
        <p>Você selecionou a ocorrência de ID: <?php echo $id; ?>, sinta se <b>livre</b> para realizar as alterações desejadas.</p>
      </header>
      <!-- Table aqui: -->
      <section class="flex flex-col w-full">
        <form class='flex flex-col gap-5' action='../../inc/alterar-ocorrencia.php?id=<?php echo $id?>' method='POST'>
          <table class="flex flex-row w-full h-fit border-collapse font-poppins">
            <thead class="w-1/2">
                <tr class="flex flex-col h-full border bg-gray-200">
                  <?php
                    foreach ($resultados as $resultado) {
                      foreach ($resultado as $campo => $valor) {
                        echo "<td class='py-4 px-4'>$campo</td>";
                      }
                    }
                  ?>
                </tr>
            </thead>
            <tbody class="w-full">
              <?php
                foreach ($resultados as $resultado) {
                  echo "<tr class='flex flex-col h-full border border-gray-300'>";
                  foreach ($resultado as $campo => $valor) {
                      echo "<td class='py-2'><input type='text' name='$campo' value='$valor' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>";
                  }
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
          <section class="flex gap-2.5">
            <div class="group w-1/2 hover:bg-vermelho hover:text-white transition-colors duration-300 flex p-2 rounded-2xl border-solid border-2 border-vermelho">
              <svg class="stroke-vermelho group-hover:stroke-[#FFF] transition-colors duration-300" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4998 6.66675V25.3334M7.1665 16.0001H25.8332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              <button onclick="event.preventDefault()" id="btn_new_team" class="w-full text-center text-xl">
                <p>Expandir e visualizar o histórico dessa ocorrência</p>
              </button>
            </div>
            <div class="group w-1/2 hover:bg-vermelho hover:text-white transition-colors duration-300 flex p-2 rounded-2xl border-solid border-2 border-vermelho">
              <svg class="stroke-vermelho group-hover:stroke-[#FFF] transition-colors duration-300" width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M16.4998 6.66675V25.3334M7.1665 16.0001H25.8332" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
              <button onclick="event.preventDefault()" id="btn_new_team" class="w-full text-center text-xl">
                <p>Preencher o histórico dessa ocorrência</p>
              </button>
            </div>
          </section>
          <button type="submit" class="button w-full px-6 py-4 mb-5 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
            transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none">Salvar Alterações</button>
        </form>

        <?php

          // - Listar os campos e valores do histórico da ocorrência específica:
          $sql = "SELECT 
          `procedimentos_efetuados` AS 'Procedimentos Realizados',
          `imobilizacoes` AS 'Imobilizações',
          `colar` AS 'Colar',
          `tamanho_colar` AS 'Tamanho do Colar',
          `lpm` AS 'LPM',
          `meios_auxiliares` AS 'Meios Auxiliares',
          `ataduras` AS 'Ataduras',
          `cateter_tp_oculos` AS 'Cateter/Tampão Ocular',
          `compressa_comum` AS 'Compressa Comum',
          `kit_tipo` AS 'Tipo de Kit',
          `kit_qtd` AS 'Quantidade de Kit',
          `luvas` AS 'Luvas',
          `mascaras` AS 'Máscaras',
          `manta_aluminizada` AS 'Manta Aluminizada',
          `pas_dea` AS 'Pás/DEA',
          `sonda_asp` AS 'Sonda ASP',
          `soro_fisiologico` AS 'Soro Fisiológico',
          `talas_tipo` AS 'Tipo de Talas',
          `talas_qtd` AS 'Quantidade de Talas',
          `base_establizador` AS 'Base Estabilizadora',
          `colar_tipo` AS 'Tipo de Colar',
          `colar_qtd` AS 'Quantidade de Colar',
          `coxins` AS 'Coxins',
          `ked_tipo` AS 'Tipo de KED',
          `ket_qtd` AS 'Quantidade de KET',
          `maca_rigida` AS 'Maca Rígida',
          `ttf_tipo` AS 'Tipo de TTF',
          `qtd_ttf` AS 'Quantidade de TTF',
          `tirante_aranha` AS 'Tirante de Aranha',
          `tirante_cabeca` AS 'Tirante de Cabeça',
          `canula` AS 'Cânula',
          `observacoes` AS 'Observações'
          FROM 
            `historico`
          WHERE ocorrencia_referente = $id";

          $stmt = $dbh->connect()->prepare($sql);
          $stmt->execute();

          $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0) {
            echo"
              <header>
                <h1 id='title_socorristas' class='font-poppins font-semibold text-3xl'>Histórico $nome_paciente, CPF: $cpf</h1>
                <p class='mb-5'>Você selecionou o histórico da ocorrência de ID: $id, sinta se <b>livre</b> para realizar as alterações desejadas.</p>
              </header>
            ";
          } else {
            echo"
              <header>
                <h1 id='title_socorristas' class='font-poppins font-semibold text-3xl'>Histórico $nome_paciente, CPF: $cpf</h1>
                <p class='mb-5'>O histórico dessa ocorrência ainda não foi preenchido, <a class='font-bold underline' href='../historico.php'>clique aqui para prencher agora.</a></p>
              </header>
            ";
          }
        ?>

        <form class='flex flex-col gap-5' action='../../inc/alterar-ocorrencia.php?action=alterar-historico&id=<?php echo $id?>' method="POST">
          <table class="flex flex-row w-full h-fit border-collapse font-poppins">
            <thead class="w-1/2">
                <tr class="flex flex-col h-full border bg-gray-200">
                  <?php
                    foreach ($resultados as $resultado) {
                      foreach ($resultado as $campo => $valor) {
                        echo "<td class='py-4 px-4'>$campo</td>";
                      }
                    }
                  ?>
                </tr>
            </thead>
            <tbody class="w-full">
              <?php
                foreach ($resultados as $resultado) {
                  echo "<tr class='flex flex-col h-full border border-gray-300'>";
                  foreach ($resultado as $campo => $valor) {
                    echo "<td class='py-2'><input type='text' name='$campo' value='$valor' class='text-left px-8 py-2 w-full border-none active:outline-none focus:outline-none'></td>";
                  }
                  echo "</tr>";
                }
              ?>
            </tbody>
          </table>
          <?php
            if($stmt->rowCount() > 0) {
              echo"
                <button type='submit' class='button w-full px-6 py-4 mb-5 gap-2.5 lg:text-2xl text-3xl self-stretch flex items-center justify-center bg-vermelho font-poppins font-bold text-white
                transition ease-in-out hover:bg-white border-vermelho border-2 hover:text-vermelho disabled:opacity-75 disabled:transition-none'>Salvar Alterações</button>
              ";
            }
          ?>
        </form>
      </section>
    </section>
  </section>
</main>