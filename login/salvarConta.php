<?php

require_once '../core/conexao.php';


// Array para guardar as mensagens de erro
$erros = array();


// Verifica se o método utilizado no envio do formulário foi o POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Sanitiza e Valida campo txtNOME *****************************************************

        if (isset($_POST['txtUsuario']) and !empty($_POST['txtUsuario'])) {
            //Retirei todas as tags primeiro
            $txtUsuario = strip_tags($_POST['txtUsuario']);
            //Depois filtrei com o filtro de caracteres especiais
            $txtUsuario = filter_var($txtUsuario, FILTER_SANITIZE_SPECIAL_CHARS);
        } else {
            array_push($erros, 'Preencha o campo USUÁRIO');
        }

    // **************************************************************************************




    // Sanitiza e Valida campo txtSenha *****************************************************
        if (isset($_POST['txtSenha']) and !empty($_POST['txtSenha'])) {
            
            $txtSenha = filter_input(INPUT_POST, 'txtSenha', FILTER_SANITIZE_SPECIAL_CHARS);

            if (strlen($txtSenha) < 6) {
                array_push($erros, 'A SENHA deve ter no mínimo 6 caracteres');
            } else {
                $salt = uniqid();
                $txtSenha = password_hash($txtSenha . $salt, PASSWORD_DEFAULT);
            }

        } else {
            array_push($erros, 'Preencha o campo SENHA');
        }
    // **************************************************************************************




    // Se a sanitização e validação não tiveram erros  **************************************
        if (count($erros) == 0) {
            
            // Realiza a operação de INSERT no BD *******************************************
                try {
                    
                    $insert = $pdo->prepare('INSERT INTO usuarios (usuario, senha, salt) VALUES (:usuario, :senha, :salt)');
                    $insert->bindValue(':usuario',$txtUsuario);
                    $insert->bindValue(':senha',$txtSenha);
                    $insert->bindValue(':salt',$salt);
                    
                    if ($insert->execute()) {
                        header('Location:index.php');
                    }

                } catch (PDOException $e) {
                    array_push($erros,"<strong>Erro ao inserir o USUÁRIO no Banco de Dados:</strong> ".$e->getMessage());
                }
            // ******************************************************************************
                 
        }
    // **************************************************************************************
    
} else {
    array_push($erros,'Requisição Inválida!');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Salvar Conta</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center">

<div class="col-6 my-5 bg-body-secondary rounded text-danger p-3">
    <h5>Erro:</h5>
    <hr>

    <?php foreach ($erros as $erro) { ?>

        <p>- <?php echo $erro;?></p>

    <?php } ?>

    <a href="conta.php"><< Voltar</a>
    
</div>

</body>
</html>