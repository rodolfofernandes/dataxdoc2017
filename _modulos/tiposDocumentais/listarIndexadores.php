<?php
	session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRAZ O MENU DO SISTEMA*/
	require("../funcaoBD/indexador.class.php");
    require_once("../funcaoBD/util.class.php");

    $indexadores = consultaIndexadores();

?>


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
			  			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#novoTipoDocumental" ><span class="fa fa-user-plus"></span> Criar Novo</a>
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
					    </tbody>
				    </table>
			  	</div>
			</div>		
        </section>
    </center>
</main>
