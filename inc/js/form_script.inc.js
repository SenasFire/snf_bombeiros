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