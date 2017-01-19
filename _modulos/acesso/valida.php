<?php
session_start();

require ("../funcaoBD/acesso.class.php");


// Recupera o login 
$login = isset($_POST["txtLogin"]) ? addslashes(trim($_POST["txtLogin"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["txtSenha"]) ? md5(trim($_POST["txtSenha"])) : FALSE; 


if(verificaExisteLogin($login))
{

    $status = verificaStatus($login);
     
        
    if ($status != 1 && $status != 3) 
    
        {
                header("Location: login.php?errorid=$status");
        }
        else

        {
            if(validaLogin($login,$senha))
            {
                if (!registraAcesso($_SESSION["id_usuario"])) 
                {
                    header("Location: login.php?errorid=6");
                }
                        
                header("Location:../principal/principal.php");
                    
            }

            else                    
            {              
                header("Location: login.php?errorid=1");
            }

        }   
   
}
else
{
     header("Location: login.php?errorid=1");
}

?>







