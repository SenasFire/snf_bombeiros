<!-- Importar este arquivo include para toda página que desejar exibir o footer com PHP -->
<link rel="stylesheet" href="../dist/output.css">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

<footer class="flex flex-col justify-center items-start gap-[0.625rem] w-full h-full self-stretch bg-white">

  <section class="container_footer flex flex-col justify-center items-center gap-5 p-8 self-stretch">
    <!-- LOGOS: -->
    <section class="logos_row flex flex-row justify-center items-center gap-[0.9375rem] self-stretch">
      <img src="../public/images/logo-noar.png" alt="Logo Noar" class="w-[10rem] h-[10rem]">
      <img src="../public/images/ambulancia.png" alt="Logo Ambulância" class="w-[10rem] h-[10rem]">
    </section>

    <!-- SOBRE O SISTEMA: -->
    <header aria-labelledby="footer_title" class="header flex flex-col justify-center items-start gap-2.5 self-stretch">
      <h1 id="footer_title" class="text-4xl font-poppins font-bold leading-9 text-preto">SOS Bombeiros</h1>
      <p class="self-stretch text-cinza font-poppins text-xl font-normal leading-5">
        Fazendo uso da <b>tecnologia</b> para <b>otimizar</b> o atendimento de ocorrências e facilitar a <b>comunicação</b> entre bombeiros e médicos
      </p>
    </header>

    <!-- NAVEGAÇÃO: -->
    <section aria-labelledby="navegar_title" class="group_1 flex flex-col items-center gap-2.5 self-stretch">
      <h1 id="navegar_title" class="font-poppins font-bold leading-10 text-[2.5rem] text-preto">Navegar</h1>
      <ul class="flex flex-col text-cinza font-poppins font-normal leading-5 w-full">
        <li>Principal</li>
        <li>Login</li>
        <li>Ocorrências</li>
        <li>Dados</li>
      </ul>
    </section>

    <!-- CONTATO: -->
    <section aria-labelledby="contato_title" class="contato flex flex-col items-center gap-2.5 self-stretch">

      <h1 id="contato_title" class="font-poppins font-bold leading-10 text-[2.5rem] text-preto">Contato</h1>
      <ul class="flex flex-col text-cinza font-poppins font-normal leading-5 w-full">
        <div class="text flex flex-row gap-2.5">
          <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 14 20" fill="none">
            <path d="M7 0C3.13 0 0 3.13 0 7C0 12.25 7 20 7 20C7 20 14 12.25 14 7C14 3.13 10.87 0 7 0ZM7 9.5C5.62 9.5 4.5 8.38 4.5 7C4.5 5.62 5.62 4.5 7 4.5C8.38 4.5 9.5 5.62 9.5 7C9.5 8.38 8.38 9.5 7 9.5Z" fill="#555555"/>
          </svg>
          <a href="">Av. Procópio Gomes, 244</a>
        </div>

        <div class="text flex flex-row gap-2.5">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path d="M22.6159 15.5537L17.1823 13.119L17.1615 13.1098C16.8085 12.9569 16.4228 12.8951 16.0397 12.9302C15.6566 12.9652 15.2885 13.0961 14.9692 13.3106C14.9244 13.3406 14.8812 13.3729 14.8399 13.4075L12.2656 15.5998C10.7656 14.7864 9.21597 13.2494 8.40133 11.7679L10.6006 9.1532C10.6362 9.11121 10.669 9.06688 10.6987 9.02051C10.9073 8.70222 11.0339 8.33729 11.0674 7.9582C11.1008 7.57912 11.0399 7.19766 10.8902 6.84778C10.8867 6.84108 10.8836 6.83414 10.881 6.82701L8.44634 1.38423C8.24664 0.928939 7.90559 0.55009 7.47372 0.303811C7.04184 0.0575326 6.54212 -0.0430744 6.04859 0.0168962C4.3736 0.236931 2.83598 1.05915 1.7229 2.33C0.609813 3.60084 -0.0026096 5.23341 8.35872e-06 6.92278C8.35872e-06 16.3395 7.66055 24 17.0773 24C18.7667 24.0026 20.3992 23.3902 21.6701 22.2771C22.9409 21.164 23.7632 19.6264 23.9832 17.9514C24.043 17.4579 23.9423 16.9583 23.696 16.5265C23.4498 16.0946 23.071 15.7535 22.6159 15.5537ZM17.0773 21.2307C13.284 21.2261 9.64734 19.7172 6.96507 17.035C4.28279 14.3527 2.77388 10.7161 2.7693 6.92278C2.76649 5.96689 3.09101 5.03883 3.68887 4.29297C4.28674 3.54712 5.12192 3.0284 6.05552 2.8231L8.2271 7.66933L6.01629 10.3001C5.98029 10.3421 5.94714 10.3864 5.91705 10.4328C5.69873 10.7661 5.57038 11.1501 5.5445 11.5476C5.51862 11.9452 5.59608 12.3426 5.76936 12.7013C6.8563 14.926 9.09597 17.1506 11.3437 18.2399C11.7045 18.4109 12.1035 18.4855 12.5018 18.4561C12.9 18.4268 13.2838 18.2946 13.6157 18.0726C13.6603 18.0425 13.7031 18.0097 13.7438 17.9745L16.3319 15.7741L21.1781 17.9445C20.9724 18.8781 20.4534 19.7132 19.7074 20.311C18.9614 20.9088 18.0333 21.2334 17.0773 21.2307ZM12.9234 5.99969C12.9234 5.63246 13.0692 5.28027 13.3289 5.0206C13.5886 4.76093 13.9408 4.61505 14.308 4.61505H16.6157V2.30732C16.6157 1.94009 16.7616 1.5879 17.0213 1.32823C17.281 1.06856 17.6332 0.922681 18.0004 0.922681C18.3676 0.922681 18.7198 1.06856 18.9795 1.32823C19.2391 1.5879 19.385 1.94009 19.385 2.30732V4.61505H21.6928C22.06 4.61505 22.4122 4.76093 22.6719 5.0206C22.9315 5.28027 23.0774 5.63246 23.0774 5.99969C23.0774 6.36692 22.9315 6.71911 22.6719 6.97878C22.4122 7.23845 22.06 7.38433 21.6928 7.38433H19.385V9.69206C19.385 10.0593 19.2391 10.4115 18.9795 10.6711C18.7198 10.9308 18.3676 11.0767 18.0004 11.0767C17.6332 11.0767 17.281 10.9308 17.0213 10.6711C16.7616 10.4115 16.6157 10.0593 16.6157 9.69206V7.38433H14.308C13.9408 7.38433 13.5886 7.23845 13.3289 6.97878C13.0692 6.71911 12.9234 6.36692 12.9234 5.99969Z" fill="#555555"/>
          </svg>
          <a href="">+55 (47) 99735-5556</a>
        </div>

        <div class="text flex flex-row gap-2.5">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
            <path d="M16.83 5.5H14.23L8.5 2.5L2 5.9V15.5C0.9 15.5 0 14.6 0 13.5V5.67C0 5.14 0.32 4.58 0.8 4.33L8.5 0.5L16.04 4.33C16.47 4.56 16.77 5.03 16.83 5.5ZM18 6.5H5C3.9 6.5 3 7.4 3 8.5V17.5C3 18.6 3.9 19.5 5 19.5H18C19.1 19.5 20 18.6 20 17.5V8.5C20 7.4 19.1 6.5 18 6.5ZM18 10.17L11.5 13.5L5 10.17V8.5L11.5 11.83L18 8.5V10.17Z" fill="#555555"/>
          </svg>
          <a href="">paulo@email.com</a>
        </div>
        
        <div class="text flex flex-row gap-2.5">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="16" viewBox="0 0 22 16" fill="none">
            <path d="M12 4C12 1.79 10.21 0 8 0C5.79 0 4 1.79 4 4C4 6.21 5.79 8 8 8C10.21 8 12 6.21 12 4ZM14 6V8H17V11H19V8H22V6H19V3H17V6H14ZM0 14V16H16V14C16 11.34 10.67 10 8 10C5.33 10 0 11.34 0 14Z" fill="#555555"/>
          </svg>
          <a href="">@plxulo</a>
        </div>
      </ul>

    </section>
  </section>

  <!-- SOBRE FINAL BG VERMELHO -->
  <section class="container_footer2 flex flex-col px-8 py-16 justify-center items-center gap-6 bg-vermelho font-poppins">
    <header aria-labelledby="company_name" class="flex flex-col justify-center items-start gap-2.5 self-stretch">
      <h1 id="company_name" class="text-white font-poppins text-4xl font-bold leading-9">Senas Tech</h1>
      <p class="text-white font-poppins text-xl font-normal leading-5">
        Somos uma empresa de <b>tecnologia</b> localizada em Joinville, Santa Catarina, utilizamos de nossos <b>conhecimentos</b> e <b>ferramentas</b> para trazer aplicações <b>confiáveis</b> e <b>velozes</b> para o usuário final.
      </p>
    </header>
    <hr width="100%">
    <p class="font-poppins">Termos de uso e privacidade</p>
    <hr width="100%">
    <p class="font-poppins">Copyright, 2023</p>
  </section>

</footer>