
<?php

session_start();

var_dump($_POST);

require("../funcaoBD/usuario.class.php");
require("../funcaoBD/acesso.class.php");
$dados = $_POST;

$senha = isset($_POST['txtPassword']) ? $_POST['txtPassword'] : '';
$senhaconf = isset($_POST['txtConfirmPassword']) ? $_POST['txtConfirmPassword'] : '';


if($senha != '' && $senhaconf != '')
{

    if($senha != $senhaconf)
    {
    header("location: novousuario.php?errorid=1");
    }

    else
    {
        
        if(!incluirUsuario($dados))
        {
            header("location: novousuario.php?errorid=2");
        }
        
    }

}


 
    if ($_FILES['fuPhoto']['size'] != 0) {

        $image = file_get_contents($_FILES['fuPhoto'] ['tmp_name']);
        $image_name = addslashes($_FILES['fuPhoto']['name']);
        $image_syze = getimagesize($_FILES['fuPhoto'] ['tmp_name']);
        $image = base64_encode($image);
        $upload = uploadImagem($image,$_SESSION['id_usuario']);
    }


         header("location: novousuario.php?errorid=OK");



  
