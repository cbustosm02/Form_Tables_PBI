

<?php
//Conexión servidor
$conexion=@mysqli_connect('localhost','root','');

//Verificar conexión

if (!$conexion) {

	echo "No hay conexión con el servidor";
	
} else{

	$base=mysqli_select_db($conexion,'horasextras');
	if (!$base) {
		echo "No se encuentra la base de datos";
		
	}
}

//capturar información en variables
$documento=$_POST['documento'];
$nombre=$_POST['nombre'];
$fechainicio=$_POST['fechainicio'];
$fechafin=$_POST['fechafin'];
$horainicioturno=$_POST['horainicioturno'];
$horafinturno=$_POST['horafinturno'];
$horainicioextra=$_POST['horainicioextra'];
$horafinextra=$_POST['horafinextra'];
$motivo=$_POST['motivo'];


//sentencia sql
$sql="INSERT INTO datos VALUES ('$documento','$nombre','$fechainicio','$fechafin','$horainicioturno','$horafinturno','$horainicioextra','$horafinextra','$motivo')";

//ejecutar

$ejecutar=mysqli_query($conexion,$sql);


//verificarejecucion
if (!$ejecutar) {
	echo "Error en la sentencia";
}else{
	echo "Datos guardados exitosamente<br> <a href='form.html'>Regresar al formulario</a> ";
}


?>

