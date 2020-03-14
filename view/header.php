<!DOCTYPE html>
<html>
	<head>
		<title>Juglos</title>
		<meta charset = "utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
		
	<body>
  <?php session_start(); ?>
		<!-- Menú de opciones -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../controller/clientes.php?accion=inicio">Juglos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
    <?php if($_SESSION["rol"] == 'ADMIN' ){?>
      <li class="nav-item dropdown">
        <a class="nav-link" href="../controller/usuarios.php?accion=listarUsuarios" id="navbarDropdown" role="button">
          Usuarios
        </a>
      </li>
    
      <li class="nav-item dropdown">
        <a class="nav-link" href="../controller/productos.php?accion=listarProducto" id="navbarDropdown" role="button">
          Producto
        </a>
      </li> 

      <li class="nav-item dropdown">
        <a class="nav-link" href="../controller/venta.php?accion=listarVenta" id="navbarDropdown" role="button">
          Ventas
        </a>
      </li> 
   
 <?php }?>

      <li class="nav-item dropdown">
        <a class="nav-link" href="../index.php" id="navbarDropdown" role="button" >
          Salir
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdown" role="button" >
        </a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link " id="navbarDropdown" role="button" >
        Bienvenido: <?php echo $_SESSION["nombre"] ?>
        </a>
      </li>
     
      
    </ul>
    <form class="form-inline my-2 my-lg-0" action="consultar.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Digite la cédula" aria-label="Search" name="txtced">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>
		
