<?php
	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRA O MENO DO SISTEMA*/
?>

<main>
	<center>
		<section class="container">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title" style="text-align: left;">Meus dados Pessoais</h3>
			       <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
			  </div>
			  <div class="panel-body">
			  	<form method="post" action="teste.php" enctype="multipart/form-data">
			  		<div class="container-fluid">
					    <a href="#" class="thumbnail col-md-2">
		      				<img src="../../img/no-photo.png" alt="...">
		   				 </a>
		   				 <div class="col-md-1">
		   				 	<label class="btn btn-default fa fa-upload" style="color: blue;">
   							<input type="file" name="btnFoto" style="display: none;">
							</label>
		   				 </div>
		   				 <div class="col-md-3">
		   				 	
		   				 </div>
		   				 <div class="col-md-3">
								<br>
									<div class="input-group">
	 								 <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
	 								 <input class="form-control" name="txtLogin" type="text" placeholder="Login">
								</div><br>
								<div class="input-group">
 								 <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
 								 <input class="form-control" name="txtSenha" type="password" placeholder="Senha">
							</div>
							</div>
							<div class="col-md-3">
							<br>
								<div class="input-group">
 								 <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
 								 <input class="form-control" name="txtConfirmaSenha" type="password" placeholder="Confirmar Senha">
							</div>
							</div>
					  </div>
					  	<div class="container-fluid">
						  	<div class="col-md-4 well well-sm">
						  		<input type="radio" name="rblTipo" value="1" >Administrador
						  		<input type="radio" name="rblTipo" value="2" >Arquivista
						  		<input type="radio" name="rblTipo" value="3" >Operador
						  	</div>

						  	<div class="col-md-2"></div>
							<div class="col-md-6 well well-sm">
								<label>Gênero</label><br>
								<input type="radio" name="rblSexo" value="F"> Feminino   
							 	<input type="radio" name="rblSexo" value="M" > Masculino
							 </div>		
						</div>	 
					<div class="panel-footer">
						<div class="col-md-11">								
						</div>
						<div class="col-md-1">
							<input type="submit"  class="btn btn-primary" value="Salvar">
						</div>						
					</div>				  
				</form>
			</div>		
		</section>
	</center>	
</main>

<?php
	require("../footer.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	
?>