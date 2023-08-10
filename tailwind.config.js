/**
 * @format
 * @type {import('tailwindcss').Config} 
 */
const colors = require('tailwindcss/colors')

module.exports = {
  content: [
    "./dist/**.{html,js}",
    "./map/**.{html,js,php}",
    "./draft/**.{html,js,php}",
    "./inc/**/*.{php,inc}",
    "**.",
    "./src/**."
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
        input_placeholder: 'rgba(89,89,89,0.75)'
      },
      width: {
        imagem_placeholder: '192px'
      },
      height: {
        imagem_placeholder: '192px',
        fundo_branco: '580px'
      }
    },
  },
  plugins: [],
}

