<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Desafio</title>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    </head>
    <body>
        <h1>Pesquisar Evento</h1>
        <form method="POST" action="">
            <label>Evento: </label>
            <input type="text" name="event" id="event" placeholder="Pesquisar pelo evento">

        </form><br><br>
 
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

        <script>
            $(function () {
                
                    $("#event").autocomplete({
                    source: 'retornaeventos.php',minLength: 2
                });
               
               
            });
        </script>
    </body>
</html>
