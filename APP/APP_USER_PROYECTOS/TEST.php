
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <script src="JS/jquery-latest.min.js" type="text/javascript"></script>
    <script src="JS/jquery-ui.min.js"></script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="width:100%">
<!-- BEGIN PAGE CONTENT-->
<div class="row">

    <table class="tabla table table-striped table-bordered table-hover">
        <thead>
        <tr class="success">
            <td>ID</td>
            <td>Código</td>
            <td>Nombre</td>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="input" class="form-control" name="cantidad[]" autocomplete="off"></input></td>
            <td><input type="input" class="form-control" name="1[]" autocomplete="off"></input></td>
            <td><input type="input" class="form-control" name="observacion[]" autocomplete="off"></input></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn blue"><i class="fa fa-plus"></i> Nuevo</button>

    <script>
        $('button').click(function() {

            //creo una nueva fila
            var fila='<tr>'+
                '<td><input type="input" class="form-control" name="cantidad[]" autocomplete="off"></input></td>'+
                '<td><input type="input" class="form-control" name="1[]" autocomplete="off"></input></td>'+
                '<td><input type="input" class="form-control" name="observacion[]" autocomplete="off"></input>'+
                '</tr>';

            //añado fila a la tabla
            $('.tabla').append(fila);
        });
    </script>

</div>
</body>
</html>