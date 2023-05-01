<?php

    session_start();

    require_once '../core/conexao.php';

    $erros = array();

    try {
        
        $select = $pdo->prepare('SELECT * FROM usuarios WHERE usuario = :usuario');
        $select->bindValue(':usuario',$_POST['txtUsuario']);
        $select->execute();
        $usuario = $select->fetch();

        $usuariosEncontrados = $select->rowCount();

        if ($usuariosEncontrados > 0) {

            if (password_verify($_POST['txtSenha'].$usuario->salt, $usuario->senha)) {

                $_SESSION['usuario_id'] = $usuario->id;
                $_SESSION['usuario_nome'] = $usuario->nome;

                header('Location: ../dashboard/');

            } else {
                array_push($erros,'Dados de acesso incorretos!');
                session_destroy();
            }

        } else {
            array_push($erros,'Usuário não encontrado!');
            session_destroy();
        }

    } catch (PDOException $e) {
        
        array_push($erros,"<strong>Erro ao buscar dados do USUÁRIO no Banco de Dados:</strong> ".$e->getMessage());
        session_destroy();
        
    }    
    

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logando no Sistema...</title>

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

        <h1>Erro</h1>

        <?php foreach ($erros as $erro) { ?>

            <p>- <?php echo $erro;?></p>

        <?php } ?>

        <a href="index.php"><< Voltar</a>
        
    </main>

</body>
</html>