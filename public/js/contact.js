// Le script qui devra calculer et afficher le nombre de mots et de caractères
$(document).ready(function(e) {

    $('#contact_message').keyup(function() {

        var nombreCaractere = $(this).val().length;

        var nombreMots = jQuery.trim($(this).val()).split(' ').length;
        if ($(this).val() === '') {
            nombreMots = 0;
        }

        var msg = ' ' + nombreMots + ' mot(s) | ' + nombreCaractere + ' Caractere(s) / 3000';
        $('#compteur').text(msg);
        if (nombreCaractere > 3000) { $('#compteur').addClass("mauvais"); } else { $('#compteur').removeClass("mauvais"); }

    })

});