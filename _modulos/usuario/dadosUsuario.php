<?php
session_start();

	if($_SESSION['user'] == null)
   {
       header("Location: ../acesso/login.php");     
   }

    require("../funcaoBD/usuario.class.php");
  
    $resetaSenha = isset($_GET['param']) ? $_GET['param'] : '';
    $imgPerfil = consultaImagem($_SESSION['id_usuario']);//Guarda a imagem de perfil
    $usuario = consultaUsuario($_SESSION["id_usuario"]); //traz os dados do usuario conectado


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
			  	<form method="post" action="alterardadospessoais.php" enctype="multipart/form-data">
			  		<div class="container-fluid">
					    <a href="#" class="thumbnail col-md-2">
							<?php
								 // caso tenha uma foto no banco, o sistema traz, se nao fica a imgaem padrao
								 if(!isset($imgPerfil))
								{
									echo '<img src="../../img/no-photo.png" alt="...">';
								}else
								{
									echo '<img id="imgUserPhoto"  src="../fabricaArquivo/fabricaImg.php">';
								}
							?>									
		   				 </a>
		   				 <div class="col-md-1">
		   				 	<label class="btn btn-default fa fa-upload" style="color: blue;">
   							<input type="file" name="btnFoto" style="display: none;">
							</label>
		   				 </div>
		   				 <div class="col-md-2">
		   				 	
		   				 </div>

		   				  <div class="col-md-3">
					  		<label class="well well-sm ">Nome Usuario: <span><?=$usuario['nome'];?></span></label>		
							<input type="text" class="form-control" name="txtNome" placeholder="Nome" value="<?=$usuario['nome'];?>"><br>
							<input type="text" class="form-control" name="txtCPF" placeholder="CPF" value="<?=$usuario['cd_CPF'];?>">	
					 	 </div>
					 	
					 	 <div class="col-md-3">
					  		<label class="well well-sm">Alçada: <span><?=$usuario['categoria'];?></span></label>	<br>	
					  		<input type="text" class="form-control" name="txtSobrenome" placeholder="Sobrenome" value="<?=$usuario['snome'];?>"><br>
					  		<input type="text" class="form-control" name="txtNasc" placeholder="Data de Nascimento" value="<?=$usuario['dt_nascimento'];?>">			  	
					 	 </div>
					  </div>
					  	<div class="container-fluid">
					  	<br>
						<div class="col-md-1">
						
						<?php                  
                       if($usuario['tp_sexo'] == 'm')
                        {
                            $feminino= "";
                            $masculino = "checked="."'checked'";
                        }else{
                            $masculino = "";
                            $feminino = "checked="."'checked'";
                        }
                     ?>    


							<input type="radio" name="rblSexo" value="f" <?=$feminino?> >Feminino
						</div>		  
						 <div class="col-md-1"> 	
						 	<input type="radio" name="rblSexo" value="m" <?=$masculino?> >Masculino
						 </div>
						 <div class="col-md-3"></div>
						 <div class="col-md-6">
						 	<div class="input-group margin-bottom-sm">
							  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
							  <input class="form-control" name="txtEmail" type="text" placeholder="Email" value="<?=$usuario['ds_email'];?>">
							</div>
						 </div>
					  	</div>				
                            <?php  if($resetaSenha != '')
                                    {
                                        $habilita = "";
                                        $habilitabtn = "disabled='disabled'";
                                    }else{
                                        $habilita = "disabled='disabled'";
                                        $habilitabtn = "";
                                    }
                            
                                ?>
						<div class="container-fluid">
							<br>
							<div class="col-md-5">
							</div>
							<div class="col-md-3">
								<div class="input-group">
 								 <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
 								 <input class="form-control" name="txtSenha" type="password" placeholder="Senha" <?=$habilita?>">
							</div>
							</div>
							<div class="col-md-3">
								<div class="input-group">
 								 <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
 								 <input class="form-control" name="txtConfirmaSenha" type="password" placeholder="Confirmar Senha"<?=$habilita?>>
							</div>

							</div>
						</div>
				</div>				
					<div class="panel-footer">
						<div class="container-fluid">
							<div class="col-md-8">								
							</div>
							<div class="col-md-1">
								<a href="dadosUsuario.php?param=1" class="btn btn-info" <?=$habilitabtn?>>Redefinir senha</a>
							</div>
							<div class="col-md-2">
								<input type="submit"  class="btn btn-primary">
							</div>	
						</div>
					</div>
				  </div>
				  <input type="hidden" name="nomePagina" value="dadosUsuario">
				</form>
			</div>		
		</section>
	</center>	
</main>

<?php
	require("../footer.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	
?>