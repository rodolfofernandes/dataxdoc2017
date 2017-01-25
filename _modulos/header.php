<body>
    <header>
        <center>
            <nav class="navbar navbar-default">
                <div class="container-fluid" style="background-color: #f2f2f2; border-bottom-style: solid;border-width:2px;  ;border-bottom-color: #ff931e;">							
                    <div class="navbar-header col-md-4 col-sm-12">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="../principal/principal.php"> <img src="../../img/logo.png" style="max-width: 80%"></a>
                    </div>														
                    <div class="col-md-4 col-sm-12 container-fluid" >					
                        <form method="post" class="navbar-form" style="margin-top: 3%;">
                            <div class="input-group margin-bottom-sm">
                                <span class="input-group-addon btn-primary"><i class="fa fa-search" aria-hidden="true" style="color: white;"></i></span>									 
                                <input class="form-control" type="text" id="txtBuscar" placeholder="Busca">		
                            </div>
                            <input type="submit" class="form-control" value="Buscar">	
                        </form>
                    </div>
                    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1" style="margin-top: 1%;">					
                        <div class="nav navbar-nav ">					
                            <a class="btn btn-primary" href="#"><i class="fa fa-bar-chart"></i></a>
                            <div class="btn-group ">
                                <a class="btn btn-primary" data-toggle="dropdown" href="#"><i class="fa fa-cog" aria-hidden="true"></i></a>
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="../usuario/usuarios.php"><i class="fa fa-users"></i> Usuários</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-archive"></i> Locais de Guarda</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../permissoes/selecionaPermissao.php"><i class="fa fa-key"></i> Permissões</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../tiposDocumentais/cadastroTipoDocumental.php"><i class="fa fa-ellipsis-h "></i> Tipos Documentais</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="fa fa-cog"></i> Geral</a></li>
                                </ul>
                            </div>
                            <div class="btn-group ">
                                <a class="btn btn-primary" data-toggle="dropdown" href="#"><i class="fa fa-user fa-fw"></i>Rodolfo</a>
                                <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                    <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="../usuario/dadosUsuario.php"><i class="fa fa-id-card"></i> Meus dados Pessoais</a></li>
                                    <li class="divider"></li>
                                    <li><a href="../documentos/ultimosDocumentosIndexados.php"><i class="fa fa-files-o"></i> Últimos documentos indexados</a></li>
                                    <li class="divider"></li>
                                    <li ><a href="../acesso/logout.php"><i class="fa fa-trash-o fa-sign-out" ></i> Sair</a></li>
                                </ul>
                            </div>	
                        </div>	
                    </div>	
                </div>
                </div>
                </div>	
            </nav>
        </center>	
    </header><!-- Fim do header> -->