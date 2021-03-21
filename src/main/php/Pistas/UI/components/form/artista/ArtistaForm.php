<?php

namespace Pistas\UI\components\form\artista;

use Pistas\UI\components\filter\model\UIArtistaCriteria;

use Pistas\UI\service\finder\ArtistaFinder;



use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\service\UIServiceFactory;


use Rasty\Forms\form\Form;

use Rasty\components\RastyComponent;
use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;



use Rasty\utils\LinkBuilder;

/**
 * Formulario para artista

 * @author Marcos
 * @since 16/03/2018
 */
class ArtistaForm extends Form{
		
	

	/**
	 * label para el cancel
	 * @var string
	 */
	private $labelCancel;
	

	/**
	 * 
	 * @var Artista
	 */
	private $artista;
	
	
	public function __construct(){

		parent::__construct();
		$this->setLabelCancel("form.cancelar");
		
		$this->addProperty("nombre");
		$this->addProperty("imagen");
		
		$this->setBackToOnSuccess("Artistas");
		$this->setBackToOnCancel("Artistas");
		
		
	}
	
	public function getOid(){
		
		return $this->getComponentById("oid")->getPopulatedValue( $this->getMethod() );
	}
	
	
	public function getType(){
		
		return "ArtistaForm";
		
	}
	
	public function fillEntity($entity){
		
		parent::fillEntity($entity);
		
		
		
		
	}

	protected function parseXTemplate(XTemplate $xtpl){

		parent::parseXTemplate($xtpl);
		
		
		$xtpl->assign("cancel", $this->getLinkCancel() );
		$xtpl->assign("lbl_cancel", $this->localize( $this->getLabelCancel() ) );
		
		$xtpl->assign("lbl_nombre", $this->localize("artista.nombre") );
		
		$xtpl->assign("lbl_imagen", $this->localize("artista.imagen") );

		
		if ($this->getArtista()->getImagen()) {
			
			
			
			$mostrarImagen = 'var img = "<img id=\"uploadedImageuploadImage\" src=\"'.PistasUIUtils::getImagenArtista( $this->getArtista() ).'\" width=\"300px\" height=\"\">";
			$("#uploadedImageContaineruploadImage").html(img);	
			$("#uploadedImageDivuploadImage").show();';
			
			$xtpl->assign("mostrarImagen",$mostrarImagen);
		}
		
	}


	public function getLabelCancel()
	{
	    return $this->labelCancel;
	}

	public function setLabelCancel($labelCancel)
	{
	    $this->labelCancel = $labelCancel;
	}


	
	public function getArtista()
	{
	    return $this->artista;
	}

	public function setArtista($artista)
	{
	    $this->artista = $artista;
	    
	}
	
	public function getLinkCancel(){
		$params = array();
		
		return LinkBuilder::getPageUrl( $this->getBackToOnCancel() , $params) ;
	}

	public function getUploadPath(){
		return PistasUIUtils::getUploadPathImagenArtistas();
	}
	
	public function getUploadWebPath(){
		return PistasUIUtils::getUploadWebPathImagenArtistas();
	}
	
	
}
?>