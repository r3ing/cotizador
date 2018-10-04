 
		  
		  
<?php
	include('../../MASTER/include/verifyAPP.php');  	
	
	
	echo "<a href='#' onclick=\"app_aplicaciones(1,0,'','../APP/APP_ADM_APPLICATIONS/DB/ADD.php','vista_aplicaciones')\" class='btn btn-lg btn-primary'><i class='icon-plus'></i> Agregar Aplicaci&oacute;n</button></a><br><br>";
?>
<!-- BEGIN SAMPLE TABLE PORTLET-->
<div class="portlet light">
	<div class="portlet-title">
		<div class="caption">
			<i class="fa fa-bars font-blue-sharp"></i>
			<span class="caption-subject font-blue-sharp bold uppercase">MANTENEDOR DE APLICACIONES</span>
		</div>
		<div class="tools">
			<a href="javascript:;" class="collapse"></a> 
		</div>
	</div>
	
			<!-- Tabs Navigation Start -->
			<ul class="nav nav-tabs">
			  <li class="active"><a href="#usuarios" data-toggle="tab">Usuarios</a></li>
			  <li><a href="#administrador" data-toggle="tab">Administrador</a></li>
			  <li><a href="#todos" data-toggle="tab">Todas</a></li> 
			</ul>
			<!-- Tabs Navigation End -->
			
			<div class="tab-content">
			  <div class="tab-pane active" id="usuarios">	
			  	<!-- BEGIN PAGE CONTENT-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-3">
								<ul class="ver-inline-menu tabbable margin-bottom-10">
									<?php
										include('../../MASTER/config/conect.php');
										$SQL_CAT_USER="	SELECT DISTINCT(T2.id), t2.nombre
												FROM APPLICATIONS T1
												INNER JOIN CATEGORY T2 ON T2.id = T1.category
												WHERE T1.tipo = 'USER' ";
                                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                                        $CONS_CAT_USER = $link->prepare($SQL_CAT_USER);
                                        $CONS_CAT_USER->execute();
                                        while ($row = $CONS_CAT_USER->fetch())
                                        {
											echo '<li>';
												echo '<a data-toggle="tab" href="#TAB_USER_'.$row[0].'">';
													echo '<i class="fa fa-folder"></i> '.$row[1];
												echo '</a>';	
											echo '</li>';	
											// $id_emp .= $row[0];
										}
									?> 
								</ul>
							</div>
							<div class="col-md-9">
								<div class="tab-content">
									<?php 
										include('../../MASTER/config/conect.php');
                                        $SQL_CAT_USER="	SELECT DISTINCT(T2.id), t2.nombre
                                                    FROM APPLICATIONS T1
                                                    INNER JOIN CATEGORY T2 ON T2.id = T1.category
                                                    WHERE T1.tipo = 'USER' ";
                                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                                        $CONS_CAT_USER = $link->prepare($SQL_CAT_USER);
                                        $CONS_CAT_USER->execute();
                                        while ($RA = $CONS_CAT_USER->fetch())
                                        {
											echo '<div id="TAB_USER_'.$RA[0].'" class="tab-pane">'; 
												// echo utf8_encode($RA[1]);												
												// BEGIN TABLE 
												echo '<div class="table-scrollable">';
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
														$SQL_APP_USER="SELECT * FROM APPLICATIONS WHERE estado = 'ON' AND tipo = 'USER' AND category = ".$RA[0]." ORDER BY ruta";
                                                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                                                        $CONS_APP_USER = $link->prepare($SQL_APP_USER);
                                                        $CONS_APP_USER->execute();
                                                        while ($RB = $CONS_APP_USER->fetch())
                                                        {
															echo '<tr class="odd gradeX">';
															echo "<td>".$RB[0]."</td>
																  <td>".$RB[1]."</td>
																  <td>".$RB[2]."</td>
																  <td>".$RB[3]."</td>
																  <td align ='center'>
																	<a href='#' class='link' onclick=\"app_aplicaciones(2,".$RB[0].",'','../APP/APP_ADM_APPLICATIONS/DB/EDIT.php','vista_aplicaciones')\">
																	 <i class='fa fa-pencil' style='color:#0066FF;'></i>
																	</a>
																  </td>";
															echo '</tr>';
														}
													echo '</tbody>';
												echo '</table>';
												echo '</div>';
												// END TABLE  
											echo '</div>';
										}
									?>  
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END PAGE CONTENT-->	 
			  </div>
 
			  <div class="tab-pane" id="administrador">	
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-3">
								<ul class="ver-inline-menu tabbable margin-bottom-10">
									<?php
										include('../../MASTER/config/conect.php');
										$SQL_CAT_ADMIN="	SELECT DISTINCT(T2.id), t2.nombre
												FROM APPLICATIONS T1
												INNER JOIN CATEGORY T2 ON T2.id = T1.category
												WHERE T1.tipo = 'ADM' ";
                                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                                        $CONS_CAT_ADMIN = $link->prepare($SQL_CAT_ADMIN);
                                        $CONS_CAT_ADMIN->execute();
                                        while ($row = $CONS_CAT_ADMIN->fetch())
                                        {
											echo '<li>';
												echo '<a data-toggle="tab" href="#TAB_ADMIN_'.$row[0].'">';
													echo '<i class="fa fa-folder"></i> '.$row[1];
												echo '</a>';	
											echo '</li>';	
											// $id_emp .= $row[0];
										}
									?>
									 
								</ul>
							</div>
							<div class="col-md-9">
								<div class="tab-content">
									<?php 
										include('../../MASTER/config/conect.php');
                                        $SQL_CAT_ADMIN="	SELECT DISTINCT(T2.id), t2.nombre
                                                    FROM APPLICATIONS T1
                                                    INNER JOIN CATEGORY T2 ON T2.id = T1.category
                                                    WHERE T1.tipo = 'ADM' ";
                                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                                        $CONS_CAT_ADMIN = $link->prepare($SQL_CAT_ADMIN);
                                        $CONS_CAT_ADMIN->execute();
                                        while ($RA = $CONS_CAT_ADMIN->fetch())
                                        {
											echo '<div id="TAB_ADMIN_'.$RA[0].'" class="tab-pane">'; 
												// echo utf8_encode($RA[1]);												
												// BEGIN TABLE 
												echo '<div class="table-scrollable">';
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
														$SQL_APP_ADMIN="SELECT * FROM APPLICATIONS WHERE estado = 'ON' AND tipo = 'ADM' AND category = ".$RA[0]." ORDER BY ruta";
                                                        $link->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
                                                        $CONS_APP_ADMIN = $link->prepare($SQL_APP_ADMIN);
                                                        $CONS_APP_ADMIN->execute();
                                                        while ($RB = $CONS_APP_ADMIN->fetch())
                                                        {
															echo '<tr class="odd gradeX">';
															echo "<td>".$RB[0]."</td>
																  <td>".$RB[1]."</td>
																  <td>".$RB[2]."</td>
																  <td>".$RB[3]."</td>
																  <td align ='center'>
																	<a href='#' class='link' onclick=\"app_aplicaciones(2,".$RB[0].",'','../APP/APP_ADM_APPLICATIONS/DB/EDIT.php','vista_aplicaciones')\">
																	 <i class='fa fa-pencil' style='color:#0066FF;'></i>
																	</a>
																  </td>";
															echo '</tr>';
														}
													echo '</tbody>';
												echo '</table>';
												echo '</div>';
												// END TABLE  
											echo '</div>';
										}
									?>  
								</div>
							</div>
						</div>
					</div>
				</div>
			  </div> 
			  
			  <div class="tab-pane" id="todos">
				<?php 
					include('../../MASTER/config/conect.php');
					echo '<div class="table-scrollable">';
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
							$SQL_ALL="SELECT * FROM APPLICATIONS WHERE estado = 'ON' ORDER BY nombre";
                            $CONS_ALL = $link->prepare($SQL_ALL);
                            $CONS_ALL->execute();
                            while ($row = $CONS_ALL->fetch())
                            {
								echo '<tr class="odd gradeX">';
								echo "<td>".$row[0]."</td>
									  <td>".$row[1]."</td>
									  <td>".$row[2]."</td>
									  <td>".$row[3]."</td>
									  <td align ='center'>
										<a href='#' class='link' onclick=\"app_aplicaciones(2,".$row[0].",'','../APP/APP_ADM_APPLICATIONS/DB/EDIT.php','vista_aplicaciones')\">
											<i class='fa fa-pencil' style='color:#0066FF;'></i>
										</a>
									  </td>";
								echo '</tr>';
							}
						echo '</tbody>';
					echo '</table>';
					echo '</div>';
				?>
			  </div>
			</div>
  		   
		  </div>
 
 
		 