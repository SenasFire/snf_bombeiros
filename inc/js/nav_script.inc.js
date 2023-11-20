const menuToggle = document.getElementById("menu-toggle");
const navigationMenu = document.getElementById("primary-navigation");
const navToggle = document.getElementById("nav-close");

function expandirMenu() {
  menuToggle.classList.add('hidden');
  navigationMenu.classList.remove('hidden');
  navToggle.classList.remove('hidden');
}

function retrairMenu() {
  navToggle.classList.add('hidden');
  navigationMenu.classList.add('hidden');
  menuToggle.classList.remove('hidden');
}

function abrirCadastro() {
  window.open("../../dist/adm/cadastar_admin.php");
}