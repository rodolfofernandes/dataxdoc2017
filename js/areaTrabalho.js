
function UpdateContents(){
    var targetUrl = "../areaTrabalho/listarArquivos.php";
    var callParameters = '';
    $.ajax({ type: 'POST', url: targetUrl, data: callParameters, success: function(response) {
        var uploadedFiles = document.getElementById("uploadedFiles");
        uploadedFiles.innerHTML = ''; // Limpa a lista antes de recarregar

        var fileList = JSON.parse(response);
        for(var item in fileList) {
            $('#uploadedFiles').append('<input type="checkbox" name=' + fileList[item] + '>' + fileList[item] + '</input>');
            $('#uploadedFiles').append('<br/>');
        }
    }
    });
}

function DeleteFiles(filesChecked){
    var fileArray = new Array();
    filesChecked.each(function(index, element) {
        fileArray.push(btoa(element.name));
    });
    var targetUrl = "../areaTrabalho/removerArquivo.php";
    var callParameters = { 'filesChecked[]': fileArray };
    $.ajax({ type: 'POST', url: targetUrl, data: callParameters, success: function(response) { alert(response); UpdateContents(); }, async: false });
}
