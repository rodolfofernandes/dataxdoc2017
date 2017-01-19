<?php

/* Objetivo   

-- Desbloquear usuarios

-- ultizado pelas paginas :
	*-- Editar usuario

-- Observaçoes
	-- Usuarios Bloqueados possuem o ic_ativo = 2
	-- Esta rotina faz o update do ic_ativo = 1
 */

        require("../funcaoBD/usuario.class.php");         

        $id_usuario = isset($_GET["id"]) ? ($_GET["id"]) : FALSE; 
      

        if (desbloqueiaUsuario($id_usuario))
        {
        	header("Location: usuarios.php?id=$id_usuario");
        }else
        {
        	header("Location: usuarios.php?errorid=1");
        }




?>