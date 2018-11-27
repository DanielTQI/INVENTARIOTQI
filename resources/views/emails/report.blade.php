<!DOCTYPE html>
<html>
<head>
	<title>Reporte de Activo</title>

	<style type="text/css">
	  .boton_personalizado{
	    text-decoration: none;
	    padding: 10px;
	    font-weight: 600;
	    font-size: 20px;
	    color: #ffffff;
	    background-color: #1883ba;
	    border-radius: 6px;
	    border: 2px solid #0016b0;
  }
</style>
</head>
<body>

<span style="font-family: Arial, Helvetica, sans-serif; font-size: 22px; color: #121212;">

	Se acaba de generar un nuevo reporte de: {{$usuario}}.
	y es de tipo: {{$reporti}}
	Por favor revisa el Aplicativo.

</span>
<br>
<a href="{{$ruta}}">Boton</a>
</body>
</html>
