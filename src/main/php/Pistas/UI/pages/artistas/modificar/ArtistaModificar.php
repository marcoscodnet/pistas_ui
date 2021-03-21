<?php
namespace Pistas\UI\pages\artistas\modificar;

use Pistas\UI\pages\PistasPage;

use Pistas\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Pistas\Core\model\Artista;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class ArtistaModificar extends PistasPage{

	/**
	 * artista a modificar.
	 * @var Artista
	 */
	private $artista;

	
	public function __construct(){
		
		//inicializamos el artista.
		$artista = new Artista();
		$this->setArtista($artista);
				
	}
	
	public function getMenuGroups(){

		//TODO construirlo a partir del usuario 
		//y utilizando permisos
		
		$menuGroup = new MenuGroup();
		
		return array($menuGroup);
	}
	
	public function setArtistaOid($oid){
		
		//a partir del id buscamos el artista a modificar.
		$artista = UIServiceFactory::getUIArtistaService()->get($oid);
		
		$this->setArtista($artista);
		
	}
	
	public function getTitle(){
		return $this->localize( "artista.modificar.title" );
	}

	public function getType(){
		
		return "ArtistaModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
	}

	public function getArtista(){
		
	    return $this->artista;
	}

	public function setArtista($artista)
	{
	    $this->artista = $artista;
	}
}
?>