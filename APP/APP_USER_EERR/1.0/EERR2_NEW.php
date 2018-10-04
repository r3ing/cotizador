<?php
	include('../../MASTER/include/verifyAPP.php');
	
	include ("../../../../lib/adodb/adodb.inc.php");
	include('../../MASTER/config/conect.php');			
?> 
<!DOCTYPE html> 
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" /> 
<head> 
<link rel="stylesheet" type="text/css" href="css/jquery.treeTable.css" media="screen" />
<style> 
	#tree { 
		width: 100%;
		overflow: auto;
		border: 1px solid #888;
		border-collapse: collapse;
		
	}
	
	#tree thead {
		background: url(images/bg-table-thead.png) repeat-x scroll left top #AAAAAA
		
	}
	#tree thead th {
		padding-left: 2em;
		text-align: left;
		font-family:Verdana, Arial, Helvetica, sans-serif; 
		font-size:12px; 
	}
	
	#tree tbody td {
		width: 33%;
		padding-left: 2em;
		font-family:Verdana, Arial, Helvetica, sans-serif; 
		font-size:12px; 
	}
	
	
	#tree span {
		background-position: left center;
		background-repeat: no-repeat;
		padding: 0.2em 0 0.2em 1.5em;
	}
	#tree span.folder {
		background-image: url(images/folder.png);
	}
	#tree span.file {
		background-image: url(images/page_white_text.png);
	}
	#tree span.rar {
		background-image: url(images/rar.png);
	}
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js" type="text/javascript"></script>  
<!-- <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>  -->
 
<script src="js/jquery.treeTable.js" type="text/javascript"></script> 
 
<script type="text/javascript">
	$(document).ready(
		function() {
			$("#tree").treeTable();
		}
	);
</script>
<?php 
	include ("../HEAD.php"); 
