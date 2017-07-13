<?php if(!defined('INCLUDE_CHECK'))	require_once('../404.php');  

class phpMail
{
    private $to;
	private $from;
	private $reply_to;
	private $subject;
	private $message;
	private $content_type;
	private $charset = "utf-8";
	private $header = array();
	private $headerOutput;
	private $_debug = false;
	
	public function __construct($args = array())
	{
		if(isset($args['isHTML']) && is_bool($args['isHTML'])){
			$this->isHTML($args['isHTML']); }
		if(isset($args['debug']) && is_bool($args['debug'])){
			$this->setDebug($args['debug']); }
		if(isset($args['to']) && self::isEmailValid($args['to'])){
			$this->setTo($args['to']); }
		if(isset($args['from']) && self::isEmailValid($args['from'])){
			$this->setFrom($args['from']); }
		if(isset($args['replyTo']) && self::isEmailValid($args['replyTo'])){
			$this->setReplyTo($args['replyTo']); }
		if(isset($args['subject'])){
			$this->setSubject($args['subject']); }
		if(isset($args['message'])){
			$this->setMessage($args['message']); }
		if(isset($args['charset'])){
			$this->setCharset($args['charset']); }
	}

	private function checkRequired()
	{
        if(!isset($this->to))
			$this->errorHandle("<mark>ERROR:</mark>Enviar a: mail no está incluido");
	}

	public function setDebug($debug)
	{
		$this->_debug = $debug;
		return $this;
	}
  
	public function isHTML($html = true)
	{
		if($html === true):
			$this->content_type = "text/html";
		else:
			$this->content_type = "text/plain";
		endif;
		return $this;
	}

	public static function isEmailValid($email)
	{
		return filter_var($email,FILTER_VALIDATE_EMAIL) ? true : false;
	}

	public function setTo($to)
	{
		$this->to = $to;
		return $this;
	}

	public function setFrom($from)
	{
		$this->from = $from;
		return $this;
	}

	public function setReplyTo($reply_to)
	{
		$this->reply_to = $reply_to;
		return $this;
	}

	public function setSubject($subject)
	{
		$this->subject = $subject;
		return $this;
	}

	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}

	public function setCharset($charset)
	{
		$this->charset = $charset;
		return $this;
	}
 
	private function _CreateHeaders()
	{
		$this->header[] = "From:".$this->from." <".$this->reply_to.">\n";
		$this->header[] = "Reply-To:".$this->reply_to."\n";
		$this->header[] = "Content-Type:".$this->content_type.";charset=".$this->charset."";
    
		foreach($this->header as $this->headers)
		{
			$this->headerOutput .= $this->headers;
		}
		return $this->headerOutput;
	}

	public function send()
	{
		$this->_CreateHeaders();
		$this->checkRequired();
      
		if(!@mail($this->to,$this->subject,$this->message,$this->headerOutput)):
			return false;
		else:
			return true;
		endif;
	}
}


function _INPUT($name)  
{
    if ($_SERVER['REQUEST_METHOD'] == 'GET')
        return htmlentities($_GET[$name], ENT_QUOTES, 'UTF-8'); // $safeHtml is now fully escaped HTML.  You can output $safeHtml to your users without fear!
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        return htmlentities($_POST[$name], ENT_QUOTES, 'UTF-8'); // $safeHtml is now fully escaped HTML.  You can output $safeHtml to your users without fear!
}

