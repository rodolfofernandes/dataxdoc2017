<?php
	session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../funcaoBD/indexador.class.php");
    require_once("../funcaoBD/util.class.php");

    $recordId = $_GET['id'];
    $action = $_GET['action'];
    if ($action == 'POST_BACK') {
        // grava as alterações e retorna para a listagem
        $dados['nome'] = $_POST['nome'];
        $dados['tipo'] = $_POST['tipo'];
        $dados['excluido'] = $_POST['excluido'];

        $result = alterarIndexador($recordId, $dados);
        header("Location: listarIndexadores.php");
        exit;
    }

    $indexador = consultaIndexador($recordId);
    if ($indexador == null) {
        // falha ao recuperar registro
    }
    $tipos = consultaTipos();
    if ($tipos== null) {
        // falha ao recuperar tipo
    }

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRAZ O MENU DO SISTEMA*/

?>


<h4>EDITAR CAMPO</h4>
<br/>

<form method="post" action="alterarIndexador.php?id=<?php echo $recordId; ?>&action=POST_BACK" >
    <fieldset>
        <label style="width: 50%;">Nome<br/>
            <input type="text" name="nome" value="<?php echo $indexador['nome']; ?>" class="form-control" />
        </label>
        <label style="width: 50%;">Formato<br/>
            <select name="tipo" class="form-control" >
            <?php
                // SELECTED = $indexador['tipo'];
                foreach($tipos as $key => $value) {
                    echo '<option value='.$value['id'].'>'.$value['descricao'].'</option>';
                }
            ?>
            </select>
        </label>
        <input type="hidden" name="excluido" value="<?php echo $indexador['excluido']; ?>" />
        <br/>
        <br/>
        <button type="submit" class="btn btn-primary" >Gravar</button>
    </fieldset>
</form>
<br/>
