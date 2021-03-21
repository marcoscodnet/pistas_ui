<?php
namespace Pistas\UI\pages;

use Pistas\UI\utils\PistasUIUtils;
use Pistas\Core\model\Pista;

use Rasty\components\RastyPage;
use Rasty\utils\LinkBuilder;

/**
 * página genérica para la app de pistas
 * 
 * @author Marcos
 * @since 16/03/2018
 */
abstract class PistasPage extends RastyPage{


	
	public function getTitle(){
		return $this->localize( "pistas_app.title" );
	}

	public function getMenuGroups(){

		return array();
	}

	
	
	
	
	public function getLinkArtistas(){
		
		return LinkBuilder::getPageUrl( "Artistas") ;
		
	}

	public function getLinkArtistaAgregar(){
		
		return LinkBuilder::getPageUrl( "ArtistaAgregar") ;
		
	}
	
	public function getLinkActionAgregarArtista(){
		
		return LinkBuilder::getActionUrl( "AgregarArtista") ;
		
	}

	public function getLinkActionModificarArtista(){
		
		return LinkBuilder::getActionUrl( "ModificarArtista") ;
		
	}
		

	public function getLinkPistas(){
		
		return LinkBuilder::getPageUrl( "Pistas") ;
		
	}
	
	public function getLinkPistasSinMenu(){
		
		return LinkBuilder::getPageUrl( "PistasSinMenu") ;
		
	}

	public function getLinkPistaAgregar(){
		
		return LinkBuilder::getPageUrl( "PistaAgregar") ;
		
	}
	
	public function getLinkActionAgregarPista(){
		
		return LinkBuilder::getActionUrl( "AgregarPista") ;
		
	}

	public function getLinkActionModificarPista(){
		
		return LinkBuilder::getActionUrl( "ModificarPista") ;
		
	}
	
	public function getLinkActionAgregarConsulta(){
		
		return LinkBuilder::getActionUrl( "ConsultarPista") ;
		
	}
	
	
	
	
	
	
}
?>