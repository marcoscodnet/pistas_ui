<?php

namespace Pistas\UI\components\filter\pista;

use Pistas\UI\components\filter\model\UIPistaCriteria;

use Pistas\UI\components\grid\model\PistaSinMenuGridModel;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;
use Rasty\utils\RastyUtils;

/**
 * Filtro para buscar pistas
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class PistaSinMenuFilter extends Filter{
		
	
	
	public function getType(){
		
		return "PistaSinMenuFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new PistaSinMenuGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UIPistaCriteria()) );
		
		//$this->setSelectRowCallback("seleccionarPista");
		
		//agregamos las propiedades a popular en el submit.
		
		$this->addProperty("pistaOArtista");
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		/*$this->fillInput("nombre", $this->getInitialText() );
		$this->fillInput("artista", $this->getInitialText() );
		*/
		$filtro = RastyUtils::getParamGET("string");
		$this->fillInput("pistaOArtista", $filtro );
		
		parent::parseXTemplate($xtpl);
		
		//$xtpl->assign("lbl_submit",  $this->localize("form.volver") );
		$xtpl->assign("lbl_volver",  $this->localize("form.volver") );
		
		$xtpl->assign("lbl_nombre",  $this->localize("pista.pistaOArtista") );
		/*$xtpl->assign("lbl_artista",  $this->localize("pista.artista") );
		
		
		//$xtpl->assign("linkSeleccionar",  LinkBuilder::getPageUrl( "HistoriaClinica") );
		$xtpl->assign("linkSeleccionar",  LinkBuilder::getPageUrl( "PistaModificar") );*/
		
		
	}
}
?>