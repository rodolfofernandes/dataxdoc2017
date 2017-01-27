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
                    <h3 class="panel-title" style="text-align: left;"><b>Gerenciar Permissões Por Documento</b> (Permissão Exclusiva)</h3>
                    <a href="../principal/principal.php" class="btn btn-danger pull-right" style="margin-top: -26px;"><i class="fa fa-close" aria-hidden="true"></i></a>
                </div>
                <div class="panel-body">
                    <div class="col-md-4"><label>Selecione o Documento</label>
                        <select class="form-control" title="Selecione um locar de guarda">
                            <option value="0">Selecione um Local de Guarda</option>
                            <option value="saab">Saab</option>
                            <option value="opel">Opel</option>
                            <option value="audi">Audi</option>
                        </select>

                        <div class="form-control">aaa <br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br>&nbsp;<br></div>                        
                    </div>
                    <div  class=" col-md-8"><label class="form-control">Lista de Documentos</label><br>
                         
                            <table class="table table-condensed">
                                <thead>
                                    <tr>  
                                        <th></th>
                                        <th>Nome</th>
                                        <th>Local</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a class="btn btn-default fa fa-pencil-square-o" href="editausuario.php?id=<?= $usuarios[$i]['id_usuario'] ?>" style="color: blue;"></a>
                                            <a class="btn btn-default fa fa-user-times" href="excluirUsuario.php?id=<?= $usuarios[$i]['id_usuario'] ?>" style="color: red;"></a>
                                        </td>
                                        <td>Nome</td>
                                        <td>Local</td>
                                    </tr>	
                                    <tr>
                                        <td>
                                            <a class="btn btn-default fa fa-pencil-square-o" href="editausuario.php?id=<?= $usuarios[$i]['id_usuario'] ?>" style="color: blue;"></a>
                                            <a class="btn btn-default fa fa-user-times" href="excluirUsuario.php?id=<?= $usuarios[$i]['id_usuario'] ?>" style="color: red;"></a>
                                        </td>
                                        <td>Nome</td>
                                        <td>Local</td>
                                    </tr>	
                                    <tr>
                                        <td>
                                            <a class="btn btn-default fa fa-pencil-square-o" href="editausuario.php?id=<?= $usuarios[$i]['id_usuario'] ?>" style="color: blue;"></a>
                                            <a class="btn btn-default fa fa-user-times" href="excluirUsuario.php?id=<?= $usuarios[$i]['id_usuario'] ?>" style="color: red;"></a>
                                        </td>
                                        <td>Nome</td>
                                        <td>Local</td>
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