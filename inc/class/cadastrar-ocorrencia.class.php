<?php
  require_once "dbh.class.php";
  $dbh = new Dbh();

  session_start();
  $uid = $_SESSION["usuario_id"];

  // Recupera os valores do formulário
  $equipeAtendimento = isset($_POST['equipe_atendimento']) ? $_POST['equipe_atendimento'] : null;
  $nomePaciente = isset($_POST['input_name']) ? $_POST['input_name'] : null;
  $data = isset($_POST['data']) ? $_POST['data'] : null;
  $sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
  $nomeHospital = isset($_POST['nome_hospital']) ? $_POST['nome_hospital'] : null;
  $rgCpfPaciente = isset($_POST['rg_paciente']) ? $_POST['rg_paciente'] : null;
  $idadePaciente = isset($_POST['idade_paciente']) ? $_POST['idade_paciente'] : null;
  $acompanhantePaciente = isset($_POST['acompanhante_paciente']) ? $_POST['acompanhante_paciente'] : null;
  $idadeAcompanhante = isset($_POST['idade_acompanhante']) ? $_POST['idade_acompanhante'] : null;
  $localOcorrencia = isset($_POST['local_ocorrencia']) ? $_POST['local_ocorrencia'] : null;
  $numeroUsb = isset($_POST['numero_usb']) ? $_POST['numero_usb'] : null;
  $numeroOcorrencia = isset($_POST['numero_ocorrencia']) ? $_POST['numero_ocorrencia'] : null;
  $despachante = isset($_POST['despachante']) ? $_POST['despachante'] : null;
  $hch = isset($_POST['hch']) ? $_POST['hch'] : null;
  

  // Anamnese
  $anamneseOutrasVezes = isset($_POST["escolha_anamnese_1"]) ? $_POST["escolha_anamnese_1"] : null;
  $anamneseTempo = isset($_POST["anamnese_tempo"]) ? $_POST["anamnese_tempo"] : null;
  $anamnesePossuiProbSaude = isset($_POST["escolha_anamnese_2"]) ? $_POST["escolha_anamnese_2"] : null;
  $anamneseProblemaSaude = isset($_POST["anamnese_problema_saude"]) ? $_POST["anamnese_problema_saude"] : null;
  $anamneseUsaMedicacao = isset($_POST["escolha_anamnese_3"]) ? $_POST["escolha_anamnese_3"] : null;
  $anamneseHorarioMedicacao = isset($_POST["anamnese_medicacao"]) ? $_POST["anamnese_medicacao"] : null;
  $anamneseMedicacaoUsada = isset($_POST["anamnese_medicacao_usada"]) ? $_POST["anamnese_medicacao_usada"] : null;
  $anamneseAlergico = isset($_POST["escolha_anamnese_4"]) ? $_POST["escolha_anamnese_4"] : null;
  $anamneseEspecifiqueAlergia = isset($_POST["anamnese_alergia"]) ? $_POST["anamnese_alergia"] : null;
  $anamneseIngeriuAlimento = isset($_POST["escolha_anamnese_5"]) ? $_POST["escolha_anamnese_5"] : null;
  $anamneseHorasIngeriuAlimento = isset($_POST["ananmese_horas"]) ? $_POST["ananmese_horas"] : null;  

  // Local dos traumas
  $bracoEsquerdo = $_POST["tipo_lesao_braco_esquerdo"];
  $bracoDireito = $_POST["tipo_lesao_braco_direito"];
  $cabeca = $_POST["tipo_lesao_cabeca"];
  $peito = $_POST["tipo_lesao_peito"];
  $estomago = $_POST["tipo_lesao_estomago"];
  $virilha = $_POST["tipo_lesao_virilha"];
  $peEsquerdo = $_POST["tipo_lesao_pe_esquerdo"];
  $peDireito = $_POST["tipo_lesao_pe_direito"];
  $maoEsquerda = $_POST["tipo_lesao_mao_esquerda"];
  $maoDireita = $_POST["tipo_lesao_mao_direita"];

  $outroLocal = $_POST["outro_local"];
  $tipoOutroLocal = $_POST["tipo_outro_local"];

  $observacoes = $_POST["observacoes"];

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


  $tipoOcorrenciaArr = isset($_POST["tipo_checkbox"]) ? $_POST["tipo_checkbox"] : [];
  $tipoOcorrencia = implode(", ", $tipoOcorrenciaArr);

  $sinaisSintomasArr = isset($_POST["sinais_sintomas_checkbox"]) ? $_POST["sinais_sintomas_checkbox"] : [];
  $sinaisSintomas = implode(", ", $sinaisSintomasArr);

  // Outros campos
  $problemaRespiratorio = isset($_POST['problema_respiratorio']) ? $_POST['problema_respiratorio'] : null;
  $diabetes = isset($_POST['diabetes']) ? $_POST['diabetes'] : null;
  $problemaObsterico = isset($_POST['problema_obsterico']) ? $_POST['problema_obsterico'] : null;
  $formaTransporte = isset($_POST['forma_transporte']) ? $_POST['forma_transporte'] : null;  
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
    `socorrista_id`, `nome_paciente`, `cpf`, `genero`, `idade`, `acompanhante`, `idade_acompanhante`, 
    `num_ocorrencia`, `local_ocorrencia`, `data`, `equipe_atendimento`, `num_desp`, 
    `aconteceu_outras_vezes`, `qt_tempo_aconteceu`, `problema_saude`, `tipo_problema_saude`, 
    `medicacao`, `medicacao_horario`, `medicamento_usado`, `alergia`, `alergia_tipo`, 
    `ingeriu_alimento`, `horario_ingestao`, `braco_esquerdo_tipo`, `braco_direito_tipo`, 
    `cabeca_tipo`, `peito_tipo`, `estomago_tipo`, `virilha_tipo`, `pe_esquerdo_tipo`, 
    `pe_direito_tipo`, `mao_esquerda_tipo`, `mao_direita_tipo`, `outros`, `observacoes`, 
    `abertura_ocular`, `resposta_verbal`, `resposta_motora`, `total_gcs`, `tipo_ocorrencia`, `disturbio_comportamento`, 
    `capacete`, `cinto`, `avariado_parabrisa`, `caminhando`, `avariado_painel`, 
    `torcido_vol`, `problemas_suspeitos`, `problema_resp`, `problema_diabetes`, 
    `problema_obstérico`, `forma_transporte`, `sinais_sintomas`, `local_cianose`, 
    `forma_conducao`, `vitima_era`, `dec_transporte`, `pressao_arterial`, `pulso`, 
    `respiracao`, `saturacao`, `temperatura`, `perfusao`, `quilometragem_final`, 
    `hospital`, `hch`, `num_usb`
  ) VALUES ('$uid', '$nomePaciente', '$rgCpfPaciente', '$sexo', '$idadePaciente', '$acompanhantePaciente', '$idadeAcompanhante', 
    '$numeroOcorrencia', '$localOcorrencia', '$data', $equipeAtendimento, '$despachante', 
    '$anamneseOutrasVezes', '$anamneseTempo', '$anamnesePossuiProbSaude', '$anamneseProblemaSaude',
    '$anamneseUsaMedicacao', '$anamneseHorarioMedicacao', '$anamneseMedicacaoUsada', '$anamneseAlergico', '$anamneseEspecifiqueAlergia',
    '$anamneseIngeriuAlimento', '$anamneseHorasIngeriuAlimento', '$bracoEsquerdo', '$bracoDireito', 
    '$cabeca', '$peito', '$estomago', '$virilha', '$peEsquerdo', 
    '$peDireito', '$maoEsquerda', '$maoDireita', '$tipoOutroLocal', '$observacoes',
    '$aberturaOcular','$respostaVerbal', '$respostaMotora','$avaTotal','$tipoOcorrencia', '$escolhaCinematica',
    '$escolhaCinematicaCap', '$escolhaCinematicaCinto', '$escolhaCinematicaPb', '$escolhaCinematicaCam', '$escolhaCinematicaPainel',
    '$escolhaCinematicaVol', '$problemasSuspeitos', '$problemaRespiratorio', '$diabetes', 
    '$problemaObsterico', '$formaTransporte', '$sinaisSintomas', '$tipoCianose', 
    '$escolhaConducao', '$vitimaEra', '$escolhaTransporte', '$pressao', 
    '$pulso', '$respiracao', '$saturacao', '$temperatura', 
    '$escolhaPerfusao', '$kmFinal', '$nomeHospital', '$hch', 
    '$numeroUsb')";

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
