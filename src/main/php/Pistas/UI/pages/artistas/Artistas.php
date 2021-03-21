<?php
namespace Pistas\UI\pages\artistas;

use Pistas\UI\service\UIServiceFactory;

use Pistas\UI\components\filter\model\UIArtistaCriteria;

use Pistas\UI\components\grid\model\ArtistaGridModel;

use Pistas\UI\pages\PistasPage;

use Pistas\UI\utils\PistasUtils;

use Pistas\Core\criteria\ArtistaCriteria;

use Rasty\utils\XTemplate;
use Rasty\utils\RastyUtils;
use Rasty\i18n\Locale;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;


/**
 * Página para consultar los movimientos de banco.
 * 
 * @author Marcos
 * @since 16-03-2018
 * 
 */
class Artistas extends PistasPage{

	
	private $artistaCriteria;
	
	public function __construct(){
		$artistaCriteria = new ArtistaCriteria();
		
		
		$this->setArtistaCriteria($artistaCriteria);
	}
	
	public function getTitle(){
		return $this->localize( "artista.title" );
	}

	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "artista.agregar") );
		$menuOption->setPageName("ArtistaAgregar");
		$menuOption->setImageSource( $this->getWebPath() . "css/images/add_over_48.png" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getType(){
		
		return "Artistas";
		
	}	

	public function getModelClazz(){
		return get_class( new ArtistaGridModel() );
	}

	public function getUicriteriaClazz(){
		return get_class( new UIArtistaCriteria() );
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		$xtpl->assign("legend_operaciones", $this->localize("grid.operaciones") );
		$xtpl->assign("legend_resultados", $this->localize("grid.resultados") );
		
		$xtpl->assign("agregar_label", $this->localize("artista.agregar") );
		$artistaFilter = $this->getComponentById("artistasFilter");
		//print_r($artistaFilter);
		$artistaFilter->fillFromSaved( $this->getArtistaCriteria() );
	}
	
	public function getArtistaCriteria()
	{
	    return $this->artistaCriteria;
	}

	public function setArtistaCriteria($artistaCriteria)
	{
	    $this->artistaCriteria = $artistaCriteria;
	}


}
?>