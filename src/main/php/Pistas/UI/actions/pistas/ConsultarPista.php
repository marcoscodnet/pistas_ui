<?php
namespace Pistas\UI\actions\pistas;

use Pistas\UI\components\form\pista\ConsultaForm;

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
 * se envía un mail con la consulta de la pista
 * 
 * @author Marcos
 * @since 06/09/2019
 */
class ConsultarPista extends Action{

	public function isSecure(){
		return false;
	}
	
	public function execute(){

		$forward = new Forward();
		
		$page = PageFactory::build("PistaConsultarSinMenu");
		
		$consultaForm = $page->getComponentById("consultaForm");
			
	
		
		$oid = $consultaForm->getOid();
						
		try {

			//obtenemos el pista.
			$pista = UIServiceFactory::getUIPistaService()->get($oid );
		
			
			
			//guardamos los cambios.
			UIServiceFactory::getUIPistaService()->enviarMail( $pista, RastyUtils::getParamPOST( "nombre" ), RastyUtils::getParamPOST( "mail" ), RastyUtils::getParamPOST( "mensaje" ), RastyUtils::getParamPOST( "lang" ));
			
			$forward->setPageName( $consultaForm->getBackToOnSuccess() );
			//$forward->addError( 'Consulta enviada con éxito' );
			$forward->addParam("exito", Locale::localize("consultarPista.envio.exito")  );
			
			$forward->addParam("lang", RastyUtils::getParamPOST( "lang" ) );
			$consultaForm->cleanSavedProperties();
			
		} catch (RastyException $e) {
		
			$forward->setPageName( "PistaConsultarSinMenu" );
			$forward->addError( Locale::localize($e->getMessage())  );
			$forward->addParam("pistaOid", $oid );
			$forward->addParam("lang", RastyUtils::getParamPOST( "lang" ) );
			//guardamos lo ingresado en el form.
			//$consultaForm->save();
			
		}
		return $forward;
		
	}

}
?>