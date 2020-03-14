<script>

function recargar(){

	document.forms[1].action = "../controller/usuarios.php?accion=recargarUsuarios";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Usuarios</h1>
        <p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
      </div>
	 
	 
	 <!-- gestion de Usuarios -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/usuarios.php?accion=guardarUsuarios">
		<fieldset>
		
		<input type="hidden" name="cedulaID" value="<?php echo $usuarios['cedula'] ?>"  id="cedulaID" />
		
		<!-- Text input cedula -->
		<?php if($_SESSION["operacion"] == 'guardar' ){ ?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula: *</label>  
			  <div class="col-md-4">
			  <input id="cedulaID" name="cedulaID" type="text" placeholder="Cedula" value="<?php echo $usuarios['CEDULA'] ?>" class="form-control input-md" required="">
				
			  </div>
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
			<input type="hidden" name="cedulaID" value="<?php echo $usuarios['CEDULA'] ?>"  id="cedulaID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="cedulaID">Cedula: </label>  
			  <div class="col-md-4">
				<?php echo $usuarios['CEDULA'] ?>
			  </div>
			</div>
		<?php } ?> 

		<!-- Text input nombre  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="nombreCompletoID">Nombre: *</label>  
		  <div class="col-md-5">
		  <input id="nombreID" name="nombreID" type="text" value="<?php echo $usuarios['NOMBRE'] ?>" placeholder="Nombre" class="form-control input-md" required="">
		  </div>
		</div>

		<!-- Text input telefono -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="usuarioID">telefono: *</label>
		  <div class="col-md-4">
			<div class="input-group">
			  <input id="telefonoID" name="telefonoID" class="form-control"value="<?php echo $usuarios['TELEFONO'] ?>" placeholder="Telefono" type="text" required="">
			</div>
		</div>	
		</div>	
		
		<!-- Text input direccion  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Dirección : *</label>  
		  <div class="col-md-5">
			<input id="direccionID" name="direccionID" class="form-control"value="<?php echo $usuarios['DIRECCION'] ?>" placeholder="Direccion" type="text" required="">
		  </div>
		</div>
		
		<!-- Text input correo  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Correo electronico: *</label>  
		  <div class="col-md-5">
			<input id="correoID" name="correoID" class="form-control"value="<?php echo $usuarios['CORREO'] ?>" placeholder="Correo" type="text" required="">
		  </div>
		</div>
		
		<!-- Text input contraseña  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Contraseña: *</label>  
		  <div class="col-md-5">
			<input id="contrasenaID" name="contrasenaID" class="form-control"value="<?php echo $usuarios['CONTRASENA'] ?>" placeholder="Correo" type="text" required="">
		  </div>
		</div>
		
		<!-- Text input rol  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Rol: *</label>  
		  <div class="col-md-5">
			<input id="rolID" name="rolID" class="form-control"value="<?php echo $usuarios['ROL'] ?>" placeholder="Rol" type="text" required="">
		  </div>
		</div>
		
		<!-- Text input id  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="passID">Id: *</label>  
		  <div class="col-md-5">
			<input id="idID" name="idID" class="form-control"value="<?php echo $usuarios['ID'] ?>" placeholder="Id" type="text" required="">
		  </div>
		</div>

		
		<!-- Button (Double) -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="guardarID"></label>
		  <div class="col-md-8">
			<?php if($_SESSION["operacion"] == 'guardar' ){?>
				<button class="btn btn-primary" type="submit" value="Guardar"><span class=" glyphicon glyphicon-floppy-saved"> </span> Guardar</button>				
			<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
				<button class="btn btn-primary" type="submit" value="Modificar"><span class=" glyphicon glyphicon-floppy-saved"> </span> Modificar</button>	
			<?php } ?>  
			
			<a href="../controller/usuarios.php?accion=listarUsuarios" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
