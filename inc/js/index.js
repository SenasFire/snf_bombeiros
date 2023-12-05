var svg = document.getElementById('humanAnatomy'),
    NS = $('svg').attr('xmlns'),
    pinForm = $('#pinForm'),
    btnOK = $('#btnSuccess'),
    btnCancel = $('#btnDanger'),
    pinConfirm = $('#pinConfirm'),
    btnConfirmTrue = $('#btnConfirmTrue'),
    btnConfirmCancel = $('#btnConfirmCancel'),
    pinConfirmSucces = $('#pinConfirmSucces'),
    pinConfirmBtns = $('#pinConfirmBtns');

// Defina a função pinCenter antes de usá-la
function pinCenter(element, x, y) {
    var pt = svg.createSVGPoint();
    pt.x = x;
    pt.y = y;
    return pt.matrixTransform(element.getScreenCTM().inverse());
}

function adicionarCamposDinamicos(data) {
    // Adiciona os campos dinâmicos com os dados do formulário confirmado
    for (var key in data) {
        var novoCampo = $('<div class="form-group"> \
                              <label>' + key + '</label> \
                              <div> \
                                  <input type="text" name="' + key + '_dinamico" value="' + data[key] + '" disabled> \
                              </div> \
                          </div>');
        $('#camposDinamicos').append(novoCampo);
    }
}

var formData = {}; // Objeto para armazenar os dados

$(document).on('click', '#humanInner', function(e) {
    var t = e.target,
        x = e.clientX,
        y = e.clientY,
        target = (t == svg ? svg : t.parentNode),
        pin = pinCenter(target, x, y),
        newCircIdParam = "newcircle" + Math.round(pin.x) + '-' + Math.round(pin.y),
        circle = document.createElementNS(NS, 'circle');

    circle.setAttributeNS(null, 'cx', Math.round(pin.x));
    circle.setAttributeNS(null, 'cy', Math.round(pin.y));
    circle.setAttributeNS(null, 'r', 10);
    circle.setAttributeNS(null, 'class', "newcircle");
    circle.setAttributeNS(null, 'id', newCircIdParam);
    circle.setAttributeNS(null, 'data-x', Math.round(pin.x));
    circle.setAttributeNS(null, 'data-y', Math.round(pin.y));
    target.after(circle);

    pinConfirm.show();
    pinConfirmBtns.css({
        "left": (x + 20) + 'px',
        "top": (y) + 'px'
    });

    btnConfirmTrue.click(function () {
        // Coleta os valores dos campos do formulário
        var nomeDoenca = $('#textinput').val();
        var areaMarcada = $('#textinputArea').val();
        var comentarios = $('#textarea').val();

        // Armazena os dados no objeto formData
        var formData = {
            nomeDoenca: nomeDoenca,
            areaMarcada: areaMarcada,
            comentarios: comentarios
        };

        // Exibe os dados em campos dinâmicos
        adicionarCamposDinamicos(formData);

        pinConfirm.hide();
        pinForm.show();
    });

    btnCancel.click(function () {
        $("#humanInner + .newcircle").remove();
        pinConfirm.hide();
    });
});

// Botão OK para salvar os dados e exibir na lista
btnOK.click(function() {
    // Coleta os valores dos campos do formulário
    var nomeDoenca = $('#textinput').val();
    var areaMarcada = $('#textinputArea').val();
    var comentarios = $('#textarea').val();

    // Armazena os dados no objeto formData
    formData = {
        nomeDoenca: nomeDoenca,
        areaMarcada: areaMarcada,
        comentarios: comentarios
    };

    // Exibe os dados em forma de lista na página
    exibirDadosNaPagina(formData);

    // Mostra o formulário atual
    pinForm.show();

    // Oculta o formulário de confirmação
    pinConfirmSucces.hide();
});

// Função para exibir dados na página
function exibirDadosNaPagina(data) {
    // Limpa a lista de exibição
    $('#dadosLista').empty();

    // Exibe os dados em forma de lista
    for (var key in data) {
        $('#dadosLista').append('<li>' + key + ': <input type="text" name="' + key + '" value="' + data[key] + '" disabled></li>');
    }
}

// Botão Editar para habilitar a edição dos campos
$(document).on('click', '#btnEditar', function() {
    $('#dadosLista input').prop('disabled', false);
});

// Botão Salvar Edição para desabilitar a edição e atualizar os dados no objeto formData
$(document).on('click', '#btnSalvarEdicao', function() {
    $('#dadosLista input').prop('disabled', true);

    // Atualiza os dados no objeto formData
    $('#dadosLista input').each(function() {
        var fieldName = $(this).attr('name');
        formData[fieldName] = $(this).val();
    });
});

// Botão Cancelar Edição para desabilitar a edição sem salvar as alterações
$(document).on('click', '#btnCancelarEdicao', function() {
    // Desabilita a edição dos campos
    $('#dadosLista input').prop('disabled', true);
});