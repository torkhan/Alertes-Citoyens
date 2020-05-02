//fonction de select all checkboxes

$('.checkAll').click(function(){

    if (this.checked) {

        $(".checkboxes").prop("checked", true);

    } else {

        $(".checkboxes").prop("checked", false);

    }

});

$(".checkboxes").click(function(){

    let nombreDeCheckboxes = $(".checkboxes").length;

    let nombreDeCheckboxesChecked = $('.checkboxes:checked').length;

    if(nombreDeCheckboxes == nombreDeCheckboxesChecked) {

        $(".checkAll").prop("checked", true);

    } else {

        $(".checkAll").prop("checked", false);

    }

});

function envoyer(e) {
    e.preventDefault();
    let idsDestinateurs = [];
    let nombreDeCheckboxesChecked = document.querySelectorAll('.checkboxes:checked');
    nombreDeCheckboxesChecked.forEach(function (data) {
        let ids = data.value;
        idsDestinateurs.push(ids);
    });

    let donneeErreur = document.querySelector("#listeVide");

    if(idsDestinateurs.length == 0){

        donneeErreur.classList.remove('d-none');
    }else{
        donneeErreur.classList.add('d-none');
        let idMessage = document.querySelector("#selectMessage").value;

        $.ajax({
            url: "envoyerRecherche",
            method: 'POST',
            data: {
                "idUsers": idsDestinateurs,
                "idMessage": idMessage
            },
            success: function (data) {

                if(data.envoye === 'ok'){
                    let donneeSuccess = document.querySelector("#success");
                    donneeSuccess.classList.remove('d-none');
                }else{
                    let donneeErreur = document.querySelector("#danger");
                    donneeErreur.classList.remove('d-none');
                }

            }
        })
    }
}
