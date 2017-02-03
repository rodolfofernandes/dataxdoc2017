<?php
    session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../funcaoBD/indexador.class.php");

    if (empty($_POST['tipoDocumental']) || empty($_POST['nome']) || empty($_POST['tipo'])) {
       header("Location: listarIndexadores.php?erro=EMPTY_FIELDS");
       exit;
    }

    $dados = array();
    $dados['tipoDocumental'] = $_POST['tipoDocumental'];
    $dados['nome'] = $_POST['nome'];
    $dados['tipo'] = $_POST['tipo'];
    $dados['excluido'] = 0;

    $result = incluirIndexador($dados);
    if (!$result){
       header("Location: listarIndexadores.php?erro=INSERT_FAIL");
       exit;
    }

    header("Location: listarIndexadores.php");
?>
