$(document).ready(() => {

    $('#newServiceBtn').on("click", () => {
        let mail = $("#service_adresseMailService").val();
        let tel = $("#service_numeroTelephoneService").val();

        if (mail != "") {
            $("#service_numeroTelephoneService").removeAttr("required");
        } else if (tel != "") {
            $("#service_adresseMailService").removeAttr("required");

        } else if (mail == "" && tel == "") {
            $("#service_adresseMailService").prop("required", true);
            $("#service_numeroTelephoneService").prop("required", true);
            // alert("Veuillez renseigner au moins un email ou un numéro de téléphone");
        }
    })

})