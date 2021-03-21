<?php
namespace Pistas\UI\actions\artistas;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\service\UIServiceFactory;
use Pistas\Core\model\Artista;
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
class EliminarArtista extends JsonAction{

	
	public function execute(){

		try {

			$artistaOid = RastyUtils::getParamGET("artistaOid");
			
			//obtenemos la artista
			$artista = UIServiceFactory::getUIArtistaService()->get($artistaOid);

			UIServiceFactory::getUIArtistaService()->delete($artista);
			
			$result["info"] = Locale::localize("artista.borrar.success")  ;
			
		} catch (RastyException $e) {
		
			$result["error"] = Locale::localize($e->getMessage())  ;
			
		}
		
		return $result;		
		
	}
}
?>