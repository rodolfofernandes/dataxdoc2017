<?php
	session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../funcaoBD/tipoDocumental.class.php");
    require_once("../funcaoBD/util.class.php");

    $recordId = $_GET['id'];
    $action = $_GET['action'];
    if ($action == 'POST_BACK') {
        // grava as alterações e retorna para a listagem
        $dados['nome'] = $_POST['nome'];
        $dados['descricao'] = $_POST['descricao'];
        $dados['excluido'] = $_POST['excluido'];

        $result = alterarTipoDocumental($recordId, $dados);
        header("Location: listarTiposDocumentais.php");
        exit;
    }

    $tipoDocumental = consultaTipoDocumental($recordId);
    if ($tipoDocumental == null) {
        // falha ao recuperar registro
    }

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRAZ O MENU DO SISTEMA*/

?>

<h4>EDITAR MODELO</h4>
<br/>

<form method="post" action="alterarTipoDocumental.php?id=<?php echo $recordId; ?>&action=POST_BACK" >
    <fieldset>
        <label style="width: 50%;">Nome<br/>
            <input type="text" name="nome" value="<?php echo $tipoDocumental['nome']; ?>" class="form-control" />
        </label>
        <label style="width: 50%;">Descricao<br/>
            <input type="text" name="descricao" value="<?php echo $tipoDocumental['descricao']; ?>" class="form-control" />
        </label>
        <input type="hidden" name="excluido" value="<?php echo $tipoDocumental['excluido']; ?>" />
        <br/>
        <button type="submit" class="btn btn-primary" >Gravar</button>
    </fieldset>
</form>
<br/>

<button type="button" class="btn btn-primary" >Novo Indexador</button>
<br/>

<table class="table table-bordered" style="width: 70%;" id="lista">
    <tr class="info">
        <td>Nome do campo</td><td>Formato</td><td>Ações</td>
    </tr>
</table>
