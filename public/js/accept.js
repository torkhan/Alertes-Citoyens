$(function(){//fonction de select all checkboxes

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

/*
$(document).ready(function(){
    $(".submit").click(function() {

        $.each($("input[type='checkbox']:checked").each(function() {
            $(this).val('id')
            })
        );
       console.log($(this).val('id'));

        return true;
    });
});*/
