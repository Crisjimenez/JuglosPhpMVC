<?php

/**
* Clase controladora de modelo de venta
**/	

// importamos el modelo    
require '../model/ventaM.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de venta
	**/
    else if($accion == 'listarVenta'){
        
		$_SESSION["operacion"]="listar";
		
		$filtrosVenta = [
			'cedula'=> ""
		];
		
		//listo las venta
		$listaVenta = ventaM::find();
		require '../view/venta/listarVenta.php';
		
		
	}else if($accion == 'agregarVenta'){
		$_SESSION["operacion"]="guardar";
		$venta = [
			'ID_PRODUCTOS'=> "",
			'CANTIDAD'=> "",
			'VALOR_UNITARIO'=> "",
			'IVA'=> "",
			'TOTAL'=> "",
			'ID'=> ""
		];
		
		require '../view/venta/agregarVenta.php';

	}else if($accion == 'consultarVenta'){

		$listaVenta = ventaM::find();
		require '../view/venta/listarVenta.php';
		
	}else if($accion == 'editarVenta'){
	
		$_SESSION["operacion"]="modificar";
		$id = $_GET['id'];
		$venta = ventaM::findById($id);
		require '../view/venta/agregarVenta.php';
		
	// Metodo para guardar o actualizar la informacion 		
	}else if($accion == 'guardarVenta'){
		
		if($_SESSION["operacion"] == "guardar"){
			$ventaGuardar = [
				'idProducto'=> $_POST['idProductoID'],
				'cantidad'=> $_POST['cantidadID'],
				'valorUnitario'=> $_POST['valorUnitarioID'],
				'iva'=> $_POST['ivaID'],
				'total'=> $_POST['totalID'],
				'id'=> $_POST['idID']
			];
		
			ventaM::insert($ventaGuardar);
		}else{
			$ventaModificar = [
				'idProducto'=> $_POST['idProductoID'],
				'cantidad'=> $_POST['cantidadID'],
				'valorUnitario'=> $_POST['valorUnitarioID'],
				'iva'=> $_POST['ivaID'],
				'total'=> $_POST['totalID'],
				'id'=> $_POST['idID']
			];
		
			ventaM::update($ventaModificar);
		}
		
		$_SESSION["operacion"]="consultar";
		
		//listo las venta
		$listaVenta = ventaM::find();	
		
		
		require '../view/venta/listarVenta.php';
		
	}

require '../view/footer.php';