/*
    $(function() {

    $('#save').on('click',function(){

        var url = $('#url').val();

        $.ajax({

            url: '{{ route('home.store') }}',

            type: "POST",

            data: {url:url},

            headers: {

                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')

            },

            success: function (data) {

                alert('Ок');

            },

            error: function (msg) {

                alert('Ошибка');

            }

        });

    });

})



$( document ).ready(function() {
    $("#btn").click(
        function(){
            sendAjaxForm('result_form', 'ajax_form', 'action_ajax_form.php');
            return false;
        }
    );
});*/
