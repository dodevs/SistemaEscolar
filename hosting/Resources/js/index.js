$(function () {

    var user = $('#user');
    var pass = $('#pass');
    var msg = $('.msg');




    $('form').on('submit', function (event) {
        event.preventDefault();
        if(user.val() === "" || pass.val() === ""){
            msg.text("Todos os campos devem estar preenchidos!");
            return false
        }

        $.ajax({
            url: 'http://127.0.0.1/SistemaEscolar/hosting/Resources/php/actions.php',
            type: 'post',
            data: {
                'action':'selectUser',
                'user': user.val(),
                'pass': pass.val()
            },
            success: function (data, status) {
                data_array = $.parseJSON(data);
                if(data_array[1] !== "Inativo"){
                    if(data_array[0] > 0){
                        msg.text("Usuário encontrado");
                        window.location.href = "http://127.0.0.1/SistemaEscolar/hosting/pages/gerenciamento.php";
                    }
                    else{
                        msg.text("Usuário ou senha incorreto");
                    }
                }else{
                    msg.text("Usuário inativo!");
                }

            },
            error: function (xhe, desc, err) {
                console.log(xhe);
                console.log("Descricao: "+desc+"\nErro: "+err.responseText);
            }
        });
    });

    logo_wrapper = $('.logo-wrapper');
    logo = $('.logo');
    logo_form = $('.logo-form');
    content = $('.content');

    clicked = false;
    logo.on('click',function (event) {
        if( clicked === true){
            content.removeClass("content-change");
            logo_wrapper.removeClass("wrapper-change");
            logo.removeClass("logo-change");
            logo_form.removeClass("logo-form-change");
            msg.addClass('msg_none');
            msg.text("");
            clicked = false;

        }else if(clicked === false){
            content.addClass("content-change");
            logo_wrapper.addClass("wrapper-change");
            logo.addClass("logo-change");
            logo_form.addClass("logo-form-change");
            msg.removeClass('msg_none');
            clicked = true;
        }
    })
});