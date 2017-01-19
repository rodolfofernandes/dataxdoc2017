<?php

	session_start();
    require('../funcaoBD/usuario.class.php');
	$imgPerfil = consultaImagem($_SESSION['id_usuario']);
	$imgPerfil =  base64_decode($imgPerfil);
	header("Content-Type: image/png");
	echo $imgPerfil;

?>