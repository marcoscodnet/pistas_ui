<?php

namespace Pistas\UI\components\header;

use Pistas\UI\utils\PistasUIUtils;

use Rasty\components\RastyComponent;
use Rasty\utils\RastyUtils;
use Rasty\utils\XTemplate;

use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;
use Rasty\Menu\menu\model\MenuActionOption;
use Rasty\Menu\menu\model\SubmenuOption;

class HeaderNav extends RastyComponent{

	private $title;
	
	private $pageMenuGroups;

	public function __construct(){
		$this->pageMenuGroups = array();
		//$this->setTitle($this->localize("app.title"));
	}
	
	public function getType(){
		
		return "HeaderNav";
		
	}
	
	protected function parseXTemplate(XTemplate $xtpl){

		
		//$xtpl->assign("cuentas_titulo", $this->localize("app.title"));
		$titles = array();
		$titles[] = $this->localize("app.title");
		$titles[] = $this->getTitle();
		
		$xtpl->assign("Pistas_titulo", implode(" / ", $titles));
		
		$xtpl->assign("menu_page", $this->localize("menu.page"));
		$xtpl->assign("menu_main", $this->localize("menu.page"));
		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "form.volver") );
		$menuOption->setPageName("Pistas");
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	
	public function getMainMenuGroups(){
		
		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroups = array();
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.artistas") );
		$menuOption->setPageName( "Artistas" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		$menuGroups[] =  $menuGroup;
		
	
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.pistas") );
		$menuOption->setPageName( "Pistas" );
		$menuGroup->addMenuOption( $menuOption );
		
		
		$menuGroups[] =  $menuGroup;
			
				
			/*$menu = $this->getMenuPistas() ;
			if($menu)
				$menuGroups[] =  $menu;*/
									
			
				
		
		

		return $menuGroups;
	}
	
	public function getPageMenuGroups(){
		
		return $this->pageMenuGroups;
	}

	public function setPageMenuGroups($pageMenuGroups)
	{
	    $this->pageMenuGroups = $pageMenuGroups;
	}

	public function getTitle()
	{
	    return $this->title;
	}

	public function setTitle($title)
	{
		if(!empty($title))
	    	$this->title = $title;
	}
		
	
	
	public function getMenuPistas(){
		
		$menuGroup = new MenuGroup();
		$menuGroup->setLabel( $this->localize( "menu.pistas") );
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.artistas") );
		$menuOption->setPageName( "Artistas" );
		
		PistasUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.pistas") );
		$menuOption->setPageName( "Pistas" );
		
		PistasUIUtils::addMenuOptionToGroup($menuOption, $menuGroup);
		
		if( count($menuGroup->getMenuOptions())> 0){

			$submenu = new SubmenuOption($menuGroup);
			//$submenu->setIconClass("icon-seguridad");
			return $submenu;
			
		}else{
			return false;
		}
		
		
	}
	
	
	
}
?>