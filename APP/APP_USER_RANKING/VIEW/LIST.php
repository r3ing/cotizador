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
                            <i class="fa fa-table"></i>Datos Ranking</div>
                    </div>
                    <div class="portlet-body">
                        <br><br><br>
                        <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1">
                            <thead>
                            <tr>
                                <th> RUT</th>
                                <th> Nombre </th>
                                <th> SKU </th>
                                <th> Descripci&oacute;n </th>
                                <th> Ranking NS </th>
                                <th class="notReport"></th>
                                <th class="notReport"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            include('../../../MASTER/config/conect.php');

                            $sql = "SELECT * FROM ranking";

                            $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                            $result = $link->prepare($sql);
                            $result->execute();
                            while ($row = $result->fetch()) {
                                echo "<tr class='odd gradeX'>";
                                echo "<td>" . $row[1] . "</td>
                                      <td>" . $row[2] . "</td>
                                      <td>" . $row[3] . "</td>
                                      <td>" . $row[4] . "</td>
                                      <td>" . $row[5] . "</td>";
                                echo "<td align ='center'>
							            <a href='' class='link' onclick=\"edit(" . $row[0] . ")\">
								            <i class='fa fa-pencil' style='color:#0066FF;'></i>
							            </a>
						              </td>";
                                echo "<td align ='center'>
							            <a href='' class='link' onclick=\"delete(" . $row[0] . ")\">
								            <i class='fa fa-times' style='color:#FF0000;'></i>
							            </a>
						              </td>";
                                echo "</tr>";
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

</body>
</html>