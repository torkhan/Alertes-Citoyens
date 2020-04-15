$(function(){

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

});