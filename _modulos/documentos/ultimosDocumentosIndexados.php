<?php
    session_start();
    error_reporting(E_WARNING);
    if ($_SESSION['user'] == null) {
        header("Location: ../acesso/login.php");
    }

    require("../inicializa.php"); /* TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML */
    require("../header.php"); /* TRAZ O MENU DO SISTEMA */
	require("../funcaoBD/documento.class.php");
    require_once("../funcaoBD/util.class.php");

    $filter = 'criadoPor = '.$_SESSION['id_usuario'].' AND dataCriacao > DATE_SUB( NOW(), INTERVAL 1 DAY)'; // Busca os documentos indexados nas últimas 24 horas
    $documentos = consultaDocumentos($filter);

    $reportRows = array();
    foreach($documentos as $key => $value) {
        $reportRows[$key]['tipo'] = 'AAA'.$key;
        $reportRows[$key]['nome'] = $value['nome'];
        $reportRows[$key]['tipo_documental'] = 'CCC'.$key;
        $reportRows[$key]['data_indexacao'] = $value['dataCriacao'];
        $reportRows[$key]['local_guarda'] = 'EEE'.$key;
        $reportRows[$key]['local'] = 'FFF'.$key;
        $reportRows[$key]['status'] = 'GGG'.$key;

    }
    echo '<script>var data = '.json_encode($reportRows).';</script>';
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
                        <table class="table table-condensed" id="reportTable">
                            <thead>
                                <tr>
                                    <th data-field="tipo" data-sortable="true">Tipo</th>
                                    <th data-field="nome" data-sortable="true">Nome</th>
                                    <th data-field="tipo_documental" data-sortable="true">Tipo Documental</th>
                                    <th data-field="data_indexacao" data-sortable="true">Data de Indexação</th>
                                    <th data-field="local_guarda" data-sortable="true">Local de Guarda</th>
                                    <th data-field="local" data-sortable="true">Local</th>
                                    <th data-field="status" data-sortable="true">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- preenchido dinamicamente pelo componente javascript -->
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

<script type="text/javascript" >
    $(document).ready(function() {
        $('#reportTable').bootstrapTable({
            data: data
        }); 
    });
</script>
