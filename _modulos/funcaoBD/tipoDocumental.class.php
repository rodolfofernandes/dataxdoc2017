<?php
require_once("conexao.php");

function consultaTipoDocumental($id)
{
    global $conn;

    $query = "SELECT * FROM tbl_tipodocumental WHERE id = '$id'";
    $recordSet = mysqli_query($conn, $query);
    if (!$recordSet) return null;
 
    $record = mysqli_fetch_array($recordSet);

    return $record;
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
        $resultado[$index]['id'] = $record['id'];
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
    global $conn;
 
$nome = $dadosUser['txtNome'].' '.$dadosUser['txtSobrenome'];
$cpf = $dadosUser['txtCPF'];
$dt_nasc = formatadatabanco($dadosUser['txtNasc']);
$email = $dadosUser['txtEmail'];
$sexo = $dadosUser['rblSexo'];
$tp_acesso = $dadosUser['tp_acesso'];
$ic_ativo = $dadosUser['chkAtivo'];



   $query = "UPDATE tbl_tipodocumental SET cd_cpf = '$cpf',nm_usuario = '$nome', ds_email = '$email', dt_nascimento = '$dt_nasc', tp_sexo ='$sexo',ic_ativo = $ic_ativo ,tp_acesso = '$tp_acesso' WHERE id_usuario = '$id_usuario'";
   $result = mysqli_query($conn,$query);

    return $result;
}

function excluirTipoDocumental($id)
{
    global $conn;
    $query = "UPDATE tbl_tipodocumental SET excluido = 1 WHERE id = $id;";
    $result = mysqli_query($conn, $query);

    return $result;
}

?>
