<?php

	require("../funcaoBD/usuario.class.php");


	session_start(); 


  if ($_SESSION['tp_acesso'] != '1' )
	{
   
     header("location: ../principal/principal.php");
	}
   else
	{
              
	$id_usuario = isset($_GET["id"]) ? ($_GET["id"]) : FALSE; 
	
	if (excluirUsuario($id_usuario)) 
		{			
		header("location: usuarios.php");
		}
		else
		{
		header("location: usuarios.php?ERROR=1");	
		}

              
	}

	


?>