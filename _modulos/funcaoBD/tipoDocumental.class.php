<?php
require_once("conexao.php");

function consultaTipoDocumental($id)
{
    $query = "SELECT * FROM tbl_tipodocumental where id_usuario = '$id_usuario'";
    $dados = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($dados);

    $nome = $row['nome'];
    $descricao = $row['descricao'];

    return $row;
}

function consultaTiposDocumentais()
{
    global $conn;
    $resultado = array();

    $query = "SELECT * FROM tbl_tipodocumental WHERE excluido = 0";
    $recordSet = mysqli_query($conn,$query);
    $recordCount = mysqli_num_rows($recordSet);
    if ($recordCount == 0) return $resultado;

    $index = 0;
    while( $record = mysqli_fetch_array($recordSet) ){
        $resultado[$index]['nome'] = $record['nome'];
        $resultado[$index]['descricao'] = $record['descricao'];
        $resultado[$index]['excluido'] = $record['excluido'];
        $index++;
    }
    return $resultado;
}

function incluirTipoDocumental($dados)
{
    global $conn;

    $nome = $dados['nome'];
    $descricao = $dados['descricao'];
    $excluido = $dados['excluido'];

    $query = "INSERT INTO tbl_tipodocumental (nome, descricao, excluido) VALUES ('$nome','$descricao','$excluido'); ";
    $result = mysqli_query($conn,$query);

    return $result;
}

function alterarTipoDocumental($id_usuario,$dadosUser)
{
 
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
    global $conn;
    $query = "UPDATE tbl_tipodocumental SET excluido = 1 WHERE id = $id;";
    $result = mysqli_query($conn, $query);

    return $result;
}

?>
