const inputNome = document.getElementById("input_name");
const inputFibra = document.getElementById("num_fibra");
const inputSenha = document.getElementById("input_senha");

const alertMessage = document.getElementById("error");

const botaoEnviar = document.getElementById("cadastrar");

inputNome.addEventListener("blur", () => {
  validateInput(inputNome, alertMessage);
});

inputNome.addEventListener("input", () => {
  hideAlert(alertMessage);
});

inputFibra.addEventListener("blur", () => {
  validateInput(inputFibra, alertMessage);
});

inputFibra.addEventListener("input", () => {
  hideAlert(alertMessage);
});

inputSenha.addEventListener("blur", () => {
  validateInput(inputSenha, alertMessage);
});

inputSenha.addEventListener("input", () => {
  hideAlert(alertMessage);
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

function showAlert(element) {
  element.classList.remove("hidden");
  element.classList.add("flex");
}

function hideAlert(element) {
  element.classList.add("hidden");
  element.classList.remove("flex");
}

function verificarBotao() {
  const isAnyFieldInvalid =
    isInputInvalid(inputNome) ||
    isInputInvalid(inputFibra) ||
    isInputInvalid(inputSenha);

  botaoEnviar.disabled = isAnyFieldInvalid;
}

function isInputInvalid(inputElement) {
  const inputValue = inputElement.value.trim();
  return inputValue === "" || inputValue.length > 150;
}