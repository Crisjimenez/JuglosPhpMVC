<script>

function recargar(){

	document.forms[1].action = "../controller/ventas.php?accion=recargarVenta";
	document.forms[1].submit();
}
</script>

<div class="container">
	 <div class="jumbotron">
        <h1>Gesti&oacute;n de Venta</h1>
        <p>En este módulo podrás gestionar toda la información referente a los ventas, creación, modificación y eliminación de ventas 
				también podrás, consultar los ventas actuales.</p>
      </div>
	 
	 
	 <!-- gestion de Venta -->
	 <form class="form-horizontal" id="idForma" method="post" action="../controller/venta.php?accion=guardarVenta">
		<fieldset>
		
		<input type="hidden" name="cedulaID" value="<?php echo $venta['cedula'] ?>"  id="cedulaID" />

<?php
	include ("../model/connection.php");
	$listaProductosSelect = mysqli_query($conexion,"select * from tbl_productos;")	
					or die("Problemas en el select".mysqli_error($conexion));
?>	

		<div class="form-group">
		  <label class="col-md-4 control-label" for="idProductoID">Producto *</label>
		  <div class="col-md-2">
			<div class="input-group">
				<select id="idProductoID" name="idProductoID" class="form-control" 
						value="<?php echo $venta['ID_PRODUCTOS'] ?>" required="" >
					<option value="">-- Seleccione una opción --</option>
					<?php while($data = mysqli_fetch_array($listaProductosSelect)){ ?>
						<option value="<?php echo $data['ID'] ?>" <?php if($data['ID'] == $venta['ID_PRODUCTOS']){ echo "selected"; }else{echo "";}?> ><?php echo $data['NOMBRE'] ?></option>
					<?php } ?>
				</select>
			</div>
		  </div>
		</div>
		
		<!-- Text input direccion  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="cantidadID">Cantidad : *</label>  
		  <div class="col-md-5">
			<input id="cantidadID" name="cantidadID" class="form-control"value="<?php echo $venta['CANTIDAD'] ?>"
					 placeholder="Cantidad" type="text" required="">
		  </div>
		</div>
		
		<!-- Text input correo  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="valorUnitarioID">Valor unitario: *</label>  
		  <div class="col-md-5">
			<input id="valorUnitarioID" name="valorUnitarioID" class="form-control"value="<?php echo $venta['VALOR_UNITARIO'] ?>" 
				placeholder="Valor unitario" type="text"  required="">
		  </div>
		</div>
		
		<!-- Text input contraseña  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="ivaID">Iva: *</label>  
		  <div class="col-md-5">
			<input id="ivaID" name="ivaID" class="form-control"value="<?php echo $venta['IVA'] ?>" 
				placeholder="iva" type="text" required="" >
		  </div>
		</div>
		
		<!-- Text input rol  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="totalID">Total: *</label>  
		  <div class="col-md-5">
			<input id="totalID" name="totalID" class="form-control"value="<?php echo $venta['TOTAL'] ?>" 
				placeholder="Total" type="text" required="" >
		  </div>
		</div>
		
		<!-- Text input id  -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="idID">Id: *</label>  
		  <div class="col-md-5">
			<input id="idID" name="idID" class="form-control"value="<?php echo $venta['ID'] ?>" 
					placeholder="Id" type="text" required="">
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
			
			<a href="../controller/ventas.php?accion=listarVenta" class="btn btn-danger"><span class="glyphicon glyphicon-floppy-remove"></span> Cancelar</a>
		  </div>
		</div>

		</fieldset>
	</form>
	 <!-- gestion de carreras -->

</div> <!-- /container -->
