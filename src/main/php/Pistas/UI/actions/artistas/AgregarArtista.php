<?php
namespace Pistas\UI\actions\artistas;


use Pistas\UI\components\form\artista\ArtistaForm;

use Pistas\UI\service\UIServiceFactory;
use Pistas\Core\model\Artista;

use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;
use Rasty\exception\RastyDuplicatedException;


/**
 * se realiza el alta de una Artista.
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class AgregarArtista extends Action{

	
	public function execute(){

		$forward = new Forward();

		$page = PageFactory::build("ArtistaAgregar");
		
		$artistaForm = $page->getComponentById("artistaForm");
		
		try {

			//creamos una nueva artista.
			$artista = new Artista();
			
			//completados con los datos del formulario.
			$artistaForm->fillEntity($artista);
			
			//agregamos el artista.
			UIServiceFactory::getUIArtistaService()->add( $artista );
			
			ArtistaImagenHelper::process($artista);	
			
			$forward->setPageName( $artistaForm->getBackToOnSuccess() );
			$forward->addParam( "artistaOid", $artista->getOid() );			
		
			$artistaForm->cleanSavedProperties();
			
		
		} catch (RastyException $e) {
		
			$forward->setPageName( "ArtistaAgregar" );
			$forward->addError( Locale::localize($e->getMessage())  );
			
			//guardamos lo ingresado en el form.
			$artistaForm->save();
		}
		
		return $forward;
		
	}

}
?>