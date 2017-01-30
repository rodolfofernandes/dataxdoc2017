
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
        fileArray.push(btoa(element.nextSibling.nodeValue));
    });
    var targetUrl = "../areaTrabalho/removerArquivo.php";
    var callParameters = { 'filesChecked[]': fileArray };
    $.ajax({ type: 'POST', url: targetUrl, data: callParameters, success: function(response) { alert(response); UpdateContents(); }, async: false });
}

function FileUpload(){
    $('#uploadForm input[type=file]').change(function(event) {
        event.stopImmediatePropagation();  // Evita que o evento seja disparado várias vezes

        var status = '';

        var xhr = new XMLHttpRequest();

        xhr.open("POST", '../areaTrabalho/upload.php');

        var formData = new FormData(document.getElementById('uploadForm'));
        xhr.send(formData);

        xhr.addEventListener('readystatechange', function() {
            if (xhr.readyState === 4 && xhr.status == 200) {
                alert(xhr.responseText);  // 'Upload concluído com sucesso'
                UpdateContents();
            } else {
                status = xhr.statusText;
            }
        });

        xhr.upload.addEventListener("progress", function(e) {
            if (e.lengthComputable) {
            var percentage = Math.round((e.loaded * 100) / e.total);
            status = String(percentage) + '%';
            }
        }, false);

        xhr.upload.addEventListener("load", function(e){
            status = '100%';
        }, false);

        $(this).val(''); // limpa a seleção para o evento ser disparado novamente
    });
    $('#uploadForm input[type=file]').trigger('click');
}

function IndexFiles(filesChecked){
    var fileArray = new Array();
    filesChecked.each(function(index, element) {
        fileArray.push(btoa(element.nextSibling.nodeValue));
    });
    var targetUrl = "../areaTrabalho/indexarArquivos.php";
    var callParameters = { 'filesChecked[]': fileArray };
    $.ajax({ type: 'POST', url: targetUrl, data: callParameters, success: function(response) { alert(response); UpdateContents(); }, async: false });
}
