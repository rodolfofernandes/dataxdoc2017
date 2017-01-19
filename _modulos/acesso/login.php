<?php 
		session_start();
		error_reporting(0);
	
		if( $_SESSION['user'] != '') /* verifica se o usuario esta conectado, se ja estiver manda ele pra pagina principal*/
		{
		    header("Location: ../principal/principal.php");
		}

		$erro = isset($_GET['errorid']) ? $_GET['errorid'] : ''; //para saber se houve algum problema com usuario e senha
			
		require("../inicializa.php");

   /* Vai veificar qual a mensagem de erro se houver.*/

        switch ($erro) {
            case '0':
                $msg = "Usuário Exluído";
                $style = 'style="color:red;"';
                break;
            case '1':
                $msg = "Usuário e Senha Inválidos";
                $style = 'style="color:red;"';
                break;
            case '2':
                $msg = "Usuário Bloqueado";
                $style = 'style="color:red;"';
                break;
            case '4':
                $msg = "Usuário Inativo";
                $style = 'style="color:red;"';
                break;
            default:
                $msg = "Bem Vindo";
                $style = "";
                break;
        }



    ?>
 <body>
 	<main>
 		<center>
 		<div class="container">
 			<div class="col-md-12">
 				<br><br><br><br>
 			
					 <img src="../../img/logo.png">
					
 			</div>
 		</div>
	<form method="post" action="valida.php">
 		<div class="container">
 			<div class="col-md-3">
 				
 			</div>
 			<div class="col-md-6">
					 <hr>
					 <h4 <?=$style?> > <?=$msg?></h4>
					 <hr>
 				<div class="input-group">
 					 <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
 					 <input class="form-control" name="txtLogin" type="text" placeholder="Login">
				</div>
 				<div class="input-group">
 					 <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
 					 <input class="form-control" name="txtSenha" type="password" placeholder="Confirmar Senha">	 
				</div>
				
				<br>
 			</div>				
 		</div>
 		<div class="container">
 			<div class="col-md-5"></div>

			<div class="col-md-2"> 
				<label data-toggle="modal" data-target="#centerModal">Esqueci minha Senha</label>
			</div>

 			<div class="col-md-3">
 				<input type="submit" class="btn btn-primary" value="enviar">
 			</div>
 		</div>
</form>
	<div class="modal fade" id="centerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   	  <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                     <h4 class="modal-title" id="myModalLabel">Digite Seu CPF</h4>
                </div>
                <div class="modal-body">                	
                	<form method="post" action="recuperaSenha.php">
                		<div class="container-fluid">
							<div class="col-md-6">
				              <input type="text" class="form-control" name="txtCPF">
				            </div>
				            <div class="col-md-4"></div>
				            <div class="col-md-2">
				                <input class="btn btn-primary" type="submit" name="enviar">
			                </div> 
	                	</div>	
                	</table>
               	  </form>
                </div>             
            </div>
        </div>
    </div>
</div>




 	</center>
 	</main>
 </body>

<?php
	require("../footer.php");
?>






