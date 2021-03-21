<?php

namespace Pistas\UI\components\filter\pista;

use Pistas\UI\components\filter\model\UIPistaCriteria;

use Pistas\UI\components\grid\model\PistaGridModel;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Filtro para buscar pistas
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class PistaFilter extends Filter{
		
	
	
	public function getType(){
		
		return "PistaFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new PistaGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UIPistaCriteria()) );
		
		//$this->setSelectRowCallback("seleccionarPista");
		
		//agregamos las propiedades a popular en el submit.
		$this->addProperty("nombre");
		$this->addProperty("artista");
		
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		/*$this->fillInput("nombre", $this->getInitialText() );
		$this->fillInput("artista", $this->getInitialText() );
		*/
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_nombre",  $this->localize("pista.nombre") );
		$xtpl->assign("lbl_artista",  $this->localize("pista.artista") );
		
		
		//$xtpl->assign("linkSeleccionar",  LinkBuilder::getPageUrl( "HistoriaClinica") );
		$xtpl->assign("linkSeleccionar",  LinkBuilder::getPageUrl( "PistaModificar") );
		
		
	}
}
?>