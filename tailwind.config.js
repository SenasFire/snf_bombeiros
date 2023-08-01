/**
 * @format
 * @type {import('tailwindcss').Config} 
 */
module.exports = {
  content: ["./dist/**/*.{html,js}"],
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
      colors: {
        vermelho: '#C7402D',
        cinza: '#595959',
        preto: '#252525'
      },
      width: {
        imagem_placeholder: '192px'
      },
      height: {
        imagem_placeholder: '192px'
      }
    },
  },
  plugins: [],
}

