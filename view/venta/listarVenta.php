<script>

	var variables = "";

	function deleteC(cedulaVar){
		variables = cedulaVar;
	}

	function eliminar(){
		document.forms[1].action = "../controller/ventas.php?accion=eliminarVenta&codigoEliminarID="+variables;
		document.forms[1].submit();
	}

	function abrirAsociar(){
		
	}

</script>

<?php
include ("../model/connection.php");
$listaVenta = mysqli_query($conexion,"select * from tbl_factura F, tbl_venta v, tbl_productos p
WHERE F.id = v.ID and v.ID_PRODUCTOS = p.ID;")	
				or die("Problemas en el select".mysqli_error($conexion));
?>
<div class="container">
	 
	<div class="jumbotron">
		<h1>Gesti&oacute;n de Ventas</h1>
		<p>En este módulo podrás gestionar toda la información referente a los ventas, creación, modificación y eliminación de ventas 
				también podrás, consultar los ventas actuales.</p>
	</div>
	 
	<br></br>
	
	<!-- fin filtros -->

		
		
     <!-- tabla de lista de ventas -->
	  
	<div align="right">
	    <a>
			<a href="../controller/venta.php?accion=agregarVenta" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Agregar</a>
		</a>
	</div>
	<legend>Listado de venta</legend>
			 
	<div class="span7">   
		<div class="widget stacked widget-table action-table">
					
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="td-actions">Modificar</th>
							<th>Fecha</th>
							<th>Total</th>
							<th>Total Iva</th> 
							<th>Venta</th> 		
							<th>Producto</th> 		
						</tr>
					</thead>
					<tbody>
						<?php while($data = mysqli_fetch_array($listaVenta)){ ?>
							<tr>
								<td class="td-actions">
									<p data-placement="top" data-toggle="tooltip" title="Modificar">
										<a class="btn btn-primary btn-xs" data-title="Modificar" href="../controller/venta.php?accion=editarVenta&id=<?php echo $data['id'] ?>" >
									 <span class="glyphicon glyphicon-pencil"></span></a></p>
								</td>
								<td><?php echo $data['FECHA'] ?></td>
								<td><?php echo $data['TOTAL'] ?></td>
								<td><?php echo $data['TOTAL_IVA'] ?></td>
								<td><?php echo $data['ID_USUARIO'] ?></td>
								<td><?php echo $data['NOMBRE'] ?></td>
							</tr>
							<?php } ?>

					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
						
		</div>		

	
	</div> <!-- /widget-content -->
					
</div> <!-- container -->
