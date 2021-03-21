<?php
namespace Pistas\UI\conf;


use Rasty\conf\RastyConfig;
use Rasty\app\LoadRasty;
use Rasty\utils\Logger;

use Rasty\Menu\conf\RastyMenuConfig;
use Rasty\Layout\conf\RastyLayoutConfig;
use Rasty\Forms\conf\RastyFormsConfig;
use Rasty\Grid\conf\RastyGridConfig;

use Pistas\Core\conf\PistasConfig;


use Rasty\security\RastySecurityContext;
use Rasty\app\SecurityRastyListener;

use Rasty\cache\RastyApcCache;
use Rasty\cache\RastyMockCache;

/**
 * configuración Pistas ui
 * 
 * @author Marcos
 * @since 16/03/2018
 */
class PistasUISetup {

	/**
	 * inicializamos la aplicación de cuentas ui
	 */
	public static function initialize( $appName = "pistas_ui"){
		
			
		//inicializamos la sesión.
		if(!isset($_SESSION)){  
         session_set_cookie_params(0, $appName);
         @session_regenerate_id(true);    
             session_start();
         } 
//		if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
//			RastySecurityContext::logout();
//		}
//		$_SESSION['LAST_ACTIVITY'] = time();
		
		
		//configuramos php
		self::configurePhp();
		
		//cuentas core
		self::initializeCore();
		
		//cuentas ui
		self::initializeUI( $appName );
		
		
		
	}
	
	/**
	 * Configuraciones para php
	 */
	private static function configurePhp(){
		
		//algunos configuraciones para php.
		ini_set('memory_limit', '-1');
		ini_set('max_execution_time', '0');
		ini_set('display_errors', '1');
		
		include_once dirname(__DIR__) . "/conf/errorHandler.php";
	}
	
	/**
	 * Inicializamos cuentas core.
	 */
	private static function initializeCore(){

		PistasConfig::getInstance()->setDbName("cose_pistas");
		
		PistasConfig::getInstance()->initialize();
		PistasConfig::getInstance()->initLogger(dirname(__DIR__) . "/conf/log4php.xml");
		
	}
	
	
	/**
	 * Inicializamos cuentas ui + Rasty
	 */
	private static function initializeUI( $appName ){
		
		$appHome = $_SERVER["DOCUMENT_ROOT"];
		
		//inicializamos rasty indicando el home de la up y el nombre
		RastyConfig::getInstance()->initialize($appHome, $appName);
		//RastyConfig::getInstance()->setWebsocketUrl("192.168.1.34");
		RastyConfig::getInstance()->setCacheId($appName);
		RastyConfig::getInstance()->setCacheType(get_class( new RastyMockCache()));
		
		//configuramos el logger,
		Logger::configure( dirname(__DIR__) . "/conf/log4php.xml" );
		Logger::log("Logger pistas ui configurado!");
		
		
		//cargamos los componentes de cuentas ui.
		$rastyLoader = LoadRasty::getInstance();
		$rastyLoader->loadXml(
		
				dirname(__DIR__) . '/conf/rasty.xml',
				RastyConfig::getInstance()->getAppPath() . "src/main/php/Pistas/UI/",
				RastyConfig::getInstance()->getWebPath()
		
		);
		
		//inicializamos los módulos rasty que utilizaremos
		RastyGridConfig::initialize();
		RastyLayoutConfig::initialize();
		RastyFormsConfig::initialize();;
		RastyMenuConfig::initialize();
		
		//inicializamos los listeners de la apllicación
		RastyConfig::getInstance()->addAppListener( new SecurityRastyListener() );

		//SorteosUIConfig::getInstance()->initialize("PistasMetroLayout");
		
	}
			
}