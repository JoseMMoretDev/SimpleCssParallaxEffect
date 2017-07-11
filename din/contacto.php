<?php if(!defined('INCLUDE_CHECK'))	require_once('404.php'); 

$valido = false;
$datos = array();
$datos['nombre']      = "";
$datos['email']       = "";
$datos['telefono']    = "";
$datos['consulta']    = "";

if(isCall())
{
	$valido = true;
	if(isset($_POST['Nombre']) && !isBetween($_POST['Nombre'],3,70))
	{
		$datos['nombre'] = "Campo&nbsp;no&nbsp;valido&nbsp;3&nbsp;y&nbsp;70&nbsp;caracteres.";
		$valido = false;
	}
	if(isset($_POST['E-mail']) && !isEmailValido($_POST['E-mail']))
	{
		$datos['email'] = "Introduzca&nbsp;un&nbsp;email&nbsp;valido.";
		$valido = false;
	}
	if(isset($_POST['Teléfono']) && !isBetween($_POST['Teléfono'],9,15))
	{
		$datos['telefono'] = "Introduzca&nbsp;un&nbsp;nº&nbsp;de&nbsp;teléfono&nbsp;de&nbsp;contacto&nbsp;valido.";
		$valido = false;
	}
	if(isset($_POST['Mensaje']) && !isBetween($_POST['Mensaje'],10,444))
	{
		$datos['consulta'] = "Escriba&nbsp;aquí&nbsp;su&nbsp;consulta...";
		$valido = false;
	}
	if(isset($_POST['url']) && $_POST['url'] != '')
	{
		$valido = false;
	}
	
	if($valido)
	{
		$datos['nombre']   = _INPUT('Nombre');
		$datos['email']    = _INPUT('E-mail');
		$datos['telefono'] = _INPUT('Teléfono');
		$datos['consulta'] = _INPUT('Mensaje');
	}
}

if (!$valido)
{?>
	<form method="post" action="/contacto/#contacto" >
		<input type="text" name="url" placeholder="Deja este campo vacio." class='noclass'>

		<input
			type='text'
			name='Nombre'
			pattern='.{3,70}'
			maxlength='70'
			title='Escribe un nombre de contacto.'
			required
			<?php validarCampo($datos['nombre'], 'Nombre');?>>

		<input
			type='email'
			name='E-mail'
			maxlength='70'
			title='Escribe un email valido.'
			required
			<?php validarCampo($datos['email'], 'E-mail');?>>

		<input
			type='tel'
			name='Teléfono'
			pattern='.{9,15}'
			maxlength='15'
			title='Introduzca un teléfono de contacto.'
			required
			<?php validarCampo($datos['telefono'], 'Teléfono');?>>

		<textarea
			name='Mensaje'
			rows='10'
			cols='60'
			maxlength='2444'
			required
			<?php if(!isCall()) echo "placeholder='Escriba aquí su duda o consulta...'></textarea>";
			else { echo ">"._INPUT('Mensaje')."</textarea>"; }?> 
				
		<input name="enviar" type="submit" value="Enviar Consulta" class="btn red-grad">


	</form>
<?php } else 
{
	$aux = '';
	$aux .= " <br>Nombre: ".$datos['nombre'].
			" <br> Email: ".$datos['email'].
			" <br> Tel: ".$datos['telefono'].
			" <br> Consulta:  ".$datos['consulta'];

	$args = array( 
					'isHTML'  => true,
					'to' 	  => 'JoseMMoretDev@gmail.com',
					'from' 	  => $datos['nombre'],
					'replyTo' => $datos['email'],
					'subject' => 'Formulario WEB: '.$datos['nombre'],
					'message' => $aux,
					'errorMsg'=> 'No se ha podido realizar la consulta',
					'successMsg' => 'Consulta realizada.');

	$emilio = new phpMail($args);
	if(!$emilio->send())
	{
		echo '<h1>Lo sentimos. No se ha podido realizar la consulta</h1>';
		echo '<h1>Puede ponerse en contacto con nosotros mediante el nº de teléfono: XXX XX XX XX</h1>';
	}
	else
	{
		//foreach($args as $key=>$value) echo $key." -> ".$value."<br>";
		echo '<h1 class="red__border">'.$_POST['Nombre'].' ¡Gracias por su tiempo!<br>
		Consulta realizada. En breve nos pondremos en contacto con usted.</h1>';
	}
}







?>