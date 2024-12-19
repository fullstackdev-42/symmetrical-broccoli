$(document).ready(function(){

    var profile_pro, profile_carbs, profile_fat, profile_cal, profile_flag;
    var p_diettypes = [];
    var meals = [], v_meals = [], breakfasts = [], lunches = [], dinners = [], snacks = [];
    //get all meals from database
    $.ajax({
        url: '/getfit/users/mealplan/get_all_meals',
        type: 'POST',
        async: false,
        success: function(response)
        {
            $.each(response, function(index, value){
                v_meals.push(value);
            })                         
        }
    });

    meals = v_meals;

    //if user profile exists, get profile info but if not, user can do nothing on this page
    $.ajax({
        url: '/getfit/users/mealplan/get_profile',
        type: 'POST',
        async: false,
        success: function(response)
        {
            if(response.length == 0){ //if user profile doesn't exist display error mgs
                profile_flag = false;
            }else{
                profile_flag = true;
                profile_pro = parseInt(response[0].profileProtein);
                profile_fat = parseInt(response[0].profileFat);
                profile_carbs = parseInt(response[0].profileCarbs);
                profile_cal = parseInt(response[0].profileCal);
                $.each(response, function(index, value){
                    p_diettypes.push(value.DietType_diet_id);
                });
            }                
        }
    });
    
    $('#create_mealplan_form input.r-protein').val(profile_pro);
    $('#create_mealplan_form input.r-carbs').val(profile_carbs);
    $('#create_mealplan_form input.r-fat').val(profile_fat);
    $('#create_mealplan_form input.r-cal').val(profile_cal);
    // filter meals according to the meal diettypes and user profile diettypes
    if(p_diettypes[0] != null){
        $.each(v_meals, function(v_meal_index, v_meal){

            $.ajax({
                url: '/getfit/admin/meal/get_diet_types',
                type: 'POST',
                data: {meal_id:v_meal.meal_id},
                async: false,
                success: function(response)
                {
                    if(response.length == 0){ //if meal diettype is not defined, this meal will not be filtered

                    }else{
                        var flag = false;               
                        $.each(response, function(diet_index, diet){
                            
                            if(jQuery.inArray(diet.DietType_diet_id, p_diettypes) != -1){
                                flag = true;
                                return;
                            }                            
                        });
                        if(flag == false){
                            meals = jQuery.grep(meals, function(meal) {
                                return meal != v_meal;
                            });
                        }
                    }                
                }
            });
        })
    }
    //Classify filtered meals into categories
    $.each(meals, function(index, value){
        switch(value.category_id) {
            case "1":
                breakfasts.push(value);
                break;
            case "2":
                lunches.push(value);
                break;
            case "3":
                dinners.push(value);
                break;
            case "4":
                snacks.push(value);
        }
    });

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
    //If user clicks selectbox for a certain category to create mealplan, filter and display meals for clicked category satisfying the condition of non-excedance the daily macros of his profile
    $('#create_mealplan_form select').focusin(function(){
        
        var category = $(this).attr('category');
        var options = $(this).find('option');
        $.each(options, function(index, value){
            if( index != 0 ){
                $(value).remove();
            }
        })

        var dayofweek = $(this).parent().parent().parent().parent().attr('dayofweek');
        var meals_to_add = create_select_add_meal(category, dayofweek);
        $.each(meals_to_add, function(index, value){
            var option = '<option value="'+value.meal_id+'" pro="'+value.totalP+'" fat="'+value.totalF+'" carbs="'+value.totalC+'" cal="'+value.totalCal+'">'+value.name+'</option>';
            $('#create_mealplan_form select[category="' + category + '"]').append(option);
        })
    })
    //Calculate the remaining macros and display on the top of the daily mealplan panel
    $('#create_mealplan_form select').change(function(){
        var dayofweek = $(this).parent().parent().parent().parent().attr('dayofweek');
        var sum_p = 0 , sum_carbs = 0, sum_f = 0, sum_cal = 0;
        var selects=$('#create_mealplan_form .panel-body[dayofweek="'+dayofweek+'"]').find('select');
        
        /*Get all select elements which have meals and calculate the sums of those meal macros*/
        $.each(selects, function(index, select){
            if(($(select).val() != 0)){
                sum_p = sum_p + parseInt($('option:selected', $(select)).attr('pro'));
                sum_carbs = sum_carbs + parseInt($('option:selected', $(select)).attr('carbs'));
                sum_f = sum_f + parseInt($('option:selected', $(select)).attr('fat'));
                sum_cal = sum_cal + parseInt($('option:selected', $(select)).attr('cal'));
            }            
        });
        var r_pro = profile_pro - sum_p;
        var r_fat = profile_fat - sum_f;
        var r_carbs = profile_carbs - sum_carbs;
        var r_cal = profile_cal - sum_cal;
        $('#create_mealplan_form .panel-body[dayofweek="'+dayofweek+'"] input.r-protein').val(r_pro);
        $('#create_mealplan_form .panel-body[dayofweek="'+dayofweek+'"] input.r-fat').val(r_fat);
        $('#create_mealplan_form .panel-body[dayofweek="'+dayofweek+'"] input.r-carbs').val(r_carbs);
        $('#create_mealplan_form .panel-body[dayofweek="'+dayofweek+'"] input.r-cal').val(r_cal);
        
    })
    function create_select_add_meal(category, dayofweek){
        var sum_p = 0 , sum_carbs = 0, sum_f = 0, sum_cal = 0;
        var selects=$('#create_mealplan_form .panel-body[dayofweek="'+dayofweek+'"]').find('select');
        /*Get all select elements which have meals and calculate the sums of those meal macros*/
        $.each(selects, function(index, select){
            if(($(select).val() != 0) && ($(select).attr('category') != category)){
                sum_p = sum_p + parseInt($('option:selected', $(select)).attr('pro'));
                sum_carbs = sum_carbs + parseInt($('option:selected', $(select)).attr('carbs'));
                sum_f = sum_f + parseInt($('option:selected', $(select)).attr('fat'));
                sum_cal = sum_cal + parseInt($('option:selected', $(select)).attr('cal'));
            }            
        });
        /*Calculate rest macros and determine which meals should be added to the clicked select element*/
        var pro = profile_pro - sum_p;
        var fat = profile_fat - sum_f;
        var carbs = profile_carbs - sum_carbs;
        var cal = profile_cal - sum_cal;
        var meals_to_add = [];
        switch(category){
            case "breakfast":
                $.each(breakfasts, function(index, breakfast){
                    if((parseInt(breakfast.totalP) <= pro) && (parseInt(breakfast.totalF) <= fat) && (parseInt(breakfast.totalC) <= carbs) && (parseInt(breakfast.totalCal) <= cal)){
                        meals_to_add.push(breakfast);
                    }
                });
                break;
            case "lunch":
                $.each(lunches, function(index, lunch){
                    if((parseInt(lunch.totalP) <= pro) && (parseInt(lunch.totalF) <= fat) && (parseInt(lunch.totalC) <= carbs) && (parseInt(lunch.totalCal) <= cal)){
                        meals_to_add.push(lunch);
                    }
                });
                break;
            case "dinner":
                $.each(dinners, function(index, dinner){
                    if((parseInt(dinner.totalP) <= pro) && (parseInt(dinner.totalF) <= fat) && (parseInt(dinner.totalC) <= carbs) && (parseInt(dinner.totalCal) <= cal)){
                        meals_to_add.push(dinner);
                    }
                });
                break;
            case "snack":
                $.each(snacks, function(index, snack){
                    if((parseInt(snack.totalP) <= pro) && (parseInt(snack.totalF) <= fat) && (parseInt(snack.totalC) <= carbs) && (parseInt(snack.totalCal) <= cal)){
                        meals_to_add.push(snack);
                    }
                });
        }
        return meals_to_add;
    }

    $('button.create-mealplan').click(function(){    

        if(profile_flag == false){ //if user profile doesn't exist display error mgs
            var msg = "Please create a profile first.";
            err_msg(msg);
        }else{
            $("#create_mealplan_form select").val("0");//Format all select tags
            $('.create-mealplan-modal').modal();
        }
        
    });

    /*Create new mealplan*/
    $('input.create').click(function(){

        if($('#create_mealplan_form input[name="name"]').val()==""){
            var msg = "Please input the name of the mealplan."
            err_msg(msg);
        }else if($('#create_mealplan_form textarea').val()==""){
            var msg = "Please input the description of the mealplan."
            err_msg(msg);
        }else{
            var select_flag = true;
            $('#create_mealplan_form select').each(function(i, j){
                if($(j).val()=="0"){
                    select_flag = false;                    
                    var category = $(j).parent().parent().find('label').text();
                    var dayofweek = $(j).parent().parent().parent().parent().parent().parent().find('a').text();
                    var msg = "Please select the "+category+" in "+dayofweek+".";
                    err_msg(msg);
                    return false;
                }
            })
            if(select_flag==true){
                var data=$('#create_mealplan_form').serialize();

                $.ajax({
                    url: '/getfit/users/mealplan/add',
                    type: 'POST',
                    data: data,
                    success: function(response)
                    {
                        if (response.state == false) {
                            msg = response.msg;
                            err_msg(msg);
                        } else {
                            window.location.reload();
                        }
                    }
                });
            }
        }
    })

    /*Get dailymealplan for Monday when select the mealplan in side nav-bar*/
    
    $('a.mealplan').click(function(){
        var breakfast_meal_id, lunch_meal_id, dinner_meal_id, snack_meal_id;
        $(this).parent().parent().find('li').removeClass("active");
        $(this).parent().addClass("active");
        var mealplan_id = $(this).attr("mealplan_id");
        var data ={mealplan_id : mealplan_id, dayofweek : "Monday"};

        $.ajax({
            url: '/getfit/users/mealplan/get_dailymealplan',
            type: 'POST',
            data: data,
            async : false,
            success: function(response)
            {   
                dailymealplan_id = response.dailyMealplan_id;
                breakfast_meal_id = response.breakfast;
                lunch_meal_id = response.lunch;
                dinner_meal_id = response.dinner;
                snack_meal_id = response.snack;               
            }
        });
        get_meal_detail("breakfast", breakfast_meal_id);//call get_meal_detail function to display the meal info for breakfast
        get_meal_detail("lunch", lunch_meal_id);
        get_meal_detail("dinner", dinner_meal_id);
        get_meal_detail("snack", snack_meal_id);
        
        $('.mealplan-content').attr('hidden', false);
    })

    /*Get dailymealplan for any day of the week when select the dailymealplan in nav-tab*/

    $('.mealplan-content li a').click(function(){

        var breakfast_meal_id, lunch_meal_id, dinner_meal_id, snack_meal_id;

        var mealplan_id = $('.mealplan-menu li.active a.mealplan').attr("mealplan_id");
        var dayofweek = $(this).attr("dayofweek");
        var data ={mealplan_id : mealplan_id, dayofweek : dayofweek};

        $.ajax({
            url: '/getfit/users/mealplan/get_dailymealplan',
            type: 'POST',
            data: data,
            async : false,
            success: function(response)
            {   
                dailymealplan_id = response.dailyMealplan_id;
                breakfast_meal_id = response.breakfast;
                lunch_meal_id = response.lunch;
                dinner_meal_id = response.dinner;
                snack_meal_id = response.snack;               
            }
        });
        get_meal_detail("breakfast", breakfast_meal_id);//call get_meal_detail function to display the meal info for breakfast
        get_meal_detail("lunch", lunch_meal_id);
        get_meal_detail("dinner", dinner_meal_id);
        get_meal_detail("snack", snack_meal_id);
        
        $('.mealplan-content').attr('hidden', false);
    })

    /*Display meal info*/
    function get_meal_detail(category, meal_id){
        $.ajax({
            url : '/getfit/admin/meal/get_meal',
            type : 'post',
            data : {meal_id: meal_id},
            async : false,
            success : function(response) {
                if(response.length==0){
                    $('.portlet .'+category+' .exist').attr("hidden", true);
                    $('.portlet .'+category+' .not-exist').attr("hidden", false);
                }else{
                    $('.portlet .'+category+' .exist').attr("hidden", false);
                    $('.portlet .'+category+' .not-exist').attr("hidden", true);

                    $('.portlet .'+category+' img').attr("src", "/getfit/upload/meal/"+response[0].image);
                    $('.portlet .'+category+' .name').text(response[0].name);                    
                    $('.portlet .'+category+' .protein').text(response[0].totalP);
                    $('.portlet .'+category+' .fat').text(response[0].totalF);
                    $('.portlet .'+category+' .carbs').text(response[0].totalC);
                    $('.portlet .'+category+' .cal').text(response[0].totalCal);
                    $('.portlet .'+category+' button.detail').attr("meal_id", meal_id);
                }                
            }
        });
    }
    /*Delete dailymealplan - update the value with "0"*/
    $('a.delete_dailymealplan').click(function(){
        var delete_flag = $(this).parent().parent().parent().find('.exist').attr('hidden');

        if(delete_flag == "hidden"){
            var msg = "There is no dailymealplan to be deleted.";
            err_msg(msg);
        }else{
            if(confirm("Do you really want to delete this dailymealplan?")){
                var category = $(this).parent().parent().parent().find('.exist').attr("category");
                var dayofweek = $('.mealplan-content li.active a').attr("dayofweek");
                var mealplan_id = $('.mealplan-menu li.active a').attr("mealplan_id");
                var data ={category : category, dayofweek : dayofweek, mealplan_id : mealplan_id, meal_id : "0"};

                $.ajax({
                    url: '/getfit/users/mealplan/update_dailymealplan',
                    type: 'POST',
                    data: data,
                    async : false,
                    success: function(response)
                    {   
                        $('.portlet .'+category+' .exist').attr("hidden", true);
                        $('.portlet .'+category+' .not-exist').attr("hidden", false);
                        var msg = "Dailymealplan for "+category+" on "+dayofweek+" is deleted successfully.";
                        notification_msg(msg);
                    }
                });
            }            
        }        
    })
    //If user clicks selectbox for a certain category to edit mealplan, filter and display meals for clicked category satisfying the condition of non-excedance the daily macros of his profile
    $('select.input-sm').focusin(function(){
        var category = $(this).attr('category');
        var options = $(this).find('option');
        $.each(options, function(index, value){
            if( index != 0 ){
                $(value).remove();
            }
        })

        var meals_to_add = edit_select_add_meal(category);

        $.each(meals_to_add, function(index, value){
            var option = '<option value="'+value.meal_id+'" pro="'+value.totalP+'" fat="'+value.totalF+'" carbs="'+value.totalC+'" cal="'+value.totalCal+'">'+value.name+'</option>';
            $('.hold-on-click select[category="' + category + '"]').append(option);
        })
    })

    function edit_select_add_meal(category){
        var sum_p = 0 , sum_carbs = 0, sum_f = 0, sum_cal = 0, count=0;
        var existing_meals = $('.exist');
        /*Get all select elements which have meals and calculate the sums of those meal macros*/
        $.each(existing_meals, function(index, exist){

            if(($(exist).attr('category') != category) && ($(exist).attr('hidden') != 'hidden')){
                count = count + 1;
                sum_p = sum_p + parseInt($(exist).find('span.protein').text());
                sum_carbs = sum_carbs + parseInt($(exist).find('span.carbs').text());
                sum_f = sum_f + parseInt($(exist).find('span.fat').text());
                sum_cal = sum_cal + parseInt($(exist).find('span.cal').text());
            }            
        });
        /*Calculate rest macros and determine which meals should be added to the clicked select element*/
        var pro = profile_pro - sum_p;
        var fat = profile_fat - sum_f;
        var carbs = profile_carbs - sum_carbs;
        var cal = profile_cal - sum_cal;
        var meals_to_add = [];

        switch(category){
            case "breakfast":
                $.each(breakfasts, function(index, breakfast){
                    if((parseInt(breakfast.totalP) <= pro) && (parseInt(breakfast.totalF) <= fat) && (parseInt(breakfast.totalC) <= carbs) && (parseInt(breakfast.totalCal) <= cal)){
                        meals_to_add.push(breakfast);
                    }
                });
                break;
            case "lunch":
                $.each(lunches, function(index, lunch){
                    if((parseInt(lunch.totalP) <= pro) && (parseInt(lunch.totalF) <= fat) && (parseInt(lunch.totalC) <= carbs) && (parseInt(lunch.totalCal) <= cal)){
                        meals_to_add.push(lunch);
                    }
                });
                break;
            case "dinner":
                $.each(dinners, function(index, dinner){
                    if((parseInt(dinner.totalP) <= pro) && (parseInt(dinner.totalF) <= fat) && (parseInt(dinner.totalC) <= carbs) && (parseInt(dinner.totalCal) <= cal)){
                        meals_to_add.push(dinner);
                    }
                });
                break;
            case "snack":
                $.each(snacks, function(index, snack){
                    if((parseInt(snack.totalP) <= pro) && (parseInt(snack.totalF) <= fat) && (parseInt(snack.totalC) <= carbs) && (parseInt(snack.totalCal) <= cal)){
                        meals_to_add.push(snack);
                    }
                });
        }
        return meals_to_add;
    }

    $('select.input-sm').change(function(){
        var meal_id = $(this).val();
        var category = $(this).attr("category");
        get_meal_detail(category, meal_id);
    })
    /*Edit dailymealplan and Save*/
    $('.hold-on-click .save').click(function(){
        
        if($(this).parent().find('select').val()=="0"){
            var msg = "Please choose a meal.";
            err_msg(msg);
        }else{
            var meal_id = $(this).parent().find('select').val();
            var category = $(this).parent().parent().parent().parent().find('.exist').attr("category");
            var dayofweek = $('.mealplan-content li.active a').attr("dayofweek");
            var mealplan_id = $('.mealplan-menu li.active a').attr("mealplan_id");
            var data ={category : category, dayofweek : dayofweek, mealplan_id : mealplan_id, meal_id : meal_id};

            $.ajax({
                url: '/getfit/users/mealplan/update_dailymealplan',
                type: 'POST',
                data: data,
                async : false,
                success: function(response)
                {   
                    $('.portlet-title').trigger('click');
                    var msg = "Dailymealplan for "+category+" on "+dayofweek+" is edited successfully.";
                    notification_msg(msg);
                }
            });
        }
    })
    //Display Meal info in more detail when user clicks "SEE MORE" button
    $('button.detail').click(function(){
        $('.meal-detail-modal .meal-ingredient').find('tr').remove();
        $.ajax({
            url : '/getfit/admin/meal/get_meal',
            type : 'post',
            data : {meal_id: $(this).attr('meal_id')},
            success : function(response) { 

                $('.meal-detail-modal img').attr('src', '/getfit/upload/meal/'+response[0].image);
                $('.meal-detail-modal h2.meal-name').text(response[0].name);
                $('.meal-detail-modal textarea[name="method"]').val(response[0].method);                
            }
        });

        $.ajax({
            url : '/getfit/admin/meal/get_ingredients',
            type : 'post',
            data : {meal_id: $(this).attr('meal_id')},
            success : function(response) { 

                $.each(response, function(key, value){
                    var protein = parseInt((value.quantity/value.qty)*value.protein);
                    var carbs = parseInt((value.quantity/value.qty)*value.carbs);
                    var fat = parseInt((value.quantity/value.qty)*value.fat);
                    var cal = parseInt((value.quantity/value.qty)*value.cal);
                    var tr='<tr ingredient_id="'+value.ingredient_id+'"><td>'+value.name+'</td><td protein="'+value.protein+'">'+protein+'</td><td carbs="'+value.carbs+'">'+carbs+'</td><td fat="'+value.fat+'">'+fat+'</td><td cal="'+value.cal+'">'+cal+'</td><td qty="'+value.qty+'">'+value.quantity+'</td><td>'+value.unit+'</td></tr>';
                    $('.meal-detail-modal .meal-ingredient:last-child').append(tr);
                })
            }
        });
        $('.meal-detail-modal').modal();
    })
    $('.delete-mealplan').click(function(){
        var mealplan_id = $('.mealplan-menu li.active a').attr("mealplan_id");
        if(mealplan_id==undefined){
            var msg = "No MealPlan Is Choosen.";
            err_msg(msg);
        }else{
            if(confirm("Do you really want to delete the meal plan?")){
                $.ajax({
                    url : '/getfit/users/mealplan/delete_mealplan',
                    type : 'post',
                    data : {mealplan_id: mealplan_id},
                    success : function(response) {
                        window.location.reload();
                    }
                });
            }            
        }
    })
    function err_msg(msg){
        var shortCutFunction = "error";
        var title = "Error !";
        toastr[shortCutFunction](msg, title);
        $('#toast-container').addClass('animated shake');
    }

    function notification_msg(msg){
        var shortCutFunction = "success";
        var title = "Notification!";
        toastr[shortCutFunction](msg, title);
        $('#toast-container').addClass('animated shake');
    }
})