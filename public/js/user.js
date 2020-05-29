$(document).ready(function(){

    let email_state = false;

    $('#user_email').blur (function(){
        let email = $('#user_email').val();
        if (email === '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: "uniqueMailUser",
            method: 'POST',
            data: {

                'email' : email,
            },
            success: function(response){

                if (response !== "not_taken") {
                    email_state = false;
                    $('#user_email').parent().removeClass();
                    $('#user_email').parent().addClass("form_error");
                    $('#user_email_help').removeClass('text-muted');
                    let match = 'Désolé cette adresse Email est déjà utilisée'
                    let changeCouleur = match.fontcolor('red');
                    $('#user_email_help').html(changeCouleur);
                }else {
                    email_state = true;
                    $('#user_email').parent().removeClass();
                    $('#user_email').parent().addClass("form_success");
                    $('#user_email_help').removeClass('text-muted');
                    let match = 'Adresse Email unique';
                    let changeCouleur = match.fontcolor('blue');
                    $('#user_email_help').html(changeCouleur);
                }
            }
        });
    });
});