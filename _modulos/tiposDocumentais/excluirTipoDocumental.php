<?php
    session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../funcaoBD/tipoDocumental.class.php");

    $recordId = $_POST['id'];
    $result = excluirTipoDocumental($recordId);
    if (!$result){
       header("Location: listarTiposDocumentais.php?erro=DELETE_FAIL");
       exit;
    }

    header("Location: listarTiposDocumentais.php");
?>
