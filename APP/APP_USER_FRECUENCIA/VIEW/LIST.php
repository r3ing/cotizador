<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <?php
    include ("../../HEAD.php");
    ?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body style="width:98%; background: white !important;">
<!--
<script type="text/javascript">
    var nuevoalias = jQuery.noConflict();
    nuevoalias(document).ready(function() {
        // alert("Si salgo es que no hay conflicto!!!");
    });
</script>
-->
<!-- BEGIN PAGE CONTENT-->

        <!-- BEGIN SAMPLE TABLE PORTLET-->
                <!-- *********************************************** BEGIN CONTENIDO *********************************************** -->
                <div class="portlet box blue col-md-12">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-table"></i>Datos Frecuencia</div>
                    </div>
                    <div class="portlet-body">
                        <br><br><br>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1">
                            <thead>
                            <tr>
                                <th> C&oacute;digo</th>
                                <th> Tienda </th>
                                <th> Despacho </th>
                                <th> Prioridad </th>
                                <th class="notReport"></th>
                                <th class="notReport"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            include('../../../MASTER/config/conect.php');

                            $sql = "SELECT * FROM frecuencia";

                            $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                            $result = $link->prepare($sql);
                            $result->execute();
                            while ($row = $result->fetch()) {
                                echo "<tr class='odd gradeX' data-id='$row[0]'>";
                                echo "<td>" . $row[1] . "</td>
                                      <td>" . $row[2] . "</td>
                                      <td>" . $row[3] . "</td>
                                      <td>" . $row[4] . "</td>";
                                echo "<td align ='center'>
							            <a class='link btn-edit'>
								            <i class='fa fa-pencil' style='color:#0066FF;'></i>
							            </a>
						              </td>";
                                echo "<td align ='center'>
							            <a class='link btn-delete'>
								            <i class='fa fa-times' style='color:#FF0000;'></i>
							            </a>
						              </td>";
                                echo "</tr>";

                                //echo "onclick=\"delete(" . $row[0] . ")\""
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- *********************************************** END   CONTENIDO *********************************************** -->
        <!-- END SAMPLE TABLE PORTLET-->


<?php
include ("../../FOOTER.php");
?>
<script type="text/javascript">

    $(".btn-delete").click(function() {
        var btn = $(this),
            tr = btn.closest('tr'),
            id = tr.attr('data-id'),
            si = confirm('Realmente desea eliminar este registro?');
        if (si)
        {
            $.ajax({
                type: 'POST',
                url: 'DB/DELETE.php',
                data: 'id='+id,
                success: function(data) {
                    if(data = 1){
                        tr.remove();
                    }
                    else{
                        alert('Error! El registro no pudo ser eliminado');
                    }
                },
                complete: function(){
                }
            });
        }
    });

    $(".btn-edit").click(function() {
        //var btn = $(this),

        $('#modalEdit').modal('show');

    });


</script>
</body>
</html>