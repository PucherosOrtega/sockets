<?php
    include ("vendor/autoload.php");
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    </head>
    <body>
    <h1>Ingresa los siguientes datos</h1>
    <form method="POST">
        <div class="row">
        <form class="col s12">
        <div class="row">
            <div class="input-field col s12">
                <input id="name" type="text" class="validate">
            <label for="name">Nombre</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input id="phone" type="text" class="validate">
            <label for="phone">Telefono</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input id="email" type="text" class="validate">
            <label for="email">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s12">
            <input id="content" type="text" class="validate">
            <label for="content">Contenido</label>
            </div>
        </div>
        <div class="row">
            <a class="waves-effect waves-light btn" onclick="generarGuia()">button</a>
        </div>
        </form>
    </div>
    </form>
    </body>
    <script>
       
        function generarGuia(){
            let _data = {
                name: document.getElementById("name").value,
                email: document.getElementById("email").value,
                phone: document.getElementById("phone").value,
                content: document.getElementById("content").value
            };
            fetch('http://localhost:3000/Services/createGuide.php',{
                 "method":"POST",
                 "headers": {
                    "Content-Type":"application/json;charset=utf-8"
                 },
                 "body": JSON.stringify(_data)
             }).then(response => response.json)
             .then(data => {
                console.log(data);
                alert("Agregado");
                document.forms[0].reset();
             });
        };

    </script>
</html>