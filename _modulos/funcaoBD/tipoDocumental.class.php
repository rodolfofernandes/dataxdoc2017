<?php

function consultaTipoDocumental($id)
{
    require("conexao.php");
    
    $query = "SELECT * FROM tbl_tipodocumental where id_usuario = '$id_usuario'";
    $dados = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($dados);

    $nome = $row['nome'];
    $descricao = $row['descricao'];

    return $row;
}

function consultaTiposDocumentais()
{
    require("conexao.php");

    $query = "SELECT * FROM tbl_tipodocumental WHERE excluido = 0";
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

function incluirTipoDocumental($dados)
{
    require("conexao.php");
    $login = $dados['txtLogin'];

    $senha = isset($dados['txtPassword']) ? md5(trim($dados['txtPassword'])) : FALSE; 
    $datetime = date_create()->format('Y-m-d');
    
    $sexo = $dados['rblRoles'];

    $query = "INSERT INTO tbl_tipodocumental (nm_login, cd_senha, ic_ativo, tp_acesso, dt_cadastro) VALUES ('$login','$senha','1','$sexo' , '$datetime' ); ";
    $dados = mysqli_query($conn,$query);

    return $query;
}

function alterarTipoDocumental($id_usuario,$dadosUser)
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


$query = "UPDATE tbl_tipodocumental SET cd_cpf = '$cpf',nm_usuario = '$nome', ds_email = '$email', dt_nascimento = '$dt_nasc', tp_sexo ='$sexo',ic_ativo = $ic_ativo ,tp_acesso = '$tp_acesso' WHERE id_usuario = '$id_usuario'";
$dados = mysqli_query($conn,$query);

    return $dados;
}

function excluirTipoDocumental($id)
{
    require("conexao.php");

    $query = "UPDATE tbl_tipodocumental SET ic_ativo = 0 WHERE id_usuario = $id_usuario;";
    $dados = mysqli_query($conn,$query);

    return $dados;
}

?>
