<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="icon" href="<?php echo URL::asset('img/Odontologia.png') ?>" type="image/x-icon" />
	<link rel="shortcut icon" href="<?php echo URL::asset('img/Odontologia.png') ?>" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo URL::asset('css/plantilla.css') ?>" type="text/css"> 
	<meta charset="utf-8"/>
	<meta http-equiv="Expires" content="0"/>
	<meta http-equiv="Pragma" content="no-cache"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimun-scale=1" />		
</head>
<body>
	<div id="contenedor">
		<?php echo View::make('menu'); ?>
		<div id="contenido">
			@yield('content')
		</div>
	</div>
	<footer id="cierre">
		</br>
		<p>Copyright © 2016, Universidad de El Salvador</p>
	</footer>
</body>
</html>