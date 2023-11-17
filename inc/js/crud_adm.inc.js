document.addEventListener("DOMContentLoaded", () =>  {
  hideAll();
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