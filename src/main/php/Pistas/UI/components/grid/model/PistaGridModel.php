<?php
namespace Pistas\UI\components\grid\model;

use Pistas\UI\components\grid\formats\GridAudioFormat;
use Pistas\UI\components\grid\formats\GridImagenFormat;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\components\filter\model\UIPistaCriteria;

use Rasty\Grid\entitygrid\EntityGrid;
use Rasty\Grid\entitygrid\model\EntityGridModel;
use Rasty\Grid\entitygrid\model\GridModelBuilder;
use Rasty\Grid\filter\model\UICriteria;

use Pistas\Core\utils\PistasUtils;

use Pistas\UI\service\UIServiceFactory;
use Rasty\utils\RastyUtils;
use Rasty\utils\Logger;
use Rasty\security\RastySecurityContext;

use Rasty\Menu\menu\model\MenuOption;
use Rasty\Menu\menu\model\MenuGroup;
use Rasty\Menu\menu\model\MenuActionOption;
use Rasty\Menu\menu\model\MenuActionAjaxOption;

/**
 * Model para la grilla de pistas.
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class PistaGridModel extends EntityGridModel{

	
	
	public function __construct() {

        parent::__construct();
        $this->initModel();
        
    }
    
    public function getService(){
    	
    	return UIServiceFactory::getUIPistaService();
    }
    
    public function getFilter(){
    	
    	$filter = new UIPistaCriteria();
		return $filter;    	
    }
        
	protected function initModel() {

		$this->setHasCheckboxes( false );
		
		$column = GridModelBuilder::buildColumn( "oid", "pista.oid", 20, EntityGrid::TEXT_ALIGN_RIGHT );
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "nombre", "pista.nombre", 30, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "artista", "pista.artista", 30, EntityGrid::TEXT_ALIGN_LEFT ) ;
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "artista.imagen", "artista.imagen", 30, EntityGrid::TEXT_ALIGN_CENTER, new GridImagenFormat() ) ;
		$this->addColumn( $column );
		
		$column = GridModelBuilder::buildColumn( "mp3", "pista.mp3", 30, EntityGrid::TEXT_ALIGN_CENTER, new GridAudioFormat() ) ;
		$this->addColumn( $column );
		
	
		
	}

	public function getDefaultFilterField() {
        return "nombre";
    }

	public function getDefaultOrderField(){
		return "nombre";
	}    

    
    /**
	 * opciones de menú dado el item
	 * @param unknown_type $item
	 */
	public function getMenuGroups( $item ){
	
		$group = new MenuGroup();
		$group->setLabel("grupo");
		$options = array();
		
		$menuOption = new MenuOption();
		$menuOption->setLabel( $this->localize( "menu.pistas.modificar") );
		$menuOption->setPageName( "PistaModificar" );
		$menuOption->addParam("oid",$item->getOid());
		$menuOption->setImageSource( $this->getWebPath() . "css/images/editar_32.png" );
		$options[] = $menuOption ;

		
		
						
		
		
		$menuOption = new MenuActionAjaxOption();
		$menuOption->setLabel( $this->localize( "menu.pista.eliminar") );
		$menuOption->setActionName( "EliminarPista" );
		$menuOption->setConfirmMessage( $this->localize( "pista.eliminar.confirm.msg") );
		$menuOption->setConfirmTitle( $this->localize( "pista.eliminar.confirm.title") );
		$menuOption->setOnSuccessCallback( "eliminarCallback" );
		$menuOption->addParam("pistaOid",$item->getOid());
		$menuOption->setImageSource( $this->getWebPath() . "css/images/eliminar_32.png" );
		$options[] = $menuOption ;
		
		
		
		$group->setMenuOptions( $options );
		
		return array( $group );
		
	} 
    
}
?>