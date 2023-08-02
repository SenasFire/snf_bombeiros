A ideia é utilizar um `image map` HTML com a tag `<map>`, uma imagem com *áreas* clicáveis, estas definidas por uma ou mais tags `<area>`.

#Exemplo W3C:

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