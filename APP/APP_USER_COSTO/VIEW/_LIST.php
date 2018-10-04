<table class="table table-bordered table-hover" id="sample_1">
    <thead>
    <tr class="info">
        <!--<th>Id</th>-->
        <th>T&iacute;tulo</th>
        <th>Descripci&oacute;n</th>
        <th>Vigencia Incio</th>
        <th>Vigencia Fin</th>
        <th class="notReport">Docs</th>
        <th class="notReport">&nbsp;</th>
        <th class="notReport">&nbsp;</th>
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