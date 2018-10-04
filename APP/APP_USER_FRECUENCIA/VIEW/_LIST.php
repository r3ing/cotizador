<div class="portlet box blue col-md-12">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-table"></i>Datos Frecuencia</div>
    </div>
    <div class="portlet-body">
        <br><br><br>
<table class="table table-bordered table-hover" id="sample_1">
    <thead>
    <tr class="info">
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

    include('../../MASTER/config/conect.php');

    $sql = "SELECT * FROM frecuencia";

    $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $result = $link->prepare($sql);
    $result->execute();
    while ($row = $result->fetch()) {
        echo "<tr class='odd gradeX'>";
        echo "<td>" . $row[1] . "</td>
                                      <td>" . $row[2] . "</td>
                                      <td>" . $row[3] . "</td>
                                      <td>" . $row[4] . "</td>";
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