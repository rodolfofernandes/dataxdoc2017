<?php

require("util.class.php");

function consultaUsuario($id_usuario)
{
          require("conexao.php");

    
$query = "SELECT * FROM tbl_usuario where id_usuario = '$id_usuario'";
$dados = mysqli_query($conn,$query);
$row = mysqli_fetch_array($dados);

switch($row['tp_acesso'])
{
    case 1:
            $row['categoria'] = 'administrador';
        break;
    
    case 2:
            $row['categoria'] = 'arquivista';
        break;

    case 3:
            $row['categoria'] = 'operador'; 
        break;

}

$nome = $row['nm_usuario'];
$nome = explode(' ',$nome);

$row['nome'] = $nome[0];
$row['snome']= $nome[1];

$row['dt_nascimento'] = formatadatatela($row['dt_nascimento']); //metodo dentro do util




return $row;
}

function incluirUsuario($dados)
{
    require("conexao.php");
    $login = $dados['txtLogin'];

    $senha = isset($dados['txtPassword']) ? md5(trim($dados['txtPassword'])) : FALSE; 
    $datetime = date_create()->format('Y-m-d');
    
    $sexo = $dados['rblRoles'];


    $query = "INSERT INTO tbl_usuario (nm_login, cd_senha, ic_ativo, tp_acesso, dt_cadastro) VALUES ('$login','$senha','1','$sexo' , '$datetime' ); ";
   $dados = mysqli_query($conn,$query);
    return $query;

}


function consultaTodosUsuariosAtivos()
{

    require("conexao.php");

    $query = "SELECT * FROM tbl_usuario WHERE ic_ativo <> '0'";
    $dados = mysqli_query($conn,$query);
    $resultado['qtdReg'] = mysqli_num_rows($dados);
    $i = 0;
if  ($resultado['qtdReg'] > 0) {
    
     while($row = mysqli_fetch_assoc($dados)) {
       $resultado[$i] = $row;
       $i++;
     }
 }
     return $resultado;
    
}


function alteraUsuario($id_usuario,$dadosUser)
{

  require("conexao.php");


$nome = $dadosUser['txtNome'].' '.$dadosUser['txtSobrenome'];
$cpf = $dadosUser['txtCPF'];
$dt_nasc = formatadatabanco($dadosUser['txtNasc']);
$email = $dadosUser['txtEmail'];
$sexo = $dadosUser['rblSexo'];
$tp_acesso = $dadosUser['tp_acesso'];
$ic_ativo = $dadosUser['chkAtivo'];


if($dt_nasc == '--' || $dt_nasc == '')
{
    $dt_nasc = '0000-01-01';
}


$query = "UPDATE tbl_usuario SET cd_cpf = '$cpf',nm_usuario = '$nome', ds_email = '$email', dt_nascimento = '$dt_nasc', tp_sexo ='$sexo',ic_ativo = $ic_ativo ,tp_acesso = '$tp_acesso' WHERE id_usuario = '$id_usuario'";
$dados = mysqli_query($conn,$query);

return $dados;



}

function alteraSenha($id_usuario,$senha)
{ 
    require("conexao.php");

    $senha = md5(trim($senha));
      
    $query = "UPDATE tbl_usuario SET cd_senha = '$senha' where id_usuario = '$id_usuario'";
    $dados = mysqli_query($conn,$query);

    return $dados;
}

function excluirUsuario($id_usuario)


{
    require("conexao.php");

    $query = "UPDATE tbl_usuario SET ic_ativo = 0 WHERE id_usuario = $id_usuario;";                
    $dados = mysqli_query($conn,$query);

    return $dados;

}





function uploadImagem($imagem, $id_usuario)
{
    require("conexao.php");

 
         
    $query = " UPDATE tbl_usuario SET img_usuario = '$imagem' where id_usuario = $id_usuario";                
    $dados = mysqli_query($conn,$query);

    return $dados;
}

    function consultaImagem($id_usuario)
    {
    require("conexao.php");

    $query = "SELECT img_usuario FROM tbl_usuario where id_usuario = '$id_usuario'";
    $dados = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($dados);
    $image = $row['img_usuario'];
 
    
    return $image;

    }


function desbloqueiaUsuario($id_usuario)
{
    require("conexao.php");

    $query = "UPDATE tbl_usuario SET ic_ativo = 1, ic_qtdAcesso = 0 where id_usuario = $id_usuario";
    $dados = mysqli_query($conn,$query);

    return $dados;
}





?>