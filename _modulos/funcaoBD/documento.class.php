<?php

require_once("conexao.php");

function consultaDocumento($id)
{
    global $conn;

    $query = "SELECT * FROM tbl_documento WHERE id = '$id'";
    $recordSet = mysqli_query($conn, $query);
    if (!$recordSet) return null;
 
    $record = mysqli_fetch_array($recordSet);

    return $record;
}

function consultaDocumentos($filter)
{
    global $conn;
    $resultado = array();

    $query = "SELECT * FROM tbl_documento WHERE ".$filter.";";
    $recordSet = mysqli_query($conn,$query);
    $recordCount = mysqli_num_rows($recordSet);
    if ($recordCount == 0) return $resultado;

    $index = 0;
    while( $record = mysqli_fetch_array($recordSet) ){
        $resultado[$index]['id'] = $record['id'];
        $resultado[$index]['repositorio'] = $record['repositorio'];
        $resultado[$index]['nome'] = $record['nome'];
        $resultado[$index]['dataCriacao'] = $record['dataCriacao'];
        $resultado[$index]['criadoPor'] = $record['criadoPor'];
        $index++;
    }
    return $resultado;
}

function incluirDocumento($dados)
{
    global $conn;

    $repositorio = $dados['repositorio'];
    $nome = $dados['nome'];
    $dataCriacao = $dados['dataCriacao'];
    $criadoPor = $dados['criadoPor'];

    $query = "INSERT INTO tbl_documento (repositorio, nome, arquivo, dataCriacao, criadoPor) VALUES ('$repositorio','$nome', '".base64_encode($dados['arquivo'])."', curdate(), '$criadoPor'); ";
    $result = mysqli_query($conn,$query);
    if (!$result) {
        print_r(mysqli_error_list($conn));
    }

    return $result;
}

?>
