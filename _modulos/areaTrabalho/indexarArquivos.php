<?php

	require("../funcaoBD/documento.class.php");
    require("../funcaoBD/util.class.php");

    function StoreDoc($filename, $path){
        // armazena o arquivo no banco de dados
        $dados['repositorio'] = 1; //  ============>>>   criar tela de seleção de repositorio
        $dados['nome'] = $filename;
        $dados['arquivo'] = file_get_contents($path.$filename);
        $dados['dataCriacao'] = getdate();

        $result = incluirDocumento($dados);
        return $result;
    }

    $tempDir = "../areaTrabalho/_tempDir/";

    if( !isset($_POST['filesChecked']) ){
        echo "Selecione os arquivos que deseja indexar";
        exit;
    }

    foreach($_POST['filesChecked'] as $key=>$value){
        if( !storeDoc(base64_decode($value), $tempDir )){
            echo "Não foi possivel efetuar a operação...";
            exit;
        }
    }

    echo "Operação efetuada com sucesso!";
?>
