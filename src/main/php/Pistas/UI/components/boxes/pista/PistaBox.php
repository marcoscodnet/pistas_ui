<?php

namespace Pistas\UI\components\boxes\pista;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\service\UIServiceFactory;

use Rasty\components\RastyComponent;
use Rasty\utils\RastyUtils;

use Rasty\utils\XTemplate;

use Pistas\Core\model\Pista;

use Rasty\utils\LinkBuilder;

/**
 * pista.
 * 
 * @author Marcos
 * @since 29-07-2019
 */
class PistaBox extends RastyComponent{
		
	private $pista;
	
	public function getType(){
		
		return "PistaBox";
		
	}

	public function __construct(){
		
		
	}

	protected function parseLabels(XTemplate $xtpl){
		
		
		$xtpl->assign("lbl_nombre",  $this->localize( "pista.nombre" ) );
		$xtpl->assign("lbl_mp3",  $this->localize( "pista.mp3" ) );
		$xtpl->assign("lbl_artista",  $this->localize( "pista.artista" ) );
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){
		
		/*labels*/
		$this->parseLabels($xtpl);
		
		$pista = $this->getPista();
		
			
		$xtpl->assign( "nombre", $this->getPista()->getNombre() );
		$xtpl->assign( "artista",  $this->getPista()->getArtista()  );
		$reproductor='';
		if ($this->getPista()->getMp3()) {
			$reproductor='<audio src="'.PistasUIUtils::getUploadWebPathMp3Pistas().$this->getPista()->getMp3().'" controls controlsList="nodownload" type="audio/mpeg" preload="preload"></audio>';
		}
		
		$xtpl->assign( "mp3", $reproductor );
		
	
	
		if ($this->getPista()->getArtista()->getImagen()) {
			
			
			
			
			
			$mostrarImagen = '<span id="uploadedImageContaineruploadImage">
							<img id="uploadedImageuploadImage" src="'.PistasUIUtils::getImagenArtista( $this->getPista()->getArtista() ).'" width="300px" height="">
							</span>';
			
			
			$xtpl->assign("mostrarImagen",$mostrarImagen);
		}
		
	}
	
	
	protected function initObserverEventType(){
		$this->addEventType( "Pista" );
	}
	
	public function setPistaOid($oid){
		if( !empty($oid) ){
			$pista = UIServiceFactory::getUIPistaService()->get($oid);
			$this->setPista($pista);
		}
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