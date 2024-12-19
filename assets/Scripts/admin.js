$(document).ready(function(){

    var totalP, totalC, totalF, totalCal; 
    toastr.options = {
        closeButton: true,
        debug: false,
        positionClass: "toast-top-right",
        onclick: null,
        showDuration: "1000",
        hideDuration: "1000",
        timeOut: "5000",
        extendedTimeOut: "50000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut"
    };
    //User Register
    $('.register-form').submit(function(e) {
        e.preventDefault();        
        $('#toast-container').remove();

        var currentYear = (new Date).getFullYear();
        var birthDay = $('.register-form input[name="birthday"]').val();
        var birthYear = new Date(birthDay).getFullYear();
        if((currentYear-birthYear)<18){
            var shortCutFunction = "error";
            var msg = "Your age must be older than 18";
            var title = "Error !";
            toastr[shortCutFunction](msg, title);
            $('#toast-container').addClass('animated shake');
        }else{
            $.ajax({
                url : '/getfit/user/register',
                type : 'post',
                data : $(this).serialize(),
                success : function(response) { 
                    if (response.state == false) {
                        var shortCutFunction = "error";
                        var msg = response.msg;
                        var title = "Error !";
                        toastr[shortCutFunction](msg, title);
                        $('#toast-container').addClass('animated shake');
                    } else {
                        window.location.reload();
                    }
                }
            });
        }
        
    });
});