?>  
<!-- MODAL -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js" type="text/javascript" charset="utf-8"></script>

 	<script src="js/jquery.modal.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="highlight/jquery.modal.css" type="text/css" media="screen" />
	
	<script src="highlight/highlight.pack.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8"> hljs.initHighlightingOnLoad(); </script>
	<link rel="stylesheet" href="highlight/github.css" type="text/css" media="screen" />
  
   	<style type="text/css" media="screen"> 
		body { font: normal 18px/1.6 'Open Sans', "Helvetica Neue", Arial, sans-serif; font-weight: 300; color: #777; padding: 2em 5%; width: 80%; max-width: 1500px; margin: 0 auto; background: #fff; }
		small { color: #aaa; }
		h1,h2,h3,h4 { color: #444; font-weight: 700; font-size: 1.6em; letter-spacing: -1px; }
		p code, li code {background:#ffffcc; color: #444; }
		pre { font-size: 12px; line-height: 18px; }
		pre code { overflow: scroll; padding: 1em; border-radius: 10px; }
		hr { height: 10px; background: #eee; border: none; }
 
	
		body > .modal {
		  display: none;
		}
	
		/* Example 2 (login form) */
		.login_form.modal {
		  border-radius: 0;
		  line-height: 18px;
		  padding: 0;
		  font-family: "Lucida Grande", Verdana, sans-serif;
		}
	
		.login_form h3 {
		  margin: 0;
		  padding: 10px;
		  color: #fff;
		  font-size: 11px;
		  background: -moz-linear-gradient(top, #2e5764, #1e3d47);
		  background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #1e3d47),color-stop(1, #2e5764));
		}
	
		.login_form.modal p { padding: 20px 30px; border-bottom: 1px solid #ddd; margin: 0;
		  background: -webkit-gradient(linear,left bottom,left top,color-stop(0, #eee),color-stop(1, #fff));
		  overflow: hidden;
		}
		.login_form.modal p:last-child { border: none; }
		.login_form.modal p label { float: left; font-weight: bold; color: #333; font-size: 13px; width: 110px; line-height: 22px; }
		.login_form.modal p input[type="text"],
		.login_form.modal p input[type="password"] {
		  font: normal 12px/18px "Lucida Grande", Verdana;
		  padding: 3px;
		  border: 1px solid #ddd;
		  width: 200px;
		}
	
	
		.part {
		  display: none;
		}
	
	  </style>
	  
</head>
<!-- END HEAD -->
<!-- BEGIN BODY --> 
<body style="background-color:#FFFFFF;width:98%;"> 
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
		
		if ($_GET["id"] == '')
		$id_usuario	= $vari[0];
		else 
		$id_usuario = $_GET["id"];   
		
		error_reporting(E_ALL ^ E_NOTICE);
			
		$agno = date("Y");
		
		include ("LIB.php");
		include ("SQL.php");

		$ctacbles		=	get_permisos_ctacble($data);
		$escenarios		= 	get_escenarios($data);  	
		$jer_ctacble	= 	get_jerarquia_ctacble($data);
		$agrupadores	= 	get_total_agrupadores($data);																		  
	?>   	 
	<table id="tree" class="treeTable"> 
		<thead>
			<tr>
				<th colspan="7" bgcolor="#366092"><center><h2 style="color:#FFFFFF;">Escenarios 2016</h2></center></th> 
			</tr>
			<tr>	
				<th bgcolor="#366092" width="20%"><h5 style="color:#FFFFFF;">EE.RR.</h5></th>	 
				<?php  				 
					$SQL = "EXEC EERR_ESCENARIOS"; 
					$C1 = $DB2->Execute($SQL); 
					foreach($C1 as $k => $row) 
					{
				?>
			  <th bgcolor="#366092" style="width:10%"><h5 style="color:#FFFFFF;"><?php echo utf8_encode($row[2]); ?></h5></th> 
				<?php 
					}
					$DB2->Close(); 
				?>  				
			</tr>			
		</thead>
		<tbody> 
			<?php    	  
				foreach($jer_ctacble as $row) 
				{  
					$j=1; 	
				 	if ($row[2] == 1) {  
			?>
					<tr id="node-<?php echo $row[0].$row[0].$j;  ?>">
						<td><?php echo utf8_encode($row[1]);  ?></td>
						<?php 
						foreach ($escenarios as $e){  
							echo '<td>'; 
								if ($row[4]=='Agrupador')
								{
									foreach ($agrupadores as $a){   
										if ($row[0] == $a[1] && $e[0] == $a[2])
										{
											if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
											else if ($a[3] > 0)	$color = 'style="color:#000000;"';
													
											echo '<a '.$color.' href="details.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$row[0].'&nivel=10" rel="modal:open">'; 
												echo number_format($a[3], 0, ".", "."); 
											echo '</a>'; 																																		
										}
									} 			
								}
								else 
								{
									foreach ($ctacbles as $c){   
										if ($row[5] == $c[1] && $e[0] == $c[2])
										{
											if ($c[3] < 0)		$color = 'style="color:#FF0000;"'; 
											else if ($c[3] > 0)	$color = 'style="color:#000000;"';
													
											echo '<a '.$color.' href="details.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$row[0].'&nivel=10" rel="modal:open">'; 
												echo number_format($c[3], 0, ".", "."); 
											echo '</a>'; 																																		
										}
									} 
								} 
							echo '</td>';  
						} 
						?>
					</tr> 
			<?php  
					$j++;
					} 
					$i=1;  					 		  
			?>
					<tr id="node-<?php echo $row[0].$row[0].$i;  ?>" class="child-of-node-<?php echo $row[2].$row[2].$i;  ?>">
						<td><?php echo utf8_encode($row[1]);  ?></td>
						<?php 
						foreach ($escenarios as $e){  
							echo '<td>'; 
								if ($row[4]=='Agrupador')
								{  
									foreach ($agrupadores as $a){   
										if ($row[0] == $a[1] && $e[0] == $a[2])
										{
											if ($a[3] < 0)		$color = 'style="color:#FF0000;"'; 
											else if ($a[3] > 0)	$color = 'style="color:#000000;"';
													
											echo '<a '.$color.' href="details.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$row[0].'&nivel=10" rel="modal:open">'; 
												echo number_format($a[3], 0, ".", "."); 
											echo '</a>'; 																																		
										}
									} 	 
								}
								else 
								{
									foreach ($ctacbles as $c){   
										if ($row[5] == $c[1] && $e[0] == $c[2])
										{
											if ($c[3] < 0)		$color = 'style="color:#FF0000;"'; 
											else if ($c[3] > 0)	$color = 'style="color:#000000;"';
													
											echo '<a '.$color.' href="details.php?agno='.$agno.'&scenario='.$e[0].'&ctacble='.$row[0].'&nivel=10" rel="modal:open">'; 
												echo number_format($c[3], 0, ".", "."); 
											echo '</a>'; 																																		
										}
									} 
								} 
							echo '</td>';  
						} 
						?>
					</tr> 
			<?php 	
					$i++;   
				}
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
</body> 
</html>   
