<?php
    session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../funcaoBD/indexador.class.php");

    $recordId = $_POST['id'];
    $result = excluirIndexador($recordId);
    if (!$result){
        header("Location: listarIndexadores.php?erro=DELETE_FAIL");
        exit;
    }

    header("Location: listarIndexadores.php");
?>
