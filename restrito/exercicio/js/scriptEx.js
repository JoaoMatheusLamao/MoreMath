
$('#formResposta').submit(function(e) {
    e.preventDefault();

    var u_resp = $('#inpResposta').val();
    
    $.ajax({
        url: 'http://localhost/restrito/exercicio/selectEx.php',
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
