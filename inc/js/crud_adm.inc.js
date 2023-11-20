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
        
        cell1.classList.add("p-6");

        const linkEditar = document.createElement("a");
        linkEditar.textContent = "Editar";
        linkEditar.href = "#"; // Adicione a URL de edição aqui
        linkEditar.addEventListener("click", function(event) {
          event.preventDefault();
          // Lógica para editar o usuário
          alert("Editar usuário: " + lista[x].nome);
        });

        const linkExcluir = document.createElement("a");
        linkExcluir.textContent = "Excluir";
        linkExcluir.href = "#"; // Adicione a URL de exclusão aqui
        linkExcluir.addEventListener("click", function(event) {
          event.preventDefault();
          // Lógica para excluir o usuário
          alert("Excluir usuário: " + lista[x].nome);
        });

        cell5.appendChild(linkEditar);
        cell5.appendChild(linkExcluir);

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
    beforeSend: function(xhr) {
      console.log("Operação sendo realizada");
    },
    complete: function(xhr, status) {
      console.log("Operação finalizada.");
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
        
        cell1.classList.add("p-6");

        const linkEditar = document.createElement("a");
        linkEditar.textContent = "Editar";
        linkEditar.href = "#"; // Adicione a URL de edição aqui
        linkEditar.addEventListener("click", function(event) {
          event.preventDefault();
          // Lógica para editar o usuário
          alert("Editar usuário: " + lista[x].nome);
        });

        const linkExcluir = document.createElement("a");
        linkExcluir.textContent = "Excluir";
        linkExcluir.href = "#"; // Adicione a URL de exclusão aqui
        linkExcluir.addEventListener("click", function(event) {
          event.preventDefault();
          // Lógica para excluir o usuário
          alert("Excluir usuário: " + lista[x].nome);
        });

        cell5.appendChild(linkEditar);
        cell5.appendChild(linkExcluir);
      }
    },
    error: function(xhr, status, error) {
      alert("Erro inesperado:" + error);
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

function addContent() {
  var dadosForm = $('#form_new_rescuer').serialize();

  $.ajax({
    type: "POST",
    url: "../../inc/general-handler.inc.php?action=cadastrar-usuario",
    data: dadosForm,
    dataType: 'json',

    success: function(retorno) {
      var valores = retorno;
      var lista = valores.dadosUsuarios

      for(x=0;x<lista.length;x++) {
        console.log(lista[x].nome);
        console.log(lista[x].fibra);
        console.log(lista[x].cmdt);
        console.log(lista[x].cmdtCode);
      }
      loadUsers();
    },
    error: function(xhr, status, error) {
      alert("Há campos inválidos...");
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
    beforeSend: function(xhr) {
      console.log("Operação sendo realizada");
    },
    complete: function(xhr, status) {
      console.log("Operação finalizada.");
    },
    timeout: 10000
  })
}