


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

$(document).ready(function(){

    $( "#destinataire_numeroTelephoneDestinataire" ).change(function() {
        let $inputs = [$('#destinataire_numeroTelephoneDestinataire'),  $('#destinataire_okSmsDestinataire')];

        if ($inputs[0].val() !== "") {//coche auto sur recepetion par sms
            $inputs[1].attr("checked", "checked")
        }
        if ($inputs[0].val() === "") {//decoche auto si input tel efface
            $inputs[1].attr("checked", false)
        }
    });

    $( "#destinataire_adresseMailDestinataire" ).change(function() {
        let $inputs = [$('#destinataire_adresseMailDestinataire'), $('#destinataire_okMailDestinataire')];

        if ($inputs[0].val() !== "") {//coche auto sur recepetion par mail
            $inputs[1].attr("checked", "checked")
        }
        if ($inputs[0].val() === "") {//decoche auto si input mail efface
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
            if (elt === false) {
                $('#btnInscription').hide();
                $('.vousDevez').show();
            }
        }
    });
});



$(document).ready(function(){

    let email_state = false;
// on récupère la perte de focus sur le champ
    $('#destinataire_adresseMailDestinataire').blur (function(){
        //on met en variable sa valeur
        let email = $('#destinataire_adresseMailDestinataire').val();
        if (email === '') {
            email_state = false;
            return;
        }//pour comparaison via requête
        $.ajax({
            url: "/uniqueMail",
            method: 'POST',
            data: {
               'email' : email,
            },
            success: function(response){
                //action sur les champs
                if (response !== "not_taken") {
                    email_state = false;
                    $('#destinataire_adresseMailDestinataire').parent().removeClass();
                    $('#destinataire_adresseMailDestinataire').parent().addClass("form_error");
                    $('#destinataire_adresseMailDestinataire_help').removeClass('text-muted');
                    let match = 'Désolé cette adresse Email est déjà utilisée'
                    let changeCouleur = match.fontcolor('red');
                    $('#destinataire_adresseMailDestinataire_help').html(changeCouleur);
                }else {
                    email_state = true;
                    $('#destinataire_adresseMailDestinataire').parent().removeClass();
                    $('#destinataire_adresseMailDestinataire').parent().addClass("form_success");
                    $('#destinataire_adresseMailDestinataire_help').removeClass('text-muted');
                    let match = 'Adresse Email Valide';
                    let changeCouleur = match.fontcolor('blue');
                    $('#destinataire_adresseMailDestinataire_help').html(changeCouleur);
                }
            }
        });
    });


});



