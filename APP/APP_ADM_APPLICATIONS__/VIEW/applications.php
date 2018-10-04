<?php
	include('../../MASTER/include/verifyAPP.php');  	
	
	
	echo "<a href='#' onclick=\"app_aplicaciones(1,0,'','../APP/APP_ADM_APPLICATIONS/DB/ADD.php','vista_aplicaciones')\" class='btn btn-lg btn-primary'><i class='icon-plus'></i> Agregar Aplicaci&oacute;n</button></a><br><br>";
?>
<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption font-dark">
            <i class="icon-settings font-dark"></i>
            <span class="caption-subject bold uppercase">
                Mantenedor de Aplicaciones
            </span>
        </div>
    </div>
    <div class="portlet-body">

            <?php
                include('../../MASTER/config/conect.php');
                echo '<table class="table table-striped table-bordered" id="sample_1">';
                    echo '<thead>';
                        echo '<tr>';
                            echo '<th class="head0">ID</th>';
                            echo '<th class="head1">Nombre</th>';
                            echo '<th class="head0">Ruta</th>';
                            echo '<th class="head0">Estado</th>';
                            echo '<th class="head0">Modificar</th>';
                        echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                        $sql="SELECT * FROM applications WHERE estado = 'ON' ORDER BY nombre";
                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                        $consulta = $link->prepare($sql);
                        $consulta->execute();
                        while ($row = $consulta->fetch())
                        {
                            echo '<tr class="odd gradeX">';
                            echo "<td>".$row[0]."</td>
                                  <td>".utf8_encode($row[1])."</td>
                                  <td>".$row[2]."</td>
                                  <td>".$row[3]."</td>
                                  <td align ='center'>
                                    <a href='#' class='link' onclick=\"app_aplicaciones(2,".$row[0].",'','../APP/APP_ADM_APPLICATIONS/DB/EDIT.php','vista_aplicaciones')\">
                                        <i class='fa fa-pencil' style='color:#0066FF;'></i>
                                    </a>
                                  </td>";
                            echo '</tr>';
                        }
                        $consulta=null;
                        $link = null;
                    echo '</tbody>';
                echo '</table>';
            ?>


    </div>
</div>
		 