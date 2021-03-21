<?php
namespace Pistas\UI\pages\artistas\agregar;

use Pistas\UI\pages\PistasPage;

use Rasty\utils\XTemplate;
use Pistas\Core\model\Artista;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class ArtistaAgregar extends PistasPage{

	/**
	 * Artista a agregar.
	 * @var Artista
	 */
	private $Artista;

	
	
	public function __construct(){
		
		//inicializamos el Artista.
		$Artista = new Artista();
		
		//$Artista->setNombre("Bernardo");
		//$Artista->setEmail("ber@mail.com");
		$this->setArtista($Artista);
		
		
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "form.volver") );
		$menuOption->setPageName("Artistas");
		$menuGroup->addMenuOption( $menuOption );
		
		
		return array($menuGroup);
	}
	
	public function getTitle(){
		return $this->localize( "artista.agregar.title" );
	}

	public function getType(){
		
		return "ArtistaAgregar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		$artistaForm = $this->getComponentById("artistaForm");
		$artistaForm->fillFromSaved( $this->getArtista() );
		
	}


	public function getArtista()
	{
	    return $this->Artista;
	}

	public function setArtista($Artista)
	{
	    $this->Artista = $Artista;
	}
	
	
					
	public function getMsgError(){
		return "";
	}
}
?>