<?php
$con = mssql_connect('10.3.9.98', 'des_prod_lp', 'posem_9354') or die("No se pudo conectar a la base de datos"); 
mssql_select_db('gestion_posem', $con);
$sql="SELECT * FROM dbo.zonas;";
$consulta = mssql_query ($sql, $con) or die ("Fallo en la consulta");
$nfilas = mssql_num_rows ($consulta);
echo $nfilas;
mssql_close ($con);
?>





<?php                                      

		$resultado = mssql_query("SELECT linea,desc_linea FROM lineas 
				WHERE linea in (1,2,5,8,10)
				GROUP BY linea, desc_linea
				ORDER BY linea"); 
									 
			while ($raw = mssql_fetch_array($resultado)):
 
			echo '<li>';
				echo '<a data-toggle="tab" href="#TD'.substr($raw[0],0,-2).'">';
				echo '<i class="fa  fa-plus-square"></i>'.substr($raw[0],0,-2).' - '.utf8_encode($raw[1]).'</a>';
			echo '</li>'; 
			
			$idlinea .= substr($raw[0],0,-2); 
			
			$box = '<div id="TD'.substr($raw[0],0,-2).'" class="tab-pane">
						<div id="accordion1" class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion'.substr($raw[0],0,-2).'" href="#accordion'.substr($raw[0],0,-2).'_1">
									'.substr($raw[0],0,-2).' - '.utf8_encode($raw[1]).'</a>
									</h4>
								</div>
								<div id="accordion'.substr($raw[0],0,-2).'_1" class="panel-collapse collapse in">
									<div class="panel-body">';
	 ?>
								<?php   
									$res = mssql_query("SELECT 
											vj_depori AS 'Origen',
											vj_depsol AS 'Destino', 
											vj_licodigo,
											cast(vj_licodigo AS char(2))+'-'+ vj_lidescrip AS 'Linea', 
											cast(vj_panivel01 AS char(2))+'-'+ vj_nadescrip AS 'Area',
											t2.zn_zona AS 'Zona',
											CASE WHEN vj_licodigo=3 THEN 'NO SENSIBLE' ELSE 'SENSIBLE-100%' END AS 'Tipo Validacion',
											CASE WHEN sum(vj_candes)=0 THEN 0 ELSE (cast(sum(vj_canval) AS float)/cast(sum(vj_candes) AS float))*100 END AS '%',
											sum(vj_candes) AS 'Suma Desp',
											sum(vj_canval) AS 'Suma Val',
											sum(vj_canval)-sum(vj_candes) AS 'Diferencia'
											FROM gestion_posem.dbo.ValidacionViaje_2014
											INNER JOIN zonales t2 ON t2.zn_local = vj_depsol
											WHERE vj_depsol= 24
											and vj_depori= 56
											and left(vj_fecing,6)=201408
											and vj_licodigo = 1
											GROUP BY vj_depori,vj_depsol,vj_licodigo,vj_lidescrip,vj_panivel01,vj_nadescrip,t2.zn_zona 
											ORDER BY Linea"); 
									 
			
			
									$box2 = $box. '<table class="table table-striped table-bordered table-hover" id="sample_2">
											<thead>
												<tr style="font-size:13px;" class="info">
													<th>Zona</th>
													<th>&Aacute;rea</th>
													<th>Tipo Validaci&oacute;n</th>
													<th>Suma de <br>% Validacion</th>
													<th>Total Prod. <br>Despachados</th>
													<th>Total Prod. <br>Validados</th>
													<th>Suma de <br>Difererencia</th>
												</tr>
											</thead>
											<tbody style="font-size:11px;">';

											while ($RL = mssql_fetch_array($res)) {  
											echo '<tr>';
												echo '<td>'.$RL[5].'</td>';	 	
												echo '<td>'.utf8_encode($RL[4]).'</td>';
												echo '<td>'.$RL[6].'</td>';	
												echo '<td>'.substr($RL[7],0,strrpos($RL[7], ".")+2).'&#37;</td>';	
												echo '<td>'.$RL[8].'</td>';	
												echo '<td>'.$RL[9].'</td>';	
												echo '<td>'.$RL[10].'</td>';	
											echo '</tr>'; 
														
											
											$box3 = $box2.'<tr>
													<td>'.$RL[5].'</td>
													<td>'.utf8_encode($RL[4]).'</td>
													<td>'.$RL[6].'</td>
													<td>'.substr($RL[7],0,strrpos($RL[7], ".")+2).'&#37;</td>
													<td>'.$RL[8].'</td>
													<td>'.$RL[9].'</td>
													<td>'.$RL[10].'</td>
												   </tr>'; 
											}
									$box4 = $box3.'</tbody>
											</table>';
									?>								
									
	 <?php
			$box5 .= $box4. '		</div>
								</div>
							</div>   
						</div>
					</div>';	 
		endwhile;
	 ?> 
     
     
     <?php 
		echo $box5; 
	?>