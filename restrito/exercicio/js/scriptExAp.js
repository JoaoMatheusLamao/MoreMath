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
            var message = "Parabéns, você acertou!!!"
        } else {
            var message = "Ops, você errou!!!"
        }
        $('.status').text(message);
    });

});

$(document).ready(function(){
	$.ajax({
        url: 'http://localhost/restrito/exercicio/selectEx.php',
        method: 'POST',
        dataType: 'json'
    }).done(function(enunciado){
        if (enunciado !== "") {
            $('#paragrafo_enunciado').text(enunciado);
        } else {
            location.reload(true);
        }
     });
 });