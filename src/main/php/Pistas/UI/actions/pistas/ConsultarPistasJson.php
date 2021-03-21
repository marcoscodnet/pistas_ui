<?php
namespace Pistas\UI\actions\pistas;

use Pistas\UI\utils\PistasUIUtils;

use Pistas\UI\service\UIPistaService;

use Pistas\UI\service\UIServiceFactory;



use Pistas\UI\components\filter\model\UIPistaCriteria;

use Rasty\actions\JsonAction;
use Rasty\utils\RastyUtils;
use Rasty\exception\RastyException;

use Rasty\security\RastySecurityContext;

use Rasty\i18n\Locale;
use Rasty\factory\PageFactory;

use Rasty\app\RastyMapHelper;
use Rasty\factory\ComponentFactory;
use Rasty\factory\ComponentConfig;

use Rasty\utils\Logger;

/**
 * se agregar un detalle de venta para la edición
 * en sesión.
 * 
 * @author Marcos
 * @since 25/04/2020
 */
class ConsultarPistasJson extends JsonAction{

	
	public function execute(){

		$rasty= RastyMapHelper::getInstance();
		
		try {

			//creamos el detalle de venta.
			$page = RastyUtils::getParamGET("page");
			$search = RastyUtils::getParamGET("search");
			
			$uiCriteria = new UIPistaCriteria();
			
			$uiCriteria->setRowPerPage( 10 );
			$uiCriteria->setPage( $page );
			$uiCriteria->setPistaOArtista($search);
			$oPistas = UIServiceFactory::getUIPistaService()->getList( $uiCriteria );
			
			$arrayPistas = array();
			foreach ($oPistas as $oPista) {
				/*if ($oPista->getArtista()) {
					echo $oPista->getArtista()->getImagen()."<br>";
				}*/
				$arrayPista = array();
				$arrayPista['oid'] = $oPista->getOid();
				$arrayPista['nombre'] = $oPista->getNombre();
				$arrayPista['demo'] = ($oPista->getMp3())?PistasUIUtils::getUploadWebPathMp3Pistas().$oPista->getMp3():'';
				$arrayPista['artista'] = ($oPista->getArtista())?$oPista->getArtista()->getNombre():'';
				$arrayPista['imagen'] = ($oPista->getArtista())?($oPista->getArtista()->getImagen())?PistasUIUtils::getWebPathImagenArtistas( ).$oPista->getArtista()->getImagen():'':'';
				$arrayPistas[]= $arrayPista;
			}

			
			
			Logger::log("Consultando desde app");
			
			$result= $arrayPistas;
						
		} catch (RastyException $e) {
		
			$result["error"] = $e->getMessage();
		}
		
		return $result;
		
	}

}
?>