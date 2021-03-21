<?php

namespace Pistas\UI\layouts;

use Rasty\Layout\layout\RastyLayout;

use Rasty\utils\XTemplate;
use Rasty\conf\RastyConfig;

use Rasty\utils\RastyUtils;

class PistasMetroSinMenuNuevoLayout extends RastyLayout{

	
	
	public function getContent(){
		
		
		
			
		//contenido del componente..
				
		$xtpl = $this->getXTemplate( dirname(__DIR__) . "/layouts/PistasMetroSinMenuNuevoLayout.htm" );
		$xtpl->assign('WEB_PATH', RastyConfig::getInstance()->getWebPath() );
		
		$this->parseMetaTags($xtpl);
        $this->parseStyles($xtpl);
        $this->parseScripts($xtpl);
        
        
        $this->parseErrors($xtpl);
        
		/*if (strpos($_SERVER['REQUEST_URI'], 'buscadorpista.html')) {
			$pagina = 'buscadorpista.html';
		}
		if (strpos($_SERVER['REQUEST_URI'], 'consultarpista.html')) {
			$pagina = 'consultarpista.html';
		}*/
		//print_r($_GET);
		
		$pagina = RastyUtils::getParamGET( "path" ).'.html?';
		if (RastyUtils::getParamGET( "pistaOid" )) {
			$pagina .='pistaOid='.RastyUtils::getParamGET( "pistaOid" ).'&';
		}
	
		$xtpl->assign('title', $this->oPage->getTitle());
		$lang = (RastyUtils::getParamGET( "lang" ))?RastyUtils::getParamGET( "lang" ):'esusa';
		switch ($lang) {
			case 'esusa':
				$banderas1 = '<li  id="menu-item-wpml-ls-2-ESUSA"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-ESUSA fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-ESUSA" ><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a><ul role="menu" class="sub-menu"><li  id="menu-item-wpml-ls-2-es"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li  id="menu-item-wpml-ls-2-arg"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li  id="menu-item-wpml-ls-2-mx"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li  id="menu-item-wpml-ls-2-eng"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
				$banderas2 = '<li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-ESUSA fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-ESUSA"><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a><ul role="menu" class="sub-menu"><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
			break;
			
			case 'es':
					$banderas1 = '<li  id="menu-item-wpml-ls-2-es"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-es fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-es" ><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a><ul role="menu" class="sub-menu"><li  id="menu-item-wpml-ls-2-ESUSA"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li  id="menu-item-wpml-ls-2-arg"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li  id="menu-item-wpml-ls-2-mx"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li  id="menu-item-wpml-ls-2-eng"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
				$banderas2 = '<li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-es fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-es"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a><ul role="menu" class="sub-menu"><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
			break;
			case 'arg':
					$banderas1 = '<li  id="menu-item-wpml-ls-2-arg"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-arg fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-arg" ><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a><ul role="menu" class="sub-menu"><li  id="menu-item-wpml-ls-2-ESUSA"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li  id="menu-item-wpml-ls-2-es"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li  id="menu-item-wpml-ls-2-mx"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li  id="menu-item-wpml-ls-2-eng"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
				$banderas2 = '<li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-arg fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-arg"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a><ul role="menu" class="sub-menu"><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
			break;
			case 'mx':
					$banderas1 = '<li  id="menu-item-wpml-ls-2-mx"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-mx fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-mx" ><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a><ul role="menu" class="sub-menu"><li  id="menu-item-wpml-ls-2-ESUSA"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li  id="menu-item-wpml-ls-2-es"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li  id="menu-item-wpml-ls-2-arg"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li  id="menu-item-wpml-ls-2-eng"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
				$banderas2 = '<li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-mx fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-mx"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a><ul role="menu" class="sub-menu"><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
			break;
			case 'eng':
					$banderas1 = '<li  id="menu-item-wpml-ls-2-eng"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-eng fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-eng" ><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a><ul role="menu" class="sub-menu"><li  id="menu-item-wpml-ls-2-ESUSA"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li  id="menu-item-wpml-ls-2-es"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li  id="menu-item-wpml-ls-2-arg"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li  id="menu-item-wpml-ls-2-mx"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li></ul></li>';
				$banderas2 = '<li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-eng fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-eng"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a><ul role="menu" class="sub-menu"><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-ESUSA fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li></ul></li>';
			break;
			
			default:
				$banderas1 = '<li  id="menu-item-wpml-ls-2-ESUSA"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-ESUSA fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-ESUSA" ><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a><ul role="menu" class="sub-menu"><li  id="menu-item-wpml-ls-2-es"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li  id="menu-item-wpml-ls-2-arg"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li  id="menu-item-wpml-ls-2-mx"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li  id="menu-item-wpml-ls-2-eng"  class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
				$banderas2 = '<li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-ESUSA wpml-ls-current-language wpml-ls-menu-item wpml-ls-first-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-has-children menu-item-wpml-ls-2-ESUSA fusion-dropdown-menu"  data-classes="menu-item" data-item-id="wpml-ls-2-ESUSA"><a  title="Español-USA" href="'.$pagina.'lang=esusa" class="fusion-bottombar-highlight"><span class="menu-text"><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/esp-usa.png" alt="ESUSA" title="Español-USA"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Español-USA</span></span></a><ul role="menu" class="sub-menu"><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-es wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-es fusion-dropdown-submenu"  data-classes="menu-item"><a  title="España" href="'.$pagina.'lang=es" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png" alt="es" title="España"><span class="wpml-ls-native" style="color:white; font-weight:bold;">España</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-arg wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-arg fusion-dropdown-submenu"  data-classes="menu-item"><a  title="Argentina" href="'.$pagina.'lang=arg" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/arg.png" alt="arg" title="Argentina"><span class="wpml-ls-native" style="color:white; font-weight:bold;">Argentina</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-mx wpml-ls-menu-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-mx fusion-dropdown-submenu"  data-classes="menu-item"><a  title="México" href="'.$pagina.'lang=mx" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/mx.png" alt="mx" title="México"><span class="wpml-ls-native" style="color:white; font-weight:bold;">México</span></span></a></li><li   class="menu-item wpml-ls-slot-2 wpml-ls-item wpml-ls-item-eng wpml-ls-menu-item wpml-ls-last-item menu-item-type-wpml_ls_menu_item menu-item-object-wpml_ls_menu_item menu-item-wpml-ls-2-eng fusion-dropdown-submenu"  data-classes="menu-item"><a  title="English" href="'.$pagina.'lang=eng" class="fusion-bottombar-highlight"><span><img class="wpml-ls-flag" src="http://www.pistasprofesional.com/web/wp-content/uploads/flags/eng.png" alt="eng" title="English"><span class="wpml-ls-native" style="color:white; font-weight:bold;">English</span></span></a></li></ul></li>';
			break;
		}
	
		
		$xtpl->assign('banderas1',   $banderas1 );
		
		
		
		$xtpl->assign('banderas2',   $banderas2 );
		
		
		$webPath = RastyConfig::getInstance()->getWebPath();
		$xtpl->assign('estiloFusion',   $webPath.'/metro/css/fusion_min.css?ver=2.0' );
		$xtpl->assign('jsFusion',   $webPath.'/metro/js/fusion_min.js?ver=2.0' );
		
		$xtpl->assign('page',   $this->oPage->render() );

		//chequeamos si hay que mostrar errores.
		
		
		$xtpl->parse("main");
		$content = $xtpl->text("main");
		
		/*
		echo "<pre>";
		var_dump($xtpl);
		echo "</pre>";
		*/
		
		return $content;
	}
	
	
	public function getType(){
		
		return "PistasMetroSinMenuLayout";
		
	}	


