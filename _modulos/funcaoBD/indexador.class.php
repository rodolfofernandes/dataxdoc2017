<?php
require_once("conexao.php");

function consultaIndexador($id)
{
    global $conn;

    $query = "SELECT * FROM tbl_indexador WHERE id = '$id'";
    $recordSet = mysqli_query($conn, $query);
    if (!$recordSet) return null;
 
    $record = mysqli_fetch_array($recordSet);

    return $record;
}

function consultaIndexadores()
{
    global $conn;
    $resultado = array();

    $query = "SELECT * FROM tbl_indexador WHERE excluido = 0 ORDER BY tipoDocumental";
    $recordSet = mysqli_query($conn,$query);
    $recordCount = mysqli_num_rows($recordSet);
    if ($recordCount == 0) return $resultado;

    $index = 0;
    while( $record = mysqli_fetch_array($recordSet) ){
        $resultado[$index]['id'] = $record['id'];
        $resultado[$index]['tipoDocumental'] = $record['tipoDocumental'];
        $resultado[$index]['nome'] = $record['nome'];
        $resultado[$index]['tipo'] = $record['tipo'];
        $resultado[$index]['excluido'] = $record['excluido'];
        $index++;
    }
    return $resultado;
}

function incluirIndexador($dados)
{
    global $conn;

    $tipoDocumental = $dados['tipoDocumental'];
    $nome = $dados['nome'];
    $tipo = $dados['tipo'];
    $excluido = $dados['excluido'];

    $query = "INSERT INTO tbl_indexador (tipoDocumental, nome, tipo, excluido) VALUES ('$tipoDocumental','$nome','$tipo','$excluido'); ";
    $result = mysqli_query($conn,$query);

    return $result;
}

function alterarIndexador($id, $dados)
{
    global $conn;

    // $tipoDocumental = $dados['tipoDocumental'];   importante:  não alterar o tipoDocumental !
    $nome = $dados['nome'];
    $tipo = $dados['tipo'];
    $excluido = $dados['excluido'];

    $query = "UPDATE tbl_indexador SET nome = '$nome', tipo = '$tipo', excluido = '$excluido' WHERE id = '$id'";
    $result = mysqli_query($conn,$query);

    return $result;
}

function excluirIndexador($id)
{
    global $conn;
    $query = "UPDATE tbl_indexador SET excluido = 1 WHERE id = $id;";
    $result = mysqli_query($conn, $query);

    return $result;
}

function consultaTipos()
{
    global $conn;
    $resultado = array();

    $query = "SELECT * FROM tbl_tipoindexador;";
    $recordSet = mysqli_query($conn,$query);
    $recordCount = mysqli_num_rows($recordSet);
    if ($recordCount == 0) return $resultado;

    $index = 0;
    while( $record = mysqli_fetch_array($recordSet) ){
        $resultado[$index]['id'] = $record['id'];
        $resultado[$index]['descricao'] = $record['descricao'];
        $index++;
    }
    return $resultado;    
}

?>
