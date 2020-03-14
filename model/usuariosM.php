<?php
	
	/**
	* Clase para la gestion de usuarios
	**/
    class usuariosM {
		
		/**
		* Metodo para Insercion o creacion de usuarios
		**/
        public static function insert($usuario){
			include ("connection.php");
            mysqli_query($conexion,"INSERT INTO tbl_usuario (CEDULA, 
											  NOMBRE, 
											  TELEFONO,
											  DIRECCION, 
											  CORREO,
                                              CONTRASENA,
                                              ROL,
                                              ID) 
										VALUES ('{$usuario['cedula']}',
                                                '{$usuario['nombre']}',
                                                '{$usuario['telefono']}',
                                                '{$usuario['direccion']}',
                                                '{$usuario['correo']}', 
                                                '{$usuario['contrasena']}',
                                                '{$usuario['rol']}',
                                                '{$usuario['id']}');")
			or die("Problemas en el select".mysqli_error($conexion));
        
		
		}
		
		/**
		* Metodo para Modificacion de usuarios
		**/
        public static function update($usuario){
			include ("connection.php");
			mysqli_query($conexion,"UPDATE tbl_usuario SET NOMBRE = '{$usuario['nombre']}',  
							TELEFONO = '{$usuario['telefono']}', 
							DIRECCION = '{$usuario['direccion']}', 
							CORREO = '{$usuario['correo']}',
                            CONTRASENA = '{$usuario['contrasena']}',
                            ROL = '{$usuario['rol']}',
                            ID = '{$usuario['id']}'
							WHERE CEDULA = '{$usuario['cedula']}';")
			or die("Problemas en el select".mysqli_error($conexion));
        
        }
        
		/**
		* Metodo para Eliminacion de usuarios
		**/
        public static function delete($cedula){
			include ("connection.php");
			mysqli_query($conexion,"delete from tbl_usuario where CEDULA = '$cedula';")
			or die("Problemas en el select".mysqli_error($conexion));
        }
		
		/**
		* Metodo para Consulta de personas no asociadas a un rol
		**/
        public static function find(){
            include ("connection.php");
			return mysqli_query($conexion,"select * from tbl_usuario;")	
				or die("Problemas en el select".mysqli_error($conexion));
        }
		
		/**
		* Metodo para Consulta de usuarios por filtros
		**/
		public static function findByFilter($usuario){
			include ("connection.php");
			$query = "select * from tbl_usuario u where 1 = 1 ";
			
			if($usuario['cedula'] != ""){
				$query .="and u.CEDULA = '{$usuario['cedula']}' ";
			}

			return mysqli_query($conexion,$query.mysqli_error($conexion));
		}
		

		public static function findById($cedula){
			include ("connection.php");
			$usuario =  mysqli_query($conexion,"select * from tbl_usuario u where u.CEDULA  = '".$cedula."';")
			or die("Problemas en el select".mysqli_error($conexion));

			return mysqli_fetch_array($usuario);
		}
		

        
    }