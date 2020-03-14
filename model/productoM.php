<?php
	
	/**
	* Clase para la gestion de producto
	**/
    class productoM {
		
		/**
		* Metodo para Insercion o creacion de producto
		**/
        public static function insert($producto){
			include ("connection.php");
            mysqli_query($conexion,"INSERT INTO tbl_productos (CANTIDAD, 
											  NOMBRE, 
											  DESCRIPCION, 
											  ESTADO,
											  IVA,
                                              VALOR_UNITARIO,
											  ID) 
										VALUES ('{$producto['cantidad']}',
                                                '{$producto['nombre']}',
                                                '{$producto['descripcion']}',
                                                '{$producto['estado']}',
                                                '{$producto['iva']}', 
                                                '{$producto['valor']}',
												'{$producto['id']}');")
			or die("Problemas en el select".mysqli_error($conexion));
        
		
		}
		
		/**
		* Metodo para Modificacion de usuarios
		**/
        public static function update($producto){
			include ("connection.php");
			mysqli_query($conexion,"UPDATE tbl_productos SET CANTIDAD = '{$producto['cantidad']}', 
							DESCRIPCION = '{$producto['descripcion']}', 
							ESTADO = '{$producto['estado']}', 
							NOMBRE = '{$producto['nombre']}',
                            IVA = '{$producto['iva']}',
                            VALOR_UNITARIO = '{$producto['valor']}'
                          
							WHERE ID = '{$producto['id']}';")
							or die("Problemas en el select".mysqli_error($conexion));
        
        }
        
		/**
		* Metodo para Eliminacion de usuarios
		**/
        public static function delete($nombre){
			include ("connection.php");
			mysqli_query($conexion,"delete from tbl_productos where NOMBRE = '$nombre';");
        }
        
		/**
		* Metodo para Consulta los productos
		**/
        public static function find(){
            include ("connection.php");
			return mysqli_query($conexion,"select * from tbl_productos;")	
				or die("Problemas en el select".mysqli_error($conexion));
        }
		
		/**
		* Metodo para Consulta de productos por filtros
		**/
		public static function findByFilter($producto){
			include ("connection.php");
			$query = "select * from tbl_productos u where 1 = 1 ";
			
			if($producto['nombre'] != ""){
				$query .="and u.NOMBRE = '{$producto['nombre']}' ";
			}

			return mysqli_query($conexion,$query.mysqli_error($conexion));
		}
		

		public static function findById($id){
			include ("connection.php");
			$producto =  mysqli_query($conexion,"select * from tbl_productos u where u.ID  = '".$id."';")
			or die("Problemas en el select".mysqli_error($conexion));

			return mysqli_fetch_array($producto);
		}
		

        
    }