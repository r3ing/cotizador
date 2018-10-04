<?php include('../../MASTER/include/verifyAPP.php');  ?>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
<div class="modal fade bs-modal-lg" id="basic<?php // echo $id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title" style="color:#000;">NOTAS DE: <?php // echo mb_strtoupper(Mayus($asunto)); ?></h4>
			</div>
			<div class="modal-body" style="color:#000;">
				<!-- BEGIN PAGE CONTENT-->
				<div class="portlet light">
					<div class="portlet-body">
						<div class="row">
							<div class="col-md-12">
								<div id="notas_user<?php //echo $id;?>" style="height: 300px; overflow: scroll;"> </div>
							</div>
						</div>
			
						<!-- BEGIN FORMULARIO -->
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12">
									<div id="mensajes<?php //echo $id; ?>" style="z-index:999999;padding-top:5px;"> </div>
								</div> 
							</div> 
						</div>
						<!-- END FORMULARIO -->
					</div>
				</div>
				<!-- END PAGE CONTENT--> 
			</div>
			<div class="modal-footer"> 
				<button type="button" class="btn blue" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>
</div>
