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
	<link href="/ResponsiveParallax/css/parallax.css" rel="stylesheet" type="text/css">

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
	<script src="/ResponsiveParallax/js/parallax.min.js"></script>
</head>

<body>

<header>
	<nav>
		<a  id="menu-alogo" href="/ResponsiveParallax/"><div id="menu-logo" class="curl"></div></a>
		<ul id="menu-web">
			<li><a class='' href="/ResponsiveParallax/#home">HOME</a></li>
			<li><a class='' href="/ResponsiveParallax/#nosotros">ABOUT US</a></li>
			<li><a class='' href="/ResponsiveParallax/#servv">SERVICES</a>
				<ul>
					<li><a href="/ResponsiveParallax/servicios/frio_industrial/">INDUSTRIAL COLD</a></li>
					<li><a href="/ResponsiveParallax/servicios/climatizacion/">CLIMATIZE</a></li>
					<li><a href="/ResponsiveParallax/servicios/electricidad/">ELECTRICITY</a></li>
					<li><a href="/ResponsiveParallax/servicios/gas/">GAS</a></li>
					<li><a href="/ResponsiveParallax/servicios/hosteleria/">IND. HOSTELRY</a></li>
					<li><a href="/ResponsiveParallax/servicios/mantenimiento/">MAINTENANCE</a></li>
					<li><a href="/ResponsiveParallax/servicios/proyectos/">PROJECTS</a></li>
				</ul>
			</li>
			<li><a class='' href="/ResponsiveParallax/#contacto">CONTACT</a></li>
		</ul>

		<select id="menu-mobil" onchange="location=this.value;">
			<option value="/ResponsiveParallax/#home">	HOME </option> 
			<option value="/ResponsiveParallax/#nosotros"> ABOUT US </option>
			<option value="/ResponsiveParallax/#servv"> SERVICES </option> 
				<option value="/ResponsiveParallax/servicios/frio_industrial/" <?php if(isset($_GET['sec']) && $_GET['sec']=='frio_industrial') echo 'selected="selected"'; ?> >
					· INDUSTRIAL COLD </option> 
				<option value="/ResponsiveParallax/servicios/climatizacion/" <?php if(isset($_GET['sec']) && $_GET['sec']=='climatizacion') echo 'selected="selected"'; ?> >
					· CLIMATIZE </option> 
				<option value="/ResponsiveParallax/servicios/electricidad/" <?php if(isset($_GET['sec']) && $_GET['sec']=='electricidad') echo 'selected="selected"'; ?> >
					· ELECTRICITY </option>
				<option value="/ResponsiveParallax/servicios/gas/" <?php if(isset($_GET['sec']) && $_GET['sec']=='gas') echo 'selected="selected"'; ?> >
		 			· GAS </option> 
				<option value="/ResponsiveParallax/servicios/hosteleria/" <?php if(isset($_GET['sec']) && $_GET['sec']=='hosteleria') echo 'selected="selected"'; ?> >
					· INDUST. HOSTELRY </option> 
				<option value="/ResponsiveParallax/servicios/mantenimiento/" <?php if(isset($_GET['sec']) && $_GET['sec']=='mantenimiento') echo 'selected="selected"'; ?> >
					· MAINTENANCE </option> 
				<option value="/ResponsiveParallax/servicios/proyectos/" <?php if(isset($_GET['sec']) && $_GET['sec']=='proyectos') echo 'selected="selected"'; ?> >
					· PROJECTS </option>
			<option value="/ResponsiveParallax/#contacto"> CONTACT </option>
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
		<img class="logoPie" src="/ResponsiveParallax/img/logoN2.png" alt="logo" width="64" height="32">
		<div class="textoPie"> Copyright © 2016 _ 
			<a href="CondicionesUsoES.pdf" target="__blank" title="Ver cond. de uso">
				Ver Condiciones de uso.
			</a>
		</div>
		<img class="logoHstudio" src="/ResponsiveParallax/img/logoHstudio.png" alt="Hstudio" width="32" height="32">
	</section>
</footer> 


</body>
</html>