<?php
	session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRAZ O MENU DO SISTEMA*/
	require("../funcaoBD/tipoDocumental.class.php");
	require("../funcaoBD/indexador.class.php");
    require_once("../funcaoBD/util.class.php");

    $tiposDocumentais = consultaTiposDocumentais();
    $indexadores = consultaIndexadores();
    $tipos = consultaTipos();

?>


<div class="modal fade" role="dialog" id="novoIndexador">
    <div class="modal-dialog">
        <form method="post" action="novoIndexador.php" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Criar Novo</h4>
            </div>
            <div class="modal-body">
                <label style="width: 99%;">Tipo Documental<br/>
                    <select class="form-control" >
					<?php
					    foreach($tiposDocumentais as $key => $value) {
							echo '<option id='.$value['id'].'>'.$value['nome'].'</option>';
						}
                    ?>
					</select>
                </label>
                <label style="width: 99%;">Nome<br/>
                    <input type="text" name="nome" value="" class="form-control" />
                </label>
                <label style="width: 99%;">Formato<br/>
                    <select class="form-control" >
					<?php
					    foreach($tipos as $key => $value) {
							echo '<option id='.$value['id'].'>'.$value['descricao'].'</option>';
						}
                    ?>
					</select>
                </label>
				<br/>
				<br/>
				<br/>
            </div>
            <div class="modal-footer">
			    <br/>
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
			    <h3 class="panel-title" style="text-align: left;">Indexadores</h3>
			    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
			  </div>
			  <div class="panel-body">
			  	<div class="container-fluid">
			  		<div class="col-md-2" >
			  			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#novoIndexador" ><span class="fa fa-user-plus"></span>Criar Novo</a>
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
                            <th>Tipo Documental</th>  
					        <th>Indexador</th>
					        <th>Formato</th>
					      </tr>
					    </thead>
					    <tbody>
                            <?php
                                foreach($indexadores as $key => $value){
                            ?>
                            	<tr>
									<td>
										<a class="btn btn-default fa fa-pencil-square-o" href="alterarTipoDocumental.php?id=<?php echo $value['id']; ?>&action=EDIT_DATA" style="color: blue;"></a>
										<a class="btn btn-default fa fa-user-times deleteRecord" data-toggle="modal" data-id="<?php echo $value['id']; ?>" data-target="#confirmarExclusao" style="color: red;" ></a>
									</td>
									<td>
										<span><?php echo $value['nome']; ?></span>
									</td>
									<td>
										<span><?php echo $value['nome']; ?></span>
									</td>
                                    <td>
										<span><?php echo $value['tipo']; ?></span>
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
