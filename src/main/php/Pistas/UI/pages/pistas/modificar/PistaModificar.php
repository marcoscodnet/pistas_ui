<?php
namespace Pistas\UI\pages\pistas\modificar;

use Pistas\UI\pages\PistasPage;

use Pistas\UI\service\UIServiceFactory;

use Rasty\utils\XTemplate;
use Pistas\Core\model\Pista;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuOption;

class PistaModificar extends PistasPage{

	/**
	 * pista a modificar.
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
		
		return array($menuGroup);
	}
	
	public function setPistaOid($oid){
		
		//a partir del id buscamos el pista a modificar.
		$pista = UIServiceFactory::getUIPistaService()->get($oid);
		
		$this->setPista($pista);
		
	}
	
	public function getTitle(){
		return $this->localize( "pista.modificar.title" );
	}

	public function getType(){
		
		return "PistaModificar";
		
	}	

	protected function parseXTemplate(XTemplate $xtpl){
		
	}

	public function getPista(){
		
	    return $this->pista;
	}

	public function setPista($pista)
	{
	    $this->pista = $pista;
	}
}
?>