<?php
namespace Pistas\UI\actions\pistas;

use Pistas\UI\components\form\pista\PistaForm;

use Pistas\UI\service\UIServiceFactory;
use Pistas\UI\utils\PistasUtils;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\factory\ComponentConfig;
use Rasty\factory\ComponentFactory;

use Rasty\i18n\Locale;

use Rasty\factory\PageFactory;

/**
 * se realiza la actualización de un pista.
 * 
 * @author Marcos
 * @since 06/03/2018
 */
class ModificarPista extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("PistaModificar");
		
		$pistaForm = $page->getComponentById("pistaForm");
			
		$oid = $pistaForm->getOid();
						
		try {

			//obtenemos el pista.
			$pista = UIServiceFactory::getUIPistaService()->get($oid );
		
			//lo editamos con los datos del formulario.
			$pistaForm->fillEntity($pista);
			
			PistaMp3Helper::process($pista);	
			
			if ($pista->getMp3()) {
				$pista->setMp3($pista->getOid().'-'.$pista->getNombre().".mp3");
				
			}
			
			//guardamos los cambios.
			UIServiceFactory::getUIPistaService()->update( $pista );
			
			$forward->setPageName( $pistaForm->getBackToOnSuccess() );
			$forward->addParam( "pistaOid", $pista->getOid() );
			
			$pistaForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "PistaModificar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
			//guardamos lo ingresado en el form.
			$pistaForm->save();
			
		}
		return $forward;
		
	}

}
?>