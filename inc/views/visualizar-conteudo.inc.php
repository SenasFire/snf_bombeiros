<?php
  include("../../inc/class/dbh.class.php");
  include("../../inc/class/usuario-db.class.php");
  include("../../inc/class/login.class.php");
  $id = $_GET["id"];
  $dbh = new Dbh();
  $sql = "SELECT `nome_paciente` AS 'Nome do paciente', `cpf` AS 'CPF', `genero` AS 'Gênero', `idade` AS 'Idade', `acompanhante` AS 'Acompanhante', `idade_acompanhante` AS 'Idade do acompanhante', 
  `num_ocorrencia` AS 'Número da ocorrência', `local_ocorrencia` AS 'Local da ocorrência', `data` AS 'Data da ocorrência', `equipe_atendimento` AS 'Equipe de atendimento', `num_desp`, 
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
  }
?>

<main class="flex flex-col h-fit px-16 py-8 gap-8 self-stretch items-center justify-start font-poppins">
  <section aria-label="Lista de Socorristas e Médicos" title="Cadastros" class="flex h-full justify-center items-start gap-10 self-stretch">
    <section aria-labelledby="title_socorristas" class="socorristas flex flex-col gap-5 h-full w-full" title="Socorristas Cadastrados">
      <header>
        <h1 id="title_socorristas" class="font-poppins font-semibold text-3xl">Ocorrência <?php echo $nome_paciente; ?></h1>
        <p>Você selecionou a ocorrência de ID: <?php echo $id; ?>, sinta se <b>livre</b> para realizar as alterações desejadas.</p>
      </header>
      <!-- Table aqui: -->
      <section class="flex flex-row">
        <?php
          echo '<table class="flex flex-row w-fit h-fit border-collapse font-poppins">';
          foreach ($resultados as $resultado) {
            foreach ($resultado as $campo => $valor) {
              echo "<input class='py-2 px-4 text-center hover:bg-gray-100' placeholder='$valor'></input>";
            }
          }
          echo '</table>'
        ?>
        <table class="flex flex-row w-fit h-fit border-collapse font-poppins">
          <thead>
              <tr class="flex flex-col h-full border bg-gray-200">
                <?php
                  foreach ($resultados as $resultado) {
                    foreach ($resultado as $campo => $valor) {
                      echo "<td class='border-gray-300 py-2 px-4'>$campo</td>";
                    }
                  }
                ?>
              </tr>
          </thead>
          <tbody>
            <tr class="flex flex-col h-full border border-gray-300">
              <?php
                foreach ($resultados as $resultado) {
                  foreach ($resultado as $campo => $valor) {
                    echo "<input class='py-2 px-4 text-center hover:bg-gray-100' placeholder='$valor'></input>";
                  }
                }
              ?>
            </tr>
          </tbody>
        </table>
      </section>
    </section>
  </section>
</main>