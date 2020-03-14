<?php

	/**
	* Clase para la gestion de inicio de session
	**/
    class loginM {
        
		/**
		* Metodo para la consulta de usuario 
		* para el inicio de session
		**/
      public static function consultarLogin($usuario){

				include ("connection.php");

				$usuario = mysqli_query($conexion, "select * from TBL_USUARIO where CEDULA= '{$usuario['cedula']}' and CONTRASENA = '{$usuario['contrasena']}' and ROL IN ('ADMIN', 'EMPLEADO')")
				or die("Problemas en el select".mysqli_error($conexion));

				return mysqli_fetch_array($usuario);
      }
        
	}
	?>	