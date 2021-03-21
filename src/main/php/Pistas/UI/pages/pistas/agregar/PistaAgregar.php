<?php
namespace Pistas\UI\pages\pistas\agregar;

use Pistas\UI\pages\PistasPage;

use Rasty\utils\XTemplate;
use Pistas\Core\model\Pista;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class PistaAgregar extends PistasPage{

	/**
	 * pista a agregar.
	 * @var Pista
	 */
	private $pista;


	public function __construct(){
		
		//inicializamos el pista.
		$pista = new Pista();
		
		
		$this->setPista($pista);
		
		
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
	
	public function getTitle(){
		return $this->localize( "pista.agregar.title" );
	}

	public function getType(){
		
		return "PistaAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$pistaForm = $this->getComponentById("pistaForm");
		$pistaForm->fillFromSaved( $this->getPista() );
		
	}


	public function getPista()
	{
	    return $this->pista;
	}

	public function setPista($pista)
	{
	    $this->pista = $pista;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>