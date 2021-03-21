<?php
namespace Pistas\UI\actions\pistas;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\components\form\pista\PistaForm;

use Pistas\UI\service\UIServiceFactory;
use Pistas\Core\model\Pista;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;

use Rasty\utils\Logger;

/**
 * colabora para el upload del mp3 de la pista
 * 
 * @author Marcos
 * @since 28/07/2019
 */
class PistaMp3Helper{

	
	public static function process(Pista $pista){

		$pistaMp3 = $pista->getMp3();
		if(empty($pistaMp3)) 
			return;
			
		//una vez que está todo ok, movemos la imagen y el thumbnail desde
		//el directorio de uploads al directorio de imágenes
		$uploadPath = PistasUIUtils::getUploadPathMp3Pistas();
		$mp3Path = PistasUIUtils::getPathMp3Pistas();
			
		//chequeamos si hay que crear el directorio de las imágenes
		if(!file_exists($mp3Path)){
			mkdir ($mp3Path);
			
		}
			
		//movemos las imágenes.
		$mp3Name = $pista->getMp3();
		
			
		$tmpMp3Uri = "$uploadPath/$mp3Name";
		
		
		$mp3Uri = $mp3Path."/".$pista->getOid().'-'.$pista->getNombre().".mp3";
		
		/*Logger::log($tmpMp3Uri);
		Logger::log($mp3Uri);*/
		if(file_exists($tmpMp3Uri)){
			if(!rename($tmpMp3Uri, $mp3Uri))
				throw new RastyException("upload.mp3.error");		
			//unlink($tmpMp3Uri);		
		}
		else{
			//throw new RastyException("upload.mp3.no.subido");
		}
			
		
	}

}
?>