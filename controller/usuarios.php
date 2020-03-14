<?php

/**
* Clase controladora de modelo de usuarios
**/	

// importamos el modelo    
require '../model/usuariosM.php';
// escribimos el encabezado
require '../view/header.php';
	
	// tomamos la accion a ejecutar
    $accion = $_GET['accion'];
    
	// en caso de ser inicio pintamos el index
	if($accion == 'inicio'){
		require '../view/indexSession.php';
	}
	
	/**
	* Gestion de usuarios
	**/
    else if($accion == 'listarUsuarios'){
        
		$_SESSION["operacion"]="listar";
		
		$filtrosUsuarios = [
			'cedula'=> ""
		];
		
		//listo las usuarios
		$listaUsuarios = usuariosM::find();
		require '../view/usuarios/listarUsuario.php';
		
		
	}else if($accion == 'agregarUsuarios'){
		$_SESSION["operacion"]="guardar";
		$usuarios = [
			'CEDULA'=> "",
			'NOMBRE'=> "",
			'ROL'=> "",
			'TELEFONO'=> "",
			'CORREO'=> "",
			'DIRECCION'=> "",
			'CONTRASENA'=> "",
			'ID'=> ""
		];
		
		require '../view/usuarios/agregarUsuarios.php';


    }else if($accion == 'eliminarUsuario'){
		$id = $_GET['codigoEliminarID'];
		
		usuariosM::delete($id);
		
		$filtrosUsuarios = [
                'cedula'=> ""
            ];
		
		//listo las usuarios
		$listaUsuarios = usuariosM::find();
		require '../view/usuarios/listarUsuario.php';
		
		
	}else if($accion == 'consultarUsuarios'){
		
		$isPost = count($_POST);

        if($isPost > 0){
			
			$filtrosUsuarios = [
                'cedula'=> $_POST['cedula']
            ];
			
			$listaUsuarios = usuariosM::findByFilter($filtrosUsuarios);
		
		}else{
			$listaUsuarios = usuariosM::find();
		}
		
		require '../view/usuarios/listarUsuario.php';
		
	}else if($accion == 'editarUsuarios'){
	
		$_SESSION["operacion"]="modificar";
		$id = $_GET['id'];
		$usuarios = usuariosM::findById($id);
		require '../view/usuarios/agregarUsuarios.php';
		
	// Metodo para guardar o actualizar la informacion 		
	}else if($accion == 'guardarUsuarios'){
		
		if($_SESSION["operacion"] == "guardar"){
			$usuariosGuardar = [
				'cedula'=> $_POST['cedulaID'],
				'nombre'=> $_POST['nombreID'],
				'telefono'=> $_POST['telefonoID'],
				'direccion'=> $_POST['direccionID'],
				'correo'=> $_POST['correoID'],
				'contrasena'=> $_POST['contrasenaID'],
				'rol'=> $_POST['rolID'],
				'id'=> $_POST['idID']
			];
		
			usuariosM::insert($usuariosGuardar);
		}else{
			$usuariosModificar = [
				'cedula'=> $_POST['cedulaID'],
				'nombre'=> $_POST['nombreID'],
				'telefono'=> $_POST['telefonoID'],
				'direccion'=> $_POST['direccionID'],
				'correo'=> $_POST['correoID'],
				'contrasena'=> $_POST['contrasenaID'],
				'rol'=> $_POST['rolID'],
				'id'=> $_POST['idID']
			];
		
			usuariosM::update($usuariosModificar);
		}
		
		$_SESSION["operacion"]="consultar";
		
		//listo las usuarios
		$listaUsuarios = usuariosM::find();
		//lista de usuarios para filtro
		$listaUsuariosFiltro = usuariosM::find();		
		
		
		require '../view/usuarios/listarUsuario.php';
		
	}

require '../view/footer.php';