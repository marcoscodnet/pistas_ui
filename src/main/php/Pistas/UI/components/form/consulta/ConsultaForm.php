<?php

namespace Pistas\UI\components\form\consulta;





use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\service\UIServiceFactory;


use Rasty\Forms\form\Form;

use Rasty\components\RastyComponent;
use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;


use Pistas\Core\model\Pista;

use Pistas\Core\model\Artista;


use Rasty\utils\LinkBuilder;

/**
 * Formulario para consulta

 * @author Marcos
 * @since 06/09/2019
 */
class ConsultaForm extends Form{
		
	

	/**
	 * label para el cancel
	 * @var string
	 */
	private $labelCancel;
	
	/**
	 * 
	 * @var Pista
	 */
	private $pista;
	
	
	
	public function __construct(){

		parent::__construct();
		$this->setLabelCancel("form.cancelar");
		
		$this->addProperty("nombre");
		
		$this->addProperty("mail");
		
		$this->addProperty("mensaje");
		
		
		
		
		$this->setBackToOnSuccess("PistasSinMenuNuevo");
		$this->setBackToOnCancel("PistasSinMenuNuevo");
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "ConsultaForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
		
		
		
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );
		
		
		$xtpl->assign( "legend", $this->localize( "pista.consultar.legend") );
		
		$xtpl->assign("lbl_nombre", $this->localize("consultarPista.nombre") );
		$xtpl->assign("lbl_mail", $this->localize("consultarPista.mail") );
		$xtpl->assign("lbl_mensaje", $this->localize("consultarPista.mensaje") );
		
		if (RastyUtils::getParamGET( "lang" )) {
			$xtpl->assign("lang", RastyUtils::getParamGET( "lang" ) );
		}
		
		//$xtpl->assign( "linkConsultarPista", $this->getLinkActionConsultarPista($this->getPista()) );
		
		
		
	}


	public function getLabelCancel()
	{
	    return $this->labelCancel;
	}

	public function setLabelCancel($labelCancel)
	{
	    $this->labelCancel = $labelCancel;
	}


	
	
	
	public function getLinkCancel(){
		$params = array();
		if (RastyUtils::getParamGET("lang")) {
			$params = array('lang'=>RastyUtils::getParamGET("lang"));
		}
		
		
		return LinkBuilder::getPageUrl( $this->getBackToOnCancel() , $params) ;
	}

	public function setConsulta()
	{
	    
	}	
	

	public function getPista()
	{
	    return $this->pista;
	}

	public function setPista($pista)
	{
	    $this->pista = $pista;
	}
	
	
	
	
}
?>