<?php
	session_start();
    /*
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }
    */

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRA O MENO DO SISTEMA*/
	require("../funcaoBD/tipoDocumental.class.php");
    require_once("../funcaoBD/util.class.php");

    $tiposDocumentais = consultaTiposDocumentais();

?>

<main>
	<center>
		<section class="container">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title" style="text-align: left;">Tipos Documental</h3>
			    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
			  </div>
			  <div class="panel-body">
			  	<div class="container-fluid">
			  		<div class="col-md-2">
			  			<a href="novoTipoDocumental.php" class="btn btn-primary"><i class="fa fa-user-plus"></i>Criar Novo</a>
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

                  ?>
					    </tbody>
					  </table>
			  	</div>
			</div>		
        </section>
    </center>
</main>

<?php
	require("../footer.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
?>
