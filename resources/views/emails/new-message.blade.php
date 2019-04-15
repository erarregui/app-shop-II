{{ $name }}
{{ $email }}
{{ $consult }}

<!DOCTYPE html>
<html>
<head>
	<title>Nuevo pedido</title>
</head>
<body>
	<p>Se ha realizado una nueva consulta!</p>
	<p>Estos son los datos del cliente que realizó la consulta:</p>
	<ul>
		<li>
			<strong>Nombre:</strong>
			{{ $name }}
		</li>
		<li>
			<strong>E-mail:</strong>
			{{ $email }}
		</li>
		
	</ul>

	<p>Y esta es la consulta:</p>
	<ul>
		<li>
			<strong>Consulta:</strong>
			{{ $consult }}	
		</li>
		
	</ul>
	
	<hr>
	
</body>
</html>

