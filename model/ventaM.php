<?php
	
	/**
	* Clase para la gestion de ventas
	**/
    class ventaM {
		
		/**
		* Metodo para Insercion o creacion de ventas
		**/
        public static function insert($venta){
			include ("connection.php");
            mysqli_query($conexion,"INSERT INTO tbl_venta (ID, CANTIDAD, VALOR_UNITARIO, IVA, ID_PRODUCTOS) 
										VALUES ('{$venta['id']}',
                                                '{$venta['cantidad']}',
                                                '{$venta['valorUnitario']}',
                                                '{$venta['iva']}',
                                                '{$venta['idProducto']}');")
			or die("Problemas en el select".mysqli_error($conexion));

			mysqli_query($conexion,"INSERT INTO tbl_factura (id,	FECHA,	TOTAL,	TOTAL_IVA,	ID_USUARIO) 
					VALUES ('{$venta['id']}', SYSDATE(),
							'{$venta['valorUnitario']}',
							'{$venta['total']}',
							'{$_SESSION["sessionNom"]}');")
			or die("Problemas en el select".mysqli_error($conexion));	
        
		}
		
		/**
		* Metodo para Modificacion de ventas
		**/
        public static function update($venta){
			include ("connection.php");
			mysqli_query($conexion,"UPDATE tbl_venta SET CANTIDAD = '{$venta['cantidad']}',  
							VALOR_UNITARIO = '{$venta['valorUnitario']}', 
							IVA = '{$venta['iva']}',
                            ID_PRODUCTOS = '{$venta['idProducto']}'
							WHERE ID = '{$venta['id']}';")
			or die("Problemas en el select".mysqli_error($conexion));

			mysqli_query($conexion,"UPDATE tbl_factura SET TOTAL = '{$venta['valorUnitario']}',  
							FECHA = SYSDATE(), 
							TOTAL_IVA = '{$venta['total']}', 
							ID_USUARIO = '{$_SESSION["sessionNom"]}'
							WHERE id = '{$venta['id']}';")
			or die("Problemas en el select".mysqli_error($conexion));
        
        }
        
		/**
		* Metodo para Eliminacion de ventas
		**/
        public static function delete($cedula){
			include ("connection.php");
			mysqli_query($conexion,"delete from tbl_venta where CEDULA = '$cedula';")
			or die("Problemas en el select".mysqli_error($conexion));
        }
		
		/**
		* Metodo para Consulta de personas no asociadas a un rol
		**/
        public static function find(){
            include ("connection.php");
			return mysqli_query($conexion,"select * from tbl_venta;")	
				or die("Problemas en el select".mysqli_error($conexion));
        }
		
		/**
		* Metodo para Consulta de ventas por filtros
		**/
		public static function findByFilter($venta){
			include ("connection.php");
			$query = "select * from tbl_venta u where 1 = 1 ";
			
			if($venta['cedula'] != ""){
				$query .="and u.CEDULA = '{$venta['cedula']}' ";
			}

			return mysqli_query($conexion,$query.mysqli_error($conexion));
		}
		

		public static function findById($ID){
			include ("connection.php");

			$venta =  mysqli_query($conexion,"select * from tbl_venta u, tbl_factura f where f.id = u.ID and  u.ID  = '".$ID."';")
			or die("Problemas en el select".mysqli_error($conexion));

			return mysqli_fetch_array($venta);
		}
		

        
    }