<?php
namespace Pistas\UI\pages\pistas\consultar;

use Pistas\UI\service\UIServiceFactory;



use Pistas\Core\utils\PistasUtils;
use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\pages\PistasPage;

use Rasty\utils\XTemplate;
use Pistas\Core\model\Pista;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;




use Rasty\utils\LinkBuilder;

class PistaConsultarSinMenu extends PistasPage{

	private $consulta;
	private $pista;

	private $error;
	
	public function isSecure(){
		return false;
	}
	
	public function __construct(){
		
		//inicializamos el pista.
		$pista = new Pista();
		
		
		$this->setPista($pista);

		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
//		$menuOption = new MenuOption();
//		$menuOption->setLabel( $this->localize( "form.volver") );
//		$menuOption->setPageName("Pistas");
//		$menuGroup->addMenuOption( $menuOption );
//		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "pista.consultar.title" );
	}

	public function getType(){
		
		return "PistaConsultarSinMenu";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
		
		/*$consultaForm = $this->getComponentById("consultaForm");
		$consultaForm->fillFromSaved( $this->getPista() );*/
		
		
		$xtpl->assign( "pista_legend", $this->localize( "consultarPista.pista.legend") );
		
		
		/*$xtpl->assign("lbl_nombre", $this->localize("consultarPista.nombre") );
		$xtpl->assign("lbl_mail", $this->localize("consultarPista.mail") );
		$xtpl->assign("lbl_mensaje", $this->localize("consultarPista.mensaje") );
		
		$xtpl->assign( "linkConsultarPista", $this->getLinkActionConsultarPista($this->getPista()) );
		
		$msg = $this->getError();
		
		if( !empty($msg) ){
			
			$xtpl->assign("msg", $msg);
			//$xtpl->assign("msg",  );
			$xtpl->parse("main.msg_error" );
		}
		$xtpl->assign( "lbl_submit", $this->localize("consultarPista.confirm") );
		$xtpl->assign( "lbl_cancel", $this->localize("consultarPista.cancel") );*/
	}


	public function getPista()
	{
	    return $this->pista;
	}

	public function setPista($pista)
	{
	    $this->pista = $pista;
	}
	
	public function setPistaOid($pistaOid)
	{
		if(!empty($pistaOid)){
			$pista = UIServiceFactory::getUIPistaService()->get($pistaOid);
			$this->setPista($pista);
		}
		
	    
	}
	
	
	

	
	
	
			
	public function getMsgError(){
		return "";
	}

	public function getError()
	{
	    return $this->error;
	}

	public function setError($error)
	{
	    $this->error = $error;
	}

	public function getConsulta()
	{
	    return $this->consulta;
	}

	public function setConsulta($consulta)
	{
	    $this->consulta = $consulta;
	}
}
?>