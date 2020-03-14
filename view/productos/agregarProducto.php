<script>

function recargar(){

	document.forms[1].action = "../controller/productos.php?accion=recargarProducto";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Productos</h1>
        <p>En este módulo podrás gestionar toda la información referente a los productos, creación, modificación y eliminación de usuarios 
				también podrás, consultar los productos actuales.</p>
      </div>
	 
	 
	 <!-- gestion de Product0 -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/productos.php?accion=guardarProducto">
		<fieldset>
		
		<input type="hidden" name="productoID" value="<?php echo $producto['nombre'] ?>"  id="usuariosID" />
		
		<!-- Text input cedula -->
		<?php if($_SESSION["operacion"] == 'guardar' ){ ?>
			<div class="form-group">
			  <label class="col-md-4 control-label" for="idID">ID: *</label>  
			  <div class="col-md-4">
			  <input id="idID" name="idID" type="text" placeholder="id" value="<?php echo $producto['ID'] ?>" class="form-control input-md" required="">
				
			  </div>
				<!-- Text input  nombre -->
			</div>
		<?php }else if($_SESSION["operacion"] == 'modificar' ){ ?>  
			<input type="hidden" name="idID" value="<?php echo $producto['ID'] ?>"  id="idID" />
			<div class="form-group">
			  <label class="col-md-4 control-label" for="idID">ID: </label>  
			  <div class="col-md-4">
				<?php echo $producto['ID'] ?>
			  </div>
			</div>
		<?php } ?> 

		<div class="form-group">
			  <label class="col-md-4 control-label" for="nombreID">Nombre: *</label>  
			  <div class="col-md-4">
			  <input id="nombreID" name="nombreID" type="text" placeholder="nombre" value="<?php echo $producto['NOMBRE'] ?>" class="form-control input-md" required="">
				
			  </div>
				<!-- Text input  nombre -->
			</div>

		<!-- Text input cantidad  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="cantidadID">cantidad: *</label>  
		  <div class="col-md-5">
		  <input id="cantidadID" name="cantidadID" type="text" value="<?php echo $producto['CANTIDAD'] ?>" placeholder="cantidad" class="form-control input-md" required="">
		  </div>
		</div>

		<!-- Text input fecha DESCRIPCION -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="descripcionID">descripcion : *</label>  
		  <div class="col-md-5">
		  
		  <div class='input-group date' id='datetimepicker8' >
				<input id="descripcionID" name="descripcionID" type="text" value="<?php echo $producto['DESCRIPCION'] ?>" placeholder="descripcion" class="form-control input-md" required="">
			</div>

		  <!-- input id="nombreCompletoID" name="nombreCompletoID" type="text" placeholder="Nombre Completo" class="form-control input-md" required="" -->
		  </div>
		</div>

		<!-- Text input estado -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="estadoID">estado: *</label>
		  <div class="col-md-4">
			<div class="input-group">
			  <input id="estadoID" name="estadoID" class="form-control"value="<?php echo $producto['ESTADO'] ?>" placeholder="estado" type="text">
			</div>
		</div>	
		</div>	
		
		<!-- Text input  iva -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="ivaID">iva : *</label>  
		  <div class="col-md-5">
			<input id="ivaID" name="ivaID" class="form-control"value="<?php echo $producto['IVA'] ?>" placeholder="iva" type="text" required="">
		  </div>
		</div>
<!-- Text input  valor -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="valorID">valor unitario: *</label>  
		  <div class="col-md-5">
			<input id="valorID" name="valorID" class="form-control"value="<?php echo $producto['VALOR_UNITARIO'] ?>" placeholder="valor" type="text" required="">
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
			
			<a href="../controller/productos.php?accion=listarProducto" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
