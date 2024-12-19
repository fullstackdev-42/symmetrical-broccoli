var ingredientEditable = function () {

    var handleTable = function () {

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control" style="width: 100%;" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="number" step="any" class="form-control" style="width: 100%;" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="number" step="any" class="form-control" style="width: 100%;" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="number" step="any" class="form-control" style="width: 100%;" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="number" step="any" class="form-control" style="width: 100%;" value="' + aData[4] + '">';
            jqTds[5].innerHTML = '<input type="number" step="any" class="form-control" style="width: 100%;" value="' + aData[5] + '">';
            jqTds[6].innerHTML = getUnit(aData[6]);
            jqTds[7].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[8].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function getUnit(activeName){
            var output = '<select class="unit_select" style="height:34px;">';

            if(activeName == 'kilogram'){
                output += '<option selected value="kilogram">' + activeName + '</option>'; 
                output += '<option value="gram">' + "gram" + '</option>';  
                output += '<option value="liter">' + "liter" + '</option>';
                output += '<option value="milliliter">' + "milliliter" + '</option>';
                output += '<option value="tablespoon">' + "tablespoon" + '</option>';
                output += '<option value="teaspoon">' + "teaspoon" + '</option>';
            } else if(activeName == "gram"){
                output += '<option value="kilogram">' + "kilogram"+ '</option>'; 
                output += '<option selected value="gram">' + activeName + '</option>';  
                output += '<option value="liter">' + "liter" + '</option>'; 
                output += '<option value="milliliter">' + "milliliter" + '</option>';
                output += '<option value="tablespoon">' + "tablespoon" + '</option>';
                output += '<option value="teaspoon">' + "teaspoon" + '</option>';
            } else if (activeName == "liter"){
                output += '<option value="kilogram">' + "kilogram"+ '</option>'; 
                output += '<option value="gram">' + "gram" + '</option>';  
                output += '<option value="liter" selected>' + activeName + '</option>';  
                output += '<option value="milliliter">' + "milliliter" + '</option>';
                output += '<option value="tablespoon">' + "tablespoon" + '</option>';
                output += '<option value="teaspoon">' + "teaspoon" + '</option>';
            } else if (activeName == "milliliter"){
                output += '<option value="kilogram">' + "kilogram"+ '</option>'; 
                output += '<option value="gram">' + "gram" + '</option>';  
                output += '<option value="liter">' + "liter" + '</option>';  
                output += '<option value="milliliter" selected>' + activeName + '</option>';
                output += '<option value="tablespoon">' + "tablespoon" + '</option>';
                output += '<option value="teaspoon">' + "teaspoon" + '</option>';
            } else if (activeName == "tablespoon"){
                output += '<option value="kilogram">' + "kilogram"+ '</option>'; 
                output += '<option value="gram">' + "gram" + '</option>';  
                output += '<option value="liter">' + "liter" + '</option>';
                output += '<option value="milliliter">' + "milliliter" + '</option>';
                output += '<option value="tablespoon" selected>' + activeName + '</option>';                
                output += '<option value="teaspoon">' + "teaspoon" + '</option>';
            } else {
                output += '<option value="kilogram">' + "kilogram"+ '</option>'; 
                output += '<option value="gram">' + "gram" + '</option>';  
                output += '<option value="liter">' + "liter" + '</option>';
                output += '<option value="milliliter">' + "milliliter" + '</option>';
                output += '<option value="tablespoon">' + "tablespoon" + '</option>';
                output += '<option value="teaspoon" selected>' + activeName + '</option>';
            }
            output += '</select>';
            return output;
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var jqSelects=$('select.unit_select', nRow);

            var ingredient_id = $(nRow).attr("ingredient_id");

            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqInputs[5].value, nRow, 5, false);
            oTable.fnUpdate(jqSelects[0].value, nRow, 6, false);
            oTable.fnUpdate('<a class="edit"><i class="fa fa-pencil">', nRow, 7, false);
            oTable.fnUpdate('<a class="delete" href=""><i class="fa fa-trash"></i></a>', nRow, 8, false);
            oTable.fnDraw();

            var data = {name: jqInputs[0].value, protein: jqInputs[1].value,
                        carbs: jqInputs[2].value, fat: jqInputs[3].value, 
                        cal: jqInputs[4].value, quantity: jqInputs[5].value, unit: jqSelects[0].value, ingredient_id: ingredient_id};

            $.ajax({
                url : '/getfit/admin/ingredient/update',
                type : 'post',
                data : data,
                success : function(response) {
                    window.location.reload();
                }
            });
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 4, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({

            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "lengthMenu": [
                [5, 10, 20, -1],
                [5, 10, 20, "All"] // change per page values here
            ],

            // Or you can use remote translation file
            //"language": {
            //   url: '//cdn.datatables.net/plug-ins/3cfcc339e89/i18n/Portuguese.json'
            //},

            // set the initial value
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

        var tableWrapper = $("#sample_editable_1_wrapper");

        var nEditing = null;
        var nNew = false;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Previose row not saved. Do you want to save it ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }

            var aiNew = oTable.fnAddData(['', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);
            editRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();
            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nEditing = null;
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();
            nNew = false;            
            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;
            } else if (nEditing == nRow && this.innerHTML == "Save") {
                /* Editing this row and want to save it */
                if(confirm("Do you really want to save this ingredient?")){
                    saveRow(oTable, nEditing);
                    nEditing = null;
                }
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });

        table.on('click', 'a.delete_ingredient', function () {

            if(confirm("Do you really want to delete this ingredient?")){
                
                $.ajax({
                    url : '/getfit/admin/ingredient/delete',
                    type : 'post',
                    data : {ingredient_id:$(this).attr('ingredient_id'), ingredient_name:$(this).attr('ingredient_name')},
                    success : function(response) { 
                        console.log(response);
                        if (response == "success") {
                            window.location.reload();                            
                        }
                    }
                });
            }
        });
    }

    return {

        //main function to initiate the module
        init: function () {
            handleTable();
        }

    };

}();

jQuery(document).ready(function() {
    ingredientEditable.init();

    //Add new Ingredient
    $('.add-ingredient-form').submit(function(e) {
        e.preventDefault();        
        $('#toast-container').remove();

        $.ajax({
            url : '/getfit/admin/ingredient/add',
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
                    window.location.href = '/getfit/admin/ingredient';
                }
            }
        });
    });

    $('#add_ingredient').click(function () {
        $("#ingredient_modal").modal();
    });
});