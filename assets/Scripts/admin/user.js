var userEditable = function () {

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
            jqTds[1].innerHTML = '<input type="text" step="any" class="form-control" style="width: 100%;" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<input type="text" step="any" class="form-control" style="width: 100%;" value="' + aData[2] + '">';
            jqTds[3].innerHTML = '<input type="text" step="any" class="form-control" style="width: 100%;" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<input type="date" step="any" class="form-control" style="width: 100%;" value="' + aData[4] + '">';
            jqTds[5].innerHTML = getUserType(aData[5]);
            jqTds[6].innerHTML = '<a class="edit" href="">Save</a>';
            jqTds[7].innerHTML = '<a class="cancel" href="">Cancel</a>';
        }

        function getUserType(activeName){
            var output = '<select class="usertype_select" style="height:34px;">';

            if(activeName == 'admin'){
                output += '<option selected value="admin">' + activeName + '</option>'; 
                output += '<option value="user">' + "user" + '</option>';  
            } else if(activeName == "user"){
                output += '<option selected value="user">' + activeName + '</option>';  
                output += '<option value="admin">' + "admin" + '</option>'; 
            } 
            output += '</select>';

            return output;
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var jqSelects=$('select.usertype_select', nRow);

            var user_id = $(nRow).attr("user_id");

            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
            oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
            oTable.fnUpdate(jqSelects[0].value, nRow, 5, false);
            oTable.fnUpdate('<a class="edit"><i class="fa fa-pencil">', nRow, 6, false);
            oTable.fnUpdate('<a class="delete" href=""><i class="fa fa-trash"></i></a>', nRow, 7, false);
            oTable.fnDraw();

            var data = {firstname: jqInputs[0].value, lastname: jqInputs[1].value,
                        username: jqInputs[2].value, email: jqInputs[3].value, 
                        dateofbirth: jqInputs[4].value, usertype: jqSelects[0].value, user_id: user_id};

            $.ajax({
                url : '/getfit/admin/user/update',
                type : 'post',
                data : data,
                success : function(response) {
                    if (response.state == false) {
                        var shortCutFunction = "error";
                        var msg = response.msg;
                        var title = "Error !";
                        toastr[shortCutFunction](msg, title);
                        $('#toast-container').addClass('animated shake');
                        document.location.reload();
                    } else {
                        document.location.reload();
                    }
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

        var table = $('#sample_editable_user');

        var oTable = table.dataTable({

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

        var tableWrapper = $("#sample_editable_user_wrapper");

        var nEditing = null;
        var nNew = false;

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
                var jqInputs = $('input', nRow);
                var currentYear = (new Date).getFullYear();
                var birthDay = jqInputs[4].value;
                var birthYear = new Date(birthDay).getFullYear();
                if((currentYear-birthYear)<18){
                    var shortCutFunction = "error";
                    var msg = "The age must be older than 18";
                    var title = "Error !";
                    toastr[shortCutFunction](msg, title);
                    $('#toast-container').addClass('animated shake');
                }else{
                    if(confirm("Do you really want to save this user?")){
                        saveRow(oTable, nEditing);
                        nEditing = null;
                    }
                }
                
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
            }
        });

        table.on('click', 'a.delete_user', function () {

            if(confirm("Do you really want to delete this user?")){
                
                $.ajax({
                    url : '/getfit/admin/user/delete',
                    type : 'post',
                    data : {user_id:$(this).attr('user_id'), username:$(this).attr('user_name')},
                    success : function(response) { 
                            
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
    userEditable.init();
});