function antiinjection($str)
{
    $banchars = array ("'", ",", ";", "--", ")", "(","\n","\r");
    $banwords = array (" or "," OR "," Or "," oR "," and ", " AND "," aNd "," aND "," AnD "); 
    if ( preg_match( "[a-zA-Z0-9]+", $str ) ){
            $str = str_replace ( $banchars, '', ( $str ) );
            $str = str_replace ( $banwords, '', ( $str ) );}
    else { $str = NULL;}
    $str = trim($str);
    $str = strip_tags($str);
    $str = stripslashes($str);
    $str = addslashes($str);
    $str = htmlspecialchars($str);
    return $str;
} 

            
function isBetween($var, $min, $max)
{ 
	if(strlen($var) > $max || strlen($var) < $min)
		return false;
	return true;
}
function isEmailValido($email)
{
	if($email != '' && !preg_match( "/[\r\n]/", $email ))
	{
		$email = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}
	return false;
} 
function validarCampo($dato, $name)
{
	if(isCall())
	{
		if($dato === "") echo "value='"._INPUT($name)."'";
		else echo 'placeholder='.$dato;
	}
	else echo 'placeholder='.$name;
}
function isCall()
{
	if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['enviar']))
	{return true;}
	return false;
}

function getServicio($tag)
{
	$servicio = array();
	$ruta = 'http://'.$_SERVER["HTTP_HOST"].'/ResponsiveParallax/img/serv/';
	switch ($tag)
	{
		case 'frio_industrial':
			$servicio['imagename'] 	= $ruta . 'frio_industrial.jpg';
			$servicio['titulo'] 	= 'INDUSTRIAL COLD';
			$servicio['texto'] 		= 'Lorém ipsúm dolor sit amet, partem eirmod deseruisse te his, te vel qúaeque iudicabit. At bónorum accusam similique est. Cu doming atomorum qui, ñe per deniqúe hónestatis, ad mel illud ófficiis facilísis. Nam regione recusábo ne. Vím adhuc illum mázim eu, ad pérfecto accúsamus vís. 
										Víx malis debitis id, pro cu iudico eripuit. Omnis audire eleífend ex pri, duo quém simul mólestie ei, no tamqúam noluissé phaedrúm has. Dícam ceteró repudiandae te séd, eum no porro explicari moderatius. Sit ut malorum ceteros suscípiantur, et sea vitaé veritus epicurei. Mundi atomorúm ex quo.';
			break;
		
		case 'climatizacion':
			$servicio['imagename'] 	= $ruta . 'climatizacion.jpg';
			$servicio['titulo'] 	= 'CLIMATIZE';
			$servicio['texto'] 		= 'Lorém ipsúm dolor sit amet, partem eirmod deseruisse te his, te vel qúaeque iudicabit. At bónorum accusam similique est. Cu doming atomorum qui, ñe per deniqúe hónestatis, ad mel illud ófficiis facilísis. Nam regione recusábo ne. Vím adhuc illum mázim eu, ad pérfecto accúsamus vís. 
										Víx malis debitis id, pro cu iudico eripuit. Omnis audire eleífend ex pri, duo quém simul mólestie ei, no tamqúam noluissé phaedrúm has. Dícam ceteró repudiandae te séd, eum no porro explicari moderatius. Sit ut malorum ceteros suscípiantur, et sea vitaé veritus epicurei. Mundi atomorúm ex quo.';
			break;	
		
		case 'electricidad':
			$servicio['imagename'] 	= $ruta . 'electricidad.jpg';
			$servicio['titulo'] 	= 'ELECTRICITY';
			$servicio['texto'] 		= 'Lorém ipsúm dolor sit amet, partem eirmod deseruisse te his, te vel qúaeque iudicabit. At bónorum accusam similique est. Cu doming atomorum qui, ñe per deniqúe hónestatis, ad mel illud ófficiis facilísis. Nam regione recusábo ne. Vím adhuc illum mázim eu, ad pérfecto accúsamus vís. 
										Víx malis debitis id, pro cu iudico eripuit. Omnis audire eleífend ex pri, duo quém simul mólestie ei, no tamqúam noluissé phaedrúm has. Dícam ceteró repudiandae te séd, eum no porro explicari moderatius. Sit ut malorum ceteros suscípiantur, et sea vitaé veritus epicurei. Mundi atomorúm ex quo.';
			break;	
		
		case 'gas':
			$servicio['imagename'] 	= $ruta . 'gas.jpg';
			$servicio['titulo'] 	= 'GAS';
			$servicio['texto'] 		= 'Lorém ipsúm dolor sit amet, partem eirmod deseruisse te his, te vel qúaeque iudicabit. At bónorum accusam similique est. Cu doming atomorum qui, ñe per deniqúe hónestatis, ad mel illud ófficiis facilísis. Nam regione recusábo ne. Vím adhuc illum mázim eu, ad pérfecto accúsamus vís. 
										Víx malis debitis id, pro cu iudico eripuit. Omnis audire eleífend ex pri, duo quém simul mólestie ei, no tamqúam noluissé phaedrúm has. Dícam ceteró repudiandae te séd, eum no porro explicari moderatius. Sit ut malorum ceteros suscípiantur, et sea vitaé veritus epicurei. Mundi atomorúm ex quo.';
			break;	
		
		case 'hosteleria':
			$servicio['imagename'] 	= $ruta . 'hosteleria.jpg';
			$servicio['titulo'] 	= 'HOSTELERY';
			$servicio['texto'] 		= 'Lorém ipsúm dolor sit amet, partem eirmod deseruisse te his, te vel qúaeque iudicabit. At bónorum accusam similique est. Cu doming atomorum qui, ñe per deniqúe hónestatis, ad mel illud ófficiis facilísis. Nam regione recusábo ne. Vím adhuc illum mázim eu, ad pérfecto accúsamus vís. 
										Víx malis debitis id, pro cu iudico eripuit. Omnis audire eleífend ex pri, duo quém simul mólestie ei, no tamqúam noluissé phaedrúm has. Dícam ceteró repudiandae te séd, eum no porro explicari moderatius. Sit ut malorum ceteros suscípiantur, et sea vitaé veritus epicurei. Mundi atomorúm ex quo.';
			break;	
		
		case 'mantenimiento':
			$servicio['imagename'] 	= $ruta . 'mantenimiento.jpg';
			$servicio['titulo'] 	= 'MAINTENANCE';
			$servicio['texto'] 		= 'Lorém ipsúm dolor sit amet, partem eirmod deseruisse te his, te vel qúaeque iudicabit. At bónorum accusam similique est. Cu doming atomorum qui, ñe per deniqúe hónestatis, ad mel illud ófficiis facilísis. Nam regione recusábo ne. Vím adhuc illum mázim eu, ad pérfecto accúsamus vís. 
										Víx malis debitis id, pro cu iudico eripuit. Omnis audire eleífend ex pri, duo quém simul mólestie ei, no tamqúam noluissé phaedrúm has. Dícam ceteró repudiandae te séd, eum no porro explicari moderatius. Sit ut malorum ceteros suscípiantur, et sea vitaé veritus epicurei. Mundi atomorúm ex quo.';
			break;	
		
		case 'proyectos':
			$servicio['imagename'] 	= $ruta . 'proyectos.jpg';
			$servicio['titulo'] 	= 'PROJECTS';
			$servicio['texto'] 		= 'Lorém ipsúm dolor sit amet, partem eirmod deseruisse te his, te vel qúaeque iudicabit. At bónorum accusam similique est. Cu doming atomorum qui, ñe per deniqúe hónestatis, ad mel illud ófficiis facilísis. Nam regione recusábo ne. Vím adhuc illum mázim eu, ad pérfecto accúsamus vís. 
										Víx malis debitis id, pro cu iudico eripuit. Omnis audire eleífend ex pri, duo quém simul mólestie ei, no tamqúam noluissé phaedrúm has. Dícam ceteró repudiandae te séd, eum no porro explicari moderatius. Sit ut malorum ceteros suscípiantur, et sea vitaé veritus epicurei. Mundi atomorúm ex quo.';
			break;	
		
		default:
			# code...
			break;
	}
	return $servicio;
}



?>