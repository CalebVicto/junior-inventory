 
<form class="form-horizontal" method="post" id="guardar_tecnico" name="guardar_tecnico">
<!-- Modal -->
<div class="modal fade" id="tecnico_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo Técnico</h4>
      </div>
      <div class="modal-body">
	  
      	  
	  
	  

	  <div class="form-group">
		<label for="user_id" class="col-sm-2 control-label">Usuario</label>
		<div class="col-sm-9">
			<select class="form-control" name="user_id" id="user_id" required>
				<option value="">-- Selecciona una opción --</option>
				<?php
				$sql="select * from users";
				$query=mysqli_query($con,$sql);
				while ($rw=mysqli_fetch_array($query)){
					?>
					<option value="<?php echo $rw['user_id'];?>"><?php echo $rw['fullname'];?></option>	
					<?php
				}
				?>
			</select> 
		</div>
	  </div>
	  
	  

	
	

	 
	  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" id="guardar_datos" class="btn btn-primary">Registrar</button>
      </div>
    </div>
  </div>
</div>
</form>