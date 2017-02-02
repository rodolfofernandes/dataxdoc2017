<?php
require_once("conexao.php");

function consultaTipoDocumental($id)
{
    global $conn;

    $query = "SELECT * FROM tbl_tipodocumental WHERE id = '$id'";
    $recordSet = mysqli_query($conn, $query);
    if (!$recordSet) return null;
 
    $record = mysqli_fetch_array($recordSet);

    return $record;
}

function consultaTiposDocumentais()
{
    global $conn;
    $resultado = array();

    $query = "SELECT * FROM tbl_tipodocumental WHERE excluido = 0";
    $recordSet = mysqli_query($conn,$query);
    $recordCount = mysqli_num_rows($recordSet);
    if ($recordCount == 0) return $resultado;

    $index = 0;
    while( $record = mysqli_fetch_array($recordSet) ){
        $resultado[$index]['id'] = $record['id'];
        $resultado[$index]['nome'] = $record['nome'];
        $resultado[$index]['descricao'] = $record['descricao'];
        $resultado[$index]['excluido'] = $record['excluido'];
        $index++;
    }
    return $resultado;
}

function incluirTipoDocumental($dados)
{
    global $conn;

    $nome = $dados['nome'];
    $descricao = $dados['descricao'];
    $excluido = $dados['excluido'];

    $query = "INSERT INTO tbl_tipodocumental (nome, descricao, excluido) VALUES ('$nome','$descricao','$excluido'); ";
    $result = mysqli_query($conn,$query);

    return $result;
}

function alterarTipoDocumental($id, $dados)
{
    global $conn;

    $nome = $dados['nome'];
    $descricao = $dados['descricao'];
    $excluido = $dados['excluido'];

    $query = "UPDATE tbl_tipodocumental SET nome = '$nome', descricao = '$descricao', ecluido = '$excluido' WHERE id = '$id'";
    $result = mysqli_query($conn,$query);

    return $result;
}

function excluirTipoDocumental($id)
{
    global $conn;
    $query = "UPDATE tbl_tipodocumental SET excluido = 1 WHERE id = $id;";
    $result = mysqli_query($conn, $query);

    return $result;
}

?>
