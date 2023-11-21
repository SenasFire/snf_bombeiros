document.addEventListener("DOMContentLoaded", () =>  {
  loadUsers();
  loadDoctor();
  showForm('btn', 'form_new_team');
});

// Esconder todos os forms, chamado no carregamento da página / quando um novo botão é clicado
function hideAll() {
  var forms = document.getElementsByClassName('changeable_form');
  for (var i = 0; i < forms.length; i++) {
    forms[i].classList.add('hidden');
  }
}

document.getElementById('btn_new_team').addEventListener('click', function() {
  showForm('btn_new_team', 'form_new_team');
});
 
document.getElementById('btn_new_rescuer').addEventListener('click', function() {
  showForm('btn_new_rescuer', 'form_new_rescuer');
});

document.getElementById('btn_new_doctor').addEventListener('click', function() {
  showForm('btn_new_doctor', 'form_new_doctor');
});

document.getElementById('btn_new_post').addEventListener('click', function() {
  showForm('btn_new_post', 'form_new_post');
});

// Exibir o form referente à cada botão pressionado
function showForm(buttonId, formId) {
  // - esconder todos os forms e exivir apenas o desejado
  hideAll();
  // - sticking with tailwindcss (element.style.display = 'flex does not work as intended) 
  document.getElementById(formId).classList.remove('hidden');
  document.getElementById(formId).classList.add('flex');
}

function Executar(elemento, acao) {
  // Obter o ID associado ao link clicado
  var id = elemento.getAttribute('data-id');

  // Enviar dados via AJAX
  $.ajax({
    type: 'POST',
    url: '../../inc/class/usuario-db.class.php?action='+acao+'&id='+id,  // Substitua pelo caminho correto para o seu arquivo PHP no servidor
    data: id,
    dataType: 'json',
    success: function(retorno) {
      loadDoctor();
      loadUsers();
    },
    error: function(xhr, status, error) {
      // Lógica para lidar com erros de requisição AJAX
      alert('Erro ao deletar: ' + error);
    }
  });
}

function loadUsers() {
  const userTable = document.getElementById("userTable");
  userTable.innerHTML = "";

  var selectUsers = document.getElementsByClassName('select')[0];

  $.ajax({
    type: "GET",
    url: "../../inc/class/usuario-db.class.php?action=listarUsuarios",
    dataType: 'json',

    success: function(retorno) {  
      var valores = retorno;          
      var lista = valores.dadosUsuarios;
      
      if(lista.length<=0) {
        const row = userTable.insertRow();
        row.innerHTML = "<p class='w-full self-stretch'>Nenhum cadastro no momento...</p>"
      }

      for(x=0;x<lista.length;x++)
      {
        const row = userTable.insertRow();
        const cell1 = row.insertCell(0);
        const cell2 = row.insertCell(1);
        const cell3 = row.insertCell(2);
        const cell4 = row.insertCell(3);
        const cell5 = row.insertCell(4);

        cell1.textContent = lista[x].nome;
        cell2.textContent = lista[x].fibra;
        cell3.textContent = lista[x].cmdt;
        cell4.textContent = lista[x].cmdtCode || "-";
        cell5.innerHTML = `<a href="#" data-id="${lista[x].id}" onclick="Executar(this,'excluir')">Excluir</a>`;

        cell1.classList.add("p-6");

        var option = document.createElement('option');
        option.classList.add("text-xs")
        option.value = lista[x].valor; // Substitua 'valor' pelo nome real do campo
        option.textContent = lista[x].nome; // Substitua 'nome' pelo nome real do campo
        selectUsers.appendChild(option);
      }
    },
    error: function(xhr, status, error) {
      alert("Erro inesperado:" + error);
    },
    timeout: 10000
  })
}

function loadDoctor() {
  const doc_table = document.getElementById("doc_table");
  doc_table.innerHTML = "";

  $.ajax({
    type: "GET",
    url: "../../inc/class/usuario-db.class.php?action=listar-medicos",
    dataType: 'json',

    success: function(retorno) {  
      var valores = retorno;          
      var lista = valores.dados_medicos;

      if(lista.length<=0) {
        const row = doc_table.insertRow();
        row.innerHTML = "<p class='w-full self-stretch'>Nenhum cadastro no momento...</p>"
      }

      for(x=0;x<lista.length;x++)
      {
        const row = doc_table.insertRow();
        const cell1 = row.insertCell(0);
        const cell2 = row.insertCell(1);
        const cell3 = row.insertCell(2);
        const cell4 = row.insertCell(3);
        const cell5 = row.insertCell(4);

        cell1.textContent = lista[x].id;
        cell2.textContent = lista[x].nome;
        cell3.textContent = lista[x].cpf;
        cell4.textContent = lista[x].email;
        cell5.innerHTML = `<a href="#" data-id="${lista[x].id}" onclick="Executar(this,'excluir-medico')">Excluir</a>`;

        cell1.classList.add("p-6");

      }
    },
    error: function(xhr, status, error) {
      alert("Erro ao carregar médicos:" + error);
    },
    beforeSend: function(xhr) {
      console.log("Operação sendo realizada");
    },
    complete: function(xhr, status) {
      console.log("Operação finalizada.");
    },
    timeout: 10000
  })
}

function addUser() {
  var dadosForm = $('#form_new_rescuer').serialize();

  $.ajax({
    type: "POST",
    url: "../../inc/general-handler.inc.php?action=cadastrar-usuario",
    data: dadosForm,
    dataType: 'json',

    success: function(retorno) {
      var valores = retorno;
      var lista = valores.dadosUsuarios

      loadUsers();
    },
    error: function(xhr, status, error) {
      alert("Há campos inválidos..." + error);
    },
    beforeSend: function(xhr) {
      console.log("Operação sendo realizada");
    },
    complete: function(xhr, status) {
      console.log("Operação finalizada.");
    },
    timeout: 10000
  })
}

function addDoctor() {
  var dadosForm = $('#form_new_doctor').serialize();

  $.ajax({
    type: "POST",
    url: "../../inc/general-handler.inc.php?action=cadastrar-medico",
    data: dadosForm,
    dataType: 'json',

    success: function(retorno) {
      var valores = retorno;
      var lista = valores.dados_medicos

      for(x=0;x<lista.length;x++) {
        console.log(lista[x].id);
        console.log(lista[x].nome);
        console.log(lista[x].cpf);
        console.log(lista[x].email);
      }
      loadDoctor();
    },
    error: function(xhr, status, error) {
      alert("Há campos inválidos...");
    },
    timeout: 10000
  })
}