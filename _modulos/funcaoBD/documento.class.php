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

function incluirDocumento($dados)
{
    global $conn;

    $repositorio = $dados['repositorio'];
    $nome = $dados['nome'];

    $query = "INSERT INTO tbl_documento (repositorio, nome, arquivo) VALUES ('$repositorio','$nome', '".base64_encode($dados['arquivo'])."'); ";
    $result = mysqli_query($conn,$query);
    if (!$result) {
        print_r(mysqli_error_list($conn));
    }

    return $result;
}

?>
