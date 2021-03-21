<?php
namespace Pistas\UI\service;

use Pistas\UI\components\filter\model\UIArtistaCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Pistas\Core\model\Artista;

use Pistas\Core\service\ServiceFactory;
use Cose\Security\model\User;
use Rasty\Grid\entitygrid\model\IEntityGridService;
use Rasty\Grid\filter\model\UICriteria;

/**
 * 
 * UI service para artistas.
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class UIArtistaService  implements IEntityGridService{
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UIArtistaService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UIArtistaCriteria $uiCriteria){

		try{
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getArtistaService();
			
			$artistas = $service->getList( $criteria );
	
			return $artistas;
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	public function get( $oid ){

		try{	

			$service = ServiceFactory::getArtistaService();
		
			return $service->get( $oid );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			

	}
	

	public function add( Artista $artista ){

		try{

			$service = ServiceFactory::getArtistaService();
		
			return $service->add( $artista );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			

	}
	
	public function update( Artista $artista ){

		try{

			$service = ServiceFactory::getArtistaService();
		
			return $service->update( $artista );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			

	}
	
	function getEntitiesCount($uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getArtistaService();
			$artistas = $service->getCount( $criteria );
			
			return $artistas;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntities($uiCriteria){
		
		return $this->getList($uiCriteria);
	}
	
	
	public function delete(Artista $artista){

		try {
			
			$service = ServiceFactory::getArtistaService();
			
			return $service->delete($artista->getOid());

		} catch (\Exception $e) {
			
			throw new RastyException( $e->getMessage() );
			
		}
		
	}
}
?>