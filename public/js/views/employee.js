var table = null;
$(document).ready(function(){
    table = $('#tblEmployees').dataTable( {
        language:{
            url: "http://localhost/crud/public/js/plugins/DataTables/spanish.lang.json"
        },
        ajax: CONSTANTS.url.employee['employee.grid'],
        columnDefs: [
            {targets: 0, visible: false, searchable: false},
            {
                render: function(data, type, row){
                    return $("#txaButtons").val().replace(/\_id_/g, row.id);
                },
                targets: 4,
                searchable: false
            }
        ],
        columns: [
            { data: "id"},
            { data: "name" },
            { data: "address" },
            { data: "salary" }
        ]
        
    } );

    $("#btnNew").click(function (e) { 
        e.preventDefault();
        sowModal();
        initValidator();
    });
});

function initValidator(){
    $('#frmMnto').validate({
        errorClass: "is-invalid",
        rules:{
            txtName: {required: true},
            txtAddress: {required: true},
            txtSalary: {required: true, number: true}
        },
        submitHandler: function(form) { save(); }
    });
}

function edit(id){
    //bootbox.alert("This is the default alert! " + id);
    sowModal();
    initValidator();
    $.ajax({
        type: "GET",
        url: CONSTANTS.url.employee['employee.get'],
        data: {txtId : id},
        success: function (response) {
            if (response.success){
                $("#txtId").val(response.data.id);
                $("#txtName").val(response.data.name);
                $("#txtAddress").val(response.data.address);
                $("#txtSalary").val(response.data.salary);
            }
        }
    });
}

function del(id){
    bootbox.confirm("¿Desea eliminar el registro?", function(result){ 
        if (result){

            $.ajax({
                type: "DELETE",
                url: CONSTANTS.url.employee['employee.delete'],
                data: {txtId : id, _token: $("#_token").val()},
                success: function (response) {
                    if (response.success){
                        alertify.success('Registro eliminado correctamente');
                        table.api().ajax.reload();
                    }else{
                        alertify.error('Error al eliminar registro');
                    }
                }
            });

        }//end if
    });
    
    
}

function sowModal(){
    bootbox.dialog({
        title: 'Empleados',
        message: $("#txaFrm").val(),
        //size: 'large',
        buttons: {
            cancel: {
                label: 'Cerrar',
                className: 'btn-danger btn-sm',
                callback: function(){
                    console.log('Custom cancel clicked');
                }
            },
            ok: {
                label: 'Guaradar',
                className: 'btn-info btn-sm',
                callback: function(){
                    $("#frmMnto").submit();
                    return false;
                }
            }
        }
    });
}

function save(){
    bootbox.hideAll();
    data = $("#frmMnto").serialize();
    console.log(data);
    $.ajax({
        type: "POST",
        url: CONSTANTS.url.employee['employee.save'],
        data: data,
        success: function (response) {
            console.log(response);
            if (response.success){
                alertify.success('Registro guardado correctamente');
                table.api().ajax.reload();
            }else{
                alertify.error('Error al guardar el registro');
            }
        }
    });
}