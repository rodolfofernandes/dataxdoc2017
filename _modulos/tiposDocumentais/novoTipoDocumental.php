<?php
    session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../funcaoBD/tipoDocumental.class.php");

    if (empty($_POST['nome']) || empty($_POST['descricao'])) {
       header("Location: listarTiposDocumentais.php?erro=EMPTY_FIELDS");
       exit;
    }

    $dados = array();
    $dados['nome'] = $_POST['nome'];
    $dados['descricao'] = $_POST['descricao'];
    $dados['excluido'] = 0;

    $result = incluirTipoDocumental($dados);
    if (!$result){
       header("Location: listarTiposDocumentais.php?erro=INSERT_FAIL");
       exit;
    }

    header("Location: listarTiposDocumentais.php");
?>
