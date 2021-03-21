<?php
namespace Pistas\UI\actions\login;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\service\UIServiceFactory;

use Pistas\Core\utils\PistasUtils;


use Rasty\actions\Action;
use Rasty\actions\Forward;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;



/**
 * se realiza el login contra el core.
 * 
 * @author Marcos
 * @since 01/03/2018
 */
class Login extends Action{

	public function isSecure(){
		return false;
	}
	
	public function execute(){

		$forward = new Forward();			
		try {

			
			RastySecurityContext::login( RastyUtils::getParamPOST("username"), RastyUtils::getParamPOST("password") );
			
			//PistasUIUtils::setSucursal( PistasUtils::getSucursalDefault() );
		
			$user = RastySecurityContext::getUser();
			
			$user = PistasUtils::getUserByUsername($user->getUsername());
		
			if( PistasUtils::isAdmin($user)){
				
				//$empleado = PistasUtils::getEmpleadoDefault();
				PistasUIUtils::loginAdmin($user);
				
			}else{
				
				//TODO
			}
			
			if(  PistasUIUtils::isAdminLogged()  )
				$forward->setPageName( $this->getForwardAdmin() );
			else  	
				$forward->setPageName( $this->getErrorForward() );
			
				
		} catch (RastyException $e) {
		
			$forward->setPageName( $this->getErrorForward() );
			$forward->addError( $e->getMessage() );
			
		}
		
		return $forward;
		
	}
	
	protected function getForwardAdmin(){
		return "Pistas";
	}
	
	protected function getErrorForward(){
		return "Login";
	}
}
?>