$(document).ready(function(){
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

    $('a.edit').click(function(e) {
        e.preventDefault();

        var user_id = $(this).parent().parent().attr("user_id");
        $('.edit-user-form').attr('user_id', user_id);
        $('.edit-user-form input[name="firstname"]').val($(this).parent().parent().find("td").eq(0).attr("firstname"));
        $('.edit-user-form input[name="lastname"]').val($(this).parent().parent().find("td").eq(1).attr("lastname"));
        $('.edit-user-form input[name="username"]').val($(this).parent().parent().find("td").eq(2).attr("username"));
        $('.edit-user-form input[name="email"]').val($(this).parent().parent().find("td").eq(3).attr("email"));
        $('.edit-user-form input[name="birthday"]').val($(this).parent().parent().find("td").eq(4).attr("birthday"));

        $('.edit-user').modal();
    });

    $('.save').click(function(){

        var currentYear = (new Date).getFullYear();
        var birthDay = $('.edit-user-form input[name="birthday"]').val();
        var birthYear = new Date(birthDay).getFullYear();

    	if($('.edit-user-form input[name="firstname"]').val() == ""){
    		var shortCutFunction = "error";
            var msg = "The FirstName Field is required.";
            var title = "Error !";
            toastr[shortCutFunction](msg, title);
            $('#toast-container').addClass('animated shake');
    	}else if($('.edit-user-form input[name="lastname"]').val() == ""){
    		var shortCutFunction = "error";
            var msg = "The LastName Field is required.";
            var title = "Error !";
            toastr[shortCutFunction](msg, title);
            $('#toast-container').addClass('animated shake');
    	}else if($('.edit-user-form input[name="birthday"]').val() == ""){
    		var shortCutFunction = "error";
            var msg = "The Date Of Birth Field is required.";
            var title = "Error !";
            toastr[shortCutFunction](msg, title);
            $('#toast-container').addClass('animated shake');
    	}else if($('.edit-user-form input[name="username"]').val() == ""){
    		var shortCutFunction = "error";
            var msg = "The UserName Field is required.";
            var title = "Error !";
            toastr[shortCutFunction](msg, title);
            $('#toast-container').addClass('animated shake');
    	}else if($('.edit-user-form input[name="email"]').val() == ""){
    		var shortCutFunction = "error";
            var msg = "The Email Field is required.";
            var title = "Error !";
            toastr[shortCutFunction](msg, title);
            $('#toast-container').addClass('animated shake');
    	}
        else if((currentYear-birthYear)<18){
            var shortCutFunction = "error";
            var msg = "Your age must be older than 18";
            var title = "Error !";
            toastr[shortCutFunction](msg, title);
            $('#toast-container').addClass('animated shake');
        }else{
    		if(confirm("Do you really want to update the account?")){
	    		$('.edit-user-form').submit();
	    	}
    	}
    })

    $('.edit-user-form').submit(function(e) {
        e.preventDefault();        
        $('#toast-container').remove();
        var user_id = $(this).attr("user_id");
        var  data = $(this).serialize()+'&user_id=' + user_id;
        console.log(data);
        $.ajax({
            url : '/getfit/user/update',
            type : 'post',
            data : data,
            success : function(response) { 
                console.log(response);
                if (response.state == false) {
                    var shortCutFunction = "error";
                    var msg = response.msg;
                    var title = "Error !";
                    toastr[shortCutFunction](msg, title);
                    $('#toast-container').addClass('animated shake');
                } else {
                    document.location.reload();
                }
            }
        });
    });
})