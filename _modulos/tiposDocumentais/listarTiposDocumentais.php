<?php
	session_start();
    error_reporting(E_WARNING);
	/*
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }
    */

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRAZ O MENU DO SISTEMA*/
	require("../funcaoBD/tipoDocumental.class.php");
    require_once("../funcaoBD/util.class.php");

    $tiposDocumentais = consultaTiposDocumentais();

?>

<div class="modal fade" role="dialog" id="confirmarExclusao">
    <div class="modal-dialog">

        <form method="post" action="excluirTipoDocumental.php" id="deleteForm" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmação</h4>
            </div>
            <div class="modal-body">
				<span>Deseja realmente excuir esse item ?</span>
				<input type="hidden" name="id" value="" />
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Sim</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >Não</button>
            </div>
        </div>
		</form>

    </div>
</div>

<div class="modal fade" role="dialog" id="novoTipoDocumental">
    <div class="modal-dialog">

        <form method="post" action="novoTipoDocumental.php" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Criar Novo</h4>
            </div>
            <div class="modal-body">
                <label style="width: 99%;">Nome<br/>
                    <input type="text" name="nome" value="" style="width: 100%;height:25px;" />
                </label>
                <label style="width: 99%;">Descricao<br/>
                    <input type="text" name="descricao" value="" style="width: 100%;height:25px;" />
                </label>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" >Incluir</button>
                <button type="button" class="btn btn-default" data-dismiss="modal" >Descartar</button>
            </div>
        </div>
        </form>

    </div>
</div>

<main>
	<center>
		<section class="container">
			<div class="panel panel-default" style="min-height: 350px;">
			  <div class="panel-heading">
			    <h3 class="panel-title" style="text-align: left;">Tipos Documental</h3>
			    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
			  </div>
			  <div class="panel-body">
			  	<div class="container-fluid">
			  		<div class="col-md-2" >
			  			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#novoTipoDocumental" ><span class="fa fa-user-plus">Criar Novo</span></a>
			  		</div>
			  		<div class="col-md-10">
                    </div>
			  	</div>
			  	<div class="container-fluid">
			  	<br>	
				  	<table class="table table-condensed">
					    <thead>
					      <tr>
					      	<th> </th>
					        <th>Nome</th>
					        <th>Descrição</th>
					      </tr>
					    </thead>
					    <tbody>
							<?php
								foreach($tiposDocumentais as $key => $value){
							?>
								<tr>
									<td>
										<a class="btn btn-default fa fa-pencil-square-o" style="color: blue;"></a>
										<a class="btn btn-default fa fa-user-times deleteRecord" data-toggle="modal" data-id="<?php echo $value['id']; ?>" data-target="#confirmarExclusao" style="color: red;" ></a>
									</td>
									<td>
										<span><?php echo $value['nome']; ?></span>
									</td>
									<td>
										<span><?php echo $value['descricao']; ?></span>
									</td>
								</tr>
							<?php
								}
							?>
					    </tbody>
					  </table>
			  	</div>
			</div>		
        </section>
    </center>
</main>

<!-- Inicializa o script -->
<script type="text/javascript" >
	$(document).ready(function() {
		$('.deleteRecord').on('click', function() {
			// Associa o registro ao form de exclusão
			var recordId = $(this).data('id');
		    $('#deleteForm input[name=id]').val(recordId);
		});
	});
</script>

<?php
	require("../footer.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/

	if ( isset($_GET['erro']) ) {
		if ( $_GET['erro'] == 'EMPTY_FIELDS' ){
		    echo "<script>alert('Favor preencher todos os campos!')</script>";
		}

		if ( $_GET['erro'] == 'INSERT_FAIL' ){
		    echo "<script>alert('Falha ao inserir registro!')</script>";
		}

		if ( $_GET['erro'] == 'DELETE_FAIL' ){
			echo "<script>alert('Falha ao excluir registro!')</script>";
		}
	}

?>
