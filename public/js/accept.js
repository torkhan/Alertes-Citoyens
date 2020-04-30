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
        console.log($('.checkboxes:checked').val());
        if(nombreDeCheckboxes === nombreDeCheckboxesChecked) {

            $(".checkAll").prop("checked", true);

        } else {

            $(".checkAll").prop("checked", false);

        }

    });

});

$('input[type="checkbox"][name="checkboxes"]').change(function() {
$.post('ajax.php',
    { checked: this.checked ? '1' : '0' },
    function(data) {
        $('.result').html(data);
    });
});
