<?php
// Variáveis correspondentes aos campos name das checkboxes
$procedimentosEfetuados = isset($_POST['procedimento_efetuado_checkbox']) ? $_POST['procedimento_efetuado_checkbox'] : [];

// Variáveis para armazenar os valores selecionados
$avaliacaoInicial = in_array('Avaliação Inicial', $procedimentosEfetuados);
$avaliacaoDirigida = in_array('Avaliação Dirigida', $procedimentosEfetuados);
$avaliacaoContinuada = in_array('Avaliação Continuada', $procedimentosEfetuados);
$aspiracao = in_array('Aspiração', $procedimentosEfetuados);
$chaveRautek = in_array('Chave Rautek', $procedimentosEfetuados);
$canulaGuedel = in_array('Cânula de Guedel', $procedimentosEfetuados);
$desobstrucaoVA = in_array('Desobstrução de V.A', $procedimentosEfetuados);
$empregoDEA = in_array('Emprego de D.E.A', $procedimentosEfetuados);
$gerenciamentoRiscos = in_array('Gerenciamento de riscos', $procedimentosEfetuados);
$limpezaFerimento = in_array('Limpeza de ferimento', $procedimentosEfetuados);
$curativos = in_array('Curativos', $procedimentosEfetuados);
$compressivo = in_array('Compressivo', $procedimentosEfetuados);
$encravamento = in_array('Encravamento', $procedimentosEfetuados);
$ocular = in_array('Ocular', $procedimentosEfetuados);
$queimadura = in_array('Queimadura', $procedimentosEfetuados);
$simples = in_array('Simples', $procedimentosEfetuados);
$tresPontas = in_array('3 Pontas', $procedimentosEfetuados);


echo "Avaliação Inicial: " . ($avaliacaoInicial ? "Marcada" : "Não Marcada") . "<br>";
echo "Avaliação Dirigida: " . ($avaliacaoDirigida ? "Marcada" : "Não Marcada") . "<br>";
echo "Avaliação Continuada: " . ($avaliacaoContinuada ? "Marcada" : "Não Marcada") . "<br>";
echo "Aspiração: " . ($aspiracao ? "Marcada" : "Não Marcada") . "<br>";
echo "Chave Rautek: " . ($chaveRautek ? "Marcada" : "Não Marcada") . "<br>";
echo "Cânula de Guedel: " . ($canulaGuedel ? "Marcada" : "Não Marcada") . "<br>";
echo "Desobstrução de V.A: " . ($desobstrucaoVA ? "Marcada" : "Não Marcada") . "<br>";
echo "Emprego de D.E.A: " . ($empregoDEA ? "Marcada" : "Não Marcada") . "<br>";
echo "Gerenciamento de Riscos: " . ($gerenciamentoRiscos ? "Marcada" : "Não Marcada") . "<br>";
echo "Limpeza de Ferimento: " . ($limpezaFerimento ? "Marcada" : "Não Marcada") . "<br>";
echo "Curativos: " . ($curativos ? "Marcada" : "Não Marcada") . "<br>";
echo "Compressivo: " . ($compressivo ? "Marcada" : "Não Marcada") . "<br>";
echo "Encravamento: " . ($encravamento ? "Marcada" : "Não Marcada") . "<br>";
echo "Ocular: " . ($ocular ? "Marcada" : "Não Marcada") . "<br>";
echo "Queimadura: " . ($queimadura ? "Marcada" : "Não Marcada") . "<br>";
echo "Simples: " . ($simples ? "Marcada" : "Não Marcada") . "<br>";
echo "3 Pontas: " . ($tresPontas ? "Marcada" : "Não Marcada") . "<br>";
?>
