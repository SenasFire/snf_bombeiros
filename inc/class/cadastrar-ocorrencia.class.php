<?php
  require_once "dbh.class.php";
  $dbh = new Dbh();

  // Recupera os valores do formulário
  $equipeAtendimento = $_POST["equipe_atendimento"];
  $nomePaciente = $_POST["input_name"];
  $data = $_POST["data"];
  $sexo = $_POST["sexo"];
  $nomeHospital = $_POST["nome_hospital"];
  $rgCpfPaciente = $_POST["rg_paciente"];
  $idadePaciente = $_POST["idade_paciente"];
  $acompanhantePaciente = $_POST["acompanhante_paciente"];
  $idadeAcompanhante = $_POST["idade_acompanhante"];
  $localOcorrencia = $_POST["local_ocorrencia"];
  $numeroUsb = $_POST["numero_usb"];
  $numeroOcorrencia = $_POST["numero_ocorrencia"];
  $despachante = $_POST["despachante"];
  $hch = $_POST["hch"];

  // Anamnese
  $anamneseOutrasVezes = $_POST["escolha_anamnese_1"];
  $anamneseTempo = $_POST["anamnese_tempo"];
  $anamnesePossuiProbSaude = $_POST["escolha_anamnese_2"];
  $anamneseProblemaSaude = $_POST["anamnese_problema_saude"];
  $anamneseUsaMedicacao = $_POST["escolha_anamnese_3"];
  $anamneseHorarioMedicacao = $_POST["anamnese_medicacao"];
  $anamneseMedicacaoUsada = $_POST["anamnese_medicacao_usada"];
  $anamneseAlergico = $_POST["escolha_anamnese_4"];
  $anamneseEspecifiqueAlergia = $_POST["anamnese_alergia"];
  $anamneseIngeriuAlimento = $_POST["escolha_anamnese_5"];
  $anamneseHorasIngeriuAlimento = $_POST["ananmese_horas"];

  // Avaliação do Paciente

  // Recupera os valores dos checkboxes de abertura ocular
  $avaCheckboxOcular = isset($_POST['ava_checkbox_ocular']) ? $_POST['ava_checkbox_ocular'] : [];

  // Recupera os valores dos checkboxes de resposta verbal
  $avaCheckboxVerbal = isset($_POST['ava_checkbox_verbal']) ? $_POST['ava_checkbox_verbal'] : [];

  // Recupera os valores dos checkboxes de resposta motora
  $avaCheckboxMotora = isset($_POST['ava_checkbox_motora']) ? $_POST['ava_checkbox_motora'] : [];

  $aberturaOcular = implode(", ", $avaCheckboxOcular);
  $respostaVerbal = implode(", ", $avaCheckboxVerbal);
  $respostaMotora = implode(", ", $avaCheckboxMotora);
  $avaTotal = $_POST["ava_total"];

  $problemasSuspeitosArr = isset($_POST['prob_sus_checkbox']) ? $_POST['prob_sus_checkbox'] : [];
  $problemasSuspeitos = implode(", ", $problemasSuspeitosArr);


  if (isset($_POST['tipo_checkbox'])) {
    $tipoOcorrencia = $_POST['tipo_checkbox'];
    // Agora $tipoOcorrencia contém um array com os valores dos checkboxes selecionados
  }

  // Processa os campos de sinais e sintomas
  if (isset($_POST['sinais_sintomas_checkbox'])) {
      $sinaisSintomas = $_POST['sinais_sintomas_checkbox'];
      // Agora $sinaisSintomas contém um array com os valores dos checkboxes selecionados
  }

  // Outros campos
  $problemaRespiratorio = $_POST['problema_respiratorio'];
  $diabetes = $_POST['diabetes'];
  $problemaObsterico = $_POST['problema_obsterico'];
  $formaTransporte = $_POST['forma_transporte'];
  $outrosProblemas = $_POST['outros_problemas'];
  $tipoCianose = isset($_POST['tipo_cianose']) ? $_POST['tipo_cianose'] : '';
  $inputOther = isset($_POST['input_other']) ? $_POST['input_other'] : '';

  // Cinemática
  $escolhaCinematica = isset($_POST['escolha_cinematica']) ? $_POST['escolha_cinematica'] : '';
  $escolhaCinematicaCap = isset($_POST['escolha_cinematica_cap']) ? $_POST['escolha_cinematica_cap'] : '';
  $escolhaCinematicaCinto = isset($_POST['escolha_cinematica_cinto']) ? $_POST['escolha_cinematica_cinto'] : '';
  $escolhaCinematicaPb = isset($_POST['escolha_cinematica_pb']) ? $_POST['escolha_cinematica_pb'] : '';
  $escolhaCinematicaCam = isset($_POST['escolha_cinematica_cam']) ? $_POST['escolha_cinematica_cam'] : '';
  $escolhaCinematicaPainel = isset($_POST['escolha_cinematica_painel']) ? $_POST['escolha_cinematica_painel'] : '';
  $escolhaCinematicaVol = isset($_POST['escolha_cinematica_vol']) ? $_POST['escolha_cinematica_vol'] : '';

  // Forma de Condução
  $escolhaConducao = isset($_POST['escolha_conducao']) ? $_POST['escolha_conducao'] : '';

  // O que a Vítima Era
  $vitimaEraCheckbox = isset($_POST['vitima_era_checkbox']) ? $_POST['vitima_era_checkbox'] : [];
  // Convertendo o array em uma string para armazenamento no banco de dados
  $vitimaEra = implode(", ", $vitimaEraCheckbox);

  // Decisão de Transporte
  $escolhaTransporte = isset($_POST['escolha_transporte']) ? $_POST['escolha_transporte'] : '';
  
  // Sinais Vitais
  $pressao = isset($_POST['pressao']) ? $_POST['pressao'] : '';
  $pulso = isset($_POST['pulso']) ? $_POST['pulso'] : '';
  $respiracao = isset($_POST['respiracao']) ? $_POST['respiracao'] : '';
  $saturacao = isset($_POST['saturacao']) ? $_POST['saturacao'] : '';
  $temperatura = isset($_POST['temperatura']) ? $_POST['temperatura'] : '';
  $escolhaPerfusao = isset($_POST['escolha_perfusao']) ? $_POST['escolha_perfusao'] : '';

  // Fim da Ocorrência
  $kmFinal = isset($_POST['km_final']) ? $_POST['km_final'] : '';

  $sql = "INSERT INTO `ocorrencia` (
    `nome_paciente`, `cpf`, `genero`, `idade`, `acompanhante`, `idade_acompanhante`, 
    `num_ocorrencia`, `local_ocorrencia`, `data`, `equipe_atendimento`, `num_desp`, 
    `aconteceu_outras_vezes`, `qt_tempo_aconteceu`, `problema_saude`, `tipo_problema_saude`, 
    `medicacao`, `medicacao_horario`, `medicamento_usado`, `alergia`, `alergia_tipo`, 
    `ingeriu_alimento`, `horario_ingestao`, `abertura_ocular`, `resposta_verbal`, 
    `resposta_motora`, `total_gcs`, `tipo_ocorrencia`, `disturbio_comportamento`, 
    `capacete`, `cinto`, `avariado_parabrisa`, `caminhando`, `avariado_painel`, 
    `torcido_vol`, `problemas_suspeitos`, `problema_resp`, `problema_diabetes`, 
    `problema_obstérico`, `forma_transporte`, `sinais_sintomas`, `local_cianose`, 
    `forma_conducao`, `vitima_era`, `dec_transporte`, `pressao_arterial`, `pulso`, 
    `respiracao`, `saturacao`, `temperatura`, `perfusao`, `quilometragem_final`, 
    `hospital`, `hch`, `num_usb`
  ) VALUES (
    '$nomePaciente', '$rgCpfPaciente', '$sexo', '$idadePaciente', '$acompanhantePaciente', '$idadeAcompanhante', 
    '$numeroOcorrencia', '$localOcorrencia', '$data', $equipeAtendimento, '$despachante', 
    '$anamneseOutrasVezes', '$anamneseTempo', '$anamnesePossuiProbSaude', '$anamneseProblemaSaude', '$anamneseUsaMedicacao', '$anamneseHorarioMedicacao', 
    '$anamneseMedicacaoUsada', '$anamneseAlergico', '$anamneseEspecifiqueAlergia', '$anamneseIngeriuAlimento', '$anamneseHorasIngeriuAlimento', 
    '$aberturaOcular','$respostaVerbal','$respostaMotora','$avaTotal','$tipoOcorrencia[0]', '$escolhaCinematica', '$escolhaCinematicaCap', 
    '$escolhaCinematicaCinto', '$escolhaCinematicaPb', '$escolhaCinematicaCam', 
    '$escolhaCinematicaPainel', '$escolhaCinematicaVol', 
    '$problemasSuspeitos', '$problemaRespiratorio', '$diabetes', 
    '$problemaObsterico', '$formaTransporte', '$sinaisSintomas[0]', '$tipoCianose', 
    '$escolhaConducao', '$vitimaEra', '$escolhaTransporte', '$pressao', 
    '$pulso', '$respiracao', '$saturacao', '$temperatura', 
    '$escolhaPerfusao', '$kmFinal', '$nomeHospital', '$hch', 
    '$numeroUsb'
  )";

  // TIPO OCORRENCIA 1 ERRO -> TEM QUE COLOCAR OS DADOS SOBRE CINEMÁTICA
  
  $stmt = $dbh->connect()->prepare($sql);

  $stmt->execute();

  if($stmt) {
    echo
    "
      <script type='text/javascript'>
        window.alert('Ocorrência cadastrada, você pode alterá-la somente caso seja um admin!');
      </script>
    ";
    header("Location: ../../dist/ocorrencia.php?success=ocorrencia-criada");
    exit();
  } else {
    header("Location: ../../dist/ocorrencia.php?error=erro-ao-criar-ocorrencia");
    exit();
}
