<?php
	session_start();
    error_reporting(E_WARNING);
    if($_SESSION['user'] == null) {
       header("Location: ../acesso/login.php");     
    }

	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRAZ O MENU DO SISTEMA*/
	require("../funcaoBD/usuario.class.php");
    require_once("../funcaoBD/util.class.php");

    $usuarios = consultaTodosUsuariosAtivos();

    

           	 $desativado = 0;
             $bloqueado = 0;

            for ($i=0; $i < $usuarios['qtdReg'] ;$i++ ) 
            { 

              $ic_ativo =  $usuarios[$i]['ic_ativo'];
            
             switch ($ic_ativo)
              {

            
                 case '1':  // 1 = usuario que estao ativos no sistema
                     $ativos++;
                 
                     $usuarios[$i]['usuarioON'] =  '';
                     $usuarios[$i]['usuarioBlq'] = "";
                     $usuarios[$i]['usuarioAtivo'] = "";
                     break;
                
                case '2': // usuarios que estao bloquados no sistema
                    $bloqueado++;
             		$usuarios[$i]['usuarioON'] = "";
                    $usuarios[$i]['usuarioBlq'] = 'style="color: blue;"';
                    $usuarios[$i]['usuarioAtivo'] = '';
                    
                     break;
                case '3': //usuarios que estao ativos e online no momento
                     $ativos++;

                     $usuarios[$i]['usuarioON'] =  'style="color: green;"';
                     $usuarios[$i]['usuarioBlq'] = "";      
                     $usuarios[$i]['usuarioAtivo'] = "";
                     break;
                case '4': //usuarios que estão inativo no sistema
                    $inativo++;

                     $usuarios[$i]['usuarioON'] =  '';
                     $usuarios[$i]['usuarioBlq'] = "";      
                     $usuarios[$i]['usuarioAtivo'] = 'style="color: red;"';
                    
                    break;
             }

              switch ($usuarios[$i]['tp_acesso']) {
                        case '1':
                            $alcada = 'Administrador';
                            break;
                        
                        case '2':
                            $alcada = 'Arquivista';
                            break;
                        case '3':
                            $alcada = 'Operador';
                            break;
                    }

                     $usuarios[$i]['dt_cadastro'] = formatadatatela($usuarios[$i]['dt_cadastro']);
                     $usuarios[$i]['dt_ultimoAcesso'] = formatadatatela($usuarios[$i]['dt_ultimoAcesso']);

            }
					
                   

       

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
			  	<div class="container-fluid">
			  		<div class="col-md-2">
			  			<a href="novoUsuario.php" class="btn btn-primary"><i class="fa fa-user-plus"></i> Novo usuário</a>
			  		</div>
			  		<div class="col-md-1"></div>
			  		<div class="col-md-3">
			  			<label class="form-control"><?=$usuarios['qtdReg'];?> Usuários </label>
			  		</div>
			  		<div class="col-md-3">
			  			<label class="form-control"><?=$desativado;?> Desativados </label>
			  		</div>
			  		<div class="col-md-3">
			  			<label class="form-control"><?=$bloqueado?> Bloqueados </label>
			  		</div>	
			  	</div>
			  	<div class="container-fluid">
			  	<br>	
				  	<table class="table table-condensed">
					    <thead>
					      <tr>
					      	<th> </th>
					        <th>Login</th>
					        <th>Nome</th>
					        <th>Alçada</th>
					        <th>Data de Criação</th>
					        <th>Ultimo Acesso</th>
					        <th>status</th>
					      </tr>
					    </thead>
					    <tbody>
					    <?php
					        	for ($i=0; $i < $usuarios['qtdReg'] ; $i++) 
					        		{ ?> 
					      <tr>
				      		<td>
				      			<a class="btn btn-default fa fa-pencil-square-o" href="editausuario.php?id=<?=$usuarios[$i]['id_usuario']?>" style="color: blue;"></a>
					        	<a class="btn btn-default fa fa-user-times" href="excluirUsuario.php?id=<?=$usuarios[$i]['id_usuario']?>" style="color: red;"></a>
					        </td>
					        
					        						        	
					        <td><?=$usuarios[$i]['nm_login'] ?></td>
					        <td><?=$usuarios[$i]['nm_usuario'];?></td>
					        <td><?=$alcada;?></td>
					        <td><?=$usuarios[$i]['dt_cadastro']; ?></td>
					        <td><?=$usuarios[$i]['dt_ultimoAcesso']; ?></td>
					        <td>
					        	<a class="btn btn-default fa fa-user" aria-hidden="true" <?=$usuarios[$i]['usuarioON']?> ></a>
					        	<a class="btn btn-default fa fa-lock" aria-hidden="true" <?=$usuarios[$i]['usuarioBlq']?> ></a>
					        	<a class="btn btn-default fa fa-user-circle" aria-hidden="true" <?=$usuarios[$i]['usuarioAtivo']?> ></a>
					        </td>
					      </tr>	<?php } ?>
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
