<?php

namespace Pistas\UI\components\form\pista;

use Pistas\UI\components\filter\model\UIPistaCriteria;

use Pistas\UI\service\finder\PistaFinder;

use Pistas\UI\components\filter\model\UIArtistaCriteria;

use Pistas\UI\service\finder\ArtistaFinder;



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
 * Formulario para pista

 * @author Marcos
 * @since 16/03/2018
 */
class PistaForm extends Form{
		
	

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
		
		$this->addProperty("artista");
		
		$this->addProperty("mp3");
		
		
		
		
		$this->setBackToOnSuccess("Pistas");
		$this->setBackToOnCancel("Pistas");
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "PistaForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
		
		
		
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );
		
		$xtpl->assign("lbl_nombre", $this->localize("pista.nombre") );
		$xtpl->assign("lbl_artista", $this->localize("pista.artista") );
		
		$xtpl->assign("lbl_uploadFile", $this->localize("pista.uploadFile") );
		
		$xtpl->assign("pathMp3", PistasUIUtils::getUploadWebPathMp3Pistas() );
		
		$reproductor='';
		if ($this->getPista()->getMp3()) {
			$reproductor='<audio src="'.PistasUIUtils::getUploadWebPathMp3Pistas().$this->getPista()->getMp3().'" controls controlsList="nodownload" type="audio/mpeg"></audio>';
		}
		
		$xtpl->assign( "mp3", $reproductor );
		
		
		
	}


	public function getLabelCancel()
	{
	    return $this->labelCancel;
	}

	public function setLabelCancel($labelCancel)
	{
	    $this->labelCancel = $labelCancel;
	}


	
	public function getPista()
	{
	    return $this->pista;
	}

	public function setPista($pista)
	{
	    $this->pista = $pista;
	    
	}
	
	public function getLinkCancel(){
		$params = array();
		
		return LinkBuilder::getPageUrl( $this->getBackToOnCancel() , $params) ;
	}


	public function getArtistaFinderClazz(){
		
		return get_class( new ArtistaFinder() );
		
	}	
	
	
	public function getArtistas(){
		
		$artistas = UIServiceFactory::getUIArtistaService()->getList( new UIArtistaCriteria() );
		
		return $artistas;
	}
	
	public function getUploadPath(){
		return PistasUIUtils::getUploadPathMp3Pistas();
	}
	
	public function getUploadWebPath(){
		return PistasUIUtils::getUploadWebPathMp3Pistas();
	}
}
?>