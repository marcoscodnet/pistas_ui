<?php
namespace Pistas\UI\service;

use Pistas\UI\components\filter\model\UIPistaCriteria;

use Rasty\components\RastyPage;
use Rasty\utils\XTemplate;
use Rasty\i18n\Locale;
use Rasty\exception\RastyException;
use Cose\criteria\impl\Criteria;

use Pistas\Core\model\Pista;

use Pistas\Core\service\ServiceFactory;
use Cose\Security\model\User;
use Rasty\Grid\entitygrid\model\IEntityGridService;
use Rasty\Grid\filter\model\UICriteria;

/**
 * 
 * UI service para pistas.
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class UIPistaService  implements IEntityGridService{
	
	private static $instance;
	
	private function __construct() {}
	
	public static function getInstance() {
		
		if( self::$instance == null ) {
			
			self::$instance = new UIPistaService();
			
		}
		return self::$instance; 
	}

	
	
	public function getList( UIPistaCriteria $uiCriteria){

		try{
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getPistaService();
			
			$pistas = $service->getList( $criteria );
	
			return $pistas;
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	public function get( $oid ){

		try{	

			$service = ServiceFactory::getPistaService();
		
			return $service->get( $oid );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			

	}
	

	public function add( Pista $pista ){

		try{

			$service = ServiceFactory::getPistaService();
		
			return $service->add( $pista );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			

	}
	
	public function update( Pista $pista ){

		try{

			$service = ServiceFactory::getPistaService();
		
			return $service->update( $pista );

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			

	}
	
	function getEntitiesCount($uiCriteria){

		try{
			
			$criteria = $uiCriteria->buildCoreCriteria() ;
			
			$service = ServiceFactory::getPistaService();
			$pistas = $service->getCount( $criteria );
			
			return $pistas;
			
		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}
	}
	
	function getEntities($uiCriteria){
		
		return $this->getList($uiCriteria);
	}
	
	public function delete(Pista $pista){

		try {
			
			$service = ServiceFactory::getPistaService();
			
			return $service->delete($pista->getOid());

		} catch (\Exception $e) {
			
			throw new RastyException( $e->getMessage() );
			
		}
		
	}
	
	public function enviarMail( Pista $pista, $nombre, $mail, $mensaje, $lang){

		try{

			$service = ServiceFactory::getPistaService();
		
			return $service->enviarMail( $pista, $nombre, $mail, $mensaje, $lang);

		} catch (\Exception $e) {
			
			throw new RastyException($e->getMessage());
			
		}			

	}
	
	
	
}
?>