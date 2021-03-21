<?php

namespace Pistas\UI\components\filter\artista;

use Pistas\UI\components\filter\model\UIArtistaCriteria;

use Pistas\UI\components\grid\model\ArtistaGridModel;

use Rasty\Grid\filter\Filter;
use Rasty\utils\XTemplate;
use Rasty\utils\LinkBuilder;

/**
 * Filtro para buscar artistas
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class ArtistaFilter extends Filter{
		
	public function getType(){
		
		return "ArtistaFilter";
	}
	

	public function __construct(){
		
		parent::__construct();
		
		$this->setGridModelClazz( get_class( new ArtistaGridModel() ));
		
		$this->setUicriteriaClazz( get_class( new UIArtistaCriteria()) );
		
		//$this->setSelectRowCallback("seleccionarArtista");
		
		//agregamos las propiedades a popular en el submit.
		$this->addProperty("nombre");
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		//rellenamos el nombre con el texto inicial
		//$this->fillInput("nombre", $this->getInitialText() );
		
		parent::parseXTemplate($xtpl);
		
		$xtpl->assign("lbl_nombre",  $this->localize("artista.nombre") );
		
		//$xtpl->assign("linkSeleccionar",  LinkBuilder::getPageUrl( "HistoriaClinica") );
		$xtpl->assign("linkSeleccionar",  LinkBuilder::getPageUrl( "ArtistaModificar") );
		
		
	}
}
?>