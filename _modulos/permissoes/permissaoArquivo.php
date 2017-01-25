<?php
session_start();
error_reporting(E_WARNING);
if ($_SESSION['user'] == null) {
    header("Location: ../acesso/login.php");
}


require("../inicializa.php"); /* TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML */
require("../header.php"); /* TRA O MENO DO SISTEMA */
?>
<main>
    <center>
        <section class="container">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title" style="text-align: left;">Permissões Por Arquivos</h3>
                    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
                </div>
                <div class="panel-body">
                    <div class="col-sm-2">
                        <nav class="nav-sidebar">
                            <ul class="nav tabs">
                                <li class=""><a href="#tab1" class="btn btn-default" data-toggle="tab">Arquivista</a></li><br>

                                <li class=""><a href="#tab2" class="btn btn-default" data-toggle="tab">Operador</a></li><br>                                                   
                            </ul>
                        </nav>
                        <div style="border: 2px; border-style: solid; border-color: orange; border-radius: 10px;"><h2 class="add">Place for your add!</h2></div>
                    </div>
                    <!-- tab content -->
                    <div class="tab-content">
                        <div class="tab-pane active text-style" id="tab1">
                            <form method="post">
                                <div class="col-md-4">
                                    <label class="form-control">Local de Guarda</label>
                                    <select class="form-control" title="Selecione um locar de guarda">
                                        <option value="volvo">Selecione um local de guarda</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <br>
                                    <select class="form-control" size="4" style="height:100px;width:160px;border: none;
                                            height: 175px; margin: 0 0 0 -4px; width: 100%; padding-top: 5px;">
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <br> <br>
                                    <div class="input-group margin-bottom-sm">                                    
                                        <label class="form-control">Adicionar</label>
                                        <span class="input-group-addon btn btn-success"><i class="fa fa-chevron-right"></i></span>
                                    </div>
                                    <br> <br>
                                    <div class="input-group margin-bottom-sm">                                    
                                        <label class="form-control">Remover</label>
                                        <span class="input-group-addon btn btn-danger"><i class="fa fa-chevron-left"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-4"><label class="form-control">Responsável</label>
                                    <select class="form-control" title="Selecione um locar de guarda">
                                        <option value="volvo">Selecione o Responsável</option>
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select>
                                    <br>
                                    <select class="form-control" size="4" style="height:100px;width:160px;border: none;
                                            height: 175px; margin: 0 0 0 -4px; width: 100%; padding-top: 5px;">
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select><br>
                                    <input type="submit" value="Salvar" class="btn btn-primary pull-right"/>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane text-style" id="tab2">
                            <form method="post">
                                <div class="col-md-4">
                                    <label class="form-control">Local de Guarda</label>
                                    <label class="form-control">Selecione o local de Guarda</label>
                                    <div class="container-fluid">
                                        <div class="col-md-6">
                                            <label class="form-control"> Local Guarda </label>
                                            <select class="form-control" size="4" style="height:100px;width:160px;border: none;
                                                    height: 175px; margin: 0 0 0 -4px; width: 100%; padding-top: 5px;">
                                                <option value="saab">Saab</option>
                                                <option value="opel">Opel</option>
                                                <option value="audi">Audi</option>
                                            </select>                                        
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-control"> Operadores </label>
                                            <select class="form-control" size="4" style="height:100px;width:160px;border: none;
                                                    height: 175px; margin: 0 0 0 -4px; width: 100%; padding-top: 5px;">
                                                <option value="saab">Saab</option>
                                                <option value="opel">Opel</option>
                                                <option value="audi">Audi</option>
                                            </select>
                                        </div>                                                                               
                                    </div>                                    
                                </div>
                                <div class="col-md-2">
                                    <br> <br>
                                    <div class="input-group margin-bottom-sm">                                    
                                        <label class="form-control">Adicionar</label>
                                        <span class="input-group-addon btn btn-success"><i class="fa fa-chevron-right"></i></span>
                                    </div>
                                    <br> <br>
                                    <div class="input-group margin-bottom-sm">                                    
                                        <label class="form-control">Remover</label>
                                        <span class="input-group-addon btn btn-danger"><i class="fa fa-chevron-left"></i></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <br><br>
                                    <label class="form-control"> Com Permissão </label>
                                    </select>
                                    <br>
                                    <select class="form-control" size="4" style="height:100px;width:160px;border: none;
                                            height: 175px; margin: 0 0 0 -4px; width: 100%; padding-top: 5px;">
                                        <option value="saab">Saab</option>
                                        <option value="opel">Opel</option>
                                        <option value="audi">Audi</option>
                                    </select><br>
                                    <input type="submit" value="Salvar" class="btn btn-primary pull-right"/>
                                </div>
                            </form>
                        </div>           
                    </div>
                </div>		
        </section>
    </center>	
</main>

<?php
require("../footer.php"); /* TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML */
?>