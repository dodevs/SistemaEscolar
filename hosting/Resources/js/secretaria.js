$(function () {

    function inserirProf(login_id){
        $.ajax({
            url: 'http://127.0.0.1/SistemaEscolar/hosting/Resources/php/actions.php',
            type: 'post',
            data: {
                'action': 'insertProf',
                'name': $('#nome-onSec').val(),
                'loginId': login_id
            },
            success: function (data, status) {
                if(data !== -1){
                    alert("Cadastrado com sucesso!");
                }else{
                    alert("Erro ao cadastrar");
                }
            },
            error: function (xhe, desc, err) {
                console.log(xhe);
                console.log("Descricao: "+desc+"\nErro: "+err.responseText);
            }
        })
    }

    $('#cadastrar-onSec').on("click", function (e) {
        e.preventDefault();

        $('#professores-table > tbody:last-child').append(
            "<tr>"+
            "<td>"+ $('#nome-onSec').val() +"</td>"+
            "<td>"+ $('#usuario-onSec').val() +"</td>"+
            "<td>"+ $('#senha-onSec').val() +"</td>"+
            "<td>"+ $('#tipo-onSec').val() +"</td>"+
            "<td>"+ $('#status-onSec').val() +"</td>"+
            "</tr>"
        );
        $.ajax({
            url: 'http://127.0.0.1/SistemaEscolar/hosting/Resources/php/actions.php',
            type: 'post',
            data: {
                'action': 'insertUser',
                'user': $('#usuario-onSec').val(),
                'pass': $('#senha-onSec').val(),
                'type': $('#tipo-onSec').val(),
                'status': $('#status-onSec').val()
            },
            success: function (data, status) {
                if(data === -1){
                    alert("Erro!");
                }else {
                    inserirProf(data);
                }
            },
            error: function (xhe, desc, err) {
                console.log(xhe);
                console.log("Descricao: "+desc+"\nErro: "+err.responseText);
            }
        });
    })
});