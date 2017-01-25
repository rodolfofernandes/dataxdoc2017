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
                    <h3 class="panel-title" style="text-align: left;">Meus Últimos Documentos Indexados</h3>
                    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
                </div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-4">

                        </div>
                        <div class="btn-group col-md-2">
                            <a class="btn btn-primary" data-toggle="dropdown" href="#">Ordernar Por..</a>
                            <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                                <span class="fa fa-caret-down" title="Toggle dropdown menu"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Nome</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Tipo Documental</a></li>
                                <li class="divider"></li>
                                <li><a href="#"> Data</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Local</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <label class="form-control">(0) Documentos </label>
                        </div>	
                    </div>
                    <div class="container-fluid">
                        <br>	
                        <table class="table table-condensed">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Nome</th>
                                    <th>Tipo Documental</th>
                                    <th>Data de Indesxaçao</th>
                                    <th>Local de Guarda</th>
                                    <th>Local</th>
                                    <th>status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>qqqqq</td>
                                    <td>AA</td>
                                    <td>BBB</td>
                                    <td>CC</td>
                                    <td>DDD</td>
                                    <td>WWW</td>
                                    <td>//// </td>
                                </tr>	
                            </tbody>
                        </table>
                    </div>
                </div>		
        </section>
    </center>	
</main>

<?php
require("../footer.php"); /* TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML */
?>