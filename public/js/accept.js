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

    if(nombreDeCheckboxes === nombreDeCheckboxesChecked) {
        $(".checkAll").prop("checked", true);
    } else {
        $(".checkAll").prop("checked", false);
    }
});

function envoyer(e) {
    e.preventDefault();
    let idsDestinataires = [];//récupération des checks boxes cochées en array
    let nombreDeCheckboxesChecked = document.querySelectorAll('.checkboxes:checked');
    nombreDeCheckboxesChecked.forEach(function (data) {
        let ids = data.value;
        idsDestinataires.push(ids);//et on y met les valeurs associées
    });//si pas de coches
    let donneeErreur = document.querySelector("#listeVide");

    if(idsDestinataires.length === 0){

        donneeErreur.classList.remove('d-none');
    }else{
        donneeErreur.classList.add('d-none');
        let idMessage = document.querySelector("#selectMessage").value;

        $.ajax({//envoi des valeurs au controller
            url: "envoyerRecherche",
            method: 'POST',
            data: {
                "idUsers": idsDestinataires,
                "idMessage": idMessage
            },
            success: function (data) {//action d'affiche message selon réponses

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
