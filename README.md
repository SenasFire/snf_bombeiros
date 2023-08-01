# App Bombeiros

Este será um aplicativo para os bombeiros voluntários, precisamente para o grupo de resgate aéreo da região do vale do Itapocu, NOAR.

Para alterar configurações no tailwind, ajuste o arquivo .config JSON-Like tailwind.config.js e rode o npm run dev, que executa:
`"dev": "tailwindcss -i ./src/input.css -o ./dist/output.css --watch"` Para construir o tailwind.

Customização no `tailwind.config.js`:

```
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
}
```