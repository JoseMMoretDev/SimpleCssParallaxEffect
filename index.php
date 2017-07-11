<?php 
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
header ('Content-type: text/html; charset=utf-8');
define('INCLUDE_CHECK',true);

require_once('din/din.php'); 
$tag = '';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8'>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Oswald|Neucha" rel="stylesheet">
	<link href="css/parallax.css" rel="stylesheet" type="text/css">

<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=m2d5J9wXrM">
<link rel="icon" type="image/png" href="/favicon-32x32.png?v=m2d5J9wXrM" sizes="32x32">
<link rel="icon" type="image/png" href="/favicon-16x16.png?v=m2d5J9wXrM" sizes="16x16">
<link rel="manifest" href="/manifest.json?v=m2d5J9wXrM">
<link rel="mask-icon" href="/safari-pinned-tab.svg?v=m2d5J9wXrM" color="#d00000">
<link rel="shortcut icon" href="/favicon.ico?v=m2d5J9wXrM">
<meta name="theme-color" content="#d00000">

	<title> Responsive Parallax</title>
	<meta name='description' content='description_HERE'>
	<meta name='viewport' content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/parallax.min.js"></script>
</head>

<body>

<header>
	<nav>
		<a  id="menu-alogo" href="/"><div id="menu-logo" class="curl"></div></a>
		<ul id="menu-web">
			<li><a class='' href="/#home">HOME</a></li>
			<li><a class='' href="/#nosotros">NOSOTROS</a></li>
			<li><a class='' href="/#servv">SERVICIOS</a>
				<ul>
					<li><a href="/servicios/frio_industrial/">FRÍO INDUSTRIAL</a></li>
					<li><a href="/servicios/climatizacion/">CLIMATIZACIÓN</a></li>
					<li><a href="/servicios/electricidad/">ELECTRICIDAD</a></li>
					<li><a href="/servicios/gas/">GAS</a></li>
					<li><a href="/servicios/hosteleria/">HOSTELERÍA IND.</a></li>
					<li><a href="/servicios/mantenimiento/">MANTENIMIENTO</a></li>
					<li><a href="/servicios/proyectos/">PROYECTOS</a></li>
				</ul>
			</li>
			<li><a class='' href="/#contacto">CONTACTO</a></li>
		</ul>

		<select id="menu-mobil" onchange="location=this.value;">
			<option value="/#home">	HOME </option> 
			<option value="/#nosotros"> NOSOTROS </option>
			<option value="/#servv"> SERVICIOS </option> 
				<option value="/servicios/frio_industrial/" <?php if(isset($_GET['sec']) && $_GET['sec']=='frio_industrial') echo 'selected="selected"'; ?> >
					· FRÍO INDUSTRIAL </option> 
				<option value="/servicios/climatizacion/" <?php if(isset($_GET['sec']) && $_GET['sec']=='climatizacion') echo 'selected="selected"'; ?> >
					· CLIMATIZACIÓN </option> 
				<option value="/servicios/electricidad/" <?php if(isset($_GET['sec']) && $_GET['sec']=='electricidad') echo 'selected="selected"'; ?> >
					· ELECTRICIDAD </option>
				<option value="/servicios/gas/" <?php if(isset($_GET['sec']) && $_GET['sec']=='gas') echo 'selected="selected"'; ?> >
		 			· GAS </option> 
				<option value="/servicios/hosteleria/" <?php if(isset($_GET['sec']) && $_GET['sec']=='hosteleria') echo 'selected="selected"'; ?> >
					· HOSTELERÍA INDUST. </option> 
				<option value="/servicios/mantenimiento/" <?php if(isset($_GET['sec']) && $_GET['sec']=='mantenimiento') echo 'selected="selected"'; ?> >
					· MANTENIMIENTO </option> 
				<option value="/servicios/proyectos/" <?php if(isset($_GET['sec']) && $_GET['sec']=='proyectos') echo 'selected="selected"'; ?> >
					· PROYECTOS </option>
			<option value="/#contacto"> CONTACTO </option>
		</select>
	</nav>
	
</header>

<main id="home"> 

<?php if(isset($_GET['sec']))
{
	$tag = strip_tags($_GET['sec']);
	require_once('din/servicio.php');
}
else require_once('din/home.php'); ?>
</main>
<footer class="black-grad">
	<section class='pie'>
		<img class="logoPie" src="img/logoN2.png" alt="logo" width="64" height="32">
		<div class="textoPie"> Copyright © 2016 _ COMP Ltd _ 
			<a href="CondicionesUsoES.pdf" target="__blank" title="Ver cond. de uso">
				Condiciones de uso.
			</a>
		</div>
		<img class="logoHstudio" src="img/logoHstudio.png" alt="Hstudio" width="32" height="32">
	</section>
</footer> 


</body>
</html>