	protected function initStyles(){
		parent::initStyles();
		
		$webPath = RastyConfig::getInstance()->getWebPath();
		
		
		$this->addStyle( "$webPath/css/jquery/jVal.css");
		$this->addStyle( "$webPath/metro/css/jquery/jquery.ui.all.css");
		$this->addStyle( "$webPath/metro/css/metro.css");
		$this->addStyle( "$webPath/metro/css/rasty.css");
		$this->addStyle( "$webPath/metro/css/rasty_custom.css");

		$this->addStyle( "$webPath/css/jquery.rasty.css");
		
// 		$this->addStyle( "$webPath/metro/less/metro-bootstrap.less");
		
		$this->addStyle( "$webPath/metro/css/cuentas.css");
		$this->addStyle( "$webPath/metro/css/cuentas_forms.css");
		
		$this->addStyle( "$webPath/css/jquery/imgareaselect-default.css");
		
		//$this->addStyle( "$webPath/css/menu.css");

		//$this->addStyle( "$webPath/metro/css/fusion_min.css?ver=2.0");
		
	}
	
	protected function initScripts(){
		parent::initScripts();
		
		$webPath = RastyConfig::getInstance()->getWebPath();
		
		$this->addScript( "$webPath/metro/js/jquery/jquery.min.js");
		$this->addScript( "$webPath/metro/js/jquery/jquery.widget.min.js");
		$this->addScript( "$webPath/metro/js/jquery/jquery.mousewheel.js");

		$this->addScript( "$webPath/metro/jquery-ui-1.10.4/js/jquery-ui-1.10.4.js");
		//$this->addScript( "$webPath/metro/jquery-ui-1.10.4/js/jquery-1.10.2.js");
		
		$this->addScript( "$webPath/metro/js/metro/metro-dropdown.js");
		$this->addScript( "$webPath/metro/js/metro/metro-input-control.js");
		$this->addScript( "$webPath/metro/js/metro/metro-core.js");
		
		$this->addScript( "$webPath/metro/js/metro/metro-button-set.js");
		$this->addScript( "$webPath/metro/js/metro/metro-dialog.js");
		//$this->addScript( "$webPath/metro/js/metro/metro-drag-title.js");
		$this->addScript( "$webPath/metro/js/metro/metro-fluentmenu.js");
		$this->addScript( "$webPath/metro/js/metro/metro-hint.js");
		$this->addScript( "$webPath/metro/js/metro/metro-listview.js");
		$this->addScript( "$webPath/metro/js/metro/metro-live-tile.js");
		$this->addScript( "$webPath/metro/js/metro/metro-notify.js");
		$this->addScript( "$webPath/metro/js/metro/metro-plugin-template.js");
		$this->addScript( "$webPath/metro/js/metro/metro-tab-control.js");
		
		$this->addScript(  "$webPath/metro/js/jquery/jquery.ui.core.js" );
		$this->addScript(  "$webPath/metro/js/jquery/jquery.ui.datepicker.js" );
		$this->addScript(  "$webPath/metro/js/jquery/jquery.ui.button.js" );
		$this->addScript(  "$webPath/metro/js/jquery/jquery.ui.dialog.js" );
		$this->addScript(  "$webPath/metro/js/jquery/jquery.ui.position.js" );
		$this->addScript(  "$webPath/metro/js/jquery/jquery.ui.resizable.js" );
		$this->addScript(  "$webPath/metro/js/jquery/jquery.ui.selectable.js" );

		$this->addScript(  "$webPath/metro/js/jquery/i18n/jquery-ui-i18n.js" );
		$this->addScript(  "$webPath/metro/js/jquery/i18n/jquery.ui.datepicker-es.js" );
		$this->addScript(  "$webPath/metro/js/jquery/jquery.maskedinput-1.3.js" );

		
		$this->addScript(  "$webPath/metro/js/docs.js" );
		
		$this->addScript(  "$webPath/js/jquery/jVal.js" );
    	$this->addScript(  "$webPath/js/jquery/ajaxfileupload.js" );
    	$this->addScript(  "$webPath/js/jquery/browser_jqueryfix.js" );
    	
    	$this->addScript(  "$webPath/js/jquery/jquery.imgareaselect.pack.js" );
    	
		//$this->addScript("$webPath/js/rasty_observer.js");
		$this->addScript("$webPath/js/historiaAyuda.js");
		//$this->addScript("$webPath/js/app_observer.js");
		$this->addScript("$webPath/js/rasty.js");
		
		$this->addScript("$webPath/js/jquery.rasty.js");
		
		$this->addScript("$webPath/js/cuentas.js");
		$this->addScript("$webPath/js/cuentas_utils.js");
		$this->addScript("$webPath/js/cuentas_forms.js");
		
		
		$this->addScript(  "$webPath/js/jquery/jquery.inputmask.js" );
		$this->addScript(  "$webPath/js/jquery/jquery.inputmask.extensions.js" );
		$this->addScript(  "$webPath/js/jquery/jquery.inputmask.regex.extensions.js" );
		$this->addScript(  "$webPath/js/jquery/jquery.inputmask.numeric.extensions.js" );
		$this->addScript(  "$webPath/js/jquery/jquery.inputmask.date.extensions.js" );
		
		//$this->addScript("$webPath/js/menu.js");
		
		$this->addScript("$webPath/js/accounting.min.js");
	}
	
