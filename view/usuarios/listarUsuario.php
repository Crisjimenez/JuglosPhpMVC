<script>

	var variables = "";

	function deleteC(cedulaVar){
		variables = cedulaVar;
	}

	function eliminar(){
		document.forms[1].action = "../controller/usuarios.php?accion=eliminarUsuario&codigoEliminarID="+variables;
		document.forms[1].submit();
	}

	function abrirAsociar(){
		
	}

</script>

<?php
include ("../model/connection.php");
$listaUsuario = mysqli_query($conexion,"select * from tbl_usuario;")	
				or die("Problemas en el select".mysqli_error($conexion));
?>
<div class="container">
	 
	<div class="jumbotron">
		<h1>Gesti&oacute;n de Usuarios</h1>
		<p>En este módulo podrás gestionar toda la información referente a los usuarios, creación, modificación y eliminación de usuarios 
				también podrás, consultar los usuarios actuales.</p>
	</div>
	 
	<br></br>
	
	<!-- fin filtros -->

		
		
     <!-- tabla de lista de usuarios -->
	  
	<div align="right">
	    <a>
			<a href="../controller/usuarios.php?accion=agregarUsuarios" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Agregar</a>
		</a>
	</div>
	<legend>Listado de usuario</legend>
			 
	<div class="span7">   
		<div class="widget stacked widget-table action-table">
					
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th class="td-actions">Modificar</th>
							<th class="td-actions">Eliminar</th>
							<th>cedula</th>
							<th>nombre</th>
							<th>telefono</th> 
							<th>direccion</th> 
							<th>correo</th>
							<th>contrasena</th>
							<th>rol</th>
							<th>id</th>
						</tr>
					</thead>
					<tbody>
						<?php while($data = mysqli_fetch_array($listaUsuario)){ ?>
							<tr>
								<td class="td-actions">
									<p data-placement="top" data-toggle="tooltip" title="Modificar">
										<a class="btn btn-primary btn-xs" data-title="Modificar" href="../controller/usuarios.php?accion=editarUsuarios&id=<?php echo $data['CEDULA'] ?>" >
									 <span class="glyphicon glyphicon-pencil"></span></a></p>
								</td>
								<td class="td-actions">								
									<p data-placement="top" data-toggle="tooltip" title="Delete">
										<a class="btn btn-danger btn-xs" onclick="javascript:deleteC('<?php echo $data['CEDULA'] ?>')" data-title="Eliminar" data-toggle="modal" data-target="#delete" >
									 <span class="glyphicon glyphicon-trash"></span></a></p>
								</td>
								<td><?php echo $data['CEDULA'] ?></td>
								<td><?php echo $data['NOMBRE'] ?></td>
								<td><?php echo $data['TELEFONO'] ?></td>
								<td><?php echo $data['DIRECCION'] ?></td>
                                <td><?php echo $data['CORREO'] ?></td>
								<td><?php echo $data['CONTRASENA'] ?></td>
                                <td><?php echo $data['ROL'] ?></td>
                                <td><?php echo $data['ID'] ?></td>
							</tr>
							<?php } ?>

					</tbody>
				</table>
			</div>
			<div class="clearfix"></div>
						
		</div>		

	
	</div> <!-- /widget-content -->
					
</div> <!-- container -->


<form class="form-horizontal" method="post" action="../controller/usuarios.php?accion=eliminarUsuarios">
<!-- Dialogos para update y delete  ---------------------------------------------------------------------------------------------------------->	
    
<!-- modal para eliminacion -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
				<h4 class="modal-title custom_align" id="Heading">Eliminar Registro</h4>
			</div>
			<div class="modal-body">
		   
				<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Esta seguro que desea eliminar el registro seleccionado?</div>
		   
			</div>
			<div class="modal-footer ">
				<a onclick="eliminar()" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span>S&iacute;</a>
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
			</div>
		</div>
    
	</div> <!-- fin modal-content --> 
</div> <!-- fin modal-dialog --> 
<!-- fin modal para eliminacion -->
<!-- fin modal para eliminacion y update ------------------------------------------------------------------------------------------ -->
</form>
