    var mealEditable = function () {

    var handleTable = function () {
        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"] 
            ],
            
            "pageLength": 5,

            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        table.on('click', 'a.delete_meal', function () {

            if(confirm("Do you really want to delete this meal?")){
                
                $.ajax({
                    url : '/getfit/admin/meal/delete',
                    type : 'post',
                    data : {meal_id:$(this).attr('meal_id'), meal_name:$(this).attr('meal_name')},
                    success : function(response) { 

                        if (response == "success") {
                            window.location.reload();                            
                        }
                    }
                });
            }
        });

        table.on('click', 'a.edit', function () {

            $('#meal_edit_form .diet-field').find('tr').remove();
            $('#meal_edit_form .meal-ingredient').find('tr').remove();
            $('#meal_edit_form input[name="upload_flag"]').val('0');
            $('#meal_edit_form div.meal-id').attr('meal_id', $(this).attr('meal_id'));
            $.ajax({
                url : '/getfit/admin/meal/get_meal',
                type : 'post',
                data : {meal_id: $(this).attr('meal_id')},
                success : function(response) { 

                    $('#meal_edit_form img').attr('src', '/getfit/upload/meal/'+response[0].image);
                    $('#meal_edit_form input[name="name"]').val(response[0].name);
                    $('#meal_edit_form textarea[name="method"]').val(response[0].method);
                    $('#meal_edit_form select[name="category_id"]').prop('selectedIndex', response[0].category_id-1);
                }
            });

            $.ajax({
                url : '/getfit/admin/meal/get_diet_types',
                type : 'post',
                data : {meal_id: $(this).attr('meal_id')},
                success : function(response) { 
                    $.each(response, function(key, value){
                        var tr='<tr diet_id="'+value.diet_id+'"><td>'+value.dietType+'</td><td><a class="delete-diet-type"><i class="fa fa-trash"></i></a></td></tr>';
                        $('#meal_edit_form .diet-field:last-child').append(tr);
                    })
                }
            });

            $.ajax({
                url : '/getfit/admin/meal/get_ingredients',
                type : 'post',
                data : {meal_id: $(this).attr('meal_id')},
                success : function(response) { 

                    $.each(response, function(key, value){
                        var protein = parseFloat((value.quantity/value.qty)*value.protein).toFixed(2);
                        var carbs = parseFloat((value.quantity/value.qty)*value.carbs).toFixed(2);
                        var fat = parseFloat((value.quantity/value.qty)*value.fat).toFixed(2);
                        var cal = parseFloat((value.quantity/value.qty)*value.cal).toFixed(2);
                        var tr='<tr ingredient_id="'+value.ingredient_id+'"><td>'+value.name+'</td><td protein="'+value.protein+'">'+protein+'</td><td carbs="'+value.carbs+'">'+carbs+'</td><td fat="'+value.fat+'">'+fat+'</td><td cal="'+value.cal+'">'+cal+'</td><td qty="'+value.qty+'"> <input type="number" class="form-control ingredient_input" name="ingredients['+value.ingredient_id+']" value="'+value.quantity+'" step="any" style="width:80px; margin: auto;"> </td><td>'+value.unit+'</td><td><a class="delete_ingredient_meal"><i class="fa fa-trash"></i></a></td></tr>';
                        $('#meal_edit_form .meal-ingredient:last-child').append(tr);
                    })
                }
            });

            $('#meal_edit_modal').modal();
        });
    }

    return {

        init: function () {
            handleTable();
        }

    };

}();

