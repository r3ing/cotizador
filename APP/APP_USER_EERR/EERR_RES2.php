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
			   // alert("Si salgo es que no hay conflicto!!!");
			});
		</script>
		<script language="JavaScript" type="text/javascript">
		<!--
			a = new Date();
			a = a.getTime();
		//-->
		</script>  
		<?php 
			
			include ("../../../../lib/adodb/adodb.inc.php");
			include('../../MASTER/config/conect.php');			 
			
			function Mayus($variable) {
				$variable = strtr(strtoupper($variable),"àèìòùáéíóúçñäëïöü","ÀÈÌÒÙÁÉÍÓÚÇÑÄËÏÖÜ");
				return $variable;
			}
			
			if ($_GET['sede'] != '')
			$sede	= 	$_GET['sede']; 
			
			// echo '<br>SEDE: '.$sede; 
			 
			if ($_GET['CC'] != '')
			$CC		= 	$_GET["CC"];  
			
			//echo '<br>CCOSTO: '.$CC;
			
			if ($_GET['agno'] != '')
			$agno 	= 	$_GET['agno'];  
			
			// echo '<br>AÑO: '.$agno; 
			
			if ($_GET["meses"] == '-1')
			{	$meses 		.= 	'-1';	}
			else 
			{	$meses 		.= 	$_GET["meses"];  }
				
				
			//echo '<br>MES: '.$meses; 
			
			$id_usuario	= $vari[0];  
			
			error_reporting(E_ALL ^ E_NOTICE);
	 
			include ("LIB.php");
			include ("SQL2.php");
		
			$jer_ctacble	= 	get_jerarquia_ctacble($data);
			$escenarios		= 	get_escenarios($data); 
			
			$ctacbles		=	get_total_ctacble_search($data);
			$agrupadores	= 	get_total_agrupadores_search($data);	
			$total_escenarios = get_total_escenarios($data); 																		  
		?>
		<?php 
		/*
			if($CC != ''){   
				include ("../../../../lib/adodb/adodb.inc.php");
				include('../../MASTER/config/conect.php');	 
				
				$SQL=" SELECT DISTINCT(N4_DESC)
						FROM dbo.VW_EERR_JERARQUIA_CENTROSCOSTOS
						WHERE N4_ORIG IN (".$CC.") ";
				$RES = $DB2->Execute($SQL); 
				foreach($RES as $k => $ROW)  { 
					$DESC_CC .= '"<u>'.utf8_encode($ROW[0]).'</u>",'; 
				}
			} 
		*/
		?> 
		<table id="example-advanced" class="table table-bordered table-striped table-condensed flip-content">
		<caption> 
			<a href="#" onClick="jQuery('#example-advanced').treetable('expandAll'); return false;" class="btn btn-circle btn-xs green"><i class="fa fa-plus"></i> Maximizar Todo</a>
			<a href="#" onClick="jQuery('#example-advanced').treetable('collapseAll'); return false;" class="btn btn-circle btn-xs red"><i class="fa fa-minus"></i> Minimizar Todo</a>
		</caption> 
		<thead>
			<tr>
				<?php
					foreach ($total_escenarios as $ROW_ESC){   
				?>
				<th colspan="<?php echo $ROW_ESC[0]+1; ?>" bgcolor="#366092"><center><h2 style="color:#FFFFFF;">PRESUPUESTO <?php echo $agno; ?></h2></center></th> 
				<?php } ?>
			</tr>
			<tr>	
				<th bgcolor="#366092" width="30%" style="border:0px;"><h5 style="color:#FFFFFF;">EE.RR.</h5></th>	 
				<?php  				 
					foreach ($escenarios as $e){ 
				?>
			  	<th bgcolor="#366092" style="width:10%; border:0px;">
					<h5 style="color:#FFFFFF;">
						<?php echo utf8_encode($e[2]); ?>
						<a style="color:#FFFFFF;" class="tooltips" href="javascript:;" data-original-title="<?php echo utf8_encode($e[5]); ?>"><i class="fa fa-info-circle"></i></a>
					</h5>
				</th> 
				<?php 
					} 
				?>  				
			</tr>			
		</thead>
		<tbody>
			<?php  
			include ("../../../../lib/adodb/adodb.inc.php");
			include('../../MASTER/config/conect.php');		
								
			// MENU PRINCIPAL
			$SQL1 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_N1 ".$id_usuario.""; 
			$C1 = $DB2->Execute($SQL1); 
			foreach($C1 as $k => $R1) 
			{	 
				echo '<tr data-tt-id="'.$R1[0].'">';
					echo '<td>'.utf8_encode($R1[1]).'</td>'; 
					//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
					foreach ($escenarios as $e){ 
					echo '<td>';
						
						foreach ($agrupadores as $a){   
							if ($R1[0] == $a[1] && $e[0] == $a[2])
							{
								if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
								else if ($a[3] > 0)	$color = 'style="color:#000000;"';
										
								//echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R1[0].'&nivel='.$R1[6].'" rel="modal:open">'; 
							?>
								<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R1[0]; ?>&nivel=<?php echo $R1[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>> 
							<?php 
									if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
									if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
									if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
									if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
								echo '</a>'; 																																		
							}
						} 	
					echo '</td>';  
					} 
					//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  
				echo '</tr>';
			   
				if ($R1[3] =="submenu")
				{
					// SUB MENU
					$i2=1;
					$SQL2="EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R1[0]." ";
					$C2 = $DB2->Execute($SQL2); 
					foreach($C2 as $k => $R2) 
					{
						if($R2[4] == 'Agrupador'){
							$color = 'style="background:#dce6f1; color:#000;"';
						} 
						else{
							$color = 'style="background:#FFF; color:#000;"';
						} 
						
						echo '<tr '.$color.' data-tt-id="'.$R1[0].$R1[0].$i2.'" data-tt-parent-id="'.$R1[0].'">';
								echo '<td>'.utf8_encode($R2[1]).'</td>';  
								
								//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
								foreach ($escenarios as $e){ 
								echo '<td>'; 
									foreach ($agrupadores as $a){   
										if ($R2[0] == $a[1] && $e[0] == $a[2])
										{
											if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
											else if ($a[3] > 0)	$color = 'style="color:#000000;"';
													
											// echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R2[0].'&nivel='.$R2[6].'" rel="modal:open">'; 
											?>
												<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R2[0]; ?>&nivel=<?php echo $R2[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>>
											<?php 
												if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
												if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
												if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
												if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
											echo '</a>'; 																																		
										}
									} 	
								echo '</td>';  
								} 
								//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  
						echo '</tr>';						
							$N3 = $R1[0].$R1[0].$i2;  
							$i2++;
										
							if ($R2[3] =="submenu")
							{
								$i3=1; 
								$SQL3=" EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R2[0]."  ";
								$C3 = $DB2->Execute($SQL3); 
								foreach($C3 as $k => $R3) 
								{
									if($R3[4] == 'Agrupador'){
										$color = 'style="background:#dce6f1; color:#000;"';
									}
									else{
										$color = 'style="background:#FFF; color:#000;"';
									}
						 
								echo '<tr '.$color.' data-tt-id="'.$N3.$R2[0].$i3.'" data-tt-parent-id="'.$N3.'">';
									echo '<td>'.utf8_encode($R3[1]).'</td>'; 
									
									//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
									foreach ($escenarios as $e){ 
									echo '<td>'; 
										foreach ($agrupadores as $a){   
											if ($R3[0] == $a[1] && $e[0] == $a[2])
											{
												if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
												else if ($a[3] > 0)	$color = 'style="color:#000000;"';
														
												//echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R3[0].'&nivel='.$R3[6].'" rel="modal:open">'; 
												?>
													<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R3[0]; ?>&nivel=<?php echo $R3[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>>
												<?php 
													if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
													if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
													if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
													if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
												echo '</a>'; 																																		
											}
										} 	
									echo '</td>';  
									} 
									//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  									
								echo '</tr>';
								$N4 = $N3.$R2[0].$i3; 	
								$i3++;
												
								if ($R3[3] =="submenu")
								{
									$i4 = 1; 
									$SQL4 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R3[0].""; 
									$C4 = $DB2->Execute($SQL4); 
									foreach($C4 as $k => $R4) 
									{
										if($R4[4] == 'Agrupador'){
											$color = 'style="background:#dce6f1; color:#000;"';
										}
										else{
											$color = 'style="background:#FFF; color:#000;"';
										} 
										echo '<tr '.$color.' data-tt-id="'.$N4.$R3[0].$i4.'" data-tt-parent-id="'.$N4.'">';
											echo '<td>'.Mayus(utf8_encode($R4[1])).'</td>'; 
											
											//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
											foreach ($escenarios as $e){ 
											echo '<td>'; 
												foreach ($agrupadores as $a){   
													if ($R4[0] == $a[1] && $e[0] == $a[2])
													{
														if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
														else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																
														// echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R4[0].'&nivel='.$R4[6].'" rel="modal:open">'; 
														?>
															<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R4[0]; ?>&nivel=<?php echo $R4[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>>
														<?php 
															if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
															if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
															if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
															if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
														echo '</a>'; 																																		
													}
												}  	
											echo '</td>';  
											} 
											//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** //  
											
										echo '</tr>';	
										$N5 = $N4.$R3[0].$i4; 
										$i4++;	
										
										if ($R4[3] =="submenu"){	
											$i5 = 1; 
											$SQL5 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R4[0].""; 
											$C5 = $DB2->Execute($SQL5); 
											foreach($C5 as $k => $R5) 
											{
												if($R5[4] == 'Agrupador'){
													$color = 'style="background:#dce6f1; color:#000;"';
												}
												else{
													$color = 'style="background:#FFF; color:#000;"';
												}
			 
												echo '<tr '.$color.' data-tt-id="'.$N5.$R4[0].$i5.'" data-tt-parent-id="'.$N5.'">';
													echo '<td><b>'.utf8_encode($R5[1]).'</b></td>'; 
													
													//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ************************** // 
													foreach ($escenarios as $e){ 
													echo '<td>'; 
														foreach ($agrupadores as $a){   
															if ($R5[0] == $a[1] && $e[0] == $a[2])
															{
																if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
																else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																		
																//echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R5[0].'&nivel='.$R5[6].'" rel="modal:open">'; 
																?>
																	<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R5[0]; ?>&nivel=<?php echo $R5[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>>
																<?php 
																	if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
																	if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
																	if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
																	if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
																echo '</a>'; 																																		
															}
														}  	
													echo '</td>';  
													}
													//************************** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END ***************************** // 
													
												echo '</tr>';
												$N6 = $N5.$R4[0].$i5; 	
												$i5++;	
												
												if ($R5[3] =="submenu"){	
													$i6 = 1; 
													$SQL6 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R5[0].""; 
													$C6 = $DB2->Execute($SQL6); 
													foreach($C6 as $k => $R6) 
													{	
														if($R6[4] == 'Agrupador'){
															$color = 'style="background:#dce6f1; color:#000;"';
														}
														else{
															$color = 'style="background:#FFF; color:#000;"';
														}
		 
														echo '<tr '.$color.' data-tt-id="'.$N6.$R5[0].$i6.'" data-tt-parent-id="'.$N6.'">';
															echo '<td>'.utf8_encode($R6[1]).'</td>'; 
															
															//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ********// 
															foreach ($escenarios as $e){ 
															echo '<td>'; 
																foreach ($agrupadores as $a){   
																	if ($R6[0] == $a[1] && $e[0] == $a[2])
																	{
																		if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
																		else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																				
																		// echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R6[0].'&nivel='.$R6[6].'" rel="modal:open">'; 
																		?>
																			<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R6[0]; ?>&nivel=<?php echo $R6[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>>
																		<?php 
																			if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
																			if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
																			if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
																			if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
																		echo '</a>'; 																																		
																	}
																} 	
															echo '</td>';  
															}
															//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END    ********// 
															
														echo '</tr>';
														$N7 = $N6.$R5[0].$i6; 
														$i6++;
														if ($R6[3] =="submenu"){	
															$i7 = 1; 
															$SQL7 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R6[0].""; 
															$C7 = $DB2->Execute($SQL7); 
															foreach($C7 as $k => $R7) 
															{	
																if($R7[4] == 'Agrupador'){
																	$color = 'style="background:#dce6f1; color:#000;"';
																}
																else{
																	$color = 'style="background:#FFF; color:#000;"';
																} 
																echo '<tr '.$color.' data-tt-id="'.$N7.$R6[0].$i7.'" data-tt-parent-id="'.$N7.'">';
																	echo '<td>'.utf8_encode($R7[1]).'</td>'; 
																	
																	//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  ********// 
																	foreach ($escenarios as $e){ 
																	echo '<td>'; 
																		foreach ($agrupadores as $a){   
																			if ($R7[0] == $a[1] && $e[0] == $a[2])
																			{
																				if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
																				else if ($a[3] > 0)	$color = 'style="color:#000000;"';
																						
																				// echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R7[0].'&nivel='.$R7[6].'" rel="modal:open">'; 
																				?>
																					<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R7[0]; ?>&nivel=<?php echo $R7[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>>
																				<?php 
																					if ($e[6] == 'Regular')   	echo number_format($a[3], 0, ".", "."); 
																					if ($e[6] == 'Negrita')		echo '<b>'.number_format($a[3], 0, ".", ".").'</b>'; 
																					if ($e[6] == 'Cursiva')		echo '<i>'.number_format($a[3], 0, ".", ".").'</i>'; 
																					if ($e[6] == 'Subrayado')	echo '<u>'.number_format($a[3], 0, ".", ".").'</u>'; 
																				echo '</a>'; 																																		
																			}
																		} 
																	echo '</td>';  
																	} 
																	//******** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END    ********// 
														
																echo '</tr>';
																$N8 = $N7.$R6[0].$i7; 
																$i7++;	
																if ($R7[3] =="submenu"){	
																	$i8 = 1; 
																	$SQL8 = "EXEC EERR_JERARQUIA_CUENTACONTABLE_NX ".$id_usuario.", ".$R7[0].""; 
																	$C8 = $DB2->Execute($SQL8); 
																	foreach($C8 as $k => $R8) 
																	{
																		if($R8[4] == 'Agrupador'){
																			$color = 'style="background:#dce6f1; color:#000;"';
																		}
																		else{
																			$color = 'style="background:#FFF; color:#000;"';
																		}
 
																		echo '<tr '.$color.' data-tt-id="'.$N8.$R7[0].$i8.'" data-tt-parent-id="'.$N8.'">';
																			echo '<td>'.utf8_encode($R8[1]).'</td>'; 
																			//** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : BEGIN  **//
																			// IMPRIMO CUENTA CONTABLE //
																			foreach ($escenarios as $e){  
																				echo '<td>'; 
																					foreach ($ctacbles as $c){ 
																						if (trim($R8[5]) == trim($c[0]) && $e[0] == $c[1])
																						{
																							if ($c[2] < 0)		$color = 'style="color:#FF0000;"'; 
																							else if ($c[2] > 0)	$color = 'style="color:#000000;"';
																									
																							//echo '<a '.$color.' href="DETAILS_SEARCH2.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$R8[0].'&nivel='.$R8[6].'" rel="modal:open">'; 
																						?>
																							<a href="DETAILS_SEARCH2.php?agno=<?php echo $agno; ?>&scenario=<?php echo $e[0]; ?>&ctacble=<?php echo $R8[0]; ?>&nivel=<?php echo $R8[6]; ?>&CC=<?php echo $CC; ?>&meses=<?php echo $meses; ?>&sede=<?php echo $sede; ?>" target="_blank" onClick="window.open(this.href, this.target, 'width=1800,height=750'); return false;" <?php echo $color; ?>>
																						<?php
																							if ($e[6] == 'Regular')   	echo number_format($c[2], 0, ".", "."); 
																							if ($e[6] == 'Negrita')		echo '<b>'.number_format($c[2], 0, ".", ".").'</b>'; 
																							if ($e[6] == 'Cursiva')		echo '<i>'.number_format($c[2], 0, ".", ".").'</i>'; 
																							if ($e[6] == 'Subrayado')	echo '<u>'.number_format($c[2], 0, ".", ".").'</u>';   
																							echo '</a>'; 																																		
																						}  
																					}  																					
																				echo '</td>';  
																			}																										
																			//** CANTIDAD DE COLUMNAS POR ESCENARIOS PUBLICADOS A TODA LA INSTITUCION : END **// 
																		echo '</tr>'; 			 
																	} // NIVEL 8
																}  
															}
														}	 
													}
												} 
											}															
										} 
									}   
								}  	
							}           
						}   	  
					}  
				} 
			} // FIN WHILE
			$DB->Close();
			?> 
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
		
		<script>
		jQuery(document).ready(function() {       
			Metronic.init(); // init metronic core components
			Layout.init(); // init current layout
			Demo.init(); // init demo features  
			ComponentsDropdowns.init(); 
			$('select.form-select').select2();
		});
		</script> 

	</body>
</html>
