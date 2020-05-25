


//permets à l'utilisateur de ne renseigner que tel ou mail

$(document).ready(function(){
    $("#btnInscription").click(function() {
        let $inputs = [$('#destinataire_adresseMailDestinataire'), $('#destinataire_numeroTelephoneDestinataire')];
        if ($inputs[0].val() !== "") {
            $inputs[1].removeAttr('required');
        }
        if ($inputs[1].val()!== "") {
            $inputs[0].removeAttr('required');
        }else{
            if($inputs[0].val() === "" && $inputs[1].val() === ""){
                alert("Il faut renseigner au soit l'Email soit le téléphone soit les deux.")
            }
        }
    })
});


$(document).ready(function(){  //coche auto sur recepetion par mail
    $( "#destinataire_adresseMailDestinataire" ).change(function() {
        let $inputs = [$('#destinataire_adresseMailDestinataire'), $('#destinataire_okMailDestinataire')];

        if ($inputs[0].val() !== "") {
            $inputs[1].attr("checked", "checked")
        }
    });
});
$(document).ready(function(){ //coche auto sur recepetion par sms

    $( "#destinataire_numeroTelephoneDestinataire" ).change(function() {
        let $inputs = [$('#destinataire_numeroTelephoneDestinataire'),  $('#destinataire_okSmsDestinataire')];

        if ($inputs[0].val() !== "") {
            $inputs[1].attr("checked", "checked")
        }

    });
});


$(document).ready(function(){  //decoche auto si input mail efface
    $( "#destinataire_adresseMailDestinataire" ).change(function() {
        let $inputs = [$('#destinataire_adresseMailDestinataire'), $('#destinataire_okMailDestinataire')];

        if ($inputs[0].val() === "") {
            $inputs[1].attr("checked", false)
        }

    });
});

$(document).ready(function(){ //decoche auto si input tel efface

    $( "#destinataire_numeroTelephoneDestinataire" ).change(function() {
        let $inputs = [$('#destinataire_numeroTelephoneDestinataire'),  $('#destinataire_okSmsDestinataire')];

        if ($inputs[0].val() === "") {
            $inputs[1].attr("checked", false)
        }

    });
});

//Au cas ou l'utilisateur décocherait
$(document).ready(function(){
    $("#btnInscription").click(function() {
        let $inputs = [$('#destinataire_okMailDestinataire'), $('#destinataire_okSmsDestinataire')];

        if ($inputs[0].prop("checked") === true) {    //choix du mail
            $inputs[1].removeAttr('required');
        }
        if ($inputs[1].prop("checked") === true) {    //choix du sms

            $inputs[0].removeAttr('required');
        }else{
            if($inputs[0].prop("checked") === false && $inputs[1].prop("checked") === false){
                alert("Il faut cocher un mode de réception.")
            }
        }
    })
});




//cache le lien de validation si la case accepter les cgu n est pas cochée
$(document).ready(function(){
    $('#btnInscription').hide();

    $( "#destinataire_accordRgpdDestinataire" ).on( "click", function() {

        let elt = $('#destinataire_accordRgpdDestinataire')[0].checked;

        if (elt == true){
            $('#btnInscription').show();//affiche le bouton valider et cache les lignes d'avertissements
            $('.vousDevez').hide();
        }else {
            if (elt == false) {
                $('#btnInscription').hide();
                $('.vousDevez').show();
            }
        }

    });

});
/*$(document).ready(function(){
    $('#destinataire_idValidation').hide();
});*/

//tentative valide unique mail en ajax=> donne erreur Warning: Illegal offset type in isset or empty
$(document).ready(function(){

    let email_state = false;

    $('#destinataire_adresseMailDestinataire').on('blur', function(){
        let email = $('#destinataire_adresseMailDestinataire').val();
        if (email === '') {
            email_state = false;
            return;
        }
        $.ajax({
            url: "uniqueMail",
            method: 'post',
            data: {
                'email_check' : 1,
                'email' : email,
            },
            success: function(response){
                if (response === 'taken' ) {
                    email_state = false;
                    $('#destinataire_adresseMailDestinataire').parent().removeClass();
                    $('#destinataire_adresseMailDestinataire').parent().addClass("form_error");
                    $('#destinataire_adresseMailDestinataire').siblings("span").text('Désolé cette adresse Email est déjà utilisée');
                }else if (response === 'not_taken') {
                    email_state = true;
                    $('#destinataire_adresseMailDestinataire').parent().removeClass();
                    $('#destinataire_adresseMailDestinataire').parent().addClass("form_success");
                    $('#destinataire_adresseMailDestinataire').siblings("span").text('Adresse Email Valide');
                }
            }
        });
    });

    $('#reg_btn').on('click', function(){

        let email = $('#destinataire_adresseMailDestinataire').val();

        if (email_state === false) {
            $('#error_msg').text('Merci de revoir les erreurs inqdiquées');
        }else{
            // proceed with form submission
            $.ajax({
                url: 'new',
                type: 'post',
                data: {
                    'save' : 1,
                    'email' : email,

                },
                success: function(response){
                    alert('user saved');

                    $('#destinataire_adresseMailDestinataire').val('');

                }
            });
        }
    });
});