jQuery(document).ready(function() {
    mealEditable.init();

    $('#add_meal').click(function () {
        //Begin formatting all the input fields
        $('#add_meal_form input[name="name"]').val("");
        $('#add_meal_form textarea[name="method"]').val("");
        $('#add_meal_form .diet-field').find('tr').remove();
        $('#meal_ingredient').find('tr').remove();
        $('li a[href="#tab_1_1"]').trigger('click');
        $('.back_btn').attr("value", "Back to FoodBank");
        $('.next_btn').attr("value", "Next");

        $('.progress .circle').removeClass('active').removeClass('done');
        $('.progress .circle:nth-of-type(' + 1 + ')').addClass('active');
        $('.progress .bar').removeClass('active').removeClass('done');
        //End formatting all the input fields
        $("#meal_add_modal").modal();
    });
    //Begin Add New Meal
        //Get the ingredient info from database and display when admin select ingredient
    $('#select_ingredient').change(function(){

        var id = $(this).val();
        var flag = true;
        $('#meal_ingredient').find('tr').each(function( i ) {
            if ( this.getAttribute('ingredient_id')==id ) {
              flag = false; //Set flag as false if admin has already selected this ingredient
            }
        });

        if(flag==true){

            $.ajax({  
                type: 'POST',  
                url: '/getfit/admin/ingredient/get_ingredient', 
                data: { ingredient_id:  id},
                success: function(response) {
                    var tr='<tr ingredient_id="'+response[0].ingredient_id+'"><td>'+response[0].name+'</td><td protein="'+response[0].protein+'">'+response[0].protein+'</td><td carbs="'+response[0].carbs+'">'+response[0].carbs+'</td><td fat="'+response[0].fat+'">'+response[0].fat+'</td><td cal="'+response[0].cal+'">'+response[0].cal+'</td><td qty="'+response[0].qty+'"> <input type="number" class="form-control ingredient_input" name="ingredients['+response[0].ingredient_id+']" value="'+response[0].qty+'" step="any" style="width:80px; margin: auto;"> </td><td>'+response[0].unit+'</td><td><a class="delete_ingredient_meal"><i class="fa fa-trash"></i></a></td></tr>';
                    $('#meal_ingredient:last-child').append(tr);
                }
            });
        }else{
            var msg="You have already selected this ingredient!";
            err_msg(msg);
        }        
    })  

    $(document).delegate('#add_meal_form .delete_ingredient_meal', 'click', function(){
        $(this).parent().parent().remove();
    });
    //Calculate the macros and cals and display when admin changes the values in ingredient inputs
    $(document).delegate('#add_meal_form .ingredient_input', 'input', function(){
        var input_qty = $(this).val();
        var tds =$(this).parent().parent().find('td');
        var qty = tds.eq(5).attr("qty");
        tds.eq(1).html(parseFloat(tds.eq(1).attr("protein")*input_qty/qty).toFixed(2));
        tds.eq(2).html(parseFloat(tds.eq(2).attr("carbs")*input_qty/qty).toFixed(2));
        tds.eq(3).html(parseFloat(tds.eq(3).attr("fat")*input_qty/qty).toFixed(2));
        tds.eq(4).html(parseFloat(tds.eq(4).attr("cal")*input_qty/qty).toFixed(2));
     })    

    $('.next_btn').click(function(e){
        e.preventDefault();
        if($('#meal_add_modal li.active a').attr("href")=="#tab_1_1"){ //step 1
            if($('#tab_1_1 input[name="name"]').val()==""){

                var msg = "The Name Field is required.";
                err_msg(msg);
            }else{
                $('li a[href="#tab_1_2"]').trigger('click');
                $('.back_btn').attr("value", "Back");

                $('.progress .circle:nth-of-type(' + 2 + ')').addClass('active');
                $('.progress .circle:nth-of-type(' + 1 + ')').removeClass('active').addClass('done');
                $('.progress .bar:nth-of-type(' + 1 + ')').addClass('active');
                $('.progress .bar:nth-of-type(' + 1 + ')').removeClass('active').addClass('done');
            }
        }
        else if($('#meal_add_modal li.active a').attr("href")=="#tab_1_2"){
            var count=0;
            var meal_ingredient_flag=true;

            $('#meal_ingredient').find('input').each(function( i, j ) {
                count=i+1;
                if ( $(j).val()==0 || $(j).val()<0 ) {
                  meal_ingredient_flag = false;            
                }
            });            

            if(meal_ingredient_flag==false){
                var msg = "Quantities couldn't be smaller than zero. Please input again.";
                err_msg(msg);
            }else if(count==0){
                var msg = "Please Input more than 1 Ingredient.";
                err_msg(msg);
            }else{
                totalP=0; totalC=0; totalF=0; totalCal=0;
                $('#meal_ingredient').find('input').each(function( i, j ) {
                    var input_qty = $(j).val();
                    var tds =$(j).parent().parent().find('td');
                    var qty = tds.eq(5).attr("qty");
                    totalP = totalP + parseFloat(parseFloat(tds.eq(1).attr("protein")*input_qty/qty).toFixed(2));
                    totalC = totalC + parseFloat(parseFloat(tds.eq(2).attr("carbs")*input_qty/qty).toFixed(2));
                    totalF = totalF + parseFloat(parseFloat(tds.eq(3).attr("fat")*input_qty/qty).toFixed(2));
                    totalCal = totalCal + parseFloat(parseFloat(tds.eq(4).attr("cal")*input_qty/qty).toFixed(2));
                });
                
                $('li a[href="#tab_1_3"]').trigger('click');
                $('.next_btn').attr("value", "Save");
                $('.next_btn').attr("type", "submit");

                $('.progress .circle:nth-of-type(' + 3 + ')').addClass('active');
                $('.progress .circle:nth-of-type(' + 2 + ')').removeClass('active').addClass('done');
                $('.progress .bar:nth-of-type(' + 2 + ')').addClass('active');
                $('.progress .bar:nth-of-type(' + 2 + ')').removeClass('active').addClass('done');
            }
        }else{
            $('#add_meal_form').submit();   
        }
    });

    $('#add_meal_form').on('submit', submitForm);

    var add_files;

    $('#add_meal_form input[type=file]').on('change', add_prepareUpload);

    function add_prepareUpload(event)
    {
      add_files = event.target.files;
    }

    function uploadFiles(event){
       
        var data = new FormData();
        $.each(add_files, function(key, value)
        {           
            data.append(key, value);
        });

        $.ajax({
            url: '/getfit/upload/upload?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {
                    
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    };

    function submitForm(event)
    {
        event.stopPropagation(); 
        event.preventDefault();

        if($('#add_meal_form textarea').val()==""){

            var msg = "Please Input Method.";
            err_msg(msg);

        }else if(add_files==undefined){

            var msg = "Please Choose an Image File.";
            err_msg(msg);
            
        }else{
            $form = $(event.target);
            var formData = $form.serialize();

            var diet_types = [];
            $('#add_meal_form .diet-field').find('tr').each(function( i, j ) {
                diet_types.push($(j).attr("diet_id"));
            });

            data = formData + '&file_name=' + add_files[0]['name'] + '&totalP=' + totalP + '&totalC=' + totalC + '&totalF=' + totalF + '&totalCal=' + totalCal+"&diet_types="+diet_types;
          
            $.ajax({
                url: '/getfit/admin/meal/add',
                type: 'POST',
                data: data,
                cache: false,
                success: function(response)
                {
                    if (response.state == false) {
                        
                    } else {
                        window.location.reload();
                        uploadFiles(event);
                    }                      
                }
            });
        }        
    }

    $('.back_btn').click(function(e){
        e.preventDefault();

        if($('#meal_add_modal li.active a').attr("href")=="#tab_1_3"){

            $('#meal_add_modal li a[href="#tab_1_2"]').trigger('click');
            $('.next_btn').attr("value", "Next");

            $('.progress .circle:nth-of-type(' + 2 + ')').addClass('active');
            $('.progress .circle:nth-of-type(' + 3 + ')').removeClass('active').removeClass('done');
            $('.progress .bar:nth-of-type(' + 2 + ')').removeClass('active').removeClass("done");

        }
        else if($('#meal_add_modal li.active a').attr("href")=="#tab_1_2"){

            $('#meal_add_modal li a[href="#tab_1_1"]').trigger('click');
            $('.back_btn').attr("value", "Back to FoodBank");

            $('.progress .circle:nth-of-type(' + 1+ ')').addClass('active');
            $('.progress .circle:nth-of-type(' + 2 + ')').removeClass('active').removeClass('done');
            $('.progress .bar:nth-of-type(' + 1 + ')').removeClass('active').removeClass("done");
        }
        else{
            $("#meal_add_modal .close").click();
        }
    })

    $('#add_meal_form .diet-select').change(function(){

        var id = $(this).val();
        var flag = true;
        var name = $(this).find("option:selected").text();

        $('#add_meal_form .diet-field').find('tr').each(function( i ) {
            if ( this.getAttribute('diet_id')==id ) {
              flag = false;            
            }
        });

        if(flag==true){

            var tr='<tr diet_id="'+id+'"><td>'+name+'</td><td><a class="delete-diet-type"><i class="fa fa-trash"></i></a></td></tr>';
            $('#add_meal_form .diet-field:last-child').append(tr);
            
        }else{
            var msg="You've already choosen this diet type.";
            err_msg(msg);
        }        
    })

    $(document).delegate('.delete-diet-type', 'click', function(){
        $(this).parent().parent().remove();
    });

    function err_msg(msg){
        var shortCutFunction = "error";
        var title = "Error !";
        toastr[shortCutFunction](msg, title);
        $('#toast-container').addClass('animated shake');
    }

    /*Edit Meal*/

    var edit_files;

    $('#meal_edit_form input[type=file]').on('change', edit_prepareUpload);

    function edit_prepareUpload(event)
    {
      edit_files = event.target.files;
      $('#meal_edit_form input[name="upload_flag"]').val('1');
    }

    $('#meal_edit_form .diet-select').change(function(){

        var id = $(this).val();
        var flag = true;
        var name = $(this).find("option:selected").text();

        $('#meal_edit_form .diet-field').find('tr').each(function( i ) {
            if ( this.getAttribute('diet_id')==id ) {
              flag = false;            
            }
        });

        if(flag==true){

            var tr='<tr diet_id="'+id+'"><td>'+name+'</td><td><a class="delete-diet-type"><i class="fa fa-trash"></i></a></td></tr>';
            $('#meal_edit_form .diet-field:last-child').append(tr);
            
        }else{
            var msg="You've already choosen this diet type.";
            err_msg(msg);
        }        
    })

    $('#meal_edit_form .edit-ingredient').change(function(){

        var id = $(this).val();
        var flag = true;
        $('#meal_edit_form .meal-ingredient').find('tr').each(function( i ) {
            if ( this.getAttribute('ingredient_id')==id ) {
              flag = false;            
            }
        });

        if(flag==true){

            $.ajax({  
                type: 'POST',
                url: '/getfit/admin/ingredient/get_ingredient', 
                data: { ingredient_id:  id},
                success: function(response) {
                    var tr='<tr ingredient_id="'+response[0].ingredient_id+'"><td>'+response[0].name+'</td><td protein="'+response[0].protein+'">'+response[0].protein+'</td><td carbs="'+response[0].carbs+'">'+response[0].carbs+'</td><td fat="'+response[0].fat+'">'+response[0].fat+'</td><td cal="'+response[0].cal+'">'+response[0].cal+'</td><td qty="'+response[0].qty+'"> <input type="number" class="form-control ingredient_input" name="ingredients['+response[0].ingredient_id+']" value="'+response[0].qty+'" step="any" style="width:80px; margin: auto;"> </td><td>'+response[0].unit+'</td><td><a class="delete_ingredient_meal"><i class="fa fa-trash"></i></a></td></tr>';
                    $('#meal_edit_form .meal-ingredient:last-child').append(tr);
                }
            });
        }else{
            var msg="You have already selected this ingredient!";
            err_msg(msg);
        }        
    })  

    $(document).delegate('#meal_edit_form .delete_ingredient_meal', 'click', function(){
        $(this).parent().parent().remove();
    });

    $(document).delegate('#meal_edit_form .ingredient_input', 'input', function(){
        var input_qty = $(this).val();
        var tds =$(this).parent().parent().find('td');
        var qty = tds.eq(5).attr("qty");
        tds.eq(1).html(parseFloat(tds.eq(1).attr("protein")*input_qty/qty).toFixed(2));
        tds.eq(2).html(parseFloat(tds.eq(2).attr("carbs")*input_qty/qty).toFixed(2));
        tds.eq(3).html(parseFloat(tds.eq(3).attr("fat")*input_qty/qty).toFixed(2));
        tds.eq(4).html(parseFloat(tds.eq(4).attr("cal")*input_qty/qty).toFixed(2));
    })

    $('#meal_edit_modal button.save').click(function(){

        if ($('#meal_edit_form input[name="name"]').val()=="") {
            var msg="Please input the name.";
            err_msg(msg);
        }else if($('#meal_edit_form textarea[name="method"]').val()==""){
            var msg="Please input the method.";
            err_msg(msg);            
        }else{
            var count=0;
            var meal_ingredient_flag=true;

            $('.meal-ingredient').find('input').each(function( i, j ) {
                count=i+1;
                if ( $(j).val()==0 || $(j).val()<0 ) {
                  meal_ingredient_flag = false;            
                }
            });

            if(meal_ingredient_flag==false){
                var msg = "Quantities couldn't be smaller than zero. Please input again.";
                err_msg(msg);
            }else if(count==0){
                var msg = "Please Input more than 1 Ingredient.";
                err_msg(msg);
            }else{
                $('#meal_edit_form').submit();
            }
        }
    });

    $('#meal_edit_form').on('submit', editSubmitForm);
    function editSubmitForm(event)
    {
        event.stopPropagation(); 
        event.preventDefault();

        $form = $(event.target);
        var formData = $form.serialize();
        var edit_meal_id = $('#meal_edit_form .meal-id').attr('meal_id');
        totalP=0; totalC=0; totalF=0; totalCal=0;
        $('#meal_edit_form .meal-ingredient').find('input').each(function( i, j ) {
            var input_qty = $(j).val();
            var tds =$(j).parent().parent().find('td');
            var qty = tds.eq(5).attr("qty");
            totalP = totalP + parseFloat(parseFloat(tds.eq(1).attr("protein")*input_qty/qty).toFixed(2));
            totalC = totalC + parseFloat(parseFloat(tds.eq(2).attr("carbs")*input_qty/qty).toFixed(2));
            totalF = totalF + parseFloat(parseFloat(tds.eq(3).attr("fat")*input_qty/qty).toFixed(2));
            totalCal = totalCal + parseFloat(parseFloat(tds.eq(4).attr("cal")*input_qty/qty).toFixed(2));
        });

        var diet_types = [];
        $('#meal_edit_form .diet-field').find('tr').each(function( i, j ) {
            diet_types.push($(j).attr("diet_id"));
        });

        if($('#meal_edit_form input[name="upload_flag"]').val()=="0"){
            data = formData + '&totalP=' + totalP + '&totalC=' + totalC + '&totalF=' + totalF + '&totalCal=' + totalCal+"&diet_types="+diet_types+"&meal_id="+edit_meal_id;
        }else{
            data = formData + '&file_name=' + edit_files[0]['name'] + '&totalP=' + totalP + '&totalC=' + totalC + '&totalF=' + totalF + '&totalCal=' + totalCal+"&diet_types="+diet_types+"&meal_id="+edit_meal_id;
        }

        $.ajax({
            url: '/getfit/admin/meal/update',
            type: 'POST',
            data: data,
            cache: false,
            success: function(response)
            {
                if (response.state == false) {
                    
                } else {
                    window.location.reload();
                    if($('#meal_edit_form input[name="upload_flag"]').val()=="1"){
                        edit_uploadFiles(event);
                    }
                }
            }
        });      
    }

    function edit_uploadFiles(event){
       
        var data = new FormData();
        $.each(edit_files, function(key, value)
        {           
            data.append(key, value);
        });

        $.ajax({
            url: '/getfit/upload/upload?files',
            type: 'POST',
            data: data,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR)
            {
                if(typeof data.error === 'undefined')
                {   
                    console.log(data.error);
                }
                else
                {
                    // Handle errors here
                    console.log('ERRORS: ' + data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown)
            {
                // Handle errors here
                console.log('ERRORS: ' + textStatus);
                // STOP LOADING SPINNER
            }
        });
    };
});