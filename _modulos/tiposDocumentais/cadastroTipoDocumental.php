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
                    <h3 class="panel-title" style="text-align: left;">Tipos Documentais</h3>
                    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
                </div>
                <div class="panel-body">
                    <div class="col-md-4 ">
                        <a href="#" class="btn btn-default" ><img src="../../img/bt-por-indexadores.png"/></a>
                    </div>
                    <div class="col-md-4">
                        <a href="listarTiposDocumentais.php" class="btn btn-default"><img src="../../img/bt-por-tipo-documental.png"/></a>
                    </div>
                    <div class="col-md-4">
                        <a href="#" class="btn btn-default"><img src="../../img/bt-por-indexadores-por-local-de-guarda.png"/></a>
                    </div>
                </div>		
        </section>
    </center>	
</main>

<?php
require("../footer.php"); /* TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML */
?>
