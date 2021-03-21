<?php
namespace Pistas\UI\components\grid\formats;

use Pistas\UI\utils\PistasUIUtils;
use Rasty\Grid\entitygrid\model\GridValueFormat;


use Rasty\i18n\Locale;

/**
 * Formato para substring
 *
 * @author Marcos
 * @since 31-07-2019
 *
 */

class GridAudioFormat extends  GridValueFormat{
	
	
	
	public function __construct($simbolo=null){
		
	}
	
	public function format( $value, $item=null ){
		
		if( $value !=null ){
			 return '<audio src="'.PistasUIUtils::getUploadWebPathMp3Pistas().$value.'" controls controlsList="nodownload" type="audio/mpeg" preload="none"></audio>';
		}
			
		else $value;	
	}		
	


	
}