<?php
namespace Pistas\UI\actions\artistas;

use Pistas\UI\components\form\artista\ArtistaForm;

use Pistas\UI\service\UIServiceFactory;

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
 * se realiza la actualización de una artista.
 * 
 * @author Marcos
 * @since 05/03/2018
 */
class ModificarArtista extends Action{

	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("ArtistaModificar");
		
		$artistaForm = $page->getComponentById("artistaForm");
			
		$oid = $artistaForm->getOid();
						
		try {

			//obtenemos la artista.
			$artista = UIServiceFactory::getUIArtistaService()->get($oid );
		
			//lo editamos con los datos del formulario.
			$artistaForm->fillEntity($artista);
			
			//guardamos los cambios.
			UIServiceFactory::getUIArtistaService()->update( $artista );
			
			ArtistaImagenHelper::process($artista);	
			
			$forward->setPageName( $artistaForm->getBackToOnSuccess() );
			$forward->addParam( "artistaOid", $artista->getOid() );
			
			$artistaForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "ArtistaModificar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("oid", $oid );
			
			//guardamos lo ingresado en el form.
			$artistaForm->save();
			
		}
		return $forward;
		
	}

}
?>