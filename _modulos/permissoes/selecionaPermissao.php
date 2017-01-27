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
                    <h3 class="panel-title" style="text-align: left;">Permissões</h3>
                    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
                </div>
                <div class="panel-body">
                    <div class="col-md-3 ">
                        <a href="permissaoFtp.php" class="btn btn-default" ><img src="../../img/bt-ftp.png"/></a>
                    </div>
                    <div class="col-md-3">
                        <a href="permissaoArquivo.php" class="btn btn-default"><img src="../../img/bt-por-arquivo.png"/></a>
                    </div>
                    <div class="col-md-3">
                        <a href="permissaoUsuario.php" class="btn btn-default"><img src="../../img/Bt-PorUsuario.png"/></a>
                    </div>
                    <div class="col-md-3">
                        <a href="permissaoDocumento.php" class="btn btn-default"><img src="../../img/Bt-PorDocumento.png"/></a>
                    </div>
                </div>		
        </section>
    </center>	
</main>

<?php
    require("../footer.php"); /* TRAZ ITENS ESSENCIAIS "CSS" "JS" HTML */
?>
