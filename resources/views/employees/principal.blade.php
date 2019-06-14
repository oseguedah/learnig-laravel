<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD Simple</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
    <!-- DataTable -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/DataTables/datatables.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/DataTables/buttons.bootstrap.min.css') !!}">
    <!-- FontAwesome -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/fontawesome/css/fontawesome.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/fontawesome/css/all.min.css') !!}">
    <!-- Alertify -->
    <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/alertify/alertify.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/plugins/alertify/default.min.css') !!}">

</head>
<body>
    <div class="container">
        
        <div class="card" style="margin-top: 50px;">
            <div class="card-body">
                <div class="row" style="margin-bottom: 20px;">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-sm" id="btnNew">
                            <i class="far fa-plus-square"></i> Nuevo
                        </button>
                    </div>
                </div>
                <table id="tblEmployees" class="display" style="width:100%;">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Salario</th>
                            <th style="width: 10%;">Acciones</th>
                        </tr>
                    </thead>
                </table>


            </div>
        </div>
    </div>

    <textarea id="txaButtons" style="display:none;">
    <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
        <div class="btn-group btn-group-sm" role="group"> 
            <button type="button" id="btnEdit" class="btn btn-success" title="Editar" onclick="edit(_id_)">
                <i class="fas fa-edit"></i>
            </button> 
            <button type="button" id="btnDelete" class="btn btn-danger" title="Eliminar" onclick="del(_id_)">
                <i class="fas fa-trash-alt"></i>
            </button> 
        </div> 
    </div>
    </textarea>

    <input type="hidden" id="_token" value="{{ csrf_token() }}" style="display:none;">
    <textarea id="txaFrm" style="display:none;">
        <form id="frmMnto">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="txtId" name="txtId">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nombre del empleado">
            </div>
            <div class="form-group">
                <label>Dirección</label>
                <input type="text" class="form-control" id="txtAddress" name="txtAddress" placeholder="Dirección del empleado">
            </div>
            <div class="form-group">
                <label>Salario</label>
                <input type="text" class="form-control" id="txtSalary" name="txtSalary" placeholder="Salario del empleado">
            </div>
        </form>
    </textarea>

    <!-- Jquery -->
    <script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

    <!-- Bootstrap -->
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>

    <!-- DataTable -->
    <script type="text/javascript" src="{!! asset('js/plugins/DataTables/datatables.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/plugins/DataTables/buttons.bootstrap.min.js') !!}"></script>
    <!-- FontAwesome -->
    <script type="text/javascript" src="{!! asset('js/plugins/fontawesome/fontawesome.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('js/plugins/fontawesome/all.min.js') !!}"></script>

    <!-- Bootbox -->
    <script type="text/javascript" src="{!! asset('js/plugins/bootbox/bootbox.min.js') !!}"></script>

    <!-- Alertify -->
    <script type="text/javascript" src="{!! asset('js/plugins/alertify/alertify.min.js') !!}"></script>

    <script type="text/javascript" src="{{ asset('js/views/employee.js') }}"></script>

</body>
</html>