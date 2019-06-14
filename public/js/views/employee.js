var table = null;
$(document).ready(function(){
    table = $('#tblEmployees').dataTable( {
        language:{
            url: "http://localhost/crud/public/js/plugins/DataTables/spanish.lang.json"
        },
        ajax: "http://localhost/crud/public/employees/grid",
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
    });
});

function edit(id){
    //bootbox.alert("This is the default alert! " + id);
    sowModal();
    $.ajax({
        type: "GET",
        url: "http://localhost/crud/public/employees/get",
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
                url: "http://localhost/crud/public/employees/delete",
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
                label: "Cerrar",
                className: 'btn-danger',
                callback: function(){
                    console.log('Custom cancel clicked');
                }
            },
            ok: {
                label: "Guaradar",
                className: 'btn-info',
                callback: function(){
                    console.log('Custom OK clicked');
                    save();
                }
            }
        }
    });
}

function save(){
    data = $("#frmMnto").serialize();
    console.log(data);
    $.ajax({
        type: "POST",
        url: "http://localhost/crud/public/employees/save",
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