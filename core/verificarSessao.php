<?php

    session_start();

    require_once 'conexao.php';

    if (!isset($_SESSION['usuario_id']) and !isset($_SESSION['usuario_nome'])) {
        header('Location: ../login/');
    }