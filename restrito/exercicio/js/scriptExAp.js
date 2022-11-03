var tentativa = 3;

$('#formResposta').submit(function(e) {
    e.preventDefault();

    var u_resp = $('#inpResposta').val();
    
    $.ajax({
        url: 'http://localhost/restrito/exercicio/corrigeEx.php',
        method: 'POST',
        data: {resposta: u_resp},
        dataType: 'json'
    }).done(function(result){
        $('#inpResposta').val('');
        console.log(result);
        if(result == true){
            var message = "Parabéns, você acertou!!!";
            $("#resultado").text(u_resp).css("color", "green");
            $(".status").css("color", "green");
            $(".form_resp").css("display", "none");
        } else {
            tentativa = tentativa - 1;
            $('#tentativas').text(tentativa);
            if(tentativa < 1){
                $(".quadro_tentativa").css("display", "flex");
                $(".trilho_tentativa").css("display", "flex");
                $(".quadro_conta").css("display", "none");
                $(".trilho_inferior").css("display", "none");
            }
            var message = "Ops, você errou!!!";
            $(".status").css("color", "red");
        }
        $('.status').text(message);
        $.ajax({
            url: 'http://localhost/restrito/exercicio/updatePontos.php',
            method: 'POST',
            dataType: 'json'
        }).done(function(pontos){
            console.log(pontos);
            var pontuacao = "Pontuação: " + pontos;
            $('#pontos').text(pontuacao);
        });
    });

});

$(document).ready(function(){
	$.ajax({
        url: 'http://localhost/restrito/exercicio/selectEx.php',
        method: 'POST',
        dataType: 'json'
    }).done(function(enunciado){
        $('#tentativas').text(tentativa);
        $.ajax({
            url: 'http://localhost/restrito/exercicio/updatePontos.php',
            method: 'POST',
            dataType: 'json'
        }).done(function(pontos){
            console.log(pontos);
            var pontuacao = "Pontuação: " + pontos;
            $('#pontos').text(pontuacao);
        });
        if (enunciado !== "") {
            $('#paragrafo_enunciado').text(enunciado);
        } else {
            location.reload(true);
        }
     });
 });