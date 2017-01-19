<?php
	require("../inicializa.php"); /*TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML*/
	require("../header.php"); /*TRA O MENO DO SISTEMA*/
?>


<main>
	<center>
		<div class="container-fluid well well-sm">
			<div class="col-md-2">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Estrutura de Pastas</button>			
			</div>
			<div class="col-md-8 ">
				<label style="margin-top: 1%;">Principal</label>
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Meus Documentos</button>
			</div>				
		</div>

		</center>
		<div class="container-fluid well well-sm">
			<div class="col-md-2 col-xs-6">
				<center>
						<div style="border-style: solid;border-radius: 10px; ;border-width: 2px; border-color: #ff931e;">
							<a href="#" title="Abrir Lista de Documentos"><img src="../../img/root-128x118.png" "></a>
							<a href="#" title="Abrir Lista de Documentos"><img src="../../img/Ico-documents.png"></a>
					 		<a href="#" title="Nova Ficha"><img src="../../img/card-on-2.png"></a>
					 		Condomínios
					 	</div>
				</center>	
			</div>			
		</div>

	<!-- Inicio do Sliders que abrem, eles ficam ocultos e são mostrado com o click -->
	<!-- Modal -->
	<div class="modal left fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Estrutura de Pastas</h4>
				</div>
					
				<div class="modal-body">
					<div class="container">
		<div class="container-fluid">
			<div class="col-md-11">
				<div id="left" class="span3" style="width: 200px;">
		            <ul id="menu-group-1" class="nav menu">  
		                <li class="item-1 deeper parent active">
		                    <a class="" href="#">
		                        <span style="width: 25px;" data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-1" class="sign"><i class="fa fa-plus"></i></span>
		                        <span class="lbl"><img src="../../img/filecabinet.png"/> - WS</span>                      

		                    </a>
		                    <ul class="children nav-child unstyled small collapse" id="sub-item-1">
		                        <li class="item-2 deeper parent active">
		                            <a class="" href="#">
		                                <span style="width: 25px;" data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-2" class="sign"></span>
		                                <span class="lbl"><img src="../../img/folder.png"> - Pasta</span> 
		                            </a>

		                            <br>
		                           
		                        </li>
		                        <li class="item-5 deeper parent">
		                            <a class="" href="#">
		                                <span style="width: 25px;" data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-5" class="sign"></span>
		                                <span class="lbl"><img src="../../img/folder.png"> - Pasta 2</span> 
		                            </a>
		                            
		                        </li>
		                    </ul>
		                </li>
								<br>
		                <li class="item-8 deeper parent">
		                    <a class="" href="#">
		                        <span style="width: 25px;" data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-8" class="sign"><i class="fa fa-plus"></i></span>
		                        <span class="lbl">Menu Group ii</span>                      
		                    </a>
		                    <ul class="children nav-child unstyled small collapse" id="sub-item-8">
		                        <li class="item-9 deeper parent">
		                            <a class="" href="#">
		                                <span style="width: 25px;" data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-9" class="sign"><i class="fa fa-plus"></i></span>
		                                <span class="lbl">Menu 1</span> 
		                            </a>
		                            <ul class="children nav-child unstyled small collapse" id="sub-item-9">
		                                <li class="item-10">
		                                    <a class="" href="#">
		                                        <span class="sign"><i class="icon-play"></i></span>
		                                        <span class="lbl">Menu 1.1</span>
		                                    </a>
		                                </li>
		                                <li class="item-11">
		                                    <a class="" href="#">
		                                        <span class="sign"><i class="icon-play"></i></span>
		                                        <span class="lbl">Menu 1.2</span> 
		                                    </a>
		                                </li>                                
		                            </ul>
		                        </li>
		                        <li class="item-12 deeper parent">
		                            <a class="" href="#">
		                                <span style="width: 25px;" data-toggle="collapse" data-parent="#menu-group-1" href="#sub-item-12" class="sign"><i class="fa fa-plus"></i></span>
		                                <span class="lbl">Menu 2</span> 
		                            </a>
		                            <ul class="children nav-child unstyled small collapse" id="sub-item-12">
		                                <li class="item-13">
		                                    <a class="" href="#">
		                                        <span class="sign"><i class="icon-play"></i></span>
		                                        <span class="lbl">Menu 2.1</span>                                    
		                                    </a>
		                                </li>
		                                <li class="item-14">
		                                    <a class="" href="#">
		                                        <span class="sign"><i class="icon-play"></i></span>
		                                        <span class="lbl">Menu 2.2</span>                                    
		                                    </a>
		                                </li>
		                            </ul>
		                        </li>
		                    </ul>
		                </li>    			
		            </ul>          
				</div>
			</div>
		</div>
	</div>
</div>

			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
	
	<!-- Modal -->
	<div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
		<div class="modal-dialog" role="document">
			<div class="modal-content">

				<div class="modal-header">
					<button  type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div>
							<div class="col-md-5">
								<h4 class="modal-title" id="myModalLabel2">Meus Documentos</h4>
							</div>
							<div class="col-md-3">
								
							</div>
							<div class="col-md-4">
							<form method="post" action="upload.php">
							<label class="btn btn-primary"><i class="fa fa-cloud-upload" aria-hidden="true"></i><input data-toggle="modal" data-target="#centerModal"  style="display: none;"></label>
							<a href="#" class="btn btn-info"><i class="fa fa-floppy-o" aria-hidden="true"></i></a>
							<a href="#" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a>
							</h4>
							
							</form>
							</div>
							
						</div>	
								
				</div>
				  
					<div class="modal-body">	
							<form name="form">
							<label style="text-decoration: underline;" id="todos">Selecionar todos</label>
							<hr>
							<div class="form-group" >
							<br>
				            <input type="checkbox" name="fancy-checkbox-default" id="mycheckbox" autocomplete="off" />
				            <div class="btn-group">
				                <label for="fancy-checkbox-default" class="btn btn-default">
				                    <span class="glyphicon glyphicon-ok"></span>
				                    <span> </span>
				                </label>
				                <label for="fancy-checkbox-default" class="btn btn-default active ]" style="width: 420px;">
				                    Default Checkbox
				                </label>
				            </div>
				        </div>		       
				       </form> 
					</div>		
			</div><!-- modal-content -->
		</div><!-- modal-dialog -->
	</div><!-- modal -->
			<!-- fim dos modais -->



<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="centerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                     <h4 class="modal-title" id="myModalLabel">Upload de arquivos</h4>
                </div>
                <div class="modal-body">                	
                	<form method="post" action="upload.php">
                		<div class="container-fluid">
							<div class="col-md-6">
				                <input type="file" name="btnArquivos" multiple/>
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
</main>


<?php require("../footer.php");