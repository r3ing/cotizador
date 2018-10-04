<?php
	include('../../MASTER/include/verifyAPP.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>jQuery treetable</title>

		<?php
			include ("../HEAD.php");
		?>
		<link rel="stylesheet" href="css/screen.css" media="screen" />
		<link rel="stylesheet" href="css/jquery.treetable.css" />
		<link rel="stylesheet" href="css/jquery.treetable.theme.default.css" />
	</head>
	<body>
		<script type="text/javascript">
			var nuevoalias = jQuery.noConflict();
			nuevoalias(document).ready(function() {
//			    alert("Si salgo es que no hay conflicto!!!");
			});
		</script>

		<table id="example-advanced" class="table table-bordered table-striped table-condensed flip-content">
		<caption>
			<a href="#" onClick="jQuery('#example-advanced').treetable('expandAll'); return false;" class="btn btn-circle btn-xs green"><i class="fa fa-plus"></i> Maximizar Todo</a>
			<a href="#" onClick="jQuery('#example-advanced').treetable('collapseAll'); return false;" class="btn btn-circle btn-xs red"><i class="fa fa-minus"></i> Minimizar Todo</a>
		</caption>
		<thead>
			<tr>
				<th colspan="4" bgcolor="#366092"><center><h2 style="color:#FFFFFF;">PRESUPUESTO 2018</h2></center></th>
			</tr>
			<tr>
				<th bgcolor="#366092" width="25%" style="border:0px;"><h5 style="color:#FFFFFF;">EE.RR.</h5></th>

			  	<th bgcolor="#366092" style="width:10%; border:0px;">
					<h5 style="color:#FFFFFF;">
						PPTO Ajustado
						<a style="color:#FFFFFF;" class="tooltips" href="javascript:;" data-original-title=" "><i class="fa fa-info-circle"></i></a>
					</h5>
				</th>
                <th bgcolor="#366092" style="width:10%; border:0px;">
                    <h5 style="color:#FFFFFF;">
                        PPTO Comprometido
                        <a style="color:#FFFFFF;" class="tooltips" href="javascript:;" data-original-title=" "><i class="fa fa-info-circle"></i></a>
                    </h5>
                </th>
                <th bgcolor="#366092" style="width:10%; border:0px;">
                    <h5 style="color:#FFFFFF;">
                        PPTO Real
                        <a style="color:#FFFFFF;" class="tooltips" href="javascript:;" data-original-title=" "><i class="fa fa-info-circle"></i></a>
                    </h5>
                </th>
            </tr>
		</thead>
		<tbody>
            <tr data-tt-id="1">
                <td>Clientes o deudores por ventas</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $1.003.493
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $1.222.493
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $1.003.493
                    </a>
                </td>
            </tr>
            <tr data-tt-id="1.1" data-tt-parent-id="1">
                <td>Deudores varios o Deudores diversos</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $1.003.493
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $1.222.493
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $1.003.493
                    </a>
                </td>
            </tr>
            <tr data-tt-id="1.1.1" data-tt-parent-id="1.1">
                <td>Deudores varios o Deudores diversos</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $1.003.493
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $1.222.493
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $1.003.493
                    </a>
                </td>
            </tr>
            <tr data-tt-id="2">
                <td>IVA crédito fiscal o IVA a acreditar o IVA soportado</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $1.003.493
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $1.222.493
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $1.003.493
                    </a>
                </td>
            </tr>
            <tr data-tt-id="3">
                <td>Inmuebles</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $25.837.947
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $27.937.938
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $26.938.928
                    </a>
                </td>
            </tr>
            <tr data-tt-id="3.1" data-tt-parent-id="3">
                <td>Instalaciones</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $54.435.932
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $56.928.837
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $58.827.802
                    </a>
                </td>
            </tr>
            <tr data-tt-id="3.2" data-tt-parent-id="3">
                <td>Muebles y útiles</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $87.763.873
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $87.763.873
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $87.763.873
                    </a>
                </td>
            </tr>
            <tr data-tt-id="4">
                <td>Equipos de computación o equipos para procesos de información</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $15.234.123
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $15.790.248
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $16.234.354
                    </a>
                </td>
            </tr>
            <tr data-tt-id="4.1" data-tt-parent-id="4">
                <td>Aplicaciones informáticas</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $23.832.783
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $23.123.243
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $23.832.345
                    </a>
                </td>
            </tr>
            <tr data-tt-id="5">
                <td>Maquinarias</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $93.837.938
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $93.123.356
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $93.234.678
                    </a>
                </td>
            </tr>
            <tr data-tt-id="5.1" data-tt-parent-id="5">
                <td>Materias Primas</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $92.048.937
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $12.048.234
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $92.456.123
                    </a>
                </td>
            </tr>
            <tr data-tt-id="5.2" data-tt-parent-id="5">
                <td>Rodados</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $82.934.837
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $82.345.234
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $82.678.236
                    </a>
                </td>
            </tr>
            <tr>
                <td>Ventas</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $2.323.456.938
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $2.456.234.567
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $2.785.122.345
                    </a>
                </td>
            </tr>
            <tr>
                <td>Prestaciones de servicios</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $948.234.938
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $124.435.657
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $675.214.233
                    </a>
                </td>
            </tr>
            <tr>
                <td>Intereses cobrados o intereses ganados</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $56.938.847
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $56.938.847
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $56.938.847
                    </a>
                </td>
            </tr>
            <tr>
                <td>Alquileres cobrados o ingresos por alquileres</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $82.937.827
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $42.223.111
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $34.232.323
                    </a>
                </td>
            </tr>
            <tr>
                <td>Descuentos obtenidos</td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $83.873.262
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $76.849.134
                    </a>
                </td>
                <td>
                    <a style="color:#000000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        $66.667.982
                    </a>
                </td>
            </tr>
            <tr>
                <td>Impuestos pagados</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $832.938.282
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $728.938.382
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $832.847.392
                    </a>
                </td>
            </tr>
            <tr>
                <td>Alquileres pagados</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $762.373.393
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $872.944.392
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $827.848.838
                    </a>
                </td>
            </tr>
            <tr>
                <td>Intereses pagados</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $987.745.234
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $767.387.873
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $873.284.493
                    </a>
                </td>
            </tr>
            <tr>
                <td>Sueldos y jornales</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $234.579.322
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $827.579.322
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $234.579.322
                    </a>
                </td>
            </tr>
            <tr>
                <td>Gastos generales</td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $2.112.567.248
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $2.112.445.234
                    </a>
                </td>
                <td>
                    <a style="color:#FF0000;" href="DETAILS.php" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;">
                        - $2.998.635.322
                    </a>
                </td>
            </tr>
		</tbody>
		</table>
		<script language="JavaScript" type="text/javascript">
		<!--
			b = new Date();
			b = b.getTime();

			document.write("Tiempo de Respuesta: " + ((b - a) / 1000) + "s");
		//-->
		</script>

		<script src="bower_components/jquery.js"></script>
		<script src="bower_components/jquery.ui.core.js"></script>
		<script src="bower_components/jquery.ui.widget.js"></script>
		<script src="bower_components/jquery.ui.mouse.js"></script>
		<script src="bower_components/jquery.ui.draggable.js"></script>
		<script src="bower_components/jquery.ui.droppable.js"></script>
		<script src="jquery.treetable.js"></script>
		<script>
		//jQuery('#example-advanced').treetable('expandNode', '3')

		$("#example-basic").treetable({ expandable: true });

		$("#example-basic-static").treetable();

		$("#example-basic-expandable").treetable({ expandable: true });

		$("#example-advanced").treetable({ expandable: true });

		// Highlight selected row
		$("#example-advanced tbody").on("mousedown", "tr", function() {
		$(".selected").not(this).removeClass("selected");
		$(this).toggleClass("selected");
		});

		// Drag & Drop Example Code
		$("#example-advanced .file, #example-advanced .folder").draggable({
		helper: "clone",
		opacity: .75,
		refreshPositions: true, // Performance?
		revert: "invalid",
		revertDuration: 300,
		scroll: true
		});

		$("#example-advanced .folder").each(function() {
		$(this).parents("#example-advanced tr").droppable({
		  accept: ".file, .folder",
		  drop: function(e, ui) {
			var droppedEl = ui.draggable.parents("tr");
			$("#example-advanced").treetable("move", droppedEl.data("ttId"), $(this).data("ttId"));
		  },
		  hoverClass: "accept",
		  over: function(e, ui) {
			var droppedEl = ui.draggable.parents("tr");
			if(this != droppedEl[0] && !$(this).is(".expanded")) {
			  $("#example-advanced").treetable("expandNode", $(this).data("ttId"));
			}
		  }
		});
		});

		// APERTURA POR DEFECTO
		$("#example-advanced").treetable("expandNode", "2");
		$("#example-advanced").treetable("expandNode", "221");
		$("#example-advanced").treetable("expandNode", "22131");
		$("#example-advanced").treetable("expandNode", "2213141");
		$("#example-advanced").treetable("expandNode", "205");
		$("#example-advanced").treetable("expandNode", "2052051");
		$("#example-advanced").treetable("expandNode", "20520512061");
		$("#example-advanced").treetable("expandNode", "205205120612071");
		$("#example-advanced").treetable("expandNode", "221314152");
		$("#example-advanced").treetable("expandNode", "2213142");
		$("#example-advanced").treetable("expandNode", "2213142931");


		$("form#reveal").submit(function() {
		var nodeId = $("#revealNodeId").val()

		try {
		  $("#example-advanced").treetable("reveal", nodeId);
		}
		catch(error) {
		  alert(error.message);
		}

		return false;
		});
		</script>


		<script src="../../MASTER/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
		<script src="../../MASTER/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
		<!-- END CORE PLUGINS -->
		<!-- BEGIN PAGE LEVEL SCRIPTS -->
		<script src="../../MASTER/assets/global/scripts/app.min.js" type="text/javascript"></script>
        <script src="../../MASTER/assets/pages/scripts/ui-general.min.js" type="text/javascript"></script>



	</body>
</html>
