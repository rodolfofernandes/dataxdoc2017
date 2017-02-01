<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<title>DATA X DOC</title>

	<!-- SCRIPTS USADOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> <!-- JQUERY -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.js"></script>
	<script src="../../bootstrap/js/bootstrap.min.js"></script><!-- NUCLEO BOOTSTRAP -->
	<script src="../../js/areaTrabalho.js" type="text/javascript"></script>
	<script src="../../js/arvorePastas.js" type="text/javascript"></script> <!-- JS PARA A LISTAGEM DE PASTAS PAGINA PRINCIPAL -->
	<script src="../../js/checkbox.js"     type="text/javascript"></script> <!-- JS PARA FAZER COM QUE SEJA SELECIONADOS TODOS OS ITEM CHECKBOX -->
	<!-- SCRIPTS FIM -->

	<!-- FOLHA DE ESTILOS -->
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css"> <!-- CORE BOOTSTRAP -->
	<link rel="stylesheet" href="../../bootstrap/css/bootstrap-theme.min.css"> <!-- BOOTSTRAP THEME -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.11.0/bootstrap-table.css">
    <script type="text/javascript" >
        $(document).ready(function() {
			$('#myModal2').on('show.bs.modal', function() {
				UpdateContents();
			});

            $('#fileIndex').on('click', function() {
				IndexFiles($('#uploadedFiles input[type=checkbox]:checked'));
			});

			$('#fileUpload').on('click', function() {
				FileUpload();
			});

			$('#fileDump').on('click', function() {
				DeleteFiles($('#uploadedFiles input[type=checkbox]:checked'));
			});

            var estado = false; // nenhum marcado
            $('#selectAll').on('click', function() {
				estado = !estado;
				var uploadedFiles = $('#uploadedFiles input[type=checkbox]');
				uploadedFiles.each(function() {
					$(this).prop("checked", estado);
				});
			});
        });
    </script>
</head>
