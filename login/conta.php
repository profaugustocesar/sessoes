<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Conta</title>

    <style>
        body {
            height: 100vh;
            background-color: #333;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            width: 350px;
            padding: 30px;
            background-color: whitesmoke;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
        }

        input {
            font-size: 16px;
            font-weight: bold;
            padding: 10px;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-bottom: 20px;
            margin-top: 5px;
            border-radius: 10px;
            border: solid 1px #222;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }

        button {
            font-size: 16px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding: 10px;
            margin-top: 20px;
            margin-bottom: 10px;
            border-radius: 10px;
            border: solid 1px #222;
            background-color: #333;
            color: whitesmoke;
            cursor: pointer;
        }

        h1 {
            font-size: 30px;
            font-weight: bold;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            margin-top: 0;
            margin-bottom: 25px;
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

    <form action="salvarConta.php" method="post">

        <h1>Criar Conta</h1>

        <label for="txtUsuario">Usuário</label>
        <input type="text" id="txtUsuario" name="txtUsuario" autocomplete="off">

        <label for="txtSenha">Senha</label>
        <input type="password" id="txtSenha" name="txtSenha">

        <button type="submit">Criar Conta</button>


        <a href="index.php">Fazer Login</a>

    </form>

</body>
</html>