<?php
session_start();

	if (!isset($_SESSION['id'])) {
		header("Location: ../index.php");
		die();
	}

if (isset($_GET['x'])) {
	session_destroy();
	header("Location: index.php");
	die();
}


?>

<!DOCTYPE html>
<html lang="es">
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width-device-width initial-scale-1, shrink-to-fit-no">
     <title>Pagina Principal</title>

     <link rel="stylesheet" type="text/css" href="../boostrap4/css/bootstrap.css">
     <link rel="stylesheet" type="text/css" href="../iconosperrones/css/all.css">
</head>
<body class="text-dark bg-light">

  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php"><span class="fas fa-home" style="color: Blue;"></span>
              Inicio
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="javascript:menuPrincipal('a');">Agregar nuevos datos</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="javascript:menuPrincipal('l');">Consultar Datos Guardados</a>
					</li>
        </ul>
        <a class="nav-link text-white">Usuario: <?= $_SESSION['usuario']?></a>
        <a class="btn btn-danger my-2 my-sm-0" href="index.php?x=1">Cerrar sesion <span class="fas fa-sign-out-alt"></span></a>
      </div>
  </nav>

	<main role="main">

		<center>
			<img src="../imagenes/logo.png" class="img-fluid mt-3 mb-2" height="10%" width="10%">
				<p class="font-weight-bold">
					Este sistema fue desarrollado como prototipo para practicas de metodologias de desarrollo de software.
				</p>
		</center>
	<div id="contenido">

	</div>
	</main>

	<footer>
	<center>
		<p>&copy Creado por Carlos Octavio Covarrubias Rodriguez</p>
	</center>
	</footer>

<script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../boostrap4/js/bootstrap.js"></script>
<script type="text/javascript" src="../iconosperrones/js/all.js"></script>
<script type="text/javascript" src="../js/datos.js"></script>
<script type="text/javascript" src="../js/validacion.js"></script>

<script type="text/javascript">
function menuPrincipal(opcion){

	switch (opcion) {
		case 'a': url = "newDatos.php";
		break;

		case 'l': url = "listaDatos.php";
		break;
		
		case 'z': url = "blank.php";
		break;

		default:
			alert("Opcion no encontrada");
			break;
	}

	let json = "";
	$.post("http://localhost/TestingPage/app/" + url, json, function(responseText, status){
		try{
			if(status == "success"){
				let direccionobjetivo = document.getElementById("contenido");
				direccionobjetivo.innerHTML = responseText;
			}else{
				alert(responseText);
			}
		}catch(e){
			alert("Hubo un error y no se ha podido conectar con el servidor: " + e);
		}
	});
}
</script>

</body>


</html>
