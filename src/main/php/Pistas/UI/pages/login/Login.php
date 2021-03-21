<?php
namespace Pistas\UI\pages\login;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;
/**
 * Login de Pistas.
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class Login extends RastyPage{

	private $error;
	public function isSecure(){
		return false;
	}
	
	public function getTitle(){
		return $this->localize("login.title");
	}

	public function getType(){
		
		return "Login";
		
	}	
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("login_titulo", $this->localize( "login.titulo" ) );
		$xtpl->assign("login_subtitulo", $this->localize( "login.subtitulo" ) );

		$xtpl->assign("iniciar_sesion", $this->localize( "login.iniciar_sesion" ) );
		
		$xtpl->assign("login_action", LinkBuilder::getActionUrl( "Login") );
	
		$xtpl->assign("lbl_username", $this->localize( "login.username" ) );
		$xtpl->assign("txt_ingrese_username", $this->localize( "login.ingrese_username" ) );
		
		$xtpl->assign("lbl_password", $this->localize( "login.password" ) );
		$xtpl->assign("txt_ingrese_password", $this->localize( "login.ingrese_password" ) );
		
		$xtpl->assign("txt_campos_obligatorios", $this->localize( "common.campos_obligatorios" ) );
		
		$xtpl->assign("btn_ingresar", $this->localize( "login.ingresar" ) );
		
		$xtpl->assign("link_solicitarClave", LinkBuilder::getPageUrl( "NuevaClaveSolicitar") );
		$xtpl->assign("lbl_solicitarClave", $this->localize( "login.solicitarNuevaClave" ) );
		
		$xtpl->assign("link_registrarse", LinkBuilder::getPageUrl( "RegistracionAgregar") );
		$xtpl->assign("lbl_registrarse", $this->localize( "login.registrarse" ) );
		
		//chequemos los errores.
		$forward = $this->getForward();
		
		if( $forward->hasError() ){
			
			$xtpl->assign("msg", $forward->getError() );
			//$xtpl->assign("msg",  );
			$xtpl->parse("main.msg_error" );
		}			
		
	}

	public function getError()
	{
	    return $this->error;
	}

	public function setError($error)
	{
	    $this->error = $error;
	}
}
?>