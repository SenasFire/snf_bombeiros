<?php
require_once "dbh.class.php";
$dbh = new Dbh();

session_start();
$id = $_SESSION["usuario_id"];
// Dados do socorrista
$socorrista_id = $id;
$ocorrencia_referente = $_POST["ocorrencia"];

// Procedimentos Efetuados
$procedimentos_efetuados_checkbox = isset($_POST['procedimento_efetuado_checkbox']) ? $_POST['procedimento_efetuado_checkbox'] : [];
$procedimentos_efetuados = implode(", ", $procedimentos_efetuados_checkbox);

// Imobilizações
$imobilizacoes_checkbox = isset($_POST['selecao_de_imobilizacao_checkbox']) ? $_POST['selecao_de_imobilizacao_checkbox'] : [];
$imobilizacoes = implode(", ", $imobilizacoes_checkbox);

$uso_colar = isset($_POST['selecao_de_imobilizacao_checkbox']) && in_array('Uso Colar', $_POST['selecao_de_imobilizacao_checkbox']) ? 1 : 0;
$tamanho_colar = $_POST['tamanho_colar'];

$lpm = $_POST['selecao_de_imobilizacao'];

// Meios Auxiliares da Ocorrência
$meios_auxiliares_checkbox = isset($_POST['Meios_Auxiliares_Ocorrencia']) ? $_POST['Meios_Auxiliares_Ocorrencia'] : [];
$meios_auxiliares = implode(", ", $meios_auxiliares_checkbox);

// Outros campos
$ataduras = $_POST['ataduras'];
$cateter_tp_oculos = $_POST['cateter_tp_oculos'];
$compressa_comum = $_POST['compressa_comum'];
$kit_tipo = $_POST['kit_tipo'];
$kit_qtd = $_POST['kit_qtd'];
$luvas = $_POST['luvas'];
$mascaras = $_POST['mascaras'];
$manta_aluminizada = $_POST['manta_aluminizada'];
$pas_dea = $_POST['pas_dea'];
$sonda_asp = $_POST['sonda_asp'];
$soro_fisiologico = $_POST['soro_fisiologico'];
$talas_tipo = $_POST['talas_tipo'];
$talas_qtd = $_POST['talas_qtd'];
$base_establizador = $_POST['base_establizador'];
$colar_tipo = $_POST['colar_tipo'];
$colar_qtd = $_POST['colar_qtd'];
$coxins = $_POST['coxins'];
$ked_tipo = $_POST['ked_tipo'];
$ket_qtd = $_POST['ket_qtd'];
$maca_rigida = $_POST['maca_rigida'];
$ttf_tipo = $_POST['ttf_tipo'];
$qtd_ttf = $_POST['qtd_ttf'];
$tirante_aranha = $_POST['tirante_aranha'];
$tirante_cabeca = $_POST['tirante_cabeca'];
$canula = $_POST['canula'];
$observacoes = $_POST['observacoes'];

$sql = "INSERT INTO historico 
        (ocorrencia_referente, socorrista_id, procedimentos_efetuados, imobilizacoes, colar, tamanho_colar, lpm, meios_auxiliares, ataduras, cateter_tp_oculos, compressa_comum, kit_tipo, kit_qtd, luvas, mascaras, manta_aluminizada, pas_dea, sonda_asp, soro_fisiologico, talas_tipo, talas_qtd, base_establizador, colar_tipo, colar_qtd, coxins, ked_tipo, ket_qtd, maca_rigida, ttf_tipo, qtd_ttf, tirante_aranha, tirante_cabeca, canula, observacoes) 
        VALUES 
        ('$ocorrencia_referente','$socorrista_id', '$procedimentos_efetuados', '$imobilizacoes', '$uso_colar', '$tamanho_colar', '$lpm', '$meios_auxiliares', '$ataduras', '$cateter_tp_oculos', '$compressa_comum', '$kit_tipo', '$kit_qtd', '$luvas', '$mascaras', '$manta_aluminizada', '$pas_dea', '$sonda_asp', '$soro_fisiologico', '$talas_tipo', '$talas_qtd', '$base_establizador', '$colar_tipo', '$colar_qtd', '$coxins', '$ked_tipo', '$ket_qtd', '$maca_rigida', '$ttf_tipo', '$qtd_ttf', '$tirante_aranha', '$tirante_cabeca', '$canula', '$observacoes')";

$stmt = $dbh->connect()->prepare($sql);
$stmt->execute();

if($stmt) {
  echo
  "
    <script type='text/javascript'>
      window.alert('Ocorrência cadastrada, você pode alterá-la somente caso seja um admin!');
    </script>
  ";
  header("Location: ../../dist/historico.php?success=historico-criado");
  exit();
} else {
  header("Location: ../../dist/historico.php?error=erro-ao-criar-historico");
  exit();
}