<?php	
 $conexion=@mysqli_connect('localhost','root','');
   if (!$conexion) {
   	echo "No se puede contectar con el servidor";
   }else{

   	$base=mysqli_select_db($conexion,'horasextras');
   	if (!$base) {
   	    echo "No se puede encontrar la base de datos";
   	}else{

   		$sql="SELECT * FROM datos";
   		$ejecutar=mysqli_query($conexion,$sql);
   		if (!$ejecutar) {
   			echo "Error en la sentencia";
   		}else{
   			$listado=@mysqli_fetch_array($ejecutar);
   			

   		}
   	}



   }



   #Conexión tabla 2 
   $curl = curl_init();

curl_setopt( $curl, CURLOPT_URL, 'https://jsonplaceholder.typicode.com/todos' );
curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
$response = curl_exec( $curl );
curl_close( $curl );
$response = json_decode( $response );
$x = 0;


?>

<!--Cambio de lenguaje-->

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Tablas de Información</title>
<link rel="stylesheet" type="text/css" href="Tabla.css" media="all">
<script type="text/javascript" src="view.js"></script>

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #800080;
  color: white;
}

a:link, a:visited {
   background-color: #6d2c7d;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  
  border-radius: 4px;
  float: left;
}

a:hover, a:active {
  background-color: red;
}

h2, h1 {

  text-align: center;
  font-family: Times New Roman, Times, serif;
  border-radius: 20px;
  padding: 10px;
  text-shadow: 2px 2px 4px #000000;
  background-color: #e2d8e4;
  color: white;


}
</style>

</head>
<body id="main_body" >
	
<a href='form.html'>Regresar al formulario</a><br>
<br>
<h1>Horas Extras reportadas</h1>




<table id="customers">
	
<tr>
	
<th>Documento</th>
<th>Nombre</th>
<th>Fecha inicio</th>
<th>Fecha fin</th>
<th>Hora inicio turno</th>
<th>Hora fin turno</th>
<th>Hora inicio Extra</th>
<th>Hora fin extra</th>
<th>Motivo</th>
<!-- Agregar valores a la tabla-->
<?php
for ($i=0; $i<$listado ; $i++) { 
	echo "<tr>";
        echo "<td>";

           echo $listado['Documento'];

        echo "</td>";

	
        echo "<td>";

           echo$listado['Nombre'];

        echo "</td>";

	
        echo "<td>";

           echo$listado['FechaInicio'];

        echo "</td>";

	
        echo "<td>";

           echo$listado['FechaFin'];

        echo "</td>";

	
        echo "<td>";

           echo$listado['HoraInicioTurno'];

        echo "</td>";


        echo "<td>";

           echo$listado['HoraFinTurno'];

        echo "</td>";

	
        echo "<td>";

           echo$listado['HoraInicioExtra'];

        echo "</td>";


        echo "<td>";

           echo$listado['HoraFinExtra'];

        echo "</td>";

	
        echo "<td>";

           echo$listado['Motivo'];

        echo "</td>";

	echo "</tr>";

$listado=@mysqli_fetch_array($ejecutar);

}

?>

</tr>

</table><br>

<!---- Tabla 2 --->

<h2>Tabla del Servidor</h2>
<table id="customers">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>userId</th>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Completed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach( $response as $item ) :?>
                        <?php $x++;?>
                        <tr>
                            <td><?php echo $x;?></td>
                            <td><?php echo $item->userId;?></td>
                            <td><?php echo $item->id;?></td>
                            <td><?php echo $item->title;?></td>
                            <td>
                            <?php
                                if( $item->completed ) {
                                    echo 'True';
                                }else {
                                    echo 'False';
                                };
                            ?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

	</body>
</html>