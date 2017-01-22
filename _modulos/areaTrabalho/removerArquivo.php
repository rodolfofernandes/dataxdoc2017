<?php

    $tempDir = "../areaTrabalho/_tempDir/";

    if( !isset($_POST['filesChecked']) ){
        echo "Selecione os arquivos que deseja excluir";
        exit;
    }

    foreach($_POST['filesChecked'] as $key=>$value){
        if( !unlink($tempDir.base64_decode($value) )){
            echo "Não foi possivel efetuar a operação...";
            exit;
        }
    }

    echo "Operação efetuada com sucesso!";
?>
