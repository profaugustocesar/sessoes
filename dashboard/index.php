<?php
    require_once '../core/verificarSessao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Restrita</title>

    <style>
        body {
            height: 100vh;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        main {
            width: 350px;
            padding: 30px;
            background-color: whitesmoke;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-top: 0;
            margin-bottom: 25px;
            text-align: center;
        }

        p {
            font-size: 14px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
        }

        a {
            font-size: 18px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <main>

        <h1>Área Restrita</h1>

        <p>Este é um exemplo de área restrita de um site.</p>

        <a href="../login/deslogar.php">SAIR</a>

    </main>

</body>
</html>