<?php
	session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRAZ O MENU DO SISTEMA*/
	require("../funcaoBD/tipoDocumental.class.php");
    require_once("../funcaoBD/util.class.php");

    $recordId = $_GET['id'];
    $tipoDocumental = consultaTipoDocumental($recordId);
    if ($tipoDocumental == null) {
        header("Location: listarTiposDocumentais.php");
        exit;
    }
?>

<h4>EDITAR MODELO</h4>
<br/>

<fieldset>
    <label style="width: 50%;">Nome<br/>
        <input type="text" name="nome" value="<?php echo $tipoDocumental['nome']; ?>" style="width: 100%;height:25px;" />
    </label>
    <label style="width: 50%;">Descricao<br/>
        <input type="text" name="descricao" value="<?php echo $tipoDocumental['descricao']; ?>" style="width: 100%;height:25px;" />
    </label>
    <br/>
</fieldset>
<br/>

<button type="button" class="btn btn-primary" >Novo Indexador</button>
<br/>

<table class="table table-bordered" style="width: 70%;" id="lista">
    <tr class="info">
        <td>Nome do campo</td><td>Formato</td><td>Ações</td>
    </tr>
</table>
