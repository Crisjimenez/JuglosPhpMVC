

<?php

/**
* Clase controladora de modeulo de produtos
**/	

// importamos el modelo    
require '../model/productoM.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de produtos
	**/
    else if($accion == 'listarProducto'){
        
		$_SESSION["operacion"]="listar";
		
		$filtrosProduto = [
			'nombre'=> ""
		];
		
		//listo las produtos
		$listaProducto = productoM::find();
		$mensaje = "Se consultaron los registros con éxito.";
		require '../view/productos/listarProducto.php';
		
		
	}else if($accion == 'agregarProducto'){
		$_SESSION["operacion"]="guardar";
		$producto = [
			'CANTIDAD'=> "",
			'DESCRIPCION'=> "",
			'ESTADO'=> "",
			'NOMBRE'=> "",
			'VALOR_UNITARIO'=> "",
			'IVA' => "",
			'ID' => ""
		];
		
		require '../view/productos/agregarProducto.php';


    }else if($accion == 'eliminarProducto'){
		$id = $_GET['codigoEliminarID'];
		
		productoM::delete($id);
		
		$filtrosProduto = [
                'nombre'=> ""
            ];
		
		//listo los productos
		$listaProducto = productoM::find();
		$mensaje = "Se elimino con éxito.";
		require '../view/productos/listarProducto.php';
		
		
	}else if($accion == 'consultarProducto'){
		
		$isPost = count($_POST);

        if($isPost > 0){
			
			$filtrosProduto = [
                'nombre'=> $_POST['nombre']
            ];
			
			$listaProducto = productoM::findByFilter($filtrosProduto);
		
		}else{
			$filtrosProduto = productoM::find();
		}
		require '../view/productos/listarProducto.php';
		
	}else if($accion == 'editarProducto'){
	
		$_SESSION["operacion"]="modificar";
		$id = $_GET['id'];
		$producto = productoM::findById($id);
		require '../view/productos/agregarProducto.php';
		
	// Metodo para guardar o actualizar la informacion 		
	}else if($accion == 'guardarProducto'){
		
		if($_SESSION["operacion"] == "guardar"){
			$productoGuardar = [
				'cantidad'=> $_POST['cantidadID'],
				'nombre'=> $_POST['nombreID'],
				'descripcion'=> $_POST['descripcionID'],
				'estado'=> $_POST['estadoID'],
				'valor'=> $_POST['valorID'],
				'iva'=> $_POST['ivaID'],
				'id'=>$_POST['idID']
			];
		
			productoM::insert($productoGuardar);
		}else{
			$productoModificar = [
				'cantidad'=> $_POST['cantidadID'],
				'nombre'=> $_POST['nombreID'],
				'descripcion'=> $_POST['descripcionID'],
				'estado'=> $_POST['estadoID'],
				'valor'=> $_POST['valorID'],
				'iva'=> $_POST['ivaID'],
				'id'=> $_POST['idID']
			];
		
			productoM::update($productoModificar);
		}
		
		$_SESSION["operacion"]="consultar";
			
		
		//listo las productos
		$listaProducto = productoM::find();
		//lista de producto para filtro
		$listaProductoFiltro = productoM::find();		
		
		$mensaje = "Se guardo el registro con éxito.";
		require '../view/productos/listarProducto.php';
		
	}

require '../view/footer.php';