	protected function initLinks(){
		parent::initLinks();
	}
	


	protected function parseMetaTags($xtpl) {

		$xtpl->assign('http_equiv', 'X-UA-Compatible');
        $xtpl->assign('meta_content', 'IE=7');
        $xtpl->parse('main.meta_tag');

        $xtpl->assign('http_equiv', 'Content-Type');
        $xtpl->parse('main.meta_tag');
        
        $xtpl->assign('name', 'viewport');
        $xtpl->assign('meta_content', 'width=device-width, initial-scale=1.0');
        $xtpl->assign('http_equiv', '');
        $xtpl->parse('main.meta_tag');
        
    }

    protected function parseStyles($xtpl) {

    	foreach ($this->getStyles() as $style) {
			$xtpl->assign('css', $style);
        	$xtpl->parse('main.style');			
		}
    }
	
	
    
	protected function parseScripts($xtpl) {

		foreach ($this->getScripts() as $script) {
			$xtpl->assign('js', $script);
        	$xtpl->parse('main.script');			
		}

    }

	protected function parseErrors($xtpl) {

		//chequemos los errores en el forward del page.
		$msg = $this->oPage->getMsgError();
		
		if( !empty($msg) ){
			
			$xtpl->assign("msg", $msg);
			//$xtpl->assign("msg",  );
			$xtpl->parse("main.msg_error" );
		}			
		

    }
    
	
}
?>