<?php

require_once("conexao.php");

function consultaRepositorios($tp_acesso)
{
    global $conn;

    $query = "SELECT * FROM tbl_repositorio where tp_acesso = '$tp_acesso' AND id_repositorio_pai IS NULL";
    $dados = mysqli_query($conn,$query);
    $i = 0;
    $resultado['qtdReg'] = mysqli_num_rows($dados);


    if  ($resultado['qtdReg'] > 0) {
        
        while($row = mysqli_fetch_assoc($dados)) {
          $resultado[$i] = $row;
          $i++;
        }
        return $resultado;
    }

}


?>
