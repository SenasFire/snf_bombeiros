/*
 ESTE SCRIPT BUGA A VALIDAÇÃO PHP (NÃO SEI PQ)

const inputElement = document.querySelectorAll(".input");
const botaoEnviar = document.querySelector(".button");
const alertElement = document.querySelector(".error");

inputElement.forEach((inputElement) => {
  inputElement.addEventListener("blur", () => {
    validateInput(inputElement, alertElement);
  });

  inputElement.addEventListener("input", () => {
    hideAlert(alertElement);
  });
});

botaoEnviar.addEventListener("click", (event) => {
  event.preventDefault();
});

function validateInput(inputElement, alertElement) {
  const inputValue = inputElement.value.trim();
  const isInvalid = inputValue === "" || inputValue.length > 150;

  if (isInvalid) {
    showAlert(alertElement);
  } else {
    hideAlert(alertElement);
  }

  verificarBotao();
}

function showAlert(alertElement) {
  alertElement.classList.remove("hidden");
  alertElement.classList.add("flex");
}

function hideAlert(alertElement) {
  alertElement.classList.add("hidden");
  alertElement.classList.remove("flex");
}

function verificarBotao() {
  const isAnyFieldInvalid = Array.from(inputElements).some((inputElement) =>
    isInputInvalid(inputElement)
  );

  botaoEnviar.disabled = isAnyFieldInvalid;
}

function isInputInvalid(inputElement) {
  const inputValue = inputElement.value.trim();
  return inputValue === "" || inputValue.length > 150;
}

*/
// Código para exibir o registro do comandante (desktop):
// Selecione o botão de rádio "Sim" e o campo "Registro de Comandante"
const radioSim = document.getElementById('adm_sim_desktop');
const containerAdmin = document.getElementById('adm_code_container');

// Adicione um ouvinte de eventos para detectar quando o estado do botão "Sim" muda
document.addEventListener('change', function() {
  if (radioSim.checked) {
    containerAdmin.classList.remove("hidden");
    containerAdmin.classList.add("flex");
  } else {
    containerAdmin.classList.add("hidden");
  }
});

// Exibir registro do comandante (mobile):
const radioSimMobile = document.getElementById("adm_sim");
const containerAdmMobile = document.getElementById("adm_container_mobile");

document.addEventListener("change", function () {
  if(radioSimMobile.checked) {
    containerAdmMobile.classList.remove("hidden");
    containerAdmMobile.classList.add("flex");
  } else {
    containerAdmMobile.classList.add("hidden");
  }
})