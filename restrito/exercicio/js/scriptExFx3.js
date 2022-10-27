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
            $(".status").css("color", "green");
        } else {
            var tentativa = tentativa + 1;
            var message = "Ops, você errou!!!" + tentativa;
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
            var enunciadoCompleto = enunciado + "=";
            $('#paragrafo_enunciado').text(enunciadoCompleto);
        } else {
            location.reload(true);
        }
     });
 });