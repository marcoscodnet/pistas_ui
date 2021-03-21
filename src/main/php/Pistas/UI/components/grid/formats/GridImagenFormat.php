<?php
namespace Pistas\UI\components\grid\formats;

use Pistas\UI\utils\PistasUIUtils;
use Rasty\Grid\entitygrid\model\GridValueFormat;


use Rasty\i18n\Locale;

/**
 * Formato para substring
 *
 * @author Marcos
 * @since 09-08-2019
 *
 */

class GridImagenFormat extends  GridValueFormat{
	
	
	
	public function __construct($simbolo=null){
		
	}
	
	public function format( $value, $item=null ){
		
		if( $value !=null ){
			
			
			 return "<img src='".PistasUIUtils::getWebPathImagenArtistas( ).$value."' width='100px' height=''>";
		}
			
		else $value;	
	}		
	


	
}