/**
 * @format
 * @type {import('tailwindcss').Config} 
 */
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    './inc/**.{html, js, php, inc}',
    './draft/**/**.{html, js, php, inc}',
    './map/**/*.{html, js, php}',
    './dist/**/*.{html,js,php}'
  ],
  theme: {
    extend: {
      fontFamily: {
        'poppins': ['Poppins', 'sans-serif']
      },
      fontWeight: {
        'thin': 200,
        'light': 300,
        'regular': 400,
        'medium': 500,
        'semibold': 600,
        'bold': 700,
        'extrabold': 800,
        'black': 900
      },
      fontStyle: ['italic'],
      fontSize: {
        exsm: '0.5rem',
        sm: '1rem'
      },
      colors: {
        vermelho: '#C7402D',
        cinza: '#595959',
        preto: '#252525',
        input_color: '#EDEDED',
        input_placeholder: 'rgba(89,89,89,0.75)',
        error_bg: 'rgba(199, 64, 45, 0.10)',
        border_error: 'rgba(199, 64, 45, 0.60)'
      },
      width: {
        imagem_placeholder: '192px'
      },
      height: {
        imagem_placeholder: '192px',
        fundo_branco: '580px'
      },
      backgroundImage: {
        'menu-icon-toggle': "url('../public/images/menu-icon-toggle.svg')",
        'close': "url('../public/images/close.svg')",
        'logo-noar': "url('/public/images/logo-noar.png')",
        'bg-mobile': "url('../public/images/bg-mobile.svg')",
        'bg-tablet': "url('../public/images/bg-tablet.svg')",
        'ambulance': "url('../public/images/ambulance.png')",
      },
      aspectRatio: {
        '1': '1 / 1',
      },
      screens: {
        'desktop': '1680px',
        'lg': '1300px',
        'laptop': '1024px',
        'tablet': '604px'
      }
    },
  },
  jit: true,
  plugins: [],
}

