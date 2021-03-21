<?php
namespace Pistas\UI\pages\pistas;

use Pistas\UI\pages\PistasPage;

use Pistas\UI\components\filter\model\UIPistaCriteria;

use Pistas\UI\components\grid\model\PistaGridModel;

use Pistas\UI\service\UIPistaService;

use Pistas\UI\utils\PistasUtils;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Pistas\Core\model\Pista;
use Pistas\Core\criteria\PistaCriteria;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar los pistas.
 * 
 * @author Marcos
 * @since 16/03/2018
 * 
 */
class Pistas extends PistasPage{

	
	
	private $pistaCriteria;
	
	public function __construct(){
		$pistaCriteria = new PistaCriteria();
		
		
		$this->setPistaCriteria($pistaCriteria);
	}
	
	public function getTitle(){
		return $this->localize( "pistas.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "pista.agregar") );
		$menuOption->setPageName("PistaAgregar");
		$menuOption->setImageSource( $this->getWebPath() . "css/images/add_over_48.png" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "Pistas";
		
	}	

	public function getModelClazz(){
		return get_class( new PistaGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UIPistaCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		$xtpl->assign("agregar_label", $this->localize("pista.agregar") );
		$pistaFilter = $this->getComponentById("pistasFilter");
		//print_r($pistaFilter);
		$pistaFilter->fillFromSaved( $this->getPistaCriteria() );
	}
	
	public function getPistaCriteria()
	{
	    return $this->pistaCriteria;
	}

	public function setPistaCriteria($pistaCriteria)
	{
	    $this->pistaCriteria = $pistaCriteria;
	}

}
?>