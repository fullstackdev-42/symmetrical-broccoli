jQuery(document).ready(function() {
    
    var profile_protein, profile_fat, profile_carbs;
    var ree, tdee, tdcal;

    if($('div.profile_flag').attr('profile_flag')==0){
        $('.create-profile-modal').modal();
    }
    $('button.create-profile').click(function(){
        $('h3.modal-title').text("Create Profile");

        $('#create_profile_form input[name="weight"]').val("");
        $('#create_profile_form input[name="height"]').val("");
        $('#create_profile_form input[name="age"]').val("");
        $('#create_profile_form input[name="tdcal"]').val("");
        $('#create_profile_form input[name="profileProtein"]').val("");
        $('#create_profile_form input[name="profileCarbs"]').val("");
        $('#create_profile_form input[name="profileFat"]').val("");
        $('#create_profile_form tbody tr').remove();
        $('ul a[href="#tab_1_1"]').click();
        $('.progress .circle').removeClass('active').removeClass('done');
        $('.progress .circle:nth-of-type(' + 1 + ')').addClass('active');
        $('.progress .bar').removeClass('active').removeClass('done');
        $('li.mr-20:nth-of-type(1)').addClass('underline');
        $('li.mr-20:nth-of-type(2)').removeClass('underline');
        $('li.mr-20:nth-of-type(3)').removeClass('underline');
        $('.next_btn').attr("value", "Next");
        $('.next_btn').attr("type", "button");
        $('.create-profile-modal').modal();
    })

    $('button.edit-profile').click(function(){
        $('h3.modal-title').text("Edit Profile");

        $('#create_profile_form input[name="weight"]').val("");
        $('#create_profile_form input[name="height"]').val("");
        $('#create_profile_form input[name="age"]').val("");
        $('#create_profile_form input[name="tdcal"]').val("");
        $('#create_profile_form input[name="profileProtein"]').val("");
        $('#create_profile_form input[name="profileCarbs"]').val("");
        $('#create_profile_form input[name="profileFat"]').val("");
        $('#create_profile_form tbody tr').remove();
        $('ul a[href="#tab_1_1"]').click();
        $('.progress .circle').removeClass('active').removeClass('done');
        $('.progress .circle:nth-of-type(' + 1 + ')').addClass('active');
        $('.progress .bar').removeClass('active').removeClass('done');
        $('li.mr-20:nth-of-type(1)').addClass('underline');
        $('li.mr-20:nth-of-type(2)').removeClass('underline');
        $('li.mr-20:nth-of-type(3)').removeClass('underline');
        $('.next_btn').attr("value", "Next");
        $('.next_btn').attr("type", "button");
        $('.create-profile-modal').modal();
    })

    $('.calculate').click(function(e){
    	e.preventDefault();

    	if($('#tab_1_1 input[name="weight"]').val()==""){
        	var msg="The Weight Field is required.";
            err_msg(msg);
        }else if($('#tab_1_1 input[name="height"]').val()==""){
        	var msg="The Height Field is required.";
            err_msg(msg);
        }else if($('#tab_1_1 input[name="age"]').val()==""){
        	var msg="The Age Field is required.";
            err_msg(msg);
        }else if($('#tab_1_1 input[name="sex"]').val()==""){
        	var msg="The Sex Field is required.";
            err_msg(msg);
        }else if(parseFloat($('#tab_1_1 input[name="height"]').val())==0 || parseFloat($('#tab_1_1 input[name="height"]').val())<0){
        	var msg="The Height Must Be Greater Than 0.";
            err_msg(msg);
        }else if(parseFloat($('#tab_1_1 input[name="weight"]').val())==0 || parseFloat($('#tab_1_1 input[name="weight"]').val())<0){
        	var msg="The Weight Must Be Greater Than 0.";
            err_msg(msg);
        }else if(parseFloat($('#tab_1_1 input[name="age"]').val())<18){
        	var msg="The Age Must Be Greater Than 18.";
            err_msg(msg);
        }else{
        	var weight = parseFloat($('#tab_1_1 input[name="weight"]').val());
        	var height = parseFloat($('#tab_1_1 input[name="height"]').val());
        	var age = parseFloat($('#tab_1_1 input[name="age"]').val());
        	var sex = $('#tab_1_1 input[name="sex"]:checked').val();
        	var activity_level = $('#tab_1_1 select[name="activity"]').val();
        	var goal = $('#tab_1_1 select[name="goal"]').val();

        	if(sex=="Male"){
        		ree = 10*weight+6.25*height-5*age+5;
        	}else{
        		ree = 10*weight+6.25*height-5*age-161;
        	}

        	switch(activity_level) {
			    case "1":
			        tdee = ree * 1.2;
			        break;
			    case "2":
			        tdee = ree * 1.375;
			        break;
			    case "3":
			        tdee = ree * 1.55;
			        break;    
			    case "4":
			        tdee = ree * 1.725;
			}

			if(goal=="1"){
				tdcal = tdee * 0.8;
        	}else{
        		tdcal = tdee * 1.2;
        	}

			$('#tab_1_1 input[name="tdcal"]').val(tdcal.toFixed(2));        	

			profile_protein = (0.825*weight*2.2).toFixed(2);
			profile_fat = ((0.25*tdcal)/9).toFixed(2);
			profile_carbs = ((tdcal - ((profile_protein*4)+(profile_fat*9)))/4).toFixed(2);

			$('#tab_1_2 input[name="profileProtein"]').val(profile_protein);
			$('#tab_1_2 input[name="profileFat"]').val(profile_fat);
			$('#tab_1_2 input[name="profileCarbs"]').val(profile_carbs);
        }
    })

    $('.next_btn').click(function(e){
        e.preventDefault();
        if($('.create-profile-modal .tabbable-line li.active a').attr("href")=="#tab_1_1"){
            if($('#tab_1_1 input[name="tdcal"]').val()==""){
            	var msg="Please Click the Calculate Button.";
                err_msg(msg);
            }else{

                $('.tabbable-line li a[href="#tab_1_2"]').trigger('click');
                $('.back_btn').attr("value", "Back");

                $('li.mr-20:nth-of-type(1)').removeClass('underline');
                $('li.mr-20:nth-of-type(2)').addClass('underline');

                $('.progress .circle:nth-of-type(' + 2 + ')').addClass('active');
                $('.progress .circle:nth-of-type(' + 1 + ')').removeClass('active').addClass('done');
                $('.progress .bar:nth-of-type(' + 1 + ')').addClass('active');
                $('.progress .bar:nth-of-type(' + 1 + ')').removeClass('active').addClass('done');
            }
        }
        else if($('.create-profile-modal .tabbable-line li.active a').attr("href")=="#tab_1_2"){
                    
	        $('.tabbable-line li a[href="#tab_1_3"]').trigger('click');
	        $('.next_btn').attr("value", "Save");
	        $('.next_btn').attr("type", "submit");

	        $('li.mr-20:nth-of-type(2)').removeClass('underline');
            $('li.mr-20:nth-of-type(3)').addClass('underline');

	        $('.progress .circle:nth-of-type(' + 3 + ')').addClass('active');
	        $('.progress .circle:nth-of-type(' + 2 + ')').removeClass('active').addClass('done');
	        $('.progress .bar:nth-of-type(' + 2 + ')').addClass('active');
	        $('.progress .bar:nth-of-type(' + 2 + ')').removeClass('active').addClass('done');

        }else{
            var count=0;

            $('.diet-field').find('tr').each(function( i ) {
                count=i+1;
            });

            if(count==0){
            	if(confirm("You didn't select any nutritioal preferences. Do you want to continue?")){
                    
                    $('#create_profile_form').submit();
                }
            }else{
            	$('#create_profile_form').submit();
            }
        }
    });

    $('#create_profile_form').on('submit', submitForm);

    function submitForm(event){
    	event.stopPropagation();
    	event.preventDefault();
    	$form = $(event.target);
    	var formData = $form.serialize();

    	var diet_types = [];
    	$('.diet-field').find('tr').each(function( i, j ) {
            diet_types.push($(j).attr("diet_id"));
        });
        
        var data = formData+"&diet_types="+diet_types;
        $.ajax({
            url: '/getfit/users/profile/add',
            type: 'POST',
            data: data,
            success: function(response)
            {
                console.log(response);
                if (response.state == false) {
                    
                } else {
                    window.location.reload();
                }
            }
        });
    }

    $(document).delegate('.delete-diet-type', 'click', function(){
        $(this).parent().parent().remove();
    });

    $('.back_btn').click(function(e){
        e.preventDefault();
        if($('.create-profile-modal .tabbable-line li.active a').attr("href")=="#tab_1_3"){

            $('.tabbable-line li a[href="#tab_1_2"]').trigger('click');
            $('.next_btn').attr("value", "Next");

            $('li.mr-20:nth-of-type(3)').removeClass('underline');
            $('li.mr-20:nth-of-type(2)').addClass('underline');

            $('.progress .circle:nth-of-type(' + 2 + ')').addClass('active');
            $('.progress .circle:nth-of-type(' + 3 + ')').removeClass('active').removeClass('done');
            $('.progress .bar:nth-of-type(' + 2 + ')').removeClass('active').removeClass("done");

        }
        else if($('.create-profile-modal .tabbable-line li.active a').attr("href")=="#tab_1_2"){

            $('.tabbable-line li a[href="#tab_1_1"]').trigger('click');
            $('.back_btn').attr("value", "Back to FoodBank");

            $('li.mr-20:nth-of-type(2)').removeClass('underline');
            $('li.mr-20:nth-of-type(1)').addClass('underline');

            $('.progress .circle:nth-of-type(' + 1 + ')').addClass('active');
            $('.progress .circle:nth-of-type(' + 2 + ')').removeClass('active').removeClass('done');
            $('.progress .bar:nth-of-type(' + 1 + ')').removeClass('active').removeClass("done");
        }
        else{
            $(".create-profile-modal .close").click();
        }
    })

    $('.diet-select').change(function(){

        var id = $(this).val();
        var flag = true;
        var name = $(this).find("option:selected").text();

        $('.diet-field').find('tr').each(function( i ) {
            if ( this.getAttribute('diet_id')==id ) {
              flag = false;            
            }
        });

        if(flag==true){

        	var tr='<tr diet_id="'+id+'"><td>'+name+'</td><td><a class="delete-diet-type"><i class="fa fa-trash"></i></a></td></tr>';
            $('.diet-field:last-child').append(tr);
            
        }else{
            var msg="You've already choosen this diet type.";
            err_msg(msg);
        }        
    })

    function err_msg(msg){
    	var shortCutFunction = "error";
        var title = "Error !";
        toastr[shortCutFunction](msg, title);
        $('#toast-container').addClass('animated shake');
    }
});