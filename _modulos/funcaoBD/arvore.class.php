<?php

require_once("conexao.php");

function consultaArvores()
{
    global $conn;
    $resultado = array();

    $query = "SELECT * FROM tbl_arvore;";
    $recordSet = mysqli_query($conn,$query);
    $recordCount = mysqli_num_rows($recordSet);
    if ($recordCount == 0) return $resultado;

    $index = 0;
    while( $record = mysqli_fetch_array($recordSet) ){
        $resultado[$index]['id'] = $record['id'];
        $resultado[$index]['raiz'] = $record['raiz'];
        $resultado[$index]['label'] = $record['label'];
        $resultado[$index]['quantidadePastas'] = $record['quantidadePastas'];
        $resultado[$index]['quantidadeDocumentos'] = $record['quantidadeDocumentos'];
        $resultado[$index]['quantidadeNiveis'] = $record['quantidadeNiveis'];
        $index++;
    }
    return $resultado;
}

function incluirArvore($dados)
{
    global $conn;

    $raiz = $dados['raiz'];
    $label = $dados['label'];
    $quantidadePastas = $dados['quantidadePastas'];
    $quantidadeDocumentos = $dados['quantidadeDocumentos'];
    $quantidadeNiveis = $dados['quantidadeNiveis'];

    $query = "INSERT INTO tbl_arvore (raiz, label, quantidadePastas, quantidadeDocumentos, quantidadeNiveis) VALUES ('$raiz','$label','$quantidadePastas','$quantidadeDocumentos','$quantidadeNiveis'); ";
    $result = mysqli_query($conn,$query);
    if (!$result) {
        print_r(mysqli_error_list($conn));
    }

    return $result;
}

?>
