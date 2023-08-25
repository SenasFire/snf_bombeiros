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

Classes responsivas Tailwind:
- sm = small,
- md = medium,
- lg = large,
- xl = extra-large

Extensões de cor com base nas cores do projeto:

```
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
```

O tailwind css verifica mudanças em arquivos que utilizam suas classes, estes arquivos são definidos em glob pattern no arquivo de configuração do tailwind. Quando o tailwind está sendo construído, ele identifica as classes utilizadas e as adiciona ao arquivo -o output (-o = output -i = input), visando otimizar espaço.

A ideia é utilizar um `image map` HTML com a tag `<map>`, uma imagem com *áreas* clicáveis, estas definidas por uma ou mais tags `<area>`.

# Exemplo W3C:

```
<img src="workplace.jpg" alt="Workplace" usemap="#workmap">

<map name="workmap">
    <area shape="rect" coords="34,44,270,350" alt="Computer" href="computer.htm">
    <area shape="rect" coords="290,172,333,250" alt="Phone" href="phone.htm">
    <area shape="circle" coords="337,300,44" alt="Coffee" href="coffee.htm">
</map>
```

Você só deve criar uma `<img>` com o atributo "usemap = #id" ficando assim:
`<img src="image.png" alt="img" width="100px" height="100px" usemap="#image">`

Depois crie um mapa com está imagem da seguinte forma:

```
<map name="image">
    <!-- Shape pode ser rect para retangulo circle para círculo poly ... -->
    <area shape="rect" coords="x1,y1,x2,y2" href="link_quando_clicado">
</map>

<!-- Adicione onclick para utilizar JavaScript junto com image map -->
<map name="workmap">
    <area shape="circle" coords="337,300,44" href="coffee.htm" onclick="myFunction()">
</map>

<script>
    function myFunction() 
    {
        alert("You clicked the coffee cup!");
    }
</script>
```