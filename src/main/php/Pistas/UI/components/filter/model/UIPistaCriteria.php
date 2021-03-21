<?php
namespace Pistas\UI\components\filter\model;


use Pistas\UI\components\filter\model\UIPistasCriteria;

use Rasty\utils\RastyUtils;
use Pistas\Core\criteria\PistaCriteria;

/**
 * Representa un criterio de búsqueda
 * para pistas.
 * 
 * @author Marcos
 * @since 16/03/2018
 *
 */
class UIPistaCriteria extends UIPistasCriteria{


	private $nombre;
	private $artista;
	
	private $pistaOArtista;
	
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
		return new PistaCriteria();
	}
	
	public function buildCoreCriteria(){
		
		$criteria = parent::buildCoreCriteria();
				
		$criteria->setNombre( $this->getNombre() );
		$criteria->setArtista( $this->getArtista() );
		$criteria->setPistaOArtista( $this->getPistaOArtista() );
		
		return $criteria;
	}


	

	

	public function getArtista()
	{
	    return $this->artista;
	}

	public function setArtista($artista)
	{
	    $this->artista = $artista;
	}

	public function getPistaOArtista()
	{
	    return $this->pistaOArtista;
	}

	public function setPistaOArtista($pistaOArtista)
	{
	    $this->pistaOArtista = $pistaOArtista;
	}
}