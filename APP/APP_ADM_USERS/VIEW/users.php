<!-- BEGIN SAMPLE TABLE PORTLET-->

<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Usuarios
            </span>
        </div>
    </div>
    <div class="portlet-body">
        <?php
        include('../../MASTER/config/conect.php');
        $sql=" SELECT t1.*
				FROM users t1
				WHERE t1.status = 'ON' ORDER BY forename";

        echo "<a href='#' onclick=\"app_usuarios(1,0,'../APP/APP_ADM_USERS/DB/ADD.php','vista_users')\" class='btn btn-circle btn-default'><i class='icon-plus'></i> Agregar Usuario</a><br><br>";

        echo '<div class="portlet-body">';
        echo '<div class="table-scrollable">';
        echo '<table class="table table-bordered table-hover">';
        echo '<thead>';
        echo '<tr  class="info">';
        echo '<th>ID</th>';
        echo '<th>Nombre</th>';
        echo '<th>E-mail</th>';
        echo '<th>Usuario</th>';
        echo '<th>Estado</th>';
        echo '<th>&nbsp;</th>';
        echo '<th>&nbsp;</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $consulta = $link->prepare($sql);
        $consulta->execute();
        while ($row = $consulta->fetch())
        {
            echo '<tr class="odd gradeX">';
            echo "<td>".$row[0]."</td>
						  <td>".$row[3]."&nbsp;".$row[4]."&nbsp;".$row[5]."</td>
						  <td>".utf8_encode($row[8])."</td> 
						  <td>".utf8_encode($row[1])."</td> 
						  <td>".utf8_encode($row[9])."</td> ";
            echo "<td align ='center'>
							<a href='#' class='link' onclick=\"app_usuarios(3,".$row[0].",'../APP/APP_ADM_USERS/DB/EDIT.php','vista_users')\">
								<i class='fa fa-pencil' style='color:#0066FF;'></i>
							</a>
						  </td>";
            echo "<td align ='center'>
							<a href='#' class='link' onclick=\"app_usuarios(5,".$row[0].",'../APP/APP_ADM_USERS/DB/DELETE.php','vista_users')\">
								<i class='fa fa-times' style='color:#FF0000;'></i>
							</a>
						  </td>";
            echo '</tr>';

        }
        $consulta=null;
        $link = null;
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        echo '</div>';
        ?>
    </div>
</div>
<!-- END SAMPLE TABLE PORTLET-->
				