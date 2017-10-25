$(function () {
    // $(document).on('mousemove',function(e){
    //     var hidden = ($(".header").css('visibility')!='visible');
    //     console.log(hidden);
    //     if(e.clientY <90 && hidden)
    //         $(".header").css('visibility','visible');
    //     else if(e.clientY >90 && !hidden)
    //         $(".header").css('visibility','hidden');
    // });
    $('#tabs').tabs({
        active: 1
    });
    $('#tabs').tabs("option", "disabled", [0,2]);

    $('#username').on("click", function (e) {
        $.ajax({
            url: 'http://127.0.0.1/SistemaEscolar/hosting/Resources/php/actions.php',
            type: 'post',
            data: {'action': 'logof'},
            success: function (data, status) {

                window.location.href = "http://127.0.0.1/SistemaEscolar/hosting/index.html";
            },
            error: function (xhe, desc, err) {
                console.log(xhe);
                console.log("Descricao: "+desc+"\nErro: "+err.responseText);
            }
        })
    })
});
