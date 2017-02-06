<?php

	require("../funcaoBD/arvore.class.php");

    // Busca as árvores no banco e retorna uma lista em formato JSON
    $listaArvores = consultaArvores();

    echo json_encode($listaArvores);

?>
