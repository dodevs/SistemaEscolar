$(function () {

    function validateForms(forms){
        var preenchidas = 1;
        forms.forEach(function(item, index){
            if(item === null || item === ""){
                preenchidas *= 0;
            }
            else{
                preenchidas *= 1;
            }
        });

        return preenchidas;
    }

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

        var nome = $('#nome-onSec').val();
        var usuario = $('#usuario-onSec').val();
        var senha = $('#senha-onSec').val();
        var tipo = $('#tipo-onSec').val();
        var status = $('#status-onSec').val();

        if(validateForms([nome, usuario, senha, tipo, status])){
            $('#professores-table > tbody:last-child').append(
                "<tr>"+
                "<td>"+ nome +"</td>"+
                "<td>"+ usuario +"</td>"+
                "<td>"+ senha +"</td>"+
                "<td>"+ tipo +"</td>"+
                "<td>"+ status +"</td>"+
                "</tr>"
            );
            $.ajax({
                url: 'http://127.0.0.1/SistemaEscolar/hosting/Resources/php/actions.php',
                type: 'post',
                data: {
                    'action': 'insertUser',
                    'user': usuario,
                    'pass': senha,
                    'type': tipo,
                    'status': status
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
        }else {
            alert("Todos os campos devem ser preenchidos!");
        }
    })
});