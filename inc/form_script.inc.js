const inputNome = document.getElementById("input_name");
const inputFibra = document.getElementById("num_fibra");
const inputSenha = document.getElementById("input_senha");
const alertMessageNome = document.getElementById("error_nome");
const alertMessageFibra = document.getElementById("error_fibra");
const alertMessageSenha = document.getElementById("error_senha");

//NOME

inputNome.addEventListener("blur", () => {
  var inputValue = inputNome.value.trim();

  if (inputValue === "" || inputValue.length > 150) {
    alertMessageNome.classList.remove("hidden");
    alertMessageNome.classList.add("flex");
  } else {
    alertMessageNome.classList.add("hidden");
    alertMessageNome.classList.remove("flex");
  }
});

inputNome.addEventListener("input", () => {
  alertMessageNome.classList.add("hidden");
});

//N° FIBRA

inputFibra.addEventListener("blur", () => {
  var inputValue = inputFibra.value.trim();

  if (inputValue === "" || inputValue.length > 150) {
    alertMessageFibra.classList.remove("hidden");
    alertMessageFibra.classList.add("flex");
  } else {
    alertMessageFibra.classList.add("hidden");
    alertMessageFibra.classList.remove("flex");
  }
});

inputFibra.addEventListener("input", () => {
  alertMessageFibra.classList.add("hidden");
});

//SENHA

inputSenha.addEventListener("blur", () => {
  var inputValue = inputSenha.value.trim();

  if (inputValue === "" || inputValue.length > 150) {
    alertMessageSenha.classList.remove("hidden");
    alertMessageSenha.classList.add("flex");
  } else {
    alertMessageSenha.classList.add("hidden");
    alertMessageSenha.classList.remove("flex");
  }
});

inputSenha.addEventListener("input", () => {
  alertMessageSenha.classList.add("hidden");
});