<?php
namespace Pistas\UI\components\filter\model;


use Pistas\UI\components\filter\model\UIPistasCriteria;

use Rasty\utils\RastyUtils;
use Pistas\Core\criteria\ArtistaCriteria;

/**
 * Representa un criterio de búsqueda
 * para tiposProducto.
 * 
 * @author Marcos
 * @since 16/03/2018
 *
 */
class UIArtistaCriteria extends UIPistasCriteria{


	private $nombre;
	
	
	public function __construct(){

		parent::__construct();

	}
		
	public function getNombre()
	{
	    return $this->nombre;
	}

	public function setNombre($nombre)
	{
	    $this->nombre = $nombre;
	}

	
	protected function newCoreCriteria(){
		return new ArtistaCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setNombre( $this->getNombre() );
		
		return $criteria;
	}

}