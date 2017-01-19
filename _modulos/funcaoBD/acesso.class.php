
<?php

function ValidaLogin($login,$senha)
{
    require ("conexao.php");

$query = "SELECT * FROM tbl_usuario where nm_login = '$login'";
$dados = mysqli_query($conn,$query);
$row = mysqli_fetch_array($dados);

if($senha == $row['cd_senha'] )
{
    
    $_SESSION["id_usuario"]= $row["id_usuario"]; //pega o id do usuario e coloca na sessão 
    $_SESSION["nm_usuario"] = stripslashes($row["nm_usuario"]); //Guarda o nome do usuario da sessao
    $_SESSION["tp_acesso"]= $row["tp_acesso"]; // Pega o tipo de usuario para poder definir as permissoes dentro do sistema
    $_SESSION["ic_ativo"] = $row["ic_ativo"]; // guarda o ic ativo do usuario para quando ele sair voltar ao status original
    $_SESSION['user'] = $login;
    
    $resetaSenha = resetaQtdtentativas($row['id_usuario']);


    return 1;

}else{
    
     if(bloqueiaAcesso($row["id_usuario"]));
     {
        return 0;
     }
}


}


function verificaStatus($login)

{
    require ("conexao.php");

    $query = "SELECT ic_ativo FROM tbl_usuario where nm_login = '$login'";
    $dados = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($dados);


    $ic_ativo = $row['ic_ativo'];

    switch ($ic_ativo) 
        {
            case '1':
                 return 1;
                break;
            case '2':
               return  2;
               break;
            case '3':
                return 3;
                break;
            case '4':
                return 4;
                break;
        }

}






function registraAcesso($id_usuario)

{
	require ("conexao.php");
    $data  = date("Y-m-d");

	$query = " UPDATE tbl_usuario SET ic_ativo = 3, dt_ultimoacesso = '$data'  WHERE id_usuario = $id_usuario";
	$dados = mysqli_query($conn,$query);

    return $dados;
}




function desconecta()
{
    session_start();
    $ic_ativo = $_SESSION['ic_ativo'];
    $id_usuario = $_SESSION['id_usuario'];

    require ("conexao.php");

	$query = "UPDATE tbl_usuario SET ic_ativo = $ic_ativo WHERE id_usuario =$id_usuario";
	$dados = mysqli_query($conn,$query);
	
	session_destroy();
    header("location: ../acesso/login.php");
}

function bloqueiaAcesso($id_usuario)
{
    require("conexao.php");

    $qtd_acesso = verificaQtdAcesso($id_usuario);
    if($qtd_acesso == 3)
    {
        $query = "UPDATE tbl_usuario SET ic_ativo = '2', ic_qtdAcesso = $qtd_acesso WHERE id_usuario =$id_usuario";
    }
    else
    {
        $query = "UPDATE tbl_usuario SET ic_qtdAcesso = $qtd_acesso WHERE id_usuario =$id_usuario";
    } 

    $dados = mysqli_query($conn,$query);
    return $dados;
}


function verificaExisteLogin($login)
{
    require("conexao.php");

    $query = "SELECT nm_login FROM tbl_usuario WHERE nm_login = '$login'";
    $dados = mysqli_query($conn,$query);
        
    
    return $dados;

}



function verificaQtdAcesso($id_usuario)
{
    require("conexao.php");

    $query = "SELECT ic_qtdAcesso FROM tbl_usuario WHERE id_usuario = $id_usuario ";
    $dados = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($dados);

    $qtd_acesso = $row['ic_qtdAcesso'];

    if ($qtd_acesso < 3) {
       $qtd_acesso++;
    }


    
    
    return $qtd_acesso;

}

function resetaQtdtentativas($id_usuario)
{
    require("conexao.php");
    $query = "UPDATE tbl_usuario SET ic_qtdAcesso = 0 WHERE id_usuario =$id_usuario";
    $dados = mysqli_query($conn,$query);

    return $dados;

}


?>