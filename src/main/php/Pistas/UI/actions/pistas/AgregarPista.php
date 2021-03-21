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


/**
 * se realiza el alta de un pista.
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class AgregarPista extends Action{

	
	
	public function execute(){

		$forward = new Forward();

		$page = PageFactory::build("PistaAgregar");
		
		$pistaForm = $page->getComponentById("pistaForm");
		
		try {

			//creamos un nuevo pista.
			$pista = new Pista();
			
			//completados con los datos del formulario.
			$pistaForm->fillEntity($pista);
			
			//agregamos el pista.
			UIServiceFactory::getUIPistaService()->add( $pista );
			
			
			PistaMp3Helper::process($pista);	
			if ($pista->getMp3()) {
				$pista->setMp3($pista->getOid().'-'.$pista->getNombre().".mp3");
				UIServiceFactory::getUIPistaService()->update($pista);
			}
			
			$forward->setPageName( $pistaForm->getBackToOnSuccess() );
			$forward->addParam( "pistaOid", $pista->getOid() );			
		
			$pistaForm->cleanSavedProperties();
			
		} catch (RastyDuplicatedException $e) {
		
			$forward->setPageName( "PistaAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
						
			//guardamos lo ingresado en el form.
			$pistaForm->save();
		
		} catch (RastyException $e) {
		
			$forward->setPageName( "PistaAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
						
			//guardamos lo ingresado en el form.
			$pistaForm->save();
		}
		
		return $forward;
		
	}

}
?>