<?php
namespace Pistas\UI\actions\pistas;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\service\UIServiceFactory;
use Pistas\Core\model\Pista;
use Pistas\Core\utils\PistasUtils;

use Rasty\actions\JsonAction;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se eliminar un tipo de documento
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class EliminarPista extends JsonAction{

	
	public function execute(){

		try {

			$pistaOid = RastyUtils::getParamGET("pistaOid");
			
			//obtenemos la pista
			$pista = UIServiceFactory::getUIPistaService()->get($pistaOid);
			
			$mp3Uri = PistasUIUtils::getPathMp3Pistas()."/".$pista->getOid().'-'.$pista->getNombre().".mp3";
			if(file_exists($mp3Uri)){
				unlink($mp3Uri);	
			}
				
			UIServiceFactory::getUIPistaService()->delete($pista);
			
			
			
			$result["info"] = Locale::localize("pista.borrar.success")  ;
			
		} catch (RastyException $e) {
		
			$result["error"] = Locale::localize($e->getMessage())  ;
			
		}
		
		return $result;		
		
	}
